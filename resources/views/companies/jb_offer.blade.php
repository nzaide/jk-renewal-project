@extends('layouts.applicant.app')

@section('title', __('lang.title_pages.login'))

@include('layouts.applicant.header')
@section('content')
<section class="section">
    <div class="card mb-6 mt-5">
        <div class="card__body">
        <ul class="card_list">
        <li class="card__item">
          <div class="card__title-container card__title-container--no-border">
            <a class="card__title" href="#">
              {{ $company->company_name }}
            </a>
            <div class="card__corporation-details items-start sp:flex-col">
              <div class="w-3/12 sp:w-full"><img src="{{ $company->image_path }}" alt="company"></div>
              <div class="ml-3">
                <div class="flex-center-layout mr-4 sp:mt-4">
                  @if(!empty($evaluationIcon))
                    <img 
                      class="card__emoticon" 
                      src="{{ url($evaluationIcon->emoticon_path) }}" 
                      alt="emoticon"
                    >
                  <p class="card__corporation-text">{{ __('lang.label.rating') }}</p><img class="card__icon" src="{{ url('/img/Icon/recruit.svg') }}" alt="recruit">
                  @else
                    <p class="card__corporation-text">{{ __('lang.label.no_rating') }}</p>
                  @endif
                  <p class="card__corporation-text">{{ __('lang.label.number_of_jobs') }}<span class="card__corporation-text text-primary-orange font-bold ml-2">{{ $company->jbOffers->count() }}件</span></p><img class="card__icon" src="{{ url('/img/icon/kutikomi.svg') }}" alt="kutikomi">
                  <p class="card__corporation-text">{{ __('lang.label.word_of_mouth') }}<span class="card__corporation-text text-primary-orange font-bold ml-2"> {{ $company->evaluations->count() }}件</span></p>
                </div>
                <div class="flex-center-layou mt-4">
                  <div class="card__company-details flex">
                    <p class="card__corporation-text text-primary-orange font-bold">{{ __('lang.label.industry') }} </p>
                    <p class="card__corporation-text">{{ Str::limit($company->businessDomain->business_domain_name, 40) }}</p>
                  </div>
                  <div class="card__company-details flex">
                    <p class="card__corporation-text text-primary-orange font-bold">{{ __('lang.label.address') }}</p>
                    <p class="card__corporation-text">{{ Str::limit($company->company_address, 40) }}</p>
                  </div>
                  <div class="card__company-details flex">
                    <p class="card__corporation-text text-primary-orange font-bold">URL</p>
                    <p class="card__corporation-text">{{ Str::limit($company->url, 40) }}</p>
                  </div>
                </div>
              </div>
              <div class="flex justify-center flex-col w-32 ml-auto sp:mt-4 sp:w-full">
                <a class="button button--orange button--small mb-2" href = "#">
                  <img class="mr-2" src="{{ url('img/Icon/white-pencil.svg') }}" alt="edit">{{ __('lang.label.write_a_Review') }}
                </a>
                <a class="button button--orange-reversed button--small" @click="followCompany('{{ $company->id }}')"> 
                  <img class="mr-2" src="{{ url('/img/Icon/plus-red.svg') }}" alt="add">{{ $company->is_followed ? __('lang.label.unfollow') : __('lang.label.follow') }} 
                </a>
              </div>
            </div>
          </div>
        </li>
      </ul>
        </div>
    </div>
    <div class="card mb-6">
        <div class="card__body py-5 px-7">
        <div class="flex items-center justify-between">
            <p class="heading text-lg mr-3">{{ $jbOffer->jb_offer_title }} 【{{ $jbOffer->prefecture->prefecture }}】</p>
            <button class="button button--orange-reversed button--small w-32" type="button"><img class="mr-2" src="{{ url('/img/icon/check.svg') }}" alt="check">{{ __('lang.label.job_offer_page.follow') }} </button>
        </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card__header">
        <h2 class="card__heading">{{ __('lang.label.job_offer_page.job_description') }}</h2>
        </div>
        <div class="card__body py-5 px-7">
        <p class="corporate-text">
            {{ $jbOffer->offer_details }}
        </p>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card__header">
        <h2 class="card__heading">{{ __('lang.label.job_offer_page.basic_information') }}</h2>
        </div>
        <div class="card__body py-5 px-7">
            <p>{{ $jbOffer->offer_details }}</p>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card__header">
        <h2 class="card__heading">{{ __('lang.label.job_offer_page.application_requirements') }}</h2>
        </div>
        <div class="card__body py-5 px-7">
        <div class="mb-4">
            <p>{{ $jbOffer->application_details }}</p>
        </div>
        </div>
    </div>
    <div class="flex justify-center">
        <button class="button mr-2 font-bold sp:mb-2">{{ __('lang.label.job_offer_page.to_application_page') }}<img class="ml-2" src=" {{ url('/img/icon/arrow-white.svg') }}" alt="arrow"></button>
    </div>
</section>
@include('layouts.sidebar')
@vite('resources/js/member/company/company.js')
@endsection