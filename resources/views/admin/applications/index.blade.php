@extends('layouts.admin.app')

@section('content')
<div class="mx-5">
    @if(Session::has('success'))
    @include('layouts.admin.flash', ['message' => session()->get('success'), 'alertClass'=> 'success'])
    @elseif(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
    <div class="d-none" id="successMsg">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-message">
                {{ __('Successfully updated') }}
            </div>
            <button type="button" class="close msg-close-btn" data-target="#successMsg">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="d-none" id="errorMsg">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-message">
                {{ __('An error has occurred.') }}
            </div>
            <button type="button" class="close msg-close-btn" data-target="#errorMsg">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">{{ __('Filter by') }}</h5>
        <form action="{{ route('admin.applications.index') }}" method="GET">
            <div class="form-row">
                <div class="col-lg-3 col-sm-12">
                    <label class="form-control-label">{{ __('Status') }}</label>
                    <select name="application_status" class="form-control form-control-sm">
                        <option value=""></option>
                        @foreach(\App\Enums\ApplicationStatus::cases() as $status)
                        <option value="{{ $status->value }}" @selected(request('application_status') == $status->value)>{{ $status->text() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Recruiter') }}</label>
                    <input type="text" name="admin_fullname" class="form-control form-control-sm" value="{{ request('admin_fullname') }}">
                </div>
                <div class="col-lg-3 col-sm-12">
                        <label class="form-control-label">{{ __('Applicant Name') }}</label>
                        <input type="text" name="applicant_name" class="form-control form-control-sm" value="{{ request('applicant_name') }}">
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Language Fluency') }}</label>
                    <input type="text" name="language_fluency" class="form-control form-control-sm" value="{{ request('language_fluency') }}">
                </div>
                <div class="col-lg-2 col-sm-12 d-flex align-items-end mt-2">
                    <button type="submit" class="btn btn-facebook btn-sm w-100">{{ __('Filter') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="w-130">
    <div class="card ml-5 mr-3 mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ __('Applications') }}</h5>
            <div class="d-flex mb-2">
                <div class="d-flex align-items-end flex-grow-1">
                {{ $applications->total() . __(' Applications') }}
                </div>
                <div>
                    <a href="{{ route('admin.applications.create') }}" class="btn btn-sm btn-facebook">
                        {{ __('Add new application') }}
                    </a>
                </div>
            </div>
            @if ($applications->isNotEmpty())
            <div class="overflow-auto text-nowrap px-2 mt-n3" id="topScrollbar">
                <div class="d-flex">
                    <div class="col-1 text-xs px-3">&nbsp;</div>
                    <div class="col-3 px-3 ml-n5"></div>
                    <div class="col-2 px-3 ml-n6"></div>
                    <div class="col-2 px-3 ml-n5"></div>
                    <div class="col-1 px-3 ml-n5"></div>
                    <div class="col-2 px-3"></div>
                    <div class="col-2 px-3 ml-n5"></div>
                    <div class="col-2 px-3 ml-n6"></div>
                    <div class="col-2 px-3 ml-n6"></div>
                    <div class="col-2 px-3 ml-n6"></div>
                    <div class="col-2 px-3 ml-n5"></div>
                    <div class="col-1 px-3 ml-n5"></div>
                </div>
            </div>
            <div class="overflow-auto text-nowrap px-2" id="table">
                <div class="d-flex">
                    <div class="col-1 text-xs p-3 border-bottom">
                        {{ __('No') }}
                    </div>
                    <div class="col-3 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Status') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n6 border-bottom">
                        {{ __('Applied Job') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Applicant Name') }}
                    </div>
                    <div class="col-1 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Nationality') }}
                    </div>
                    <div class="col-2 text-xs p-3 border-bottom">
                        {{ __('Language Fluency') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Current Salary') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n6 border-bottom">
                        {{ __('Expected Salary') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n6 border-bottom">
                        {{ __('Applied Date') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n6 border-bottom">
                        {{ __('Recruiter') }}
                    </div>
                    <div class="col-2 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Final Remarks') }}
                    </div>
                    <div class="col-1 text-xs p-3 ml-n5 border-bottom">
                        {{ __('Action') }}
                    </div>
                </div>
                @foreach ($applications as $application)
                <div class="d-flex">
                    <div class="col-1 text-sm py-1 border-bottom d-flex flex-column justify-content-center">
                        {{ $application->id }}
                    </div>
                    <div class="col-3 text-sm py-1 ml-n5 border-bottom">
                        <select name="application_status" data-id="{{ $application->id }}" current-status="{{ $application->application_status }}" @class([
                            'status-selector',
                            'custom-select',
                            'custom-select-sm',
                            'w-auto',
                            'border-danger' => $application->application_status == \App\Enums\ApplicationStatus::Open->value,
                            'text-danger' => $application->application_status == \App\Enums\ApplicationStatus::Open->value,
                            'border-success' => $application->application_status == \App\Enums\ApplicationStatus::SuccessfulHiring->value,
                            'text-success' => $application->application_status == \App\Enums\ApplicationStatus::SuccessfulHiring->value,
                            'text-dark' => $application->application_status != \App\Enums\ApplicationStatus::Open->value && $application->application_status != \App\Enums\ApplicationStatus::SuccessfulHiring->value,
                        ])>
                            @foreach(\App\Enums\ApplicationStatus::cases() as $status)
                            <option
                                value="{{ $status->value }}"
                                @class([
                                    'text-danger' => $status->value == \App\Enums\ApplicationStatus::Open->value,
                                    'text-success' => $status->value == \App\Enums\ApplicationStatus::SuccessfulHiring->value,
                                    'text-dark' => $status->value != \App\Enums\ApplicationStatus::Open->value && $status->value != \App\Enums\ApplicationStatus::SuccessfulHiring->value,
                                ])
                                @selected($application->application_status == $status->value)
                            >
                                {{ $status->text() }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div
                        class="col-2 text-sm ml-n6 border-bottom d-flex flex-column justify-content-center text-wrap"
                        id="job_post_idTooltip{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->jobPost->job_name && mb_strlen($application->jobPost->job_name) > 15)
                            title="{{ $application->jobPost->job_name }}"
                        @endif
                    >
                        <div
                            id="job_post_idText{{ $application->id }}"
                            data-text="{{ $application->jobPost->job_name }}"
                            @click="showInput({{ $application->id }}, 'job_post_id', $event)"
                        >
                            {{ $application->jobPost->job_name ? Str::limit($application->jobPost->job_name, 15) : '-----' }}
                        </div>
                        <input
                            id="job_post_id{{ $application->id }}"
                            type="text"
                            class="form-control form-control-sm w-75 d-none"
                            readonly
                            data-toggle="modal"
                            data-target="#jobPostModal"
                            @click="fetchData('job_posts')"
                            @focusout="hideInput({{ $application->id }}, 'job_post_id', $event)"
                        >
                    </div>
                    <div
                        class="col-2 text-sm ml-n5 border-bottom d-flex flex-column justify-content-center"
                        id="job_seeker_idTooltip{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->jobSeeker->fullname && mb_strlen($application->jobSeeker->fullname) > 15)
                            title="{{ $application->jobSeeker->fullname }}"
                        @endif
                    >
                        <div
                            id="job_seeker_idText{{ $application->id }}"
                            data-text="{{ $application->jobSeeker->fullname }}"
                            @click="showInput({{ $application->id }}, 'job_seeker_id', $event)"
                        >
                            {{ $application->jobSeeker->fullname ? Str::limit($application->jobSeeker->fullname, 15) : '-----' }}
                        </div>
                        <input
                            id="job_seeker_id{{ $application->id }}"
                            type="text"
                            class="form-control form-control-sm w-75 d-none"
                            readonly
                            data-toggle="modal"
                            data-target="#jobSeekerModal"
                            @click="fetchData('job_seekers')"
                            @focusout="hideInput({{ $application->id }}, 'job_seeker_id', $event)"
                        >
                    </div>
                    <div
                        class="col-1 text-sm ml-n5 border-bottom d-flex flex-column justify-content-center"
                        id="nationality{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->jobSeeker->nationality && mb_strlen($application->jobSeeker->nationality->nationality) > 15)
                            title="{{ $application->jobSeeker->nationality->nationality }}"
                        @endif
                    >
                        {{ $application->jobSeeker->nationality ? Str::limit($application->jobSeeker->nationality->nationality, 15) : '-----' }}
                    </div>
                    <div
                        class="col-2 text-sm border-bottom d-flex flex-column justify-content-center text-wrap"
                        id="languageFluency{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->jobPost->language_fluency && mb_strlen($application->jobPost->language_fluency) > 15)
                            title="{{ $application->jobPost->language_fluency }}"
                        @endif
                    >
                        {{ $application->jobPost->language_fluency ? Str::limit($application->jobPost->language_fluency, 15) : '-----' }}
                    </div>
                    <div class="col-2 text-sm ml-n5 border-bottom d-flex flex-column justify-content-center" id="currentSalary{{ $application->id }}">
                        {{ $application->jobSeeker->current_salary ?? '-----' }}
                    </div>
                    <div class="col-2 text-sm ml-n6 border-bottom d-flex flex-column justify-content-center" id="expectedSalary{{ $application->id }}">
                        {{ $application->jobSeeker->expected_salary ?? '-----' }}
                    </div>
                    <div class="col-2 text-sm ml-n6 border-bottom d-flex flex-column justify-content-center">
                        <div
                            id="applied_dateText{{ $application->id }}"
                            data-text="{{ date('Y-m-d', strtotime($application->applied_date)) }}"
                            @click="showInput({{ $application->id }}, 'applied_date', $event)"
                        >
                            {{ date('Y-m-d', strtotime($application->applied_date)) }}
                        </div>
                        <div class="w-80">
                            <input
                                id="applied_date{{ $application->id }}"
                                type="text"
                                class="form-control form-control-sm flatpickr px-1 w-80 d-none"
                                @change="editInline('applied_date', null, null, {{ $application->id }})"
                                @focusout="hideInput({{ $application->id }}, 'applied_date', $event)"
                            >
                        </div>
                    </div>
                    <div
                        class="col-2 text-sm ml-n6 border-bottom d-flex flex-column justify-content-center"
                        id="admin_idTooltip{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->admin?->fullname && mb_strlen($application->admin->fullname) > 15)
                            title="{{ $application->admin->fullname }}"
                        @endif
                    >
                        <div
                            id="admin_idText{{ $application->id }}"
                            data-text="{{ $application->admin?->fullname }}"
                            @click="showInput({{ $application->id }}, 'admin_id', $event)"
                        >
                            {{ $application->admin?->fullname ? Str::limit($application->admin?->fullname, 15) : '-----' }}
                        </div>
                        <input
                            id="admin_id{{ $application->id }}"
                            type="text"
                            class="form-control form-control-sm px-1 w-75 d-none"
                            readonly
                            data-toggle="modal"
                            data-target="#adminModal"
                            @click="fetchData('admins')"
                            @focusout="hideInput({{ $application->id }}, 'admin_id', $event)"
                        >
                    </div>
                    <div
                        class="col-2 text-sm ml-n5 border-bottom d-flex flex-column justify-content-center"
                        id="final_remarksTooltip{{ $application->id }}"
                        data-toggle="tooltip"
                        @if ($application->final_remarks && mb_strlen($application->final_remarks) > 15)
                            title="{{ $application->final_remarks }}"
                        @endif
                    >
                        <div
                            id="final_remarksText{{ $application->id }}"
                            data-text="{{ $application->final_remarks }}"
                            @click="showInput({{ $application->id }}, 'final_remarks', $event)"
                        >
                            {{ $application->final_remarks ? Str::limit($application->final_remarks, 15) : '-----' }}
                        </div>
                        <input
                            id="final_remarks{{ $application->id }}"
                            type="text"
                            class="form-control form-control-sm px-1 w-75 d-none"
                            @keypress="(e) => e.keyCode === 13 ? editInline('final_remarks', null, null, {{ $application->id }}) : ''"
                            @focusout="hideInput({{ $application->id }}, 'final_remarks', $event)"
                        >
                    </div>
                    <div class="col-1 text-sm ml-n5 border-bottom d-flex flex-column justify-content-center">
                        <a href="{{ route('admin.applications.edit', $application) }}">{{ __('Edit') }}</a>
                    </div>
                </div>
                @include('admin.applications.modals.update-status')
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $applications->links() }}
            </div>
            @else
            <div class="text-center">
                {{ __('No results found.') }}
            </div>
            @endif
        </div>
    </div>
</div>

@include('admin.applications.modals.admin', ['willEditInline' => true])
@include('admin.applications.modals.job-post', ['willEditInline' => true])
@include('admin.applications.modals.job-seeker', ['willEditInline' => true])
@endsection

@push('scripts')
<script>
    const statusCommonClasses = [
        'status-selector',
        'custom-select',
        'custom-select-sm',
        'w-auto',
    ];
    const statusSpecificClasses = {
        @foreach(\App\Enums\ApplicationStatus::cases() as $status)
        @switch($status->value)
            @case(\App\Enums\ApplicationStatus::Open->value)
                {{ $status->value }}: ['border-danger', 'text-danger'],
                @break
            @case(\App\Enums\ApplicationStatus::SuccessfulHiring->value)
                {{ $status->value }}: ['border-success', 'text-success'],
                @break
            @default
                {{ $status->value }}: ['text-dark'],
        @endswitch
        @endforeach
    };
    const fluencies = {
        japanese: {
            @foreach(\App\Enums\JapaneseFluency::cases() as $fluency)
            {{ $fluency->value }}: '{{ $fluency->text() }}',
            @endforeach
        },
        korean: {
            @foreach(\App\Enums\KoreanFluency::cases() as $fluency)
            {{ $fluency->value }}: '{{ $fluency->text() }}',
            @endforeach
        },
        mandarin: {
            @foreach(\App\Enums\MandarinFluency::cases() as $fluency)
            {{ $fluency->value }}: '{{ $fluency->text() }}',
            @endforeach
        },
        other: {
            @foreach(\App\Enums\OtherFluency::cases() as $fluency)
            {{ $fluency->value }}: '{{ $fluency->text() }}',
            @endforeach
        },
    };
</script>
@vite('resources/js/admin/applications/index.js')
@endpush