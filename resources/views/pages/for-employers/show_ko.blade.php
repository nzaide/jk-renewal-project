@extends('layouts.applicant.app')
@section('title', __('For Employers') . ' | ')
@push('style')
@vite('resources/css/pages/for-employers/show.css')
@endpush
@section('body')
<main class="top">
    <section>
        <img src="{{ url('img/WEBSITE_coverphoto_KOREAN.jpg') }}"
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
                            <h5 class="mb-0">신속성</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">청렴성</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">우수성.</h5>
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
                    <h4 class="ml-2">우수 다국어 취업알선 기관 수상 이력</h4>
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
                                    고객의 요청을 받은 후 24시간 내에 모든 수준의 지원자를 알선해 드립니다.
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
                                    단 1 ~ 2 주 내에 여러 명의 인적자원을 제공해 드립니다.
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
                                    2개국어 구사자(외국인 및 필리핀인)를 위한 대규모 풀: 일본어, 북경어, 한국어, 스페인어, 프랑스어, 이탈리아어, 태국어, 독일어, 베트남어, 바하사 말레이어, 인도네시아어, 기타 아시아어 및 유럽어
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
                                    자격을 갖춘 IT 전문가와 기술 관련 프로필 및 실무 프로필 제공
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
                                    가장 높은 취업 성공률 보유
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
                                    필요한 모든 요구사항에 대한 정규화된 프로필
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
                                    필리핀 현지 내의 우수 기업들로부터 우수 다국어 취업알선기관 상 수상
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
                                    필리핀에 위치한 약 700개의 다양한 분야의 글로벌 회사와 협약하고 있습니다.
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
            <h4>회사 소개</h4>
            <p>
                <b>J-K NETWORK SERVICES</b> 는 필리핀 전역에 걸쳐 약 700개의 회사에 인력 솔루션을 제공하는 신뢰할 수 있는 파트너입니다. 모든 종류의 직업에서 다국어 구사자(필리핀인이나 외국인), 필리핀인, 경력자를 찾고 있습니다.
            </p>
            <p>
                오늘날 기업들은 국적, 실력, 언어, 기술력 및 경험을 기반으로 숙련된 지원자 그 이상을 요구하는 추세입니다. 당사의 친절한 모집 담당자와 POC는 고객 회사의 기준을 따르는지 확인해 드리며, 프로필에 맞추어 언어 평가와 면접을 실시합니다.
            </p>
            <p>
                노동고용부로 부터 2019 년도에 발급된 면허번호 M-19-01-051 로 승인을 받아 증권거래위원회 등록번호 CS201609129로 등록 되었음
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h3>
                시간을 아끼실 수 있습니다! 비용을 절약할 수 있습니다! 귀하의 인력이 우리의 최우선순위입니다.<br>
                어떤 국적이든 최고의 지원자를 제공해 드립니다.
            </h3>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>서비스</h4>
            <p>
                취업 알선, 스카우트, 언어 평가 및 신규 모집
            </p>
            <p>
                우수한 지원자를 찾아내기 위해서 전문가가 철저한 교육을 실시했습니다. 고객 회사의 요구사항에 따라 기준을 세웠습니다. 유능한 인력을 찾고 우리 고객과 견고한 관계를 유지하고자 항상 노력하고 있습니다. 고객을 위해서 일하고 있습니다. 귀하의 주요 관심 인력이 있는 지역을 알고 있으며, 해당 인력의 주 관심사를 귀하의 채용 기회로 이어지게 만드는 노하우가 있습니다. 당사는 구직 및 구인 조건이 서로 완벽하게 일치하도록 노력하고 있습니다.
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>1. 다국어 요구사항:</h4>
            <p>
                아래와 같은 다양한 언어에 대해 다국어(모국어 및 외국어) 일자리를 알선하고 있습니다.
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
                ]) }}">일본어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Mandarin->value,
                    $searchLocale
                ]) }}">중국어(북경어)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Cantonese->value,
                    $searchLocale
                ]) }}">중국어(광동어)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Fukien->value,
                    $searchLocale
                ]) }}">중국어(푸젠어)</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Korean->value,
                    $searchLocale
                ]) }}">한국어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Indonesian->value,
                    $searchLocale
                ]) }}">인도네이사어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Malay->value,
                    $searchLocale
                ]) }}">바하사 말레이어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Thai->value,
                    $searchLocale
                ]) }}">태국어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Bengali->value,
                    $searchLocale
                ]) }}">벵골어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Portuguese->value,
                    $searchLocale
                ]) }}">포르투갈어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Hindi->value,
                    $searchLocale
                ]) }}">힌디어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Vietnamese->value,
                    $searchLocale
                ]) }}">베트남어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Urdu->value,
                    $searchLocale
                ]) }}">우르두어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::French->value,
                    $searchLocale
                ]) }}">프랑스어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::German->value,
                    $searchLocale
                ]) }}">독일어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Russian->value,
                    $searchLocale
                ]) }}">러시아어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Spanish->value,
                    $searchLocale
                ]) }}">스페인어</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Dutch->value,
                    $searchLocale
                ]) }}">네덜란드어</a>,
                기타 아시아어 및 유럽어
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>2. 개국어 구사가 필요 없는 직위.</h4>
            <p>
                다음 분야에서 최고 관리직에 이르기까지 다양한 직위에 맞는 필리핀 출신 지원자를 알선해 드립니다:
            </p>
            <p class="page-links">
                <a href="{{ route('job-posts.search', [
                    'q' => 'Accounting|Finance',
                    $searchLocale
                ]) }}">회계/경리</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Administrative|Office|Management',
                    $searchLocale
                ]) }}">사무/행정 관리</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Advertising|Publishing',
                    $searchLocale
                ]) }}">광고/출판</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Human|Resource|Back',
                    $searchLocale
                ]) }}">인사/후선 업무</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Manufacturing',
                    $searchLocale
                ]) }}">제조</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Sales|Marketing',
                    $searchLocale
                ]) }}">판매 및 마케팅</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hotel',
                    $searchLocale
                ]) }}">호텔 접대</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Customer+Service',
                    $searchLocale
                ]) }}">고객 서비스</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'BPO',
                    $searchLocale
                ]) }}">BPO 산업</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Engineering',
                    $searchLocale
                ]) }}">엔지니어링</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hardware',
                    $searchLocale
                ]) }}">IT(하드웨어)</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Software',
                    $searchLocale
                ]) }}">IT(소프트웨어)</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Network|DataBase|System',
                    $searchLocale
                ]) }}">IT(네트워크, 데이터베이스, 시스템)</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>곧 시행되는 추가 서비스:</h4>
            <p>
                비자 절차 지원<br>
                언어 평가<br>
                영어 교육
            </p>
            <p>
                저희 서비스와 파트너십에 대한 어떠한 질문도 주저하지 마시고 저희 마케팅 부서로 즉시 연락 주십시요
            </p>
            <p>
                연락 정보<br>
                이메일 주소: <a href="mailto:jkmarketing@jknetwork-jobs.com" class="text-primary">jkmarketing@jknetwork-jobs.com</a><br>
                전화 번호: (02) 8245-2829<br>
                핸드폰: 0917 813 9678 / 09176381951<br>
                스카이프: <a href="skype:live:jkmultilingual2017?chat" class="text-primary">live:jkmultilingual2017</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="section__wrap top__awards-wrap js-anima-fade">
            <h2 class="title anima-fade">수상 경력</h2>
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
                                J-K가 시작한지 1년이 채 되지 않은 2014년, 가장 가치있는 채용파트너로서 "Accenture's award"를 수상하였습니다.
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
                                같은 해에 J-K는 가장 뛰어난 최고의 파트너로서 가장 많은 신입 고용을 기록하여 "Accenture's award"를 수상하였습니다.
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
                                2015년 J-K 네트워크는 최고의 다중언어 채용공급처로서 "Accenture's award"를 수상하였습니다.
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
                                2016년 J-K 네트워크는 1,2,3분기에 걸쳐 가장 많은 수의 다중언어 지원자를 고용되게 한 공로로 "client's award(고객상)" 수상하였습니다.
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
                                2018년 J-K 네트워크는 최고의 이중언어자 채용공급처로서 "Accenture award"를 수상하였습니다.
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
                                2018년 필리핀의 Jobstreet는 J-K 네트워크에게 가장 많은 수의 직업을 제공한 최고의 고용처로 J-K네트워크를 선정하였습니다.
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
                                J-K 네트워크는 Jobstreet에서 2분기 연속으로 가장 성장이 빠른 기업으로 수상하였습니다.
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
                                최근에 J-K는 2019년 1,2분기 동안 Accenture에서 선정한 최고의 다중언어 파트너사로 수상을 하였습니다.
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
            <h2 class="title anima-fade">고객 피드백</h2>
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
                    <h1>회사 마스코트</h1>
                    <p>
                        2020 년 2 월 25 일, J-K 회사에서 공식 마스코트가 소개되었습니다.
                        2020 년 2 월 28 일에는 J-K Network의 정직하고 겸손하며 친절한 채용을 의미하는 마스코트가 여러분에게 공개되었습니다.
                    </p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                    <img src="{{ url('img/mascot/GIMMY_Bubble-wText_Korean-(CLIENTS)(1MB).png') }}"
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