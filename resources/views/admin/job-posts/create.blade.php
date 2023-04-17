@extends('layouts.admin.app')

@push('styles')
@vite('resources/css/admin/job-posts.css')
@endpush
@section('content')
<div class="mx-5">
    @if(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
</div>
<form action="{{ route('admin.job-posts.store') }}" method="POST">
    @csrf
    <div class="card mx-5">
        <div class="card-body">
            <h5 class="card-title">{{ __('New Data') }}</h5>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job number') }}</label>
                        <input type="text" name="job_number" value="{{ old('job_number') }}" class="form-control">
                        @error("job_number")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Required Language') }}</label>
                        <div>
                            <select class="selectpicker w-100" name="language_ids[]" multiple data-live-search="true">
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}" @selected(in_array($language->id, old('language_ids', [])))>
                                    {{ $language->language }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("language_ids")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Salary') }} <i class="text-danger">*</i></label>
                        <input type="text" name="salary" value="{{ old('salary') }}" class="form-control">
                        @error("salary")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Date') }} <i class="text-danger">*</i></label>
                        <input type="text" name="post_start_date" value="{{ old('post_start_date') }}" class="form-control flatpickr">
                        @error("post_start_date")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Posting end date') }}</label>
                        <input type="text" name="post_end_date" value="{{ old('post_end_date') }}" class="form-control flatpickr">
                        @error("post_end_date")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Status') }} <i class="text-danger">*</i></label>
                        @foreach (\App\Enums\JobPostStatus::cases() as $status)
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="status{{ $status->value }}"
                                name="status"
                                class="custom-control-input"
                                value="{{ $status->value }}"
                                @checked($status->value == old('status'))
                            >
                            <label class="custom-control-label" for="status{{ $status->value }}">{{ $status->text() }}</label>
                        </div>
                        @endforeach
                        @error("status")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Show data flag') }} <i class="text-danger">*</i></label>
                        @foreach (\App\Enums\JobPostDisplayStatus::cases() as $displayStatus)
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="displayStatus{{ $displayStatus->value }}"
                                name="display_status"
                                class="custom-control-input"
                                value="{{ $displayStatus->value }}"
                                @checked($displayStatus->value == old('display_status'))
                            >
                            <label class="custom-control-label" for="displayStatus{{ $displayStatus->value }}">
                                @if ($displayStatus->value == \App\Enums\JobPostDisplayStatus::Displayed->value)
                                {{ __('Yes') }}
                                @endif
                                @if ($displayStatus->value == \App\Enums\JobPostDisplayStatus::Hidden->value)
                                {{ __('No') }}
                                @endif
                            </label>
                        </div>
                        @endforeach
                        @error("display_status")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('For whom') }} <i class="text-danger">*</i></label>
                        @foreach (\App\Enums\JobPostTarget::cases() as $target)
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="target{{ $target->value }}"
                                name="target"
                                class="custom-control-input"
                                value="{{ $target->value }}"
                                @checked($target->value == old('target'))
                            >
                            <label class="custom-control-label" for="target{{ $target->value }}">{{ $target->text() }}</label>
                        </div>
                        @endforeach
                        @error("target")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Notification email') }} <i class="text-danger">*</i></label>
                        @foreach ($groups as $group)
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="group{{ $loop->index }}"
                                name="group_id"
                                class="custom-control-input"
                                value="{{ $group->id }}"
                                @checked($group->id == old('group_id'))
                            >
                            <label class="custom-control-label" for="group{{ $loop->index }}">{{ $group->mail_address }}</label>
                        </div>
                        @endforeach
                        @error("group_id")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-5">
        <div class="card-body">
            <h6 class="card-title">{{ __('English') }}</h6>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job position') }} <i class="text-danger">*</i></label>
                        <input type="text" name="job_name_en" value="{{ old('job_name_en') }}" class="form-control">
                        @error("job_name_en")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Type of industry') }} <i class="text-danger">*</i></label>
                        <input type="text" name="industry_en" value="{{ old('industry_en') }}" class="form-control">
                        @error("industry_en")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Work location') }} <i class="text-danger">*</i></label>
                        <input type="text" name="location_en" value="{{ old('location_en') }}" class="form-control">
                        @error("location_en")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Benefits') }} <i class="text-danger">*</i></label>
                        <textarea name="benefits_en" class="form-control">{{ old('benefits_en') }}</textarea>
                        @error("benefits_en")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job details') }} <i class="text-danger">*</i></label>
                        <textarea name="details_en" class="form-control">{{ old('details_en') }}</textarea>
                        @error("details_en")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-5">
        <div class="card-body">
            <h6 class="card-title">{{ __('Japanese') }}</h6>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job position') }}</label>
                        <input type="text" name="job_name_jp" value="{{ old('job_name_jp') }}" class="form-control">
                        @error("job_name_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Type of industry') }}</label>
                        <input type="text" name="industry_jp" value="{{ old('industry_jp') }}" class="form-control">
                        @error("industry_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Work location') }}</label>
                        <input type="text" name="location_jp" value="{{ old('location_jp') }}" class="form-control">
                        @error("location_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Benefits') }}</label>
                        <textarea name="benefits_jp" class="form-control">{{ old('benefits_jp') }}</textarea>
                        @error("benefits_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job details') }}</label>
                        <textarea name="details_jp" class="form-control">{{ old('details_jp') }}</textarea>
                        @error("details_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-5">
        <div class="card-body">
            <h6 class="card-title">{{ __('Korean') }}</h6>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job position') }}</label>
                        <input type="text" name="job_name_kr" value="{{ old('job_name_kr') }}" class="form-control">
                        @error("job_name_kr")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Type of industry') }}</label>
                        <input type="text" name="industry_kr" value="{{ old('industry_kr') }}" class="form-control">
                        @error("industry_kr")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Work location') }}</label>
                        <input type="text" name="location_kr" value="{{ old('location_kr') }}" class="form-control">
                        @error("location_kr")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Benefits') }}</label>
                        <textarea name="benefits_kr" class="form-control">{{ old('benefits_kr') }}</textarea>
                        @error("benefits_kr")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job details') }}</label>
                        <textarea name="details_kr" class="form-control">{{ old('details_kr') }}</textarea>
                        @error("details_kr")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-5">
        <div class="card-body">
            <h6 class="card-title">{{ __('Chinese') }}</h6>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job position') }}</label>
                        <input type="text" name="job_name_cn" value="{{ old('job_name_cn') }}" class="form-control">
                        @error("job_name_cn")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Type of industry') }}</label>
                        <input type="text" name="industry_cn" value="{{ old('industry_cn') }}" class="form-control">
                        @error("industry_cn")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Work location') }}</label>
                        <input type="text" name="location_cn" value="{{ old('location_cn') }}" class="form-control">
                        @error("location_cn")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Benefits') }}</label>
                        <textarea name="benefits_cn" class="form-control">{{ old('benefits_cn') }}</textarea>
                        @error("benefits_cn")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job details') }}</label>
                        <textarea name="details_cn"class="form-control">{{ old('details_cn') }}</textarea>
                        @error("details_cn")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-5">
        <div class="card-body">
            <h5 class="card-title">{{ __('Tracker Data') }}</h5>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Recruiter') }}</label>
                        <div>
                            <select class="selectpicker w-100" name="admin_id" data-live-search="true">
                                <option value="">
                                </option>
                                @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}" @selected($admin->id == old('admin_id'))>
                                    {{ $admin->fullname }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("admin_id")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Heads needed') }}</label>
                        <input type="text" name="heads_needed" value="{{ old('heads_needed') }}" class="form-control">
                        @error("heads_needed")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Work Arrangement') }}</label>
                        <input type="text" name="work_arrangement" value="{{ old('work_arrangement') }}" class="form-control">
                        @error("work_arrangement")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tracker') }}</label>
                        <input type="text" name="tracker_url" value="{{ old('tracker_url') }}" class="form-control">
                        @error("tracker_url")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Company') }}</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control">
                        @error("company_name")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Nature') }}</label>
                        <input type="text" name="position" value="{{ old('position') }}" class="form-control">
                        @error("position")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Language Fluency') }}</label>
                        <input type="text" name="language_fluency" value="{{ old('language_fluency') }}" class="form-control">
                        @error("language_fluency")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Sched') }}</label>
                        <input type="text" name="schedule" value="{{ old('schedule') }}" class="form-control">
                        @error("schedule")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Visa') }}</label>
                        <input type="text" name="visa" value="{{ old('visa') }}" class="form-control">
                        @error("visa")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Education') }}</label>
                        <input type="text" name="education" value="{{ old('education') }}" class="form-control">
                        @error("education")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Age') }}</label>
                        <input type="text" name="age" value="{{ old('age') }}" class="form-control">
                        @error("age")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Gender') }}</label>
                        <input type="text" name="gender" value="{{ old('gender') }}" class="form-control">
                        @error("gender")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Experience needed') }}</label>
                        <input type="text" name="experience" value="{{ old('experience') }}" class="form-control">
                        @error("experience")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Abroad') }}</label>
                        <input type="text" name="abroad" value="{{ old('abroad') }}" class="form-control">
                        @error("abroad")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('WEBSITE') }}</label>
                        <input type="text" name="website" value="{{ old('website') }}" class="form-control">
                        @error("website")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('INTERVIEW SCHEDULE') }}</label>
                        <input type="text" name="interview_schedule" value="{{ old('interview_schedule') }}" class="form-control">
                        @error("interview_schedule")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Job Description') }}</label>
                        <input type="text" name="job_description" value="{{ old('job_description') }}" class="form-control">
                        @error("job_description")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Japanese Job Description') }}</label>
                        <input type="text" name="job_description_jp" value="{{ old('job_description_jp') }}" class="form-control">
                        @error("job_description_jp")
                        <div class="text-danger mt-1">
                            {{ Str::ucfirst($message) }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('JOB POST in Japanese') }}</label>
                        <input type="text" name="job_post_jp" value="{{ old('job_post_jp') }}" class="form-control">
                        @error("job_post_jp")
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
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
