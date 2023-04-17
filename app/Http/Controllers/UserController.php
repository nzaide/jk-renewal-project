<?php

namespace App\Http\Controllers;

use App\Http\Enum\ConditionJobChangeAttributes;
use App\Http\Enum\RegistrationStatus;
use App\Http\Enum\ResponseCode;
use App\Http\Enum\ResponseStatus;
use App\Http\Requests\MailSignUpUserRequest;
use App\Http\Requests\RegistrationCompletionFormFourRequest;
use App\Http\Requests\RegistrationCompletionFormOneRequest;
use App\Http\Requests\RegistrationCompletionFormThreeRequest;
use App\Http\Requests\RegistrationCompletionFormTwoRequest;
use App\Http\Requests\UserEditFormRequest;
use App\Mail\RegistrationCompletionMail;
use App\Mail\SignUpMail;
use App\Models\AcademicHistory;
use App\Models\ConditionJobChange;
use App\Models\EmploymentHistory;
use App\Models\MasterBusinessDomain;
use App\Models\MasterEmploymentStatus;
use App\Models\MasterGender;
use App\Models\MasterGraduationSchoolType;
use App\Models\MasterJbDegree;
use App\Models\MasterOccupation;
use App\Models\MasterPosition;
use App\Models\MasterPrefecture;
use App\Models\MasterSalary;
use App\Models\MasterTelephoneType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mail;

