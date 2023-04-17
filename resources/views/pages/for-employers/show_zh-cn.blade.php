@extends('layouts.applicant.app')
@section('title', __('For Employers') . ' | ')
@push('style')
@vite('resources/css/pages/for-employers/show.css')
@endpush
@section('body')
<main class="top">
    <section>
        <img src="{{ url('img/WEBSITE_coverphoto_MANDARIN.jpg') }}"
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
                            <h5 class="mb-0">速度</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">诚信</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">卓越</h5>
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
                    <h4 class="ml-2">被评为顶级双语供应商</h4>
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
                                    我们能够在收到客户通知后的24小时内提供所有级别的候选人信息
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
                                    我们能够在1-2周内完成数次人数统计
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
                                    我们有大量双语人才储备（外国人和菲律宾语）：日语、普通话、韩语、西班牙语、法语、意大利语、泰语、德语、越南语、马来语、印尼语以及其他亚洲和欧洲语言
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
                                    提供合格的IT专业人员、相关技术人员和行政人员。
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
                                    拥有最高的成功就业率
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
                                    合格的人才，满足所有需求
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
                                    被菲律宾的顶尖公司评为顶级双语供应商
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
                                    在菲律宾，我们与将近700家不同行业的全球化公司有合作。
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
            <h4>关于我们</h4>
            <p>
                <b>J-K 网络人力服务</b>是一个值得信赖的合作伙伴，我们为菲律宾境内近700家公司提供人力解决方案。我们为所有类型的岗位寻找适合的人选，无论是多语人才（菲律宾人或外国人）、母语人士还是高层管理人员。
            </p>
            <p>
                我们知道，今天的企业对求职者的要求不仅仅是具备娴熟的技能，还要考虑他们的国籍、专长、语言、技能和经验。我们友好的招聘人员和POC确保我们达到客户公司的标准。我们通过语言评估和面试，确保候选人匹配职位要求。
            </p>
            <p>
                我们在证券交易委员会的注册号为CS201609129,在劳工和就业部的许可证号为M-19-01-051
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h3>
                节省时间！节省成本！为您找到合适的人才是我们的头等大事<br>
                我们提供所有国籍的最优秀的候选人
            </h3>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>我们的服务</h4>
            <p>
                职位介绍，猎头，语言评估和招聘
            </p>
            <p>
                我们的专家接受过全面的培训，能够找到最优秀的候选人。我们根据客户公司的需求制定我们的标准。我们一直在努力寻找最优秀的人才，并与我们的客户保持牢固的关系。我们代表我们的客户。我们知道哪里可以找到客户感兴趣的人才，以及如何让他们对您的工作机会产生兴趣。我们努力实现完美匹配。
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>1. 多语言要求：</h4>
            <p>
                我们可以针对不同的语言要求提供多语人才（本地和非本地），例如：
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
                ]) }}">日语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Mandarin->value,
                    $searchLocale
                ]) }}">中文（普通话）</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Cantonese->value,
                    $searchLocale
                ]) }}">中文（粤语）</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Fukien->value,
                    $searchLocale
                ]) }}">中文（闽南语）</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Korean->value,
                    $searchLocale
                ]) }}">韩语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Indonesian->value,
                    $searchLocale
                ]) }}">印尼语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Malay->value,
                    $searchLocale
                ]) }}">马来语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Thai->value,
                    $searchLocale
                ]) }}">泰语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Bengali->value,
                    $searchLocale
                ]) }}">孟加拉语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Portuguese->value,
                    $searchLocale
                ]) }}">葡萄牙语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Hindi->value,
                    $searchLocale
                ]) }}">印地语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Vietnamese->value,
                    $searchLocale
                ]) }}">越南语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Urdu->value,
                    $searchLocale
                ]) }}">乌尔都语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::French->value,
                    $searchLocale
                ]) }}">法语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::German->value,
                    $searchLocale
                ]) }}">德语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Russian->value,
                    $searchLocale
                ]) }}">俄语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Spanish->value,
                    $searchLocale
                ]) }}">西班牙语</a>,
                <a href="{{ route('job-posts.search', [
                    'la' => App\Enums\LanguageId::Dutch->value,
                    $searchLocale
                ]) }}">荷兰语</a>
                ,以及其他亚洲和欧洲语言
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>2. 非双语职位</h4>
            <p>
                我们可以为不同的职位提供合格的菲律宾求职者，从基层员工到管理岗位，覆盖以下多个行业：
            </p>
            <p class="page-links">
                <a href="{{ route('job-posts.search', [
                    'q' => 'Accounting|Finance',
                    $searchLocale
                ]) }}">会计/财务</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Administrative|Office|Management',
                    $searchLocale
                ]) }}">行政/办公管理</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Advertising|Publishing',
                    $searchLocale
                ]) }}">广告/出版</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Human|Resource|Back',
                    $searchLocale
                ]) }}">人力资源/后台支持</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Manufacturing',
                    $searchLocale
                ]) }}">制造</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Sales|Marketing',
                    $searchLocale
                ]) }}">销售和营销</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hotel',
                    $searchLocale
                ]) }}">酒店</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Customer+Service',
                    $searchLocale
                ]) }}">客户服务</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'BPO',
                    $searchLocale
                ]) }}">BPO行业</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Engineering',
                    $searchLocale
                ]) }}">工程</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Hardware',
                    $searchLocale
                ]) }}">IT（硬件）</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Software',
                    $searchLocale
                ]) }}">IT（软件）</a>,
                <a href="{{ route('job-posts.search', [
                    'q' => 'Network|DataBase|System',
                    $searchLocale
                ]) }}">IT（网络、数据库、系统）</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>其他服务：</h4>
            <p>
                签证办理协助<br>
                语言评估<br>
                英语培训
            </p>
            <p>
                如对我们的服务及合作单位有任何的咨询，烦请直接联系市场部。
            </p>
            <p>
                联络方式<br>
                电子邮箱: <a href="mailto:jkmarketing@jknetwork-jobs.com" class="text-primary">jkmarketing@jknetwork-jobs.com</a><br>
                电话: (02) 8245-2829<br>
                手机: 0917 813 9678 / 09176381951<br>
                Skype: <a href="skype:live:jkmultilingual2017?chat" class="text-primary">live:jkmultilingual2017</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="section__wrap top__awards-wrap js-anima-fade">
            <h2 class="title anima-fade">受奖</h2>
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
                                2014年，在J-K开始运营一年之内，我们就已经荣获埃森哲最有价值招聘伙伴的奖项。
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
                                同年，J-K荣获埃森哲颁发的杰出顶级合作伙伴奖，为其带来了数量最多的入门级员工。
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
                                J-K Network在2015年荣获埃森哲最佳多语言提供商的另一个奖项。
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
                                J-K Network在2016年第1季度、第2季度和第3季度被客户授予了另一个奖项，该奖项用以表彰最多数量的多语种申请人被录用。
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
                                J-K Network同时被授予埃森哲2018年最佳双语招聘供应商的荣誉。
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
                                2018年，Jobstreet Philippines将J-K Network评为提供最多就业岗位的最佳雇主。
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
                                J-K Network还连续两个季度被Jobstreet评为增长最快的公司之一。
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
                                近日，J-K被授予埃森哲2019年第一季度和第二季度的最佳多语言合作伙伴称号。
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
            <h2 class="title anima-fade">客户反馈</h2>
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
                    <h1>公司吉祥物</h1>
                    <p>
                        各位，在本年二月廿五日J-K的官方吉祥物正式地介绍給公司所有員工。然后在本年二月廿八 日向外发表我们这吉祥物。
                        我们公司吉祥物代表和展示我们J-K公司所有招聘員的一贯有誠信，谦虚，和有善的质素。
                    </p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                    <img src="{{ url('img/mascot/GIMMY_Bubble-wText_Chinese-(CLIENTS)(1MB).png') }}"
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