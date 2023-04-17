<?php

namespace App\Http\Controllers\Admin;

use App\Enums\{
    JapaneseFluency,
    KoreanFluency,
    MandarinFluency,
    OtherFluency,
};
use App\Http\Controllers\Controller;
use App\Http\Enum\Role;
use App\Http\Requests\Admin\StoreApplicationRequest;
use App\Http\Requests\Admin\UpdateApplicationRequest;
use App\Models\{
    Admin,
    Application,
    JobPost,
    JobSeeker,
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    /**
     * Display the application list page
     *
     * @return \Illuminate\Http\View
     */
    public function index(Request $request)
    {
        $applications = Application::orderByDesc('id');

        // Condition for Application Status
        if ($request->input('application_status')) {
            $applicationStatus = $request->input('application_status');
            $applications->where('application_status', $applicationStatus);
        }

        // Condition for Recruiter / Admin
        if ($request->input('admin_fullname')) {
            $adminFullname = $request->input('admin_fullname');
            $applications->whereHas('admin', function (Builder $query) use ($adminFullname) {
                $adminFullname = '%' . $adminFullname . '%';
                $query->where('fullname', 'LIKE', $adminFullname);
            });
        }

        // Condition for Applicant Name
        if ($request->input('applicant_name')) {
            $applicantName = $request->input('applicant_name');
            $applications->whereHas('jobSeeker', function (Builder $query) use ($applicantName) {
                $applicantName = '%' . $applicantName . '%';
                $query->where('fullname', 'LIKE', $applicantName);
            });
        }

        // Condition for Language Fluency
        if ($request->input('language_fluency')) {
            $languageFluency = $request->input('language_fluency');
            $applications->whereHas('jobPost', function (Builder $query) use ($languageFluency) {
                $languageFluency = '%' . $languageFluency . '%';
                $query->where('language_fluency', 'LIKE', $languageFluency);
            });
        }

        $applications = $applications->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();

        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Display the application create page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.applications.create');
    }

    /**
     * Store application
     *
     * @param \App\Http\Requests\Admin\StoreApplicationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreApplicationRequest $request)
    {
        Application::create($request->only([
            'job_post_id',
            'admin_id',
            'job_seeker_id',
            'applied_date',
            'application_status',
            'final_remarks',
        ]));

        return redirect()->route('admin.applications.index')
            ->with([
                'success' =>  __('Successfully added'),
            ]);
    }

    /**
     * Display the application edit page
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\View\View
     */
    public function edit(Application $application)
    {
        $languageFluencyText = null;
        if ($application->jobSeeker->languageFirst) {
            $languageFluencyText = $application->jobSeeker->languageFirst->language;
            if ($application->jobSeeker->language_first_fluency) {
                switch ($application->jobSeeker->languageFirst->language) {
                    case 'Japanese':
                        $fluencyText = JapaneseFluency::from($application->jobSeeker->language_first_fluency);
                        break;
                    case 'Korean':
                        $fluencyText = KoreanFluency::from($application->jobSeeker->language_first_fluency);
                        break;
                    case 'Mandarin':
                        $fluencyText = MandarinFluency::from($application->jobSeeker->language_first_fluency);
                        break;
                    default:
                        $fluencyText = OtherFluency::from($application->jobSeeker->language_first_fluency);
                        break;
                }
                $languageFluencyText .= ': ' . $fluencyText->text();
            }
        }

        return view('admin.applications.edit', compact(['application', 'languageFluencyText']));
    }

    /**
     * Update application
     *
     * @param \App\Models\Application $application
     * @param \App\Http\Requests\Admin\UpdateApplicationRequest $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function update(Application $application, UpdateApplicationRequest $request)
    {
        $application->update($request->only([
            'job_post_id',
            'admin_id',
            'job_seeker_id',
            'applied_date',
            'application_status',
            'final_remarks',
        ]));

        if ($request->ajax()) {
            return [];
        }

        return redirect()->route('admin.applications.index')
            ->with([
                'success' =>  __('Successfully updated'),
            ]);
    }
}
