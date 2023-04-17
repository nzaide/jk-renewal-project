<?php

namespace App\Http\Controllers;

use App\Enums\JobPostDisplayStatus;
use App\Enums\JobPostStatus;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('localize.query')->only('search');
    }

    /**
     * Search job posts
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $jobSeeker = $request->user();
        $selectedLanguage = $request->query('la');

        $jobPosts = JobPost::query()
            ->ofSearchKeyword($request->query('q'))
            ->ofSearchLocation($request->query('l'))
            ->ofSearchTargets($request->query('t'))
            ->ofPickupJobPreference($jobSeeker, $selectedLanguage)
            ->ofJobPostLanguagePreference($jobSeeker, $selectedLanguage)
            ->with('jobPostLanguagePreferences.language:id,language')
            ->where('display_status', JobPostDisplayStatus::Displayed)
            ->where('status', JobPostStatus::Open)
            ->where(function ($query) {
                $query->whereDate('post_start_date', '<=', today())
                    ->whereDate('post_end_date', '>=', today())
                    ->orWhereNull('post_end_date');
            })
            ->orderByDesc('updated_at')
            ->paginate(10)
            ->withQueryString();

        return view('job-posts.search', compact('jobPosts'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JobPost $jobPost
     * @return \Illuminate\Contracts\View\View
     */
    public function show(JobPost $jobPost)
    {
        $user = auth()->user();
        $isAlreadyApplied = null;
        if ($user) {
            $isAlreadyApplied = JobPost::alreadyApplied($user->id, $jobPost->id)
                ->first()
                ->job_post_id ?? null;
        }

        return view('job-posts.show', compact(['jobPost', 'isAlreadyApplied']));
    }
}
