@extends('layouts.applicant.app')
@section('title', __('lang.title_pages.login'))
@section('content')
<section class="section">
  <div class="card card--account">
    <h2 class="heading heading--underlined mb-14 text-center">{{ __('lang.label.pre_registration.title') }}</h2>
    <p class="text-base max-w-[600px] mx-auto">{{ __('lang.label.pre_registration.temporary') }}<br>{{ __('lang.label.pre_registration.message') }}<br>{{ __('lang.label.pre_registration.proceed') }}</p>
    <div class="flex justify-center"><a class="link link--md mt-16 sp:mt-12" href="#">{{ __('lang.label.backToTop') }}</a></div>
  </div>
</section>
@endsection