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
                    <h2 class="mv__item-title">회사 정보</h2>
                    <div class="mv__item-highlight">
                        <p>J-K NETWORK SERVICES 는 필리핀 전역에 걸쳐 약 700개의 회사에 인력 솔루션을 제공하는 신뢰할 수 있는 파트너입니다.</p>
                    </div>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>당사는 모든 종류의 직업에서 <span class="bold">다국어 구사자, 필리핀인,</span> 경력자를 찾고 있습니다.</p>
                            <p>노동고용부로 부터 2019 년도에 발급된 면허번호 M-19-01-051 로 승인을 받아 증권거래위원회 등록번호 CS201609129로 등록 되었음</p>
                            <p>귀하의 구직을 무료로 지원하고 있습니다. 무료로 경력 상담을 해 드립니다.</p>
                            <p>필리핀에서 최고의 벤더 상을 획득했으며 현재 국내 대기업에 인력을 제공하고 있습니다. 필리핀에 있는 BPO, IT, 제조업, 부동산 중개업, 은행 및 금융업, 자문 회사, 카지노 및 기타 국제적인 글로벌 회사를 고객으로 두고 있습니다.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-image1.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-sp1.jpg') }}" alt="mv-image1">
                <div class="mv__box">
                    <q class="mv__box-quote">일자리 제공.<br>생뢀의 변화</q>
                </div>
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Network를 통해 고용 되시고 놀라운 Gimmy 상품이 있습니다!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(KOREAN).jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(KOREAN).jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">COVID-19 바이러스 대응:</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>강화된 지역 봉쇄 기간(ECQ) 중에도 J-K 네트워크는 여전히 여 러분의일자리 채용에 도움을 드리고 있습니다. 지금 이 순간에도 집에서 할 수 있는일자 리를 구할 수 있습니다!</p>
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
                    <h2 class="mv__item-title">무료로 구직을 돕습니다.</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K 네트워크 서비스는 외국어와 필리핀어를 사용하는 분들, 필리피노 경영자와 IT전문가들이 구직하는 것을 도와드립니다.</p>
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
                    <h2 class="mv__item-title">무료로 매달 채용 정보를 업데이트 해드립니다.</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K는 600개의 글로벌, 국제적인 회사와 협력하고 있습니다. 이로써, 실시간으로 1000여개가 넘는 채용건을 제공하고 있어 일본어, 만다린어, 한국어, 스페인어, 포루투갈어, 불어, 독일어, 러시아어, 타이어, 베트남어, 기타 다른 아시안, 유러피안, 라틴 아메리카, 스칸디나비아어 사용자들과 더불어 IT 전문가와 필리피노 경영인에게 다양한 직위, 산업, 경력에 따른 직업을 제공해 드립니다. J-K는 모든 지원자들께 무료로 매달 모든 직업채용 기회에 관한 완벽한 리스트를 제공합니다.</p>
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
                    <h2 class="mv__item-title">영어 교육</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>필리핀에서는 일본인, 중국인, 한국인, 베트남인, 태국인, 러시아인, 아라비아인, 그 외의 다른언어사용자들을 위한 수천 개의 직업들이 있습니다. 최소한의 요건은 영어 구사능력인데요,이것을 위해 저희 팀에서는 직업구인, 여행, 비지니스를 위한 집중영어 훈련 프로그램을 갖추고있습니다.</p>
                            <p>저희 영어 훈련 패키지는 모든 나라의 어느 연령 대에서나 어떤 영어 레벨에서도 가능한프로그램입니다. 더 자세한 사항은 다음의 링크를 클릭해 보세요. <a style="text-decoration: underline" href="https://jk-ryugaku.com/en/">https://jk-ryugaku.com/en/</a></p>
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
                    <h2 class="mv__item-title">무료로 구직 코치를 해 드립니다.</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K 네트워크는 지원자들께 인터뷰나 총괄 평가 전의 직업측정 및 시험에 관해 코치해 드리고 있습니다. 이로써 지원자들의 취직 성공률을 높이고 있으며 모두 무료로 진행해 드립니다.</p>
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
                    <h2 class="mv__item-title">무료로 이중언어 경력자에게 상담해 드립니다.</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K 상담 부서에서 무료로 상담스케쥴을 제공해 드립니다. 필리핀에서 필리피노뿐만 아니라 다양한 국적의 이중언어자들을 위한 직업소개 및 이력서와 인터뷰 작성, 전문가들의 팁, 알맞는 경력 프로파일을 세워나가는 데 집중하도록 돕고 있습니다.</p>
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
                    <h2 class="mv__item-title">추천 보너스</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>이중언어를 사용하는 지인, 친구가 있으신가요? J-K를 알려주세요. 그들이 저희를 통해 직업을 구할 수 있게 되면 추천해주신 여러분에게도 놀라운 혜택을 드리고 있습니다.</p>
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
                                <span class="top__jobs-loc">{{ $jobPost->location_kr }}</span>
                                <h3 class="top__jobs-title">{{ $jobPost->job_name_kr }}</h3>
                                <div class="top__jobs-info">
                                    <ul class="top__jobs-taglist">
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-bldg.svg') }}" alt="icon-bldg">
                                            </div>
                                            <p>{{ $jobPost->industry_kr }}</p>
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
                                        <div class="top__jobs-benefits-item">{{ $jobPost->benefits_kr }}</div>
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
                                저의 필리핀 취업에 도움을 주신 J-K
                                Networks 직원들께 깊은 감사의 말씀을
                                드립니다. 여러분의 도움으로 모든 인터뷰를 잘
                                처리할 수 있었고 또한 숙소를 어렵지 않게
                                구할 수 있었습니다. J-K Networks 직원들은
                                저에게는 훌륭한 파트너였으며 친구였습니다.
                                이러한 모든 호의에 감사드립니다.
                            </span>
                            <span class="sp">
                                저의 필리핀 취업에 도움을 주신 J-K
                                Networks 직원들께 깊은 감사의 말씀을
                                드립니다. 여러분의 도움으로 모든 인터뷰를 잘
                                처리할 수 있었고 또한 숙소를 어렵지 않게
                                구할 수 있었습니다. J-K Networks 직원들은
                                저에게는 훌륭한 파트너였으며 친구였습니다.
                                이러한 모든 호의에 감사드립니다.
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
            <h2 class="title anima-fade">수상 경력</h2>
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
