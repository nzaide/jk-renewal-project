@extends('layouts.applicant.app')
@section('title', __('For Employers') . ' | ')
@push('style')
@vite('resources/css/pages/for-employers/show.css')
@endpush
@section('body')
<main class="top">
    <section>
        <img src="{{ url('img/WEBSITE_coverphoto_JAPANESE.jpg') }}"
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
                            <h5 class="mb-0">迅速</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">誠実</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-n7">
                    <div class="card hover-translate-y-n10 hover-shadow-lg">
                        <div class="card-body p-5 text-center">
                            <h5 class="mb-0">卓越性</h5>
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
                    <h4 class="ml-2">最優秀バイリンガル人材プロバイダとして表彰されています</h4>
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
                                    クライアントからご連絡をいただいてから24時間以内に候補者をご紹介いたします。
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
                                    数名の採用であれば1～2週間で完了します。
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
                                    日本語、中国語、韓国語、スペイン語、フランス語、イタリア語、タイ語、ドイツ語、ベトナム語、マレー語、インドネシア語、その他アジア言語、欧州言語など、豊富なバイリンガル人材（外国人・フィリピン人）をいつでもご紹介可能です。
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
                                    優秀なITプロフェッショナル、技術者、エグゼクティブクラスの人材をご紹介できます。
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
                                    採用率ナンバーワンの実績。
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
                                    全ての必要な資格、要件を満たした人材をご紹介いたします。
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
                                    フィリピンのトップ企業から最優秀バイリンガル人材プロバイダとして表彰されました。
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
                                    フィリピンの様々な業種のグローバル企業約700社と提携しています。
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
            <h4>当社について</h4>
            <p>
                <b>J-K NETWORK SERVICES</b>はフィリピン全国約700社に人材ソリューションを提供している実績豊富な人材パートナーです。あらゆる職種の<b>マルチリンガル人材（フィリピン人・外国人）、フィリピン人人材、エグゼクティブ人材</b>を扱っています。
            </p>
            <p>
                今日の企業が求める優秀な人材の基準は国籍、能力、言語、技能、経験など多岐にわたりますが、当社のリクルーター、営業担当ならばそうしたクライアント企業様の基準に合わせたご提案が可能です。また、当社ではクライアント企業が求める能力にマッチするよう語学力評価と面接も実施しています。
            </p>
            <p>
                また、当社はフィリピン政府から許認可を受けた人材斡旋会社(証券取引委員会企業登録番号 CS201609129、フィリピン労働雇用省認可(PEAライセンス番号M-19-01-051:2019年発行)
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h3>
                お客様第一の当社人材サービスで時間と予算を節約しませんか<br>
                あらゆる国籍のベストな人材をご紹介いたします
            </h3>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>当社のサービス</h4>
            <p>
                人材紹介、ヘッドハント、語学力評価、リクルーティング
            </p>
            <p>
                当社では、最高の候補者を獲得するために厳しい訓練を受けたエキスパートがクライアント企業様のニーズをもとに人材業務を行ないます。私たちの目標は常にベストな人材を紹介し、クライアント企業様と強固な関係を構築することです。また、クライアント企業様のニーズは私たちのニーズです。当社は長年の経験から、お客様が求める人材がどこにいるか、そしてどのようにすれば彼らの関心をクライアント企業様の募集案件に向けることができるかを知っています。
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="container">
            <h4>1. マルチリンガル人材</h4>
            <p>
                当社は以下に示す言語のマルチリンガル人材（ネイティブ、非ネイティブ）をご紹介いたします。
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
            <h4>2. 非バイリンガル人材</h4>
            <p>
                以下に示す業種の一般職から管理職まで、様々な職種に適した優秀なフィリピン人人材をご紹介できます。
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
            <h4>その他のサービス：</h4>
            <p>
                ビザ手続サポート<br>
                語学力評価<br>
                英語研修
            </p>
            <p>
                当社のサービスやパートナーシップに関するお問い合わせについては、当社のマーケティング部門に直接お問い合わせください。
            </p>
            <p>
                連絡先<br>
                メールアドレス: <a href="mailto:jkmarketing@jknetwork-jobs.com" class="text-primary">jkmarketing@jknetwork-jobs.com</a><br>
                電話: (02) 8245-2829<br>
                携帯電話: 0917 813 9678 / 09176381951<br>
                スカイプ: <a href="skype:live:jkmultilingual2017?chat" class="text-primary">live:jkmultilingual2017</a>
            </p>
        </div>
    </section>
    <section class="section mt-5 mb-5">
        <div class="section__wrap top__awards-wrap js-anima-fade">
            <h2 class="title anima-fade">受賞歴</h2>
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
                                J-Kが操業を始めて1年足らずの2014年には、アクセンチュアによる「最も価値あるリクルートメントパートナー」として表彰されました。
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
                                同年2014年に、同じくアクセンチュアによる「最多エントリーレベル雇用を実現した優れたトップパートナー」として表彰されました。
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
                                2015年には、アクセンチュアによる「トップマルチリンガルプロバイダー」として表彰されました。
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
                                JKネットワークは他社からも、「2016年第１四半期、第２四半期、第３四半期におけるマルチリンガル最多雇用賞」をいただきました。
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
                                JKネットワークはまた、アクセンチュアの「トップバイリンガルリクルートメントプロバイダー2018」を受賞しました。
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
                                2018年には、ジョブストリートフィリピンによる「最多ジョブオファーを得たトップ企業」として表彰されました。
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
                                JKネットワークはまた、ジョブストリートによる「2018年上半期に最も急成長した企業」として表彰されました。
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
                                最近では、JKネットワークはアクセンチュアによる「2019年上半期トップマルチリンガルパートナー」として表彰されました。
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
            <h2 class="title anima-fade">クライアント企業の反応</h2>
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
                    <h1>カンパニーマスコット</h1>
                    <p>
                        ２０２０年２月２５日、J-K Networkのオフィシャルマスコットが誕生いたしました。<br>
                        ２０２０年２月２８日に一般に公開されました。<br>
                        誠実、丁寧でフレンドリーなJ-K Networkのリクルーターをイメージしております。
                    </p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                    <img src="{{ url('img/mascot/GIMMY_Bubble-wText_Japanese-(CLIENTS)(1MB).png') }}"
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