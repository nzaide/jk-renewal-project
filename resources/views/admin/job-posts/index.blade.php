@extends('layouts.admin.app')

@section('content')
<div class="mx-5">
    @if(Session::has('success'))
    @include('layouts.admin.flash', ['message' => session()->get('success'), 'alertClass'=> 'success'])
    @elseif(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
</div>
<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">{{ __('Filter by') }}</h5>
        <form action="{{ route('admin.job-posts.index') }}" method="GET">
            <div class="form-row">
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Job status') }}</label>
                    <select name="status" class="form-control form-control-sm">
                        <option value=""></option>
                        @foreach(\App\Enums\JobPostStatus::cases() as $status)
                        <option value="{{ $status->value }}" @selected(request('status') == $status->value)>{{ $status->text() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Recruiter') }}</label>
                    <input type="text" name="admin_fullname" class="form-control form-control-sm" value="{{ request('admin_fullname') }}">
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Job Title') }}</label>
                    <input type="text" name="job_name_en" class="form-control form-control-sm" value="{{ request('job_name_en') }}">
                </div>
                <div class="col-lg-2 col-sm-12">
                    <label class="form-control-label">{{ __('Company') }}</label>
                    <input type="text" name="company_name" class="form-control form-control-sm" value="{{ request('company_name') }}">
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
<div class="card mx-5 mt-4">
    <div class="card-body">
        <h5 class="card-title">{{ __('Job Posts') }}</h5>
        <div class="d-flex mb-2">
            <div class="d-flex align-items-end flex-grow-1">
                {{ $jobPosts->total() . __(' Jobs') }}
            </div>
            <div>
                <a href="{{ route('admin.job-posts.create') }}" class="btn btn-sm btn-facebook">
                    {{ __('Add new data') }}
                </a>
            </div>
        </div>
        @if ($jobPosts->isNotEmpty())
        <div class="overflow-auto text-nowrap px-2 mt-n3" id="topScrollbar">
            <div class="d-flex">
                <div class="col-1 text-xs px-3">
                    &nbsp;
                </div>
                <div class="col-1 px-3">
                </div>
                @for ($i = 0; $i < 23; $i++)
                <div class="col-2 px-3">
                </div>
                @endfor
                <div class="col-3 py-3 px-5">
                </div>
            </div>
        </div>
        <div class="overflow-auto text-nowrap px-2" id="table">
            <div class="d-flex">
                <div class="col-1 text-xs p-3 border-bottom">
                    {{ __('No') }}
                </div>
                <div class="col-1 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Action') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n2 border-bottom">
                    {{ __('Job Status') }}
                </div>
                <div class="col-2 text-xs p-3 border-bottom">
                    {{ __('Recruiter') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n1 border-bottom">
                    {{ __('Heads Needed') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n4 border-bottom">
                    {{ __('Work Arrangement') }}
                </div>
                <div class="col-2 text-xs p-3 border-bottom">
                    {{ __('Tracker') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Company') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Job Title') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Nature') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Language Fluency') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n2 border-bottom">
                    {{ __('Location') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n4 border-bottom">
                    {{ __('Salary') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Industry') }}
                </div>
                <div class="col-2 text-xs p-3 border-bottom">
                    {{ __('Sched') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Visa') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Education') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Age') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Gender') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n2 border-bottom">
                    {{ __('Experience Needed') }}
                </div>
                <div class="col-2 text-xs p-3 border-bottom">
                    {{ __('Abroad') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Website') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Interview Schedule') }}
                </div>
                <div class="col-2 text-xs p-3 border-bottom">
                    {{ __('Job Description') }}
                </div>
                <div class="col-2 text-xs p-3 ml-n3 border-bottom">
                    {{ __('Japanese Job Description') }}
                </div>
                <div class="col-3 text-xs py-3 px-5 border-bottom">
                    {{ __('Job Post in Japanese') }}
                </div>
            </div>
            @foreach ($jobPosts as $jobPost)
            <div class="d-flex">
                <div class="col-1 text-sm py-1 border-bottom d-flex flex-column justify-content-center">
                    {{ $jobPost->id }}
                </div>
                <div class="col-1 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center">
                    <a href="{{ route('admin.job-posts.edit', $jobPost) }}">{{ __('Edit') }}</a>
                </div>
                <div class="col-2 text-sm py-1 ml-n2 border-bottom d-flex flex-column justify-content-center">
                    <form action="{{ route('admin.job-posts.status.update', $jobPost) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" @class([
                            'status-selector',
                            'custom-select',
                            'custom-select-sm',
                            'w-auto',
                            'border-danger' => $jobPost->status == \App\Enums\JobPostStatus::Open->value,
                            'border-success' => $jobPost->status == \App\Enums\JobPostStatus::Closed->value,
                            'text-danger' => $jobPost->status == \App\Enums\JobPostStatus::Open->value,
                            'text-success' => $jobPost->status == \App\Enums\JobPostStatus::Closed->value,
                            'text-black-50' => $jobPost->status == \App\Enums\JobPostStatus::OnHold->value,
                        ])>
                            @foreach(\App\Enums\JobPostStatus::cases() as $status)
                            <option
                                value="{{ $status->value }}"
                                @class([
                                    'text-danger' => $status->value == \App\Enums\JobPostStatus::Open->value,
                                    'text-success' => $status->value == \App\Enums\JobPostStatus::Closed->value,
                                    'text-black-50' => $status->value == \App\Enums\JobPostStatus::OnHold->value,
                                ])
                                @selected($jobPost->status == $status->value)
                            >
                                {{ $status->text() }}
                            </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div
                    class="col-2 text-sm py-1 border-bottom d-flex flex-column justify-content-center"
                    @if ($jobPost->admin && mb_strlen($jobPost->admin->fullname) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->admin->fullname }}"
                    @endif
                >
                    {{ $jobPost->admin ? Str::limit($jobPost->admin->fullname, config('constant.STR.TRUNC_LIMIT')) : '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n1 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->heads_needed) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->heads_needed }}"
                    @endif
                >
                    {{ Str::limit($jobPost->heads_needed, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n4 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->work_arrangement) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->work_arrangement }}"
                    @endif
                >
                    {{ Str::limit($jobPost->work_arrangement, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->tracker_url) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->tracker_url }}"
                    @endif
                >
                    @if ($jobPost->tracker_url)
                    <a href="{{ $jobPost->tracker_url }}">
                        {{ Str::limit($jobPost->tracker_url, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                    </a>
                    @else
                    -----
                    @endif
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->company_name) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->company_name }}"
                    @endif
                >
                    {{ Str::limit($jobPost->company_name, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->job_name_en) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->job_name_en }}"
                    @endif
                >
                    {{ Str::limit($jobPost->job_name_en, config('constant.STR.TRUNC_LIMIT')) }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->position) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->position }}"
                    @endif
                >
                    {{ Str::limit($jobPost->position, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->language_fluency) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->language_fluency }}"
                    @endif
                >
                    {{ Str::limit($jobPost->language_fluency, config('constant.STR.TRUNC_LIMIT')) ?: '----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n2 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->location_en) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->location_en }}"
                    @endif
                >
                    {{ Str::limit($jobPost->location_en, config('constant.STR.TRUNC_LIMIT')) }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n4 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->salary) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->salary }}"
                    @endif
                >
                    {{ Str::limit($jobPost->salary, config('constant.STR.TRUNC_LIMIT')) }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->industry_en) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->industry_en }}"
                    @endif
                >
                    {{ Str::limit($jobPost->industry_en, config('constant.STR.TRUNC_LIMIT')) }}
                </div>
                <div
                    class="col-2 text-sm py-1 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->schedule) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->schedule }}"
                    @endif
                >
                    {{ Str::limit($jobPost->schedule, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->visa) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->visa }}"
                    @endif
                >
                    {{ Str::limit($jobPost->visa, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->education) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->education }}"
                    @endif
                >
                    {{ Str::limit($jobPost->education, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->age) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->age }}"
                    @endif
                >
                    {{ Str::limit($jobPost->age, config('constant.STR.TRUNC_LIMIT')) ?: '--' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->gender) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->gender }}"
                    @endif
                >
                    {{ Str::limit($jobPost->gender, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n2 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->experience) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->experience }}"
                    @endif
                >
                    {{ Str::limit($jobPost->experience, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->abroad) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->abroad }}"
                    @endif
                >
                    {{ Str::limit($jobPost->abroad, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->website) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->website }}"
                    @endif
                >
                    {{ Str::limit($jobPost->website, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->interview_schedule) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->interview_schedule }}"
                    @endif
                >
                    {{ Str::limit($jobPost->interview_schedule, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->job_description) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->job_description }}"
                    @endif
                >
                    {{ Str::limit($jobPost->job_description, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-2 text-sm py-1 ml-n3 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->job_description_jp) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->job_description_jp }}"
                    @endif
                >
                    {{ Str::limit($jobPost->job_description_jp, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
                <div
                    class="col-3 text-sm py-1 px-5 border-bottom d-flex flex-column justify-content-center"
                    @if (mb_strlen($jobPost->job_post_jp) > config('constant.STR.TRUNC_LIMIT'))
                    data-toggle="tooltip" title="{{ $jobPost->job_post_jp }}"
                    @endif
                >
                    {{ Str::limit($jobPost->job_post_jp, config('constant.STR.TRUNC_LIMIT')) ?: '-----' }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $jobPosts->links() }}
        </div>
        @else
        <div class="text-center">
            {{ __('No results found.') }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
@vite('resources/js/admin/job-posts/index.js')
@endpush
