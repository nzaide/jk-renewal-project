@extends('layouts.admin.app')

@section('content')
<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">{{ __('Edit Application') }}</h5>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.applications.update', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Date') }} <i class="text-danger">*</i></label>
                        <input type="text" name="applied_date" value="{{ old('applied_date', $application->applied_date) }}" class="form-control flatpickr">
                        @error("applied_date")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Recruiter') }}</label>
                        <div data-toggle="modal" data-target="#adminModal" @click="fetchData('admins')">
                            <input
                                id="adminName"
                                name="admin_name"
                                type="text"
                                value="{{ old('admin_name', $application->admin?->fullname) }}"
                                class="form-control"
                                readonly
                            >
                            <input type="hidden" id="adminId" name="admin_id" value="{{ old('admin_id', $application->admin_id) }}">
                        </div>
                        @error("admin_id")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Applicant name') }} <i class="text-danger">*</i></label>
                        <div data-toggle="modal" data-target="#jobSeekerModal" @click="fetchData('job_seekers')">
                            <input
                                id="jobSeekerName"
                                name="job_seeker_name"
                                type="text"
                                value="{{ old('job_seeker_name', $application->jobSeeker->fullname) }}"
                                class="form-control"
                                readonly
                            >
                            <input type="hidden" id="jobSeekerId" name="job_seeker_id" value="{{ old('job_seeker_id', $application->job_seeker_id) }}">
                        </div>
                        @error("job_seeker_id")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Position applying for') }} <i class="text-danger">*</i></label>
                        <div data-toggle="modal" data-target="#jobPostModal" @click="fetchData('job_posts')">
                            <input
                                id="jobPostName"
                                name="job_post_name"
                                type="text"
                                value="{{ old('job_post_name', $application->jobPost->job_name_en) }}"
                                class="form-control"
                                readonly
                            >
                            <input type="hidden" id="jobPostId" name="job_post_id" value="{{ old('job_post_id', $application->job_post_id) }}">
                        </div>
                        @error("job_post_id")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Nationality') }}</label>
                        <input type="text" name="nationality" value="{{ old('nationality', $application->jobSeeker->nationality) }}" class="form-control form-control-flush pl-3 bg-neutral border-bottom" id="nationality" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Language fluency') }}</label>
                        <input type="text" name="langugage_fluency" value="{{ old('langugage_fluency', $languageFluencyText) }}" class="form-control form-control-flush pl-3 bg-neutral border-bottom" id="languageFluency" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Current Salary') }}</label>
                        <input type="text" name="current_salary" value="{{ old('current_salary', $application->jobSeeker->current_salary) }}" class="form-control form-control-flush pl-3 bg-neutral border-bottom" id="currentSalary" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Expected Salary') }}</label>
                        <input type="text" name="expected_salary" value="{{ old('expected_salary', $application->jobSeeker->expected_salary) }}" class="form-control form-control-flush pl-3 bg-neutral border-bottom" id="expectedSalary" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Status') }} <i class="text-danger">*</i></label>
                        <div>
                            <select class="form-control" name="application_status">
                                <option value="">
                                </option>
                                @foreach (\App\Enums\ApplicationStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($status->value == old('application_status', $application->application_status))>
                                    {{ $status->text() }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("application_status")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Final Remarks') }}</label>
                        <textarea name="final_remarks" class="form-control">{{ old('final_remarks', $application->final_remarks) }}</textarea>
                        @error("final_remarks")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary col-3">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin.applications.modals.admin')
@include('admin.applications.modals.job-post')
@include('admin.applications.modals.job-seeker')
@endsection

@push('scripts')
<script>
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
@vite('resources/js/admin/applications/edit.js')
@endpush
