@extends('layouts.applicant.app')

@section('title', __('lang.title_pages.registration_completion'))
@include('layouts.applicant.header')

@section('content')
<section class="section">
  <div id='main_div' class="card card--account" v-clock>
    <h2 class="heading heading--underlined mb-14 text-center"> {{ __('lang.title_pages.registration_completion') }} </h2>
    <div class="progress" v-if="currentPage !== 5">
      <p class="progress__text"> {{ __('lang.label.registration_completion.progress_bar') }} @{{ currentPage }} / 4 {{ __('lang.label.registration_completion.progress_bar_1') }} </p>
      <div class="flex justify-end mb-[25px]">
        <div class="progress__bar-wrapper">
          <div v-bind:class="[progressBar, progressBarPercentage]"></div>
        </div>
      </div>
    </div>

    <div id='page_one' v-if="currentPage == 1">
      <form class="form mx-auto max-w-[800px]">
        <p class="form__text mb-[50px] sp:mb-[25px]">{{ __('lang.label.registration_completion.question_1') }}</p>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label items-start sp:items-center">{{ __('lang.label.my_page.gender') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div class="form__input-wrapper">
              @foreach($genders AS $gender)
              <div class="form__radio-wrapper sp:mb-3">
                <input class="form__radio" type="radio" :value="{{ $gender->id }}" v-model="input.gender">
                <label class="form__text-label cursor-pointer" for="radio1"> {{ $gender->gender }}</label>
              </div>
              @endforeach
            </div>
            <p class="form__error" v-if="errors && errors.gender">
              @{{ errors.gender['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.my_page.birthdate') }}
              <span style="color:red">*</span>
            </label>
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
                <select class="form__select mr-3" v-model='input.DOBday' name="day">
                  <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                  <option v-for="day in range(1, selectionDay)" :value="day">@{{day}}</option>
                </select>
                <label class="form__label" for="日">{{ __('lang.label.registration_completion.day') }}</label>
              </div>
            </div>
            <p class="form__error" v-if="errors && errors.dob_year">
              @{{ errors.dob_year['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.my_page.residence') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <select class="form__select" name="residence" v-model="input.residence">
              <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
              @foreach($perfectures AS $perf)
              <option value="{{$perf->id}}"> {{$perf->prefecture}}</option>
              @endforeach
            </select>
            <p class="form__error" v-if="errors && errors.residence">
              @{{ errors.residence['0'] }}
            </p>
          </div>
        </div>
        <div class="flex justify-center pt-3">
          <a class="button" v-on:click="next()">{{ __('lang.label.registration_completion.next') }}</a>
        </div>
      </form>
    </div>

    <div id='page_two' v-if="currentPage == 2">
      <form class="form mx-auto max-w-[800px]">
        <p class="form__text mb-[50px] sp:mb-[25px]"> {{ __('lang.label.registration_completion.question_2') }}</p>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.my_page.annual_salary') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <select class="form__select min-w-[160px]" name="annualSalary" v-model="input.salary">
              <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
              @foreach($salaries AS $salary)
              <option value="{{$salary->id}}"> {{$salary->salary}}</option>
              @endforeach
            </select>
            <p class="form__error" v-if="errors && errors.salary">
              @{{ errors.salary['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.school_type') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <select class="form__select min-w-[160px]" name="graduatedSchoolType" v-model="input.schoolType">
              <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
              @foreach($gradSchool AS $school)
              <option value="{{$school->id}}"> {{$school->graduation_school_type}}</option>
              @endforeach
            </select>
            <p class="form__error" v-if="errors && errors.school_type">
              @{{ errors.school_type['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.last_school') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <input class="form__input" type="text" placeholder="学校名を入力してください" v-model="input.lastSchool">
            <p class="form__error" v-if="errors && errors.last_school">
              @{{ errors.last_school['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.major') }}
              <span style="color:red">*</span> </label>
          </div>
          <div class="w-full">
            <input class="form__input" type="text" placeholder="学部・専攻を入力してください" v-model="input.major">
            <p class="form__error" v-if="errors && errors.major">
              @{{ errors.major['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.graduation_date') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div class="form__input-wrapper">
              <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                <select class="form__select mr-3" name="year" v-model="input.gradYear">
                  <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                  <option v-for="year in range(lastYear, currentYearOnly).reverse()" :value="year">@{{year}}</option>
                </select>
                <label class="form__label" for="年">{{ __('lang.label.registration_completion.year') }} </label>
              </div>
              <div class="flex items-center mr-[25px] mb-3 sp:mr-0 sp:w-full">
                <select class="form__select mr-3" name="month" v-model="input.gradMonth">
                  <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                  <option v-for="month in range(1, 12)" :value="month">@{{month}}</option>
                </select>
                <label class="form__label" for="月">{{ __('lang.label.registration_completion.month') }} </label>
              </div>
            </div>
            <p class="form__error" v-if="errors && errors.grad_year">
              @{{ errors.grad_year['0'] }}
            </p>
          </div>
        </div>
        <div class="flex justify-center sp:flex-col">
          <a class="button mr-20 sp:mr-0 sp:mb-3" v-on:click="previous()">{{ __('lang.label.registration_completion.back') }}</a>
          <a class="button" v-on:click="next()">{{ __('lang.label.registration_completion.next') }}</a>
        </div>
      </form>
    </div>

    <div id='page_three' v-if="currentPage == 3">
      <form class="form mx-auto max-w-[800px]" action="#">
        <p class="form__text mb-[50px] sp:mb-[25px]">{{ __('lang.label.registration_completion.question_3') }}</p>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label">{{ __('lang.label.registration_completion.company_name') }}</label>
          </div>
          <div class="w-full">
            <input class="form__input" type="text" placeholder="{{ __('lang.label.registration_completion.company_name_hint') }}" v-model="input.companyName">
            <div>
              <p class="form__error" v-if="errors && errors.company_name">
                @{{ errors.company_name['0'] }}
              </p>
            </div>
          </div>

        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label items-start sp:items-center">{{ __('lang.label.registration_completion.employment_status') }}</label>
          </div>
          <div class="w-full">
            <div class="form__input-wrapper">
              @foreach($employmentStatus AS $status)
              <div class="form__radio-wrapper sp:mb-3">
                <input class="form__radio" type="radio" :value="{{ $status->id }}" v-model="input.employementStatus">
                <label class="form__text-label cursor-pointer" for="radio1"> {{ $status->employment_status }}</label>
              </div>
              @endforeach
            </div>
            <p class="form__error" v-if="errors && errors.employment_status">
              @{{ errors.employment_status['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label">{{ __('lang.label.registration_completion.employment_period') }}</label>
          </div>
          <div class="w-full">
            <div class="form__input-wrapper items-center">
              <div class="flex items-center mr-[10px] sp:mb-3 sp:mr-0 sp:w-full">
                <select class="form__select mr-3" name="year" v-model="input.cmpGradYearFrom">
                  <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                  <option v-for="year in range(lastYear, currentYearOnly).reverse()" :value="year">@{{year}}</option>
                </select>
                <label class="form__label" for="年">{{ __('lang.label.registration_completion.year') }} </label>
              </div>
              <div class="flex items-center sp:mb-3 sp:w-full">
                <select class="form__select mr-3" name="month" v-model="input.cmpGradMonthFrom">
                  <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                  <option v-for="month in range(1, 12)" :value="month">@{{month}}</option>
                </select>
                <label class="form__label" for="月">{{ __('lang.label.registration_completion.month') }}</label>
              </div><span class="font-helvetica ml-1 mr-3 text-[29px] sp:mb-2 h-[40px]">~</span>
              <div class="flex items-center mr-[10px] sp:mb-3 sp:mr-0 sp:w-full">
                <select class="form__select mr-3" name="year" v-model="input.cmpGradYearTo">
                  <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                  <option v-for="year in range(lastYear, currentYearOnly).reverse()" :value="year">@{{year}}</option>
                </select>
                <label class="form__label" for="年">{{ __('lang.label.registration_completion.year') }} </label>
              </div>
              <div class="flex items-center mr-[10px] sp:mb-3 sp:mr-0 sp:w-full">
                <select class="form__select mr-3" name="month" v-model="input.cmpGradMonthTo">
                  <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                  <option v-for="month in range(1, 12)" :value="month">@{{month}}</option>
                </select>
                <label class="form__label" for="月">{{ __('lang.label.registration_completion.month') }}</label>
              </div>
            </div>
            <p class="form__error" v-if="errors && errors.cmp_year_from">
              @{{ errors.cmp_year_from['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label">{{ __('lang.label.registration_completion.occupation') }}</label>
          </div>
          <div class="w-full">
            <div class="flex items-center">
              <select class="form__select" name="occupation" v-model="input.occupation">
                <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                @foreach($occupationList AS $occupation)
                <option value="{{$occupation->id}}"> {{$occupation->occupation}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.occupation">
              @{{ errors.occupation['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label">{{ __('lang.label.registration_completion.position') }}</label>
          </div>
          <div class="w-full">
            <div class="flex items-center">
              <select class="form__select" name="position" v-model="input.position">
                <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                @foreach($positionList AS $position)
                <option value="{{$position->id}}"> {{$position->position}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.position">
              @{{ errors.position['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[20%]">
            <label class="form__label">{{ __('lang.label.registration_completion.job_description') }}</label>
          </div>
          <div class="w-full">
            <textarea class="form__textarea leading-normal" name="" cols="30" rows="8" placeholder="{{ __('lang.label.registration_completion.job_description_hint') }}" v-model="input.description"></textarea>
          </div>
        </div>
        <div class="flex justify-center sp:flex-col">
          <a class="button mr-20 sp:mr-0 sp:mb-3" v-on:click="previous()">{{ __('lang.label.registration_completion.back') }}</a>
          <a class="button" v-on:click="next()">{{ __('lang.label.registration_completion.next') }}</a>
        </div>
      </form>
    </div>

    <div id='page_four' v-if="currentPage == 4">
      <form class="form mx-auto max-w-[800px]" action="#">
        <p class="form__text mb-[50px] sp:mb-[25px]">{{ __('lang.label.registration_completion.question_4') }}</p>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.desired_job') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div>
              <select class="form__select" name="changeJobs" v-model="input.jbChangeJob">
                <option value=''>{{ __('lang.label.registration_completion.select') }}</option>
                @foreach($changeJobList AS $job)
                <option value="{{$job->id}}"> {{$job->jb_degree_name}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.jb_change_job">
              @{{ errors.jb_change_job['0'] }}
            </p>
          </div>
        </div>

        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label"> {{ __('lang.label.registration_completion.business_domain') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div>
              <select class="form__select" name="businessDomain" v-model="input.bussinessDomain">
                <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                @foreach($domainList AS $domain)
                <option value="{{$domain->id}}"> {{$domain->business_domain_name}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.business_domain">
              @{{ errors.business_domain['0'] }}
            </p>
          </div>
        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__text-label"> {{ __('lang.label.registration_completion.desired_occupation') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div>
              <select class="form__select" name="occupation" v-model="input.desiredOccupation">
                <option value=''> {{ __('lang.label.registration_completion.select') }} </option>
                @foreach($occupationList AS $occupation)
                <option value="{{$occupation->id}}"> {{$occupation->occupation}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.desired_occupation">
              @{{ errors.desired_occupation['0'] }}
            </p>
          </div>

        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label"> {{ __('lang.label.registration_completion.desired_residence') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div>
              <select class="form__select" name="jobPlace" v-model="input.desiredResidence">
                <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                @foreach($perfectures AS $perf)
                <option value="{{$perf->id}}"> {{$perf->prefecture}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.desired_residense">
              @{{ errors.desired_residense['0'] }}
            </p>
          </div>

        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.desired_salary') }}
              <span style="color:red">*</span>
            </label>
          </div>
          <div class="w-full">
            <div>
              <select class="form__select min-w-[160px]" name="desiredAnnualSalary" v-model="input.desiredSalary">
                <option value=''>{{ __('lang.label.registration_completion.select') }} </option>
                @foreach($salaries AS $salary)
                <option value="{{$salary->id}}"> {{$salary->salary}}</option>
                @endforeach
              </select>
            </div>
            <p class="form__error" v-if="errors && errors.desired_salary">
              @{{ errors.desired_salary['0'] }}
            </p>
          </div>

        </div>
        <div class="form__wrapper">
          <div class="flex items-center min-w-[25%]">
            <label class="form__label">{{ __('lang.label.registration_completion.work_condition') }}<br class="sp:hidden">{{ __('lang.label.registration_completion.work_condition_1') }}</label>
          </div>
          <div class="w-full">
            <div class="form__input-wrapper items-start">
              @foreach($conditionJobChangeList AS $condition)
              <div class="mr-4">
                <div class="form__check-wrapper mb-[16px]">
                  <input class="form__check form__check--secondary" id="{{ $condition['column'] }}" type="checkbox" value="{{ $condition['column'] }}" v-model="input.consideration">
                  <label class="form__text-label cursor-pointer" for="{{ $condition['column'] }}"> {{ __($condition['description']) }}</label>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="flex justify-center sp:flex-col">
          <a class="button mr-20 sp:mr-0 sp:mb-3" v-on:click="previous()">{{ __('lang.label.registration_completion.back') }}</a>
          <a class="button" v-on:click="next()">{{ __('lang.label.registration_completion.submit') }}</a>

        </div>
      </form>
    </div>

    <div id='page_completion' v-if="currentPage == 5">
      <div class="mx-auto max-w-[500px]">
        <p>{{ __('lang.label.registration_completion.completion_success') }} <br>{{ __('lang.label.registration_completion.completion_success_1') }}</p>
      </div>
      <div class="flex justify-center"><a class="link link--md mt-16 sp:mt-12" href="#"> {{ __('lang.label.backToTop') }}</a></div>
    </div>

  </div>
</section>

@vite('resources/js/member/registration/completion.js')
@endsection