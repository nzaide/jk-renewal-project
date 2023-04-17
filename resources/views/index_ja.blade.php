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
                    <h2 class="mv__item-title">当社について</h2>
                    <div class="mv__item-highlight">
                        <p>J-K NETWORK SERVICESはフィリピン全国約700社に人材ソリューションを提供している実績豊富な人材パートナーです。</p>
                    </div>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>あらゆる職種の<span class="bold">マルチリンガル求人、フィリピン人求人、エグゼクティブ求人</span>を扱っています。</p>
                            <p>また、当社はフィリピン政府から許認可を受けた人材斡旋会社(証券取引委員会企業登録番号 CS201609129、フィリピン労働雇用省認可(PEAライセンス番号M-19-01-051:2019年発行)</p>
                            <p>当社の就職支援、キャリアコンサルティングは無料です。</p>
                            <p>当社はフィリピンの最優秀ベンダーとして表彰されているほか、数々の国内最大手企業様にご利用いただいています。当社クライアントの業種はBPO、IT、製造、不動産、銀行・金融、コンサルティング、カジノと多岐にわたり、フィリピンに拠点を持つ国際的なグローバル企業様も含まれています。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-image1.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-sp1.jpg') }}" alt="mv-image1">
                <div class="mv__box">
                    <q class="mv__box-quote">仕事を与え、<br>生活を変える</q>
                </div>
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Networkで仕事をゲットして素敵なギミーグッズもゲットしよう</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(JAPANESE).jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(JAPANESE).jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">COVID-19への対応について</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>ロックダウンの最中でもJ-K Networkは、フィリピンでのお仕事探しのサポートをしています。家にいながら、仕事をゲットできます。</p>
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
                    <h2 class="mv__item-title">無料の就職支援</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>JKネットワークサービスは、外国語話者やフィリピン語話者、またフィリピン人のエグゼクティブやITプロフェッショナルなど、多岐にわたって、無料の就職支援を行っています。</p>
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
                    <h2 class="mv__item-title">毎月のお仕事案件更新</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>JKネットワークは600もの世界的な多国籍企業と提携しています。これにより、仕事案件は随時追加され、日本語、マンダリン、韓国語、スペイン語、ポルトガル語、フランス語、ドイツ語、ロシア語、タイ語、ベトナム語、またその他のアジア地域、ヨーロッパ地域、南米地域、北欧地域などの言語話者への仕事案件があり、それだけではなく、ITプロフェッショナルやエグゼクティブなど多様なポジション、業界やキャリアに応じた案件がございます。JKネットワークは、以上のような仕事案件をリスト化し、毎月、無料で皆様にお送りいたします。</p>
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
                    <h2 class="mv__item-title">英語トレーニング</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>フィリピンには日本語、中国語、韓国語、ベトナム語、タイ語、ロシア語、アラビア語など様々な言葉を話す方のためのお仕事がたくさんあります。
                                英語が話せるだけで、多くのお仕事に出会うことができます。
                                そこで、わたしたちは、就活や、旅行、ビジネスのための英語を集中的にトレーニングするレッスンを提供しております。</p>
                            <p>私たちのコースは、さまざまな国籍、年齢、どの英語レベルの方にも開かれております。
                                詳しくは次のリンクをチェック！<a style="text-decoration: underline" href="https://jk-ryugaku.com">https://jk-ryugaku.com</a></p>
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
                    <h2 class="mv__item-title">無料のジョブコーチング</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>JKネットワークは、面接や就職アセスメント、試験の前に、ジョブコーチングを行い、就職の確率を上げます。もちろん無料です！</p>
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
                    <h2 class="mv__item-title">無料のバイリンガルキャリア相談</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>JKネットワークのコンサルタント部は、無料相談を受け付けています。専門スタッフによるレジュメやインタビューに関するアドバイスや、将来のキャリアの見通しなどの相談、また、フィリピン国内の市場ではどのような案件が、フィリピン人や外国人に用意されているのかをお教えいたします。</p>
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
                    <h2 class="mv__item-title">紹介ボーナス</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>もしかしてバイリンガルの友達がいますか？もしいたら、JKネットワークについて教えてあげてください。その友達がJKネットワークの支援でお仕事を獲得した際には、紹介者のあなたに紹介ボーナスをご用意しております。</p>
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
                                <span class="top__jobs-loc">{{ $jobPost->location_jp }}</span>
                                <h3 class="top__jobs-title">{{ $jobPost->job_name_jp }}</h3>
                                <div class="top__jobs-info">
                                    <ul class="top__jobs-taglist">
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-bldg.svg') }}" alt="icon-bldg">
                                            </div>
                                            <p>{{ $jobPost->industry_jp }}</p>
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
                                        <div class="top__jobs-benefits-item">{{ $jobPost->benefits_jp }}</div>
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
            <h2 class="title top__voice-title anima-fade">Candidate Voice</h2>
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
                                J-K Networksさんのサポートに
                                心から感謝しています。 企業とのイ
                                ンタビューだけではなく、 家探しの
                                お手伝いなど、 様々な面で支援して
                                くださいました。 J-K Networks
                                さんは、私の就職活動におけるパー
                                トナーであり、頼れる友人です。 本
                                当にありがとうございました。
                            </span>
                            <span class="sp">
                                J-K Networksさんのサポートに
                                心から感謝しています。 企業とのイ
                                ンタビューだけではなく、 家探しの
                                お手伝いなど、 様々な面で支援して
                                くださいました。 J-K Networks
                                さんは、私の就職活動におけるパー
                                トナーであり、頼れる友人です。 本
                                当にありがとうございました。
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
            <h2 class="title anima-fade">受賞歴</h2>
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
