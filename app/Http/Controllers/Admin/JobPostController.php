<?php

namespace App\Http\Controllers\Admin;

use App\Enums\{
    JobPostIndustryField,
    JobPostNameField,
    PickupJobLanguage,
};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobPostRequest;
use App\Http\Requests\Admin\UpdateJobPostRequest;
use App\Models\{
    Admin,
    Group,
    JobPost,
    Language,
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Job post list page
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $jobPosts = JobPost::orderByDesc('id');

        $conditons = $request->only([
            'status',
            'job_name_en',
            'company_name',
            'language_fluency',
        ]);
        foreach ($conditons as $condition => $value) {
            if ($value) {
                $wildcardValue = '%' . $value . '%';
                $jobPosts->where($condition, 'LIKE', $wildcardValue);
            }
        }
        if ($request->input('admin_fullname')) {
            $adminFullname = $request->input('admin_fullname');
            $jobPosts->whereHas('admin', function (Builder $query) use ($adminFullname) {
                $wildcardFullname = '%' . $adminFullname . '%';
                $query->where('fullname', 'LIKE', $wildcardFullname);
            });
        }

        $jobPosts = $jobPosts->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();

        return view('admin.job-posts.index', compact('jobPosts'));
    }

    /**
     * Job post create page
     *
     * @return void
     */
    public function create()
    {
        $admins = Admin::all();
        $groups = Group::all();
        $languages = Language::all();

        return view('admin.job-posts.create', compact(['admins', 'groups', 'languages']));
    }

    /**
     * Store job post
     *
     * @param \App\Http\Requests\Admin\StoreJobPostRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreJobPostRequest $request)
    {
        $jobPost = JobPost::create($request->only([
            'job_number',
            'salary',
            'post_start_date',
            'post_end_date',
            'status',
            'display_status',
            'target',
            'group_id',
            'job_name_en',
            'industry_en',
            'location_en',
            'benefits_en',
            'details_en',
            'job_name_jp',
            'industry_jp',
            'location_jp',
            'benefits_jp',
            'details_jp',
            'job_name_kr',
            'industry_kr',
            'location_kr',
            'benefits_kr',
            'details_kr',
            'job_name_cn',
            'industry_cn',
            'location_cn',
            'benefits_cn',
            'details_cn',
            'admin_id',
            'heads_needed',
            'work_arrangement',
            'tracker_url',
            'company_name',
            'position',
            'language_fluency',
            'schedule',
            'visa',
            'education',
            'age',
            'gender',
            'experience',
            'abroad',
            'website',
            'interview_schedule',
            'job_description',
            'job_description_jp',
            'job_post_jp',
        ]));
        $jobPost->languagePreferences()->attach($request->input('language_ids'));

        return redirect()->route('admin.job-posts.index')
            ->with([
                'success' =>  __('Successfully added'),
            ]);
    }

    /**
     * Job post edit page
     *
     * @param \App\Models\JobPost $jobPost
     * @return void
     */
    public function edit(JobPost $jobPost)
    {
        $admins = Admin::all();
        $groups = Group::all();
        $languages = Language::all();

        return view('admin.job-posts.edit', compact(['admins', 'groups', 'jobPost', 'languages']));
    }

    /**
     * Update job post
     *
     * @param \App\Models\JobPost $jobPost
     * @param \App\Http\Requests\Admin\UpdateJobPostRequest $request
     * @return RedirectResponse
     */
    public function update(JobPost $jobPost, UpdateJobPostRequest $request)
    {
        $jobPost->update($request->only([
            'job_number',
            'salary',
            'post_start_date',
            'post_end_date',
            'status',
            'display_status',
            'target',
            'group_id',
            'job_name_en',
            'industry_en',
            'location_en',
            'benefits_en',
            'details_en',
            'job_name_jp',
            'industry_jp',
            'location_jp',
            'benefits_jp',
            'details_jp',
            'job_name_kr',
            'industry_kr',
            'location_kr',
            'benefits_kr',
            'details_kr',
            'job_name_cn',
            'industry_cn',
            'location_cn',
            'benefits_cn',
            'details_cn',
            'admin_id',
            'heads_needed',
            'work_arrangement',
            'tracker_url',
            'company_name',
            'position',
            'language_fluency',
            'schedule',
            'visa',
            'education',
            'age',
            'gender',
            'experience',
            'abroad',
            'website',
            'interview_schedule',
            'job_description',
            'job_description_jp',
            'job_post_jp',
        ]));
        $jobPost->languagePreferences()->sync($request->input('language_ids'));

        return redirect()->route('admin.job-posts.index')
            ->with([
                'success' =>  __('Successfully updated'),
            ]);
    }

    /**
     * Get job posts
     *
     * @return mixed
     */
    public function search(Request $request)
    {
        $jobName = JobPostNameField::English->value;
        $industry = JobPostIndustryField::English->value;

        // Get language field
        switch ($request->input('language')) {
            case PickupJobLanguage::Japanese->value:
                $jobName = JobPostNameField::Japanese->value;
                $industry = JobPostIndustryField::Japanese->value;
                break;

            case PickupJobLanguage::Korean->value:
                $jobName = JobPostNameField::Korean->value;
                $industry = JobPostIndustryField::Korean->value;
                break;

            case PickupJobLanguage::Mandarin->value:
                $jobName = JobPostNameField::Mandarin->value;
                $industry = JobPostIndustryField::Mandarin->value;
                break;

            default:
                break;
        }

        $jobPosts = JobPost::select([
                'id',
                $jobName . ' AS job_name_en',
                $industry . ' AS industry_en',
            ]);

        $searchKeyword = $request->query('search');
        if ($searchKeyword && is_string($searchKeyword)) {
            $jobPosts = $jobPosts->where(function ($query) use ($jobName, $industry, $searchKeyword) {
                $searchKeyword = '%' . $searchKeyword . '%';

                return $query
                    ->where('id', 'like', $searchKeyword)
                    ->orWhere($jobName, 'like', $searchKeyword)
                    ->orWhere($industry, 'like', $searchKeyword);
            });
        }

        $jobPosts = $jobPosts
            ->whereNotIn('id', function ($query) {
                return $query
                    ->select('job_post_id')->from('pickup_jobs');
            })
            ->orderByDesc('id')
            ->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();

        return $jobPosts;
    }
}
