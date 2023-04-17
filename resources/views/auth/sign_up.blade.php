@extends('layouts.applicant.app')

@section('title', __('lang.title_pages.login'))
@include('layouts.header')
@section('content')
<section class="section">
  <div class="card card--account sp:!p-4">
    <h2 class="heading heading--underlined text-center">{{ __('lang.title_pages.register') }}</h2>
    <div class="pt-[42px] flex justify-center">
      <div>
        <div class="form__checkbox-wrapper pb-2">
          <input class="form__checkbox form__checkbox--solid-bg" v-model="terms" type="checkbox" name="" id="terms" unchecked>
          <label class="form__text-label cursor-pointer" for="terms"><a class="link text-base ml-2" href="#">{{ __('lang.label.terms') }}</a>{{ __('lang.label.agree') }}</label>
        </div>
        <div class="form__checkbox-wrapper">
          <input class="form__checkbox form__checkbox--solid-bg" v-model="dataAgreement" type="checkbox" name="" id="personal" unchecked>
          <label class="form__text-label cursor-pointer" for="personal"><a class="link text-base ml-2" href="#">{{ __('lang.label.personal_info') }}</a>{{ __('lang.label.agree') }}</label>
        </div>
      </div>
    </div>
    <div class="card__group mt-20 sp:mt-10">
      <form action="{{ route('signup.mail') }}" method="post" class="form sp:mb-14">
        <h3 class="heading heading--sm mb-5 text-center">{{ __('lang.label.email_register') }}</h3>
        <div class="form__group">
          @csrf
          <div class="flex text-red-600 text-center font-bold text-xl mb-3">
            @if ($message = Session::get('warning'))
            {{ $message }}
            @endif

          </div>
          <input class="@if(!$errors->has('email')) mb-[35px] @endif form__input" type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('lang.label.email') }}" />
          @error('email')
          <p class="form__error">
            {{ $message }}
          </p>
          @enderror

          <input class="@if(!$errors->has('password')) mb-5 @endif form__input" type="password" name="password" placeholder="{{ __('lang.label.password') }}" />
          @error('password')
          <p class="form__error">
            {{ $message }}
          </p>
          @enderror

          <input class="@if(!$errors->has('password_confirmation')) mb-5 @endif form__input" type="password" name="password_confirmation" placeholder="{{ __('lang.label.confirm_password') }}" />
          @error('password_confirmation')
          <p class="form__error">
            {{ $message }}
          </p>
          @enderror
          <p class="form__role text-sm text-[#707070]">{{ __('lang.label.register_password_notice_1') }}<br>{{ __('lang.label.register_password_notice_2') }}<br>{{ __('lang.label.register_password_notice_3') }}</p>
          <div class="flex justify-center mt-3">
            <button :disabled="!terms || !dataAgreement" class="button">{{ __('lang.label.register') }}</button>
          </div>
        </div>
      </form>

      <div class="social">
        <h3 class="heading heading--sm mb-5 text-center">{{ __('lang.label.sso_register') }}</h3>
        <div>
          <button :disabled="!terms || !dataAgreement" onclick="location.href='#';" class="button__social"> <i class="fab fa-google text-white"></i><span class="button__social-text">{{ __('lang.label.google') }}</span></button>
          <button :disabled="!terms || !dataAgreement" onclick="location.href='#';" class="button__social button__social--facebook"><i class="fab fa-facebook-f text-white"></i><span class="button__social-text">{{ __('lang.label.facebook') }}</span></button>
          <button :disabled="!terms || !dataAgreement" onclick="location.href='#';" class="button__social button__social--twitter"><i class="fab fa-twitter text-white"></i><span class="button__social-text">{{ __('lang.label.twitter') }}</span></button>
        </div>
      </div>
    </div>

    <div class="flex justify-center mt-10 sp:mt-7">
      <a class="link link--md" href="#">
        {{ __('lang.label.backToTop') }}
      </a>
    </div>
  </div>
</section>
@vite('resources/js/member/auth/signup.js')
@endsection