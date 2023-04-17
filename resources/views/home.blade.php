@extends('layouts.applicant.app')
@section('title', __('My Page') . ' | ')
@section('body')
<br>
<div class="container">
    <section>
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h2>{{ __('My Page') }}</h2>
                    <div class="d-lg-flex justify-content-sm-around">
                        <div class="d-flex justify-content-center">
                            <div style="width: 250px; height: 250px">
                                <img alt="Image placeholder"
                                    src="/img/users/default.png"
                                    class="img-thumbnail img-fluid w-100 h-100">
                            </div>
                        </div>
                        <br>
    
                        <div class="mw-sm-100 mw-lg-50">
                            <h1>{{ $user->fullname }}</h1>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <b>{{ __('Nationality') }}</b>
                                    </div>
    
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        {{ $user->nationality->nationality }}
                                    </div>
                                </div>
                            </div>
    
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <b>{{ __('Contact Number') }}</b>
                                    </div>
    
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        {{ $user->contact_number }}
                                    </div>
                                </div>
                            </div>
    
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <b>{{ __('Email Address') }}</b>
                                    </div>
    
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        {{ $user->mail_address }}
                                    </div>
                                </div>
                            </div>
    
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <b>{{ __('Other Languages') }}</b>
                                    </div>
    
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        {{ implode(', ', $otherLanguages) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
        
                       <div class="d-flex flex-column align-self-center">
                            <div>
                                <a href="{{ route('job-seekers.edit', $user->id) }}"
                                    class="btn btn-primary rounded-pill mb-3 w-100">
                                    {{ __('Update Profile') }}
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('job-seekers.email.edit', $user->id) }}"
                                    class="btn btn-primary rounded-pill mb-3 w-100">
                                    {{ __('Change Email') }}
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('job-seekers.password.edit', $user->id) }}"
                                    class="btn btn-primary rounded-pill w-100">
                                    {{ __('Change Password') }}
                                </a>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section search js-anima-fade p-0">
        <div class="section__wrap search__container">
            <x-forms.job-search />
            <div class="js-searchsticky"></div>
        </div>
    </section>
    <section>
        <div class="mt-5 mb-5">
            <h1>{{ __('Application List') }}</h1>
            <p>{{ __('A list that you applied to companies.') }}</p>
        </div>

        <div class="job-search__list">
            @forelse ($applications as $application)
            <div class="job-search__item">
                <div @class(['job-search__title', 'new' => $application->is_new])>
                    <span class="job-search__title-text">
                        {{ $application->jobPost->job_name }}
                    </span>
                    <span class="job-search__title-date">
                        {{ $application->jobPost->post_start_date->format('Y/m/d') }}
                        {{ $application->jobPost->post_end_date ? '- ' . $application->jobPost->post_end_date->format('Y/m/d') : '' }}
                    </span>
                </div>
                <div class="job-search__body">
                    <div class="job-search__body-item">
                        <div class="job-search__body-title">
                            {{ __('BENEFITS:') }}
                        </div>
                        <div class="job-search__body-text">
                            {!! nl2br(e($application->jobPost->benefits)) !!}
                        </div>
                    </div>
                    <div class="job-search__body-item job-search__body-item--tags">
                        <div class="job-search__tag-item job-search__tag-item--salary">
                            {{ $application->jobPost->salary }}
                        </div>
                        <div class="job-search__tags">
                            <div class="job-search__tag-item">
                                {{ $application->jobPost->industry }}
                            </div>
                            <div class="job-search__tag-item job-search__tag-item--location">
                                {{ $application->jobPost->location }}
                            </div>
                            <div class="job-search__tag-item job-search__tag-item--user">
                                {{ __(\App\Enums\JobPostTarget::from($application->jobPost->target)->text()) }}
                            </div>
                            @if ($application->jobPost->jobPostLanguagePreferences->isNotEmpty())
                            <div class="job-search__tag-item job-search__tag-item--language">
                                {{ $application->jobPost->jobPostLanguagePreferences
                                ->pluck('language.language')
                                ->map(fn($language) => __($language))
                                ->implode(', ') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <a class="job-search__item-link" href="{{ route('job-posts.show', $application->jobPost) }}">
                        {{ __('View Details') }}
                    </a>
                </div>
            </div>
            @empty
            {{ __('No result found.') }}
            @endforelse
        </div>

        {{ $applications->links('job-posts.pagination.links') }}
        <br>
    </section>
</div>
@endsection
