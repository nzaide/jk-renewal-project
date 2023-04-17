@extends('layouts.applicant.app')
@section('title', __('For Employers') . ' | ')
@push('style')
@vite('resources/css/pages/for-employers/show.css')
@endpush
@section('body')
<main class="top">
    <section>
        <img src="{{ url('img/WEBSITE_coverphoto_ENGLISH.jpg') }}"
            alt="Image"
            class="img-fluid mx-auto d-block w-100 h-100">
    </section>
    <br>
    <section class="section pt-0">
        <div class="container position-relative zindex-100">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">SPEED</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">INTEGRITY</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">EXCELLENCE</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <div class="card hover-translate-y-n10 hover-shadow-lg">
                <div class="card-body">
                    <h4 class="ml-2">AWARDED AS THE TOP BILINGUAL PROVIDER</h4>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    We can provide applicants of all level 24 hours after client notification
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    We can complete several head counts in just 1-2 weeks.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Big Pool for Bilingual Speakers (Foreigners and Filipino): Japanese, Mandarin, Korean, Spanish, French, Italian, Thai, German, Vietnamese, Bahasa Melayu, Indonesian and other Asian and European Languages
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Provide qualified IT Professionals and Technical Related and Executive Profiles.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Holding the highest rate of successful employments
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Qualified Profiles for all the requirements needed
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Awarded as Top Bilingual Provider by top companies here in the Philippines
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none m-2">
                        <div class="p-3 d-flex">
                            <div>
                                <span class="badge badge-circle badge-soft-success mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                <span class="text-sm text-muted mb-0">
                                    Partnering with almost 700 Global Companies of different Industries in the Philippines.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>ABOUT US</h4>
            <p>
                <b>J-K NETWORK SERVICES</b> is a trusted partner for providing manpower solution to almost 700 companies around the Philippines. We find <b>MULTILINGUALS (Filipino or Foreigner), FILIPINO and EXECUTIVES</b> for all types of jobs
            </p>
            <p>
                We understand that companies today require more than a skilled candidate based on their nationality, proficiency, Languages, skill set and experience. Our Friendly recruiters and POC ensure that we follow the standard of the client company. We conduct language assessments and interviews to match the profiles.
            </p>
            <p>
                We are a licensed recruitment agency with Government accreditation. We are registered in Securities and Exchange Commission Company Registration No. CS201609129 Accredited by Department of Labor and Employment with PEA License Number: M-19-01-051 issued 2019
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h3>
                SAVE TIME! SAVE MONEY! YOUR MANPOWER IS OUR TOP PRIORITY<br>
                WE PROVIDE THE BEST CANDIDATES ACROSS ALL NATIONALITIES
            </h3>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>OUR SERVICES</h4>
            <p>
                Placement, Headhunting, Language assessment and Recruitment
            </p>
            <p>
                Our Experts went a thorough Training in order to hunt the best candidates. We based our standards to the needs of our client companies. We always strive to find the best people and maintain solid relationship with our clients. We work on behalf of our clients. We know where to locate they key people of your interest and how to generate their key interest to your job opportunity. We work to ensure the perfect match.
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>1. Multilingual Requirements:</h4>
            <p>
                We can provide multilingual (Native and non-native) for different languages like:
            </p>
            <p class="page-links">
                @php
                    $searchLocales = [
                        'en' => '',
                        'ja' => 'lang_ja',
                        'zh-cn' => 'lang_zh-CN',
                        'ko' => 'lang_ko'
                    ];
                    $searchLocale = $searchLocales[App::currentLocale()];
                @endphp
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Japanese->value,
                    $searchLocale
                ]) }}">Japanese</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Mandarin->value,
                    $searchLocale
                ]) }}">Chinese (Mandarin)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Cantonese->value,
                    $searchLocale
                ]) }}">Chinese (Cantonese)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Fukien->value,
                    $searchLocale
                ]) }}">Chinese (Fukien)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Korean->value,
                    $searchLocale
                ]) }}">Korean</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Indonesian->value,
                    $searchLocale
                ]) }}">Bahasa Indonesia</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Malay->value,
                    $searchLocale
                ]) }}">Bahasa Melayu</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Thai->value,
                    $searchLocale
                ]) }}">Thai</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Bengali->value,
                    $searchLocale
                ]) }}">Bengali</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Portuguese->value,
                    $searchLocale
                ]) }}">Portuguese</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Hindi->value,
                    $searchLocale
                ]) }}">Hindi</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Vietnamese->value,
                    $searchLocale
                ]) }}">Vietnamese</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Urdu->value,
                    $searchLocale
                ]) }}">Urdu</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::French->value,
                    $searchLocale
                ]) }}">French</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::German->value,
                    $searchLocale
                ]) }}">German</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Russian->value,
                    $searchLocale
                ]) }}">Russian</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Spanish->value,
                    $searchLocale
                ]) }}">Spanish</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Dutch->value,
                    $searchLocale
                ]) }}">Dutch</a>,
                Asian languages,
                European languages
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>2. Non Bilingual Position.</h4>
            <p>
                We can source qualified Filipino applicants for different positions up to managerial positions in the following industry:
            </p>
            <p class="page-links">
                <a href="{{ route('job-posts.search', [
                    'q' => 'Accounting|Finance',
                    $searchLocale
                ]) }}">Accounting/Finance</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Administrative|Office|Management',
                    $searchLocale
                ]) }}">Administrative/Office Management</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Advertising|Publishing',
                    $searchLocale
                ]) }}">Advertising/Publishing</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Human|Resource|Back',
                    $searchLocale
                ]) }}">Human Resource/Back Office Jobs</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Manufacturing',
                    $searchLocale
                ]) }}">Manufacturing</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Sales|Marketing',
                    $searchLocale
                ]) }}">Sales and Marketing</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hotel',
                    $searchLocale
                ]) }}">Hotel-Hospitality</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Customer+Service',
                    $searchLocale
                ]) }}">Customer Service Industry</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'BPO',
                    $searchLocale
                ]) }}">BPO Industry</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Engineering',
                    $searchLocale
                ]) }}">Engineering</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hardware',
                    $searchLocale
                ]) }}">IT (Hardware)</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Software',
                    $searchLocale
                ]) }}">IT (Software)</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Network|DataBase|System',
                    $searchLocale
                ]) }}">IT (Network, DataBase, System)</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>ADDITIONAL SERVICES SOON:</h4>
            <p>
                Visa processing Assistance<br>
                Language Assessment<br>
                English Training
            </p>
            <p>
                For any inquiries about our services and partnership, please feel free to contact our Marketing Department directly.
            </p>
            <p>
                Contact Information:<br>
                Email Address: <a href="mailto:jkmarketing@jknetwork-jobs.com" class="text-primary">jkmarketing@jknetwork-jobs.com</a><br>
                Phone: (02) 8245-2829<br>
                Mobile: 0917 813 9678 / 09176381951<br>
                Skype: <a href="skype:live:jkmultilingual2017?chat" class="text-primary">live:jkmultilingual2017</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="section__wrap top__awards-wrap js-anima-fade">
            <h2 class="title anima-fade">Awards Received</h2>
            <div class="top__awards-content anima-fade">
                <div class="top__awards-slider js-slider-awards">
                    <div class="top__awards-slider-item">
                        <div class="top__awards-slider-image">
                            <img src="{{ url('img/awards/a01_employer.jpg') }}"
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
    <br>
    <br>
    <section class="section mt-5 mb-5">
        <div class="section__wrap top__clients-feedback-wrap js-anima-fade">
            <h2 class="title anima-fade">Client’s Feedback</h2>
            <div class="top__clients-feedback-content anima-fade">
                <div class="top__clients-feedback-slider js-slider-clients-feedback">
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/1.png') }}"
                                alt="clients-feedback1"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/2.png') }}"
                                alt="clients-feedback2"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/3.png') }}"
                                alt="clients-feedback3"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/4.png') }}"
                                alt="clients-feedback4"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/5.png') }}"
                                alt="clients-feedback5"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/6.png') }}"
                                alt="clients-feedback6"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/7.png') }}"
                                alt="clients-feedback7"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="top__clients-feedback-slider-item">
                        <div class="top__clients-feedback-slider-image h-100">
                            <img src="{{ url('img/clients-feedback/8.png') }}"
                                alt="clients-feedback8"
                                class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <section class="section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                    <h1>COMPANY MASCOT</h1>
                    <p>
                        In February 25, 2020, J-K’s official Mascot was introduced to the company. It was released to the public in February 28, 2020, signifying the honest, humble and friendly recruiters of J-K Network.
                    </p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                    <img src="{{ url('img/mascot/GIMMY_Bubble-wText-(CLIENTS)(1MB).png') }}"
                        alt="Image"
                        class="img-fluid rounded mx-auto d-block">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('script')
@vite('resources/js/pages/for-employers/show.js');
@endpush