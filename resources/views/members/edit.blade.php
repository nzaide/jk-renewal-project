@extends('layouts.applicant.app')
@section('title', __('lang.label.my_page.title'))
@include('layouts.applicant.header')
@section('content')
<div class="content-wrapper content-wrapper--with-sidebar">
  <div class="main-wrapper">
    <section class="section sp:mb-8">
      <div class="flex justify-between">
        <h2 class="heading heading--underlined">{{ __('lang.label.my_page.title') }}</h2>
      </div>
      <div class="section__wrapper mt-10">
        <form class="form">
          @method('PUT')
          @csrf
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.gender') }}</label>
            </div>
            <div class="w-full">
              <div class="form__input-wrapper">
                @foreach($genders as $gender)
                <div class="form__radio-wrapper sp:mb-3">
                  <input class="form__radio" type="radio" id="gender{{ $gender->id }}" :value="{{ $gender->id }}" v-model="input.gender">
                  <label class="form__text-label cursor-pointer" for="gender{{ $gender->id }}"> {{ $gender->gender }}</label>
                </div>
                @endforeach
              </div>
            </div>
            <p class="form__error" v-if="errors && errors.gender">
              @{{ errors.gender['0'] }}
            </p>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label">{{ __('lang.label.my_page.birthdate') }}</label>
            </div>
            <div class="w-full">
              <div class="form__input-wrapper">
                <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                  <select class="form__select mr-3" v-model="input.DOByear" @change="updateDateSelection()">
                    <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                    <option v-for="year in range(lastYear, currentYear).reverse()" :value="year">@{{year}}</option>
                  </select>
                  <label class="form__label" for="年">{{ __('lang.label.registration_completion.year') }} </label>
                </div>
                <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                  <select class="form__select mr-3" v-model='input.DOBmonth' @change="updateDateSelection()">
                    <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                    <option v-for="month in range(1, 12)" :value="month">@{{month}}</option>
                  </select>
                  <label class="form__label" for="月">{{ __('lang.label.registration_completion.month') }}</label>
                </div>
                <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                  <select class="form__select mr-3" v-model='input.DOBday'>
                    <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                    <option v-for="day in range(1, selectionDay)" :value="day">@{{day}}</option>
                  </select>
                  <label class="form__label" for="日">{{ __('lang.label.registration_completion.day') }}</label>
                </div>
              </div>
            </div>
            <div class="">
              <p class="form__error" v-if="errors && errors.date_of_birth">
                @{{ errors.date_of_birth['0'] }}
              </p>
            </div>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.residence') }}</label>
            </div>
            <div class="w-full">
              <div class="form__input-wrapper">
                <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                  <select class="form__select" v-model="input.residence_prefecture">
                    <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                    @foreach ($prefectures as $prefecture)
                    <option :value="{{ $prefecture->id }}" <?= $user->residence_prefecture == $prefecture->id ? 'selected' : '' ?> >{{ $prefecture->prefecture }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <p class="form__error" v-if="errors && errors.residence_prefecture">
                @{{ errors.residence_prefecture['0'] }}
              </p>
            </div>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.annual_salary') }}</label>
            </div>
            <div class="w-full">
              <div class="form__input-wrapper">
                <select class="form__select max-w-[250px]" v-model="input.current_salary">
                  <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                  @foreach ($salaries as $salary)
                  <option :value="{{ $salary->id }}" <?= $user->current_salary == $salary->id ? 'selected' : '' ?>>{{ $salary->salary }}</option>
                  @endforeach
                </select>
              </div>
              <p class="form__error" v-if="errors && errors.current_salary">
                @{{ errors.current_salary['0'] }}
              </p>
            </div>
          </div>
          <div class="flex justify-center sp:flex-col">
            <a class="button button--gray mr-14 sp:mb-2 sp:mr-0" href="#">{{ __('lang.label.cancel') }}</a>
            <button type="button" @click="submitEdit" class="button sp:mb-2"> {{ __('lang.label.update') }}</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
@push('custom-scripts')
@vite('resources/js/member/edit.js')
@endpush
@include('layouts.applicant.sidebar')
@endsection