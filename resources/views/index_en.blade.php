@extends('layouts.applicant.app')

@push('style')
@vite('resources/scss/index.scss')
@endpush
@section('body')
<main class="top">
    <section class="mv js-slider-mv">
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">ABOUT US</h2>
                    <div class="mv__item-highlight">
                        <p>J-K NETWORK SERVICES is a trusted partner for providing manpower solution to almost 700 companies around the Philippines.</p>
                    </div>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>We find <span class="bold">MULTILINGUALS, FILIPINO and EXECUTIVES</span> for all types of jobs.</p>
                            <p>We are a licensed recruitment agency with Government accreditation. We are registered in Securities and Exchange Commission Company Registration No. CS201609129 Accredited by Department of Labor and Employment with PEA License Number: M-19-01-051 issued 2019</p>
                            <p>We give free assistance for your employment application. Free Career Consultation.</p>
                            <p>Awarded as the best vendor in the Philippines, Be employed with today’s biggest companies in the country. Our clients are from BPO, IT, Manufacturing, Real Estate, Bank and Finance, Consultancy, Casinos and other International and Global companies based in the Philippines.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-image1.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-sp1.jpg') }}" alt="mv-image1">
                <div class="mv__box">
                    <q class="mv__box-quote">Providing Jobs.<br>Changing Lives.</q>
                </div>
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>Get Hired through J-K Network and get this amazing Gimmy merchandise.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">RESPONSE TO COVID-19</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>Amidst the Enhanced Community Quarantine, J-K Network is still in operation to assist you in your job-hunting. Now, you can get a job without leaving your home.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s00.png') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s00.png') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">FREE JOB-HUNTING ASSISTANCE</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Network Services offers free job hunting assistance for Foreign and Filipino language speakers, for Filipino executives and Filipino IT Professionals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s01.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s01.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">FREE MONTHLY UPDATES ON JOB OPENINGS</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K is partnered with 600 Global and International Companies. This gives us access to thousands of real-time job openings for Japanese, Mandarin, Korean, Spanish, Portuguese, French, German, Russian, Thai, Vietnamese, and other Asian, European, Latin American and Scandinavian language speakers, IT professionals and Filipino executives, across different positions, industries and career levels. J-K sends free and complete lists of these job opportunities to all our candidates, on monthly basis</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s02.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s02.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">ENGLISH TRAINING</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>There are thousand jobs in the Philippines for Japanese, Mandarin, Korean, Vietnamese, Thai, Russian, Arabic and more language speakers. The minimum requirement is English proficiency. With this, we have a team focused in providing intensive English training for Employment, Travel and Business.</p>
                            <p>Our English Course packages are open for all Nationalities of all ages and English proficiency. Click out the link below for more details: <a style="text-decoration: underline" href="https://jk-ryugaku.com/en/">https://jk-ryugaku.com/en/</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s201910.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s201910.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">FREE JOB-COACHING</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Network coaches candidates in interviews, job assessments and examinations prior all evaluation, to increase candidate success rate. And this is all for free!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s03.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s03.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">FREE BILINGUAL CAREER CONSULTATION</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>The J-K consultation department offers free consultation schedules. The talks are focused to providing resume and interview hacks and tips from the experts, setting up proper career perspective to candidates, and introducing the market for Bilinguals of different nationalities and Filipinos, in the Philippines.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s04.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s04.jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">REFERRAL BONUS</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>Have some Bilingual friends? Let them know about J-K. Amazing treats are waiting for you once your friend got a job through us.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/s05.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/s05.jpg') }}" alt="mv-image1">
            </div>
        </div>
    </section>
    <section class="section search js-anima-fade">
        <div class="section__wrap search__container anima-fade">
            <x-forms.job-search />
            <div class="js-searchsticky"></div>
        </div>
    </section>
    <section class="section top__jobs">
        <div class="section__wrap top__jobs-wrap js-anima-fade">
            <h2 class="title anima-fade">
                {{ __('New Job Openings') }}
            </h2>
            <div class="top__jobs-content anima-fade">
                <div class="top__jobs-image sp">
                    <img class="obj-fit"
                        src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/jobs-image.jpg') }}"
                        alt="jobs image">
                </div>
                <ul class="top__jobs-list js-slider-jobs">
                    @forelse ($jobPosts as $key => $jobPost)
                        <li class="top__jobs-item">
                            @if ($key == 0)
                                <div class="top__jobs-image pc">
                                    <img class="obj-fit"
                                        src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/jobs-image.jpg') }}"
                                        alt="jobs image">
                                </div>
                            @endif
                            <div class="top__jobs-item-box">
                                <div class="top__jobs-range">
                                    <span>{{ $jobPost->salary }}</span>
                                </div>
                                <span class="top__jobs-loc">{{ $jobPost->location_en }}</span>
                                <h3 class="top__jobs-title">{{ $jobPost->job_name_en }}</h3>
                                <div class="top__jobs-info">
                                    <ul class="top__jobs-taglist">
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-bldg.svg') }}" alt="icon-bldg">
                                            </div>
                                            <p>{{ $jobPost->industry_en }}</p>
                                        </li>
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-globe.svg') }}" alt="icon-globe">
                                            </div>
                                            <p>
                                                {{
                                                    implode(', ',
                                                        $jobPost->languagePreferences
                                                            ->pluck('language')
                                                            ->toArray()
                                                    )
                                                }}
                                            </p>
                                        </li>
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-user.svg') }}" alt="icon-user">
                                            </div>
                                            <p>
                                                {{ App\Enums\JobPostTarget::from($jobPost->target)->text() }}
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="top__jobs-benefits">
                                        <p class="top__jobs-benefits-title">
                                            <span class="pc">{{ __('Benefits') }}</span>
                                            <span class="sp">{{ __('Benefits') }}</span>
                                        </p>
                                        <div class="top__jobs-benefits-item">{{ $jobPost->benefits_en }}</div>
                                    </div>
                                </div>
                                <div class="top__jobs-button">
                                    <a class="button align-center"
                                        href="{{ route('job-posts.show', $jobPost->id) }}">
                                        {{ __('View Details') }}
                                    </a>
                                </div>
                            </div>
                        </li>
                    @empty
                        {{ __('No Records Found') }}
                    @endforelse
                </ul>
                <a class="top__jobs-link"
                    href="{{ route('job-posts.search', $searchLocale) }}">
                    {{ __('View All Postings') }}
                </a>
            </div>
        </div>
    </section>
    @if ($languages->isNotEmpty())
    <section class="section top__lang js-anima-counter">
        <div class="section__wrap top__lang-wrap js-anima-fade">
            <h2 class="title anima-fade">{{ __('Languages') }}</h2>
            <ul class="top__lang-list anima-fade">
                @foreach ($languages as $language)
                    <li class="top__lang-item">
                        <span class="top__lang-count js-counter"
                            data-start="0"
                            data-end="{{ $language->job_posts_count }}"
                            data-duration="200">0</span>
                        <p>{{ $language->language }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif
    <section class="section top__voice">
        <div class="section__wrap top__voice-wrap js-anima-fade">
            <h2 class="title top__voice-title anima-fade position-relative">Candidate Voice</h2>
            <ul class="top__voice-list js-slider-voice anima-fade">
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/japan.png"
                        alt="flag-japan">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item1.jpg"
                            alt="Mr. Harry">
                    </div>
                    <div class="top__voice-box">
                        <div class="top__voice-candi mt-0">
                            <h3>Mr. Harry</h3>
                            <p>Japanese Speaker</p>
                        </div>
                    </div>
                </li>
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/china.png"
                        alt="flag-china">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item2.jpg"
                            alt="Ms. Catherine">
                    </div>
                    <div class="top__voice-box">
                        <div class="top__voice-candi mt-0">
                            <h3>Ms. Catherine</h3>
                            <p>Mandarin Speaker</p>
                        </div>
                    </div>
                </li>
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/germany.png"
                        alt="flag-germany">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item3.jpg"
                            alt="Ms. Jenny">
                    </div>
                    <div class="top__voice-box">
                        <div class="top__voice-candi mt-0">
                            <h3>Ms. Jenny</h3>
                            <p>German Speaker</p>
                        </div>
                    </div>
                </li>
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/india.png"
                        alt="flag-india">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item4.jpeg"
                            alt="Mr. Ganeswar">
                    </div>
                    <div class="top__voice-box">
                        <div class="top__voice-candi mt-0">
                            <h3>Mr. Ganeswar</h3>
                            <p>Hindi Speaker</p>
                        </div>
                    </div>
                </li>
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/thailand.png"
                        alt="flag-thailand">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item5.jpg"
                            alt="Ms. Rattana">
                    </div>
                    <div class="top__voice-box">
                        <div class="top__voice-candi mt-0">
                            <h3>Ms. Rattana</h3>
                            <p>Thai Speaker</p>
                        </div>
                    </div>
                </li>
                <li class="top__voice-item">
                    <img class="top__voice-flag"
                        src="/img/Icon/flag/vietnam.png"
                        alt="flag-vietnam">
                    <div class="top__voice-image">
                        <img class="obj-fit"
                            src="/img/top/voice-item6.png"
                            alt="Ms. Cao">
                    </div>
                    <div class="top__voice-box">
                        <q class="top__voice-quote">
                            <span class="pc">
                                I would like to send my deepest gratitude
                                towards J-K Networks for their support
                                with my employment seeking in The
                                Philippines. Their help means so much to
                                me during the time I have to deal with all
                                the interviews, and my looking for an
                                accommodation as well. They have been
                                partners, they have been friends and I
                                appreciate them for all those favors.
                            </span>
                            <span class="sp">
                                I would like to send my deepest gratitude
                                towards J-K Networks for their support
                                with my employment seeking in The
                                Philippines. Their help means so much to
                                me during the time I have to deal with all
                                the interviews, and my looking for an
                                accommodation as well. They have been
                                partners, they have been friends and I
                                appreciate them for all those favors.
                            </span>
                        </q>
                        <div class="top__voice-candi">
                            <h3>Ms. Cao</h3>
                            <p>Native Vietnamese</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section top__awards">
        <div class="section__wrap top__awards-wrap js-anima-fade">
            <h2 class="title anima-fade">Awards Received</h2>
            <div class="top__awards-content anima-fade">
                <div class="top__awards-slider js-slider-awards">
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a01.png') }}"
                                alt="award1"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                In 2014, less than a year after J-K started its operation, we have received Accenture’s award for being their Most Valued Recruitment partner.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a02.png') }}"
                                alt="award2"
                                class="img-fluid">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                In the same year, J-K received Accenture’s award for Outstanding Top Partner and for bringing the most number of Entry-level hires.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a03.png') }}"
                                alt="award3"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                J-K Network gained another award as Accenture’s Top Multilingual Provider in 2015.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a04.png') }}"
                                alt="award4"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                J-K Network received another client’s Award for Most Number of Multilingual Applicants hired, in Quarter 1, Quarter 2 and Quarter 3 of 2016.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a05.png') }}"
                                alt="award5"
                                class="img-fluid">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                J-K Network is also awarded as Accenture’s Top Bilingual Recruitment Provider in 2018.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a06.png') }}"
                                alt="award6"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                In 2018, Jobstreet Philippines awarded J-K Network as Top Employers with Most number of Jobs offered
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a07.png') }}"
                                alt="award7"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                J-K Network is also awarded as one of the fastest growing companies by Jobstreet for 2 consecutive quarters.
                            </p>
                        </div>
                    </div>
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a08.png') }}"
                                alt="award8"
                                class="img-fluid"
                                style="object-fit: cover;">
                        </div>
                        <div class="top__awards-slider-info">
                            <p>
                                Recently, J-K is awarded as Accenture’s Top Multilingual partner for Quarter 1 and Quarter 2 of 2019.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section top__yt">
        <div class="section__wrap top__yt-wrap js-anima-fade">
            <h2 class="title anima-fade">Our YouTube Channel </h2>
            <div class="top__yt-content anima-fade">
                <div class="top__yt-main">
                    <iframe src="https://www.youtube.com/embed/9o-OAUIhR9Q"></iframe>
                </div>
                <div class="top__yt-menu">
                    <a class="top__yt-item js-yt"
                        data-id="tEAADNLGbQg"
                        href="https://www.youtube.com/watch?v=tEAADNLGbQg"
                        target="_blank">
                        <img class="top__yt-thumb"
                            src="http://img.youtube.com/vi/tEAADNLGbQg/mqdefault.jpg">
                        <h3 class="top__yt-title trim"></h3>
                    </a>
                    <a class="top__yt-item js-yt"
                        data-id="2RN-CCHch5g"
                        href="https://www.youtube.com/watch?v=2RN-CCHch5g"
                        target="_blank">
                        <img class="top__yt-thumb"
                            src="http://img.youtube.com/vi/2RN-CCHch5g/mqdefault.jpg">
                        <h3 class="top__yt-title trim"></h3>
                    </a>
                    <a class="top__yt-item js-yt"
                        data-id="Jwj-J-Z0V6E"
                        href="https://www.youtube.com/watch?v=Jwj-J-Z0V6E"
                        target="_blank">
                        <img class="top__yt-thumb"
                            src="http://img.youtube.com/vi/Jwj-J-Z0V6E/mqdefault.jpg">
                        <h3 class="top__yt-title trim"></h3>
                    </a>
                    <a class="top__yt-item js-yt"
                        data-id="mU0LTTvAKUg"
                        href="https://www.youtube.com/watch?v=mU0LTTvAKUg"
                        target="_blank">
                        <img class="top__yt-thumb"
                            src="http://img.youtube.com/vi/mU0LTTvAKUg/mqdefault.jpg">
                        <h3 class="top__yt-title trim"></h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section top__team">
        <div class="section__wrap top__team-wrap js-anima-fade">
            <h2 class="title anima-fade">Meet the Team </h2>
            <ul class="top__team-list anima-fade">
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t001.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t001.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Jav</h3>
                        <p>General Manager</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t002.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t002.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Kristel</h3>
                        <p>Assistant Operations Manager</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t003.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t003.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Mr. Juster</h3>
                        <p>Recruitment Team Leader</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/Ms-Eurica-(Contract-Management).jpg') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/Ms-Eurica-(Contract-Management).jpg') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Eurica</h3>
                        <p>Contract Management | Marketing & Branding</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t005.png') }}"
                                alt="front-img">
                            </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t005.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Nette</h3>
                        <p>HR Team Lead</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t008.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t008.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Amber</h3>
                        <p>Assistant Team Lead</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/Ms.-Sophie-(Korean).jpg') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/Ms.-Sophie-(Korean).jpg') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Sophie</h3>
                        <p>Recruitment POC for Asian (KOREAN) Languages Hiring</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t010b.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t010b.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Ms. Alena</h3>
                        <p>Senior Recruitment Expert</p>
                    </div>
                </li>
                <li class="top__team-item">
                    <div class="top__team-image">
                        <div class="top__team-image-front">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t011.png') }}"
                                alt="front-img">
                        </div>
                        <div class="top__team-image-back">
                            <img class="obj-fit"
                                src="{{ url('img/meet-the-team/t011.png') }}"
                                alt="back-img">
                        </div>
                    </div>
                    <div class="top__team-name">
                        <h3>Mr. Noel</h3>
                        <p>Assistant Team Lead</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section top__faq js-anima-peek">
        <div class="section__wrap top__faq-wrap">
            <div class="top__faq-title anima-wrap">
                <h2>Got questions?</h2>
            </div>
            <div class="top__faq-subtitle anima-wrap">
                <h3>We are here to help!</h3>
            </div>
            <div class="top__faq-button">
                <a class="button button--faq" href="https://jknetworkfrequentlyaskedquestions.wordpress.com">
                    Check our FAQ page
                </a>
            </div>
        </div>
    </section>
    <section class="section top__merch">
        <div class="section__wrap top__merch-wrap js-anima-fade">
            <h2 class="top__merch-title anima-fade">Get Hired And Get This Amazing Gimmy Merchandise</h2>
            <ul class="top__merch-list anima-fade">
                <li class="top__merch-item">
                    <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/merch-hoodies.jpg') }}"
                        alt="hoodies">
                </li>
                <li class="top__merch-item">
                    <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/merch-tote.jpg') }}"
                        alt="tote bags">
                </li>
                <li class="top__merch-item">
                    <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/merch-tumbler.jpg') }}"
                        alt="tumbler">
                </li>
            </ul>
        </div>
    </section>
</main>
@endsection

@push('script')
@vite('resources/js/index.js')
@endpush
