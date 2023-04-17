@extends('layouts.applicant.app')

@section('title', __('Search All Job Postings') . ' | ')
@section('description', __('Search All Job Postings') . ' | ')
@section('keywords', __('Search All Job Postings') . ',')
@section('body')
<main class="job-search">
    <section class="section search">
        <div class="section__wrap search__container">
            <x-forms.job-search />
            <div class="js-searchsticky"></div>
        </div>
    </section>

    <section class="section job-search__main">
        <div class="section__wrap job-search__main-wrap">
            <h4 class="job-search__results">
                Search Results {{ $jobPosts->firstItem() }}-{{ $jobPosts->lastItem() }} of {{ $jobPosts->total() }}
            </h4>

            <div class="job-search__list">
                @forelse ($jobPosts as $jobPost)
                <div class="job-search__item">
                    <div @class(['job-search__title', 'new'=> $jobPost->is_new])>
                        <span class="job-search__title-text">
                            {{ $jobPost->job_name }}
                        </span>
                        <span class="job-search__title-date">
                            {{ $jobPost->post_start_date->format('Y/m/d') }}
                            {{ $jobPost->post_end_date ? '- ' . $jobPost->post_end_date->format('Y/m/d') : '' }}
                        </span>
                    </div>
                    <div class="job-search__body">
                        <div class="job-search__body-item">
                            <div class="job-search__body-title">
                                {{ __('BENEFITS:') }}
                            </div>
                            <div class="job-search__body-text">
                                {!! nl2br(e($jobPost->benefits)) !!}
                            </div>
                        </div>
                        <div class="job-search__body-item job-search__body-item--tags">
                            <div class="job-search__tag-item job-search__tag-item--salary">
                                {{ $jobPost->salary }}
                            </div>
                            <div class="job-search__tags">
                                <div class="job-search__tag-item">
                                    {{ $jobPost->industry }}
                                </div>
                                <div class="job-search__tag-item job-search__tag-item--location">
                                    {{ $jobPost->location }}
                                </div>
                                <div class="job-search__tag-item job-search__tag-item--user">
                                    {{ __(\App\Enums\JobPostTarget::from($jobPost->target)->text()) }}
                                </div>
                                @if ($jobPost->jobPostLanguagePreferences->isNotEmpty())
                                <div class="job-search__tag-item job-search__tag-item--language">
                                    {{ $jobPost->jobPostLanguagePreferences
                                    ->pluck('language.language')
                                    ->map(fn($language) => __($language))
                                    ->implode(', ') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <a class="job-search__item-link" href="{{ route('job-posts.show', $jobPost) }}">
                            {{ __('View Details') }}
                        </a>
                    </div>
                </div>
                @empty
                {{ __('No result found.') }}
                @endforelse
            </div>
        </div>

        {{ $jobPosts->links('job-posts.pagination.links') }}
    </section>
</main>
@endsection