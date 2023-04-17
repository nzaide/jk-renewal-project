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
                    <h2 class="mv__item-title">关于我们</h2>
                    <div class="mv__item-highlight">
                        <p>J-K 网络人力服务 是一个值得信赖的合作伙伴，我们为菲律宾境内近700家公司提供人力解决方案。</p>
                    </div>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>我们为所有类型的岗位寻找适合的人选，无论是多语人才、母语人士还是高层管理人员。</p>
                            <p>我们在证券交易委员会的注册号为CS201609129,在劳工和就业部的许可证号为M-19-01-051</p>
                            <p>我们免费帮助您申请职位。免费职业咨询。</p>
                            <p>我们被评为菲律宾最好的招聘服务供应商，与当今最知名的企业合作。我们的客户来自BPO、IT、制造、房地产、银行和金融、咨询，赌场等各个行业，其中包括总部设在菲律宾的多家跨国公司。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-image1.jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ Vite::asset('resources/vendor/jk-network-static/img/top/mv-sp1.jpg') }}" alt="mv-image1">
                <div class="mv__box">
                    <q class="mv__box-quote">我们提供工作，<br>让你改变生活</q>
                </div>
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>透过我们J-K 招聘网找到合适的工作将获得精彩奖品.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mv__item-image">
                <img class="pc obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(CHINESE).jpg') }}" alt="mv-image1">
                <img class="sp obj-fit" src="{{ url('img/about-us/Gimmy-Merch_Collage-(CHINESE).jpg') }}" alt="mv-image1">
            </div>
        </div>
        <div class="mv__item">
            <div class="mv__item-content">
                <div class="mv__item-content-wrap">
                    <h2 class="mv__item-title">COVID-19回应</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>在这段政府規定的加嚴和延长的社群隔離時期， 我们 J-K 公司仍然是不停的幫您找合適和條件好的工作。</p>
                            <p>您現在無需要离开家就能安心的找到一份您喜欢的工作。</p>
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
                    <h2 class="mv__item-title">免费求职帮助</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Network为说外语和菲律宾语的人士、菲律宾高管和菲律宾IT专业人士提供免费的求职帮助。</p>
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
                    <h2 class="mv__item-title">免费月度职位更新</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K与全球600家国际公司合作。这使我们能够获得为日语、普通话、韩语、西班牙语、葡萄牙语、法语、德语、俄语、泰国语、越南语以及其他亚洲、欧洲、拉丁美洲和斯堪的纳维亚语使用者、IT专业人员和菲律宾高管提供成千上万个实时工作机会。涵盖不同职位、行业和职业水平。J-K每月向我们所有的求职者免费发送这些工作机会的完整清单。</p>
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
                    <h2 class="mv__item-title">英语训练</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>菲律宾有许多 中文，日文，韩文，越南文，泰文，俄文，阿拉伯文和其他语言招聘。
                                只要英文沟通能力，人们一定找到好工作!
                                所以，为了你抓住就业机会，享受旅行，做好生意，我们公司提供英语密集课程。
                                我们课程为所有的国籍，年龄，英文水平的人开放的。<a style="text-decoration: underline" href="https://jk-ryugaku.com/en/">https://jk-ryugaku.com/en/</a></p>
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
                    <h2 class="mv__item-title">免费岗位培训</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K Network在面试、工作评估和考试前对候选人进行所有评估，以提高候选人的成功率。这都是免费的！</p>
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
                    <h2 class="mv__item-title">免费双语职业咨询</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>J-K咨询部提供免费咨询日程表。会谈的重点是专家提供简历和面试技巧和提示，为候选人树立正确的职业前景，并给在菲律宾的不同国籍双语的使用者介绍市场。</p>
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
                    <h2 class="mv__item-title">推荐奖励</h2>
                    <div class="mv__item-text">
                        <div class="mv__item-text-summary">
                            <p>你有双语朋友吗？那就介绍J-K给他们。一旦你的朋友通过我们找到了一份工作，惊喜就在等着你。</p>
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
                                <span class="top__jobs-loc">{{ $jobPost->location_cn }}</span>
                                <h3 class="top__jobs-title">{{ $jobPost->job_name_cn }}</h3>
                                <div class="top__jobs-info">
                                    <ul class="top__jobs-taglist">
                                        <li class="top__jobs-taglist-item">
                                            <div class="icon-img">
                                                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-bldg.svg') }}" alt="icon-bldg">
                                            </div>
                                            <p>{{ $jobPost->industry_cn }}</p>
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
                                        <div class="top__jobs-benefits-item">{{ $jobPost->benefits_cn }}</div>
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
                                我要向J-K网络公司致以最深切的感
                                谢!感谢他们对我在菲律宾找工作的
                                支持!他们的帮助对我意义非常重大
                                。在处理我所有的面试,以及寻找我
                                的住宿时,他们都一直是我的合作伙
                                伴,很好的朋友。我很感激他们对我 的帮助。
                            </span>
                            <span class="sp">
                                我要向J-K网络公司致以最深切的感
                                谢!感谢他们对我在菲律宾找工作的
                                支持!他们的帮助对我意义非常重大
                                。在处理我所有的面试,以及寻找我
                                的住宿时,他们都一直是我的合作伙
                                伴,很好的朋友。我很感激他们对我 的帮助。
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
            <h2 class="title anima-fade">受奖</h2>
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
