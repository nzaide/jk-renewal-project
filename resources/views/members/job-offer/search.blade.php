@extends('layouts.applicant.app')

@section('title', __('lang.title_pages.job_offer_search'))
@include('layouts.applicant.header')
@section('content')
<section class="section">
  <h2 class="heading">{{ __('lang.title_pages.job_offer_search') }}</h2>
  <div class="card mb-4 mt-5">
    <div class="card__header">
      <h2 class="card__heading">{{ __('lang.label.job_offer_search.search') }}</h2>
    </div>
    <div class="card__body p-10">
      <form id="search_form" class="form" action="{{ route('members.job.offer.search') }}">
        <div class="form__wrapper flex flex-col">
          <div class="flex">
            <label class="form__label">{{ __('lang.label.job_offer_search.occupation') }}</label>
            <button type="button" @click="openModal('occupation_modal')" class="button button--with-icon button--small-icon">
              <img class="mr-2" src="{{ url('img/icon/plus-gray.svg') }}" alt="add">
              {{ __('lang.label.job_offer_search.add_btn') }}
            </button>
          </div>
          <div class="w-full">
            <input
              ref="occupations" 
              value="@if(request()->query('occupations')){{request()->query('occupations')}}@endif" 
              name="occupations" 
              class="form__input"
              type="text"
              readonly 
            />
          </div>
        </div>
        <div class="form__wrapper flex flex-col">
          <div class="flex">
            <label class="form__label">{{ __('lang.label.job_offer_search.job_offer_place') }}</label>
            <button type="button" @click="openModal('prefecture_modal')" class="button button--with-icon button--small-icon">
              <img class="mr-2" src="{{ url('img/icon/plus-gray.svg') }}" alt="add">
              {{ __('lang.label.job_offer_search.add_btn') }}
            </button>
          </div>
          <div class="w-full">
            <input 
              ref="prefectures" 
              value="@if(request()->query('prefectures')){{request()->query('prefectures')}}@endif" 
              name="prefectures"
              class="form__input" 
              type="text"
              readonly
            />
          </div>
        </div>
        <div class="form__wrapper flex flex-col">
          <div class="flex">
            <label class="form__label">{{ __('lang.label.job_offer_search.business_domain') }}</label>
            <button type="button" @click="openModal('domain_modal')" class="button button--with-icon button--small-icon">
              <img class="mr-2" src="{{ url('img/icon/plus-gray.svg') }}" alt="add">
              {{ __('lang.label.job_offer_search.add_btn') }}
            </button>
          </div>
          <div class="w-full">
            <input
              class="form__input"
              type="text"
              ref="domains" 
              value="@if(request()->query('domains')){{request()->query('domains')}}@endif" 
              name="domains"
              readonly
            />
          </div>
        </div>
      </form>
      <div class="w-full">
        <button form="search_form" type="submit" class="button button--search w-full">
          <img class="mr-2" src="{{ url('img/icon/search.svg') }}" alt="search">
          {{ __('lang.label.job_offer_search.search_btn') }}
        </button>
      </div>
    </div>
  </div>
  <div class="mt-5">
    <div class="search-result">
      <div class="search-result__wrapper">
        <div>
          <p class="search-result__count">{{ __('lang.label.job_offer_search.search_results') }}：<span class="search-result__count search-result__count--orange">{{ $jobOffers->total() }}</span>社</p>
        </div>
        <div>
          <div class="search-result__sort-wrapper">
            <div class="search-result__option">
              <a
                class="search-result__sort-label @if (empty(request()->sort_by) || request()->sort_by == 'date') font-bold text-orange-600 @endif"
                href="{{
                  route(
                    'members.job.offer.search',
                    [
                      ...request()->all(),
                      'sort_by' => 'date',
                    ]
                  ) 
                }}"
              >
                {{ __('lang.label.job_offer_search.date') }}
              </a>
            </div>
            <div class="search-result__option">
              <a
                class="search-result__sort-label @if (!empty(request()->sort_by) && request()->sort_by == 'views') font-bold text-orange-600 @endif"
                href="{{
                  route(
                    'members.job.offer.search',
                    [
                      ...request()->all(),
                      'sort_by' => 'views',
                    ]
                  ) 
                }}"
              >
                {{ __('lang.label.job_offer_search.views') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="search-result-divider"></div>
    <div class="card mb-4">
      <div class="card__body">
        <ul ref="job_offer_list" class="card_list">
          @foreach ($jobOffers as $jobOffer)
            <li class="card__item">
              <div class="card__title-container">
                <a class="card__title" href="#">
                  {{ $jobOffer->jb_offer_title }}
                  【{{ $jobOffer->company->prefecture->prefecture }}】
                </a>
                <div class="card__corporation-details">
                  <p class="card__corporation-text">{{ $jobOffer->company->company_name }}</p>
                  <div class="flex-center-layout mr-4">
                    <img class="card__icon" src="{{ asset('img/icon/map.svg') }}"alt="map">
                    <p class="card__corporation-text">
                      {{ $jobOffer->company->prefecture->prefecture }}
                    </p>
                  </div>
                  <div class="flex-center-layout">
                    <img class="card__icon" src="{{ asset('img/icon/building.svg') }}" alt="map">
                    <p class="card__corporation-text">{{ $jobOffer->company->businessDomain->business_domain_name }}</p>
                  </div>
                </div>
              </div>
              <div class="card__details">
                <p class="card__text">{{ $jobOffer->application_details }}</p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  {!! $jobOffers->links('components.pagination') !!}
</section>
<x-search-prefectures :regions="$prefecture_regions" id="prefecture_modal" />
<x-search-occupations :occupations="$occupations" id="occupation_modal" />
<x-search-domains :domains="$domains" id="domain_modal" />
@include('members.job-offer.sidebar')
@vite('resources/js/member/job-offer/search.js')
@endsection