class UserController extends Controller
{
    private $MasterGender;
    private $MasterPrefecture;
    private $MasterSalary;
    private $User;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->MasterGender = app(MasterGender::class);
        $this->MasterPrefecture = app(MasterPrefecture::class);
        $this->MasterSalary = app(MasterSalary::class);
        $this->User = app(User::class);
    }

    /**
     * Show sign up page
     */
    public function index()
    {
        return view('auth.sign_up');
    }

    /**
     * Sign Up User
     *
     * @param MailSignUpUserRequest $req
     *
     * @return mixed
     */
    public function mailRegistration(MailSignUpUserRequest $req)
    {
        $safeValues = $req->safe()->except(['password_confirmation']);
        $user = $this->User->register($safeValues);
        $user->raw_password = $req->input('password');
        Mail::to($user->email)->send(new SignUpMail($user));

        return redirect()->route('signup.success');
    }

    /**
     * Edit the member profile
     *
     * @return View
     */
    public function edit()
    {
        $user = Auth::user();
        $genders = $this->MasterGender->all();
        $salaries = $this->MasterSalary->all();
        $prefectures = $this->MasterPrefecture->all();

        return view(
            'members.edit',
            compact('genders', 'prefectures', 'salaries', 'user')
        );
    }

    /**
     * registrationCompletion
     *
     * @return mixed
     */
    public function registrationCompletion()
    {
        $user = Auth::user();

        if ($user->registration_status == RegistrationStatus::ACTIVE) {
            return redirect()->route('top');
        }

        $genders = MasterGender::all();
        $perfectures = MasterPrefecture::all();
        $salaries = MasterSalary::all();
        $gradSchool = MasterGraduationSchoolType::all();
        $employmentStatus = MasterEmploymentStatus::all();
        $occupationList = MasterOccupation::all();
        $positionList = MasterPosition::all();
        $changeJobList = MasterJbDegree::all();
        $domainList = MasterBusinessDomain::all();
        $conditionJobChangeList = ConditionJobChangeAttributes::ATTRIBUTES;

        return view(
            'members.registration.completion',
            compact(
                'user',
                'genders',
                'perfectures',
                'salaries',
                'gradSchool',
                'employmentStatus',
                'occupationList',
                'positionList',
                'changeJobList',
                'conditionJobChangeList',
                'domainList'
            )
        );
    }

    /**
     * update function
     * @param UserEditFormRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request)
    {
        $this->User->updateUser($request);

        return response(ResponseStatus::SUCCESS, ResponseCode::SUCCESS);
    }

    /**
     * updatePersonalInformation | formOne
     *
     * @return mixed
     */
    public function updatePersonalInformation(RegistrationCompletionFormOneRequest $req)
    {
        $currentUser = $this->User::find(Auth::id());
        $currentUser->gender = $req->input('gender');
        $currentUser->residence_prefecture = $req->input('residence');

        $dob = null;
        // check dob is filled
        if ($req->input('dob_year')) {
            $dob = $req->input('dob_year') . '-' . $req->input('dob_month') . '-' . $req->input('dob_day');
        }
        $currentUser->date_of_birth = $dob;

        if (!$currentUser->save()) {
            return response(ResponseStatus::ERROR, ResponseCode::ERROR);
        }

        return response(ResponseStatus::SUCCESS, ResponseCode::SUCCESS);
    }

    /**
     * updateAcademicHistory | Formtwo
     *
     * @return mixed
     */
    public function updateAcademicHistory(RegistrationCompletionFormTwoRequest $req)
    {
        $currentUser = $this->User::find(Auth::id());
        $academicHistory = AcademicHistory::where('user_id', $currentUser->id)->first();

        if ($academicHistory) {
            $academicHistory->graduation_school_type = $req->input('school_type');
            $academicHistory->school_name = $req->input('last_school');
            $academicHistory->majoring = $req->input('major');
            $academicHistory->graduation_year = $req->input('grad_year');
            $academicHistory->graduation_month = $req->input('grad_moth');

            if (!$academicHistory->save()) {
                return response(ResponseStatus::ERROR, ResponseCode::ERROR);
            }
        } else {
            $academicHistory = AcademicHistory::create([
                'user_id' => $currentUser->id,
                'graduation_school_type' => $req->input('school_type'),
                'school_name' => $req->input('last_school'),
                'majoring' => $req->input('major'),
                'graduation_year' => $req->input('grad_year'),
                'graduation_month' => $req->input('grad_moth'),
            ]);
        }

        return response(ResponseStatus::SUCCESS, ResponseCode::SUCCESS);
    }

    /**
     * Get user data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserData()
    {
        $user = Auth::user();
        $data = [
            'date_of_birth' => (string) $user->date_of_birth,
            'gender' => $user->gender,
            'residence_prefecture' => $user->residence_prefecture,
            'current_salary' => $user->current_salary,
        ];

        return response()->json(['user' => $data]);
    }

    /**
     * updateEmploymentHistory | FormThree
     *
     * @return mixed
     */
    public function updateEmploymentHistory(RegistrationCompletionFormThreeRequest $req)
    {
        $currentUser = $this->User::find(Auth::id());
        $employmentHistory = EmploymentHistory::where('user_id', $currentUser->id)->first();

        if ($employmentHistory) {
            $employmentHistory->employment_status = $req->input('employment_status');
            $employmentHistory->company_name = $req->input('company_name');
            $employmentHistory->occupation = $req->input('occupation');
            $employmentHistory->position = $req->input('position');
            $employmentHistory->employed_start_year = $req->input('cmp_year_from');
            $employmentHistory->employed_start_month = $req->input('cmp_month_from');
            $employmentHistory->employed_end_year = $req->input('cmp_year_to');
            $employmentHistory->employed_end_month = $req->input('cmp_month_to');
            $employmentHistory->job_details = $req->input('description');

            if (!$employmentHistory->save()) {
                return response(ResponseStatus::ERROR, ResponseCode::ERROR);
            }
        } else {
            $employmentHistory = EmploymentHistory::create([
                'user_id' => $currentUser->id,
                'employment_status' => $req->input('employment_status'),
                'company_name' => $req->input('company_name'),
                'occupation' => $req->input('occupation'),
                'position' => $req->input('position'),
                'employed_start_year' => $req->input('cmp_year_from'),
                'employed_start_month' => $req->input('cmp_month_from'),
                'employed_end_year' => $req->input('cmp_year_to'),
                'employed_end_month' => $req->input('cmp_month_to'),
                'job_details' => $req->input('description'),
            ]);
        }

        return response(ResponseStatus::SUCCESS, ResponseCode::SUCCESS);
    }

    /**
     * updateJobCondition | FormFour
     *
     * @return mixed
     */
    public function updateJobCondition(RegistrationCompletionFormFourRequest $req)
    {
        $currentUser = $this->User::find(Auth::id());

        $jobChange = ConditionJobChange::where('user_id', $currentUser->id)->first();

        if ($jobChange) {
            $jobChange->jc_degree = $req->input('jb_change_job');
            $jobChange->jc_business_domain = $req->input('business_domain');
            $jobChange->jc_occupation = $req->input('desired_occupation');
            $jobChange->jc_place = $req->input('desired_residense');
            $jobChange->jc_salary = $req->input('desired_salary');
            $jobChange->jc_attribute1 =  in_array(
                ConditionJobChangeAttributes::ATTRIBUTE1_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute2 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE2_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute3 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE3_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute4 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE4_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute5 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE5_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute6 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE6_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute7 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE7_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute8 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE8_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;
            $jobChange->jc_attribute9 = in_array(
                ConditionJobChangeAttributes::ATTRIBUTE9_COLUMN,
                $req->input('consideration')
            ) ? 1 : 0;

            if (!$jobChange->save()) {
                return response(ResponseStatus::ERROR, ResponseCode::ERROR);
            }
        } else {
            $jobChange = ConditionJobChange::create([
                'user_id' => $currentUser->id,
                'jc_degree' => $req->input('jb_change_job'),
                'jc_business_domain' => $req->input('business_domain'),
                'jc_occupation' => $req->input('desired_occupation'),
                'jc_place' => $req->input('desired_residense'),
                'jc_salary' => $req->input('desired_salary'),
                'jc_attribute1' =>  in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE1_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute2' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE2_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute3' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE3_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute4' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE4_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute5' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE5_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute6' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE6_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute7' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE7_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute8' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE8_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
                'jc_attribute9' => in_array(
                    ConditionJobChangeAttributes::ATTRIBUTE9_COLUMN,
                    $req->input('consideration')
                ) ? 1 : 0,
            ]);
        }

        $currentUser->registration_status = RegistrationStatus::ACTIVE;
        Auth::login($currentUser);

        if (!$currentUser->save()) {
            return response(ResponseStatus::ERROR, ResponseCode::ERROR);
        }

        Mail::to($currentUser->email)->send(new RegistrationCompletionMail($currentUser));

        return response(ResponseStatus::SUCCESS, ResponseCode::SUCCESS);
    }
}
