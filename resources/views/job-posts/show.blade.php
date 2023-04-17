@extends('layouts.applicant.app')

@section('title', $jobPost->job_name. ' | ')
@section('description', $jobPost->job_name . ' | ')
@section('keywords', $jobPost->job_name . ',')
@section('og_description', $jobPost->job_name . ' | ')
@section('body')
<div class="container-fluid">
    <section class="section search mt-2">
        <div class="section__wrap search__container">
            <x-forms.job-search />
            <div class="js-searchsticky p-0"></div>
        </div>
    </section>

    <div class="job-details mb-5">
        <div class="job-details__wrapper">
            @include('layouts.applicant.flash')
            <div @class(['job-details__title', 'new'=> $jobPost->is_new])>
                <span>{{ $jobPost->job_name }}</span>
            </div>
            <div class="job-details__body">
                <div class="job-details__body-item">
                    <div class="job-details__date">
                        <span> {{ __('Posting Period') }} </span>
                        <span>:
                            {{ $jobPost->post_start_date->format('Y/m/d') }}
                            {{ $jobPost->post_end_date ? '- ' . $jobPost->post_end_date->format('Y/m/d') : '' }}
                        </span>
                    </div>
                    <div class="job-details__button-wrapper">
                        <a class="job-details__refer" href="{{ route('friend-referrals.create') }}"> {{ __('Refer A Friend') }}</a>
                        <form method="POST" action="{{ route('job-posts.applications.store', $jobPost) }}">@csrf
                            <button type="submit" class="button button--w207 {{ $isAlreadyApplied ? 'disabled btn px-0' : '' }}" {{ $isAlreadyApplied ? 'disabled' : '' }}>{{ __('Apply For This Job') }}</a>
                        </form>
                    </div>
                </div>
                
                <div class="job-details__body-item job-details__body-item--tag pc">
                    <div class="job-details__tag-text">{{ $jobPost->industry }}</div>
                    <div class="job-details__tag-text job-details__tag-text--location">{{ $jobPost->location }}</div>
                    @if ($jobPost->jobPostLanguagePreferences->isNotEmpty())
                    <div class="job-details__tag-text job-details__tag-text--language">
                        {{
                            $jobPost->jobPostLanguagePreferences
                                ->pluck('language.language')
                                ->map(fn($language) => __($language))
                                ->implode(', ')
                        }}
                    </div>
                    @endif
                    <div class="job-details__tag-text job-details__tag-text--user">
                        {{ __(\App\Enums\JobPostTarget::from($jobPost->target)->text()) }}
                    </div>
                    <div class="job-details__tag-text job-details__tag-text--salary">{{ $jobPost->salary }}</div>
                </div>
                <div class="job-details__body-item job-details__body-item--tag sp">
                    <div class="job-details__tag-item">
                        <div class="job-details__tag-text">{{ $jobPost->industry }}</div>
                        <div class="job-details__tag-text job-details__tag-text--location">{{ $jobPost->location }}</div>
                        <div class="job-details__tag-text job-details__tag-text--salary">{{ $jobPost->salary }}</div>
                    </div>
                    <div class="job-details__tag-item">
                        @if ($jobPost->jobPostLanguagePreferences->isNotEmpty())
                        <div class="job-details__tag-text job-details__tag-text--language">
                            {{
                                $jobPost->jobPostLanguagePreferences
                                    ->pluck('language.language')
                                    ->map(fn($language) => __($language))
                                    ->implode(', ')
                            }}
                        </div>
                        @endif
                        <div class="job-details__tag-text job-details__tag-text--user">
                            {{ __(\App\Enums\JobPostTarget::from($jobPost->target)->text()) }}
                        </div>
                    </div>
                </div>
                <div class="job-details__body-item job-details__body-item--copy pb-4">
                    <div class="job-details__copy-wrapper job-details__copy-wrapper--benefits">
                        <div class="job-details__copy-title">{{ __('BENEFITS') }} :</div>
                        <div class="job-details__copy-text">
                            {!! nl2br(e($jobPost->benefits)) !!}
                        </div>
                    </div>
                    <div class="job-details__copy-wrapper pb-6">
                        <div class="job-details__copy-title">{{ __('JOB DETAILS') }} :</div>
                        <div class="job-details__copy-text job-details__copy-text--jd">
                            {!! nl2br(e($jobPost->details)) !!}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('job-posts.applications.store', $jobPost) }}">@csrf
                        <button type="submit" class="button button--w207 {{ $isAlreadyApplied ? 'disabled btn px-0' : '' }}" {{ $isAlreadyApplied ? 'disabled' : '' }}>{{ __('Apply For This Job') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection