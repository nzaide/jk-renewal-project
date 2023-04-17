@extends('layouts.applicant.app')
@section('title', __('lang.label.my_page.title'))
@include('layouts.applicant.header')
@section('content')
<div class="section" id="member_profile">
  <div class="flex justify-between">
    <h2 class="heading">{{ __('lang.label.my_page.title') }}</h2>
    <a class="button button--with-icon" href="{{ route('members.edit') }}">
      <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
      {{ __('lang.label.my_page.to_edit') }}
    </a>
  </div>
  <div class="section__wrapper mt-10">
    <form class="form">
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.gender') }}</label>
        </div>
        <div class="w-full dash">
          <label class="form__label font-normal">{{ $user->sex->gender }}</label>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.birthdate') }}</label>
        </div>
        <div class="w-full dash">
          <label class="form__label font-normal">{{ $user->date_of_birth->format('Y年m月d日') }}</label>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.residence') }}</label>
        </div>
        <div class="w-full dash">
          <label class="form__label font-normal">{{ $user->residencePrefecture->prefecture }}</label>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.annual_salary') }}</label>
        </div>
        <div class="w-full dash">
          <label class="form__label font-normal">{{ $user->salary->salary }}</label>
        </div>
      </div>
    </form>
  </div>
  <div class="flex justify-between mt-10" id="detail_information_title">
    <h2 class="heading">{{ __('lang.label.my_page.detail_information_title') }}</h2>
  </div>
  <div class="card mt-10">
    <div class="card__header">
      <h2 class="card__heading">{{ __('lang.label.my_page.basic_information_title') }}</h2>
      <a class="button button--with-icon" href="{{ route('members.basic-info.edit') }}">
        <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
        {{ __('lang.label.my_page.to_edit') }}
      </a>
    </div>
    <div class="card__body">
      <div class="card__item">
        <form class="form" action="">
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.username') }}</label>
            </div>
            <div class="w-full dash">
              <label class="form__label font-normal">{{ $user->full_name }}</label>
            </div>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.furigana') }}</label>
            </div>
            <div class="w-full dash">
              <label class="form__label font-normal">{{ $user->furigana }}</label>
            </div>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.residence_address') }}</label>
            </div>
            <div class="w-full dash">
              <label class="form__label font-normal">{{ $user->residence_address }}</label>
            </div>
          </div>
          <div class="form__wrapper">
            <div class="flex items-center min-w-[25%]">
              <label class="form__label text-primary-gray">{{ __('lang.label.my_page.telephone') }}</label>
            </div>
            <div class="w-full dash">
              <label class="form__label font-normal">{{ $user->tel_with_type }}</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card mt-10">
    <div class="card__header">
      <h2 class="card__heading">{{ __('lang.label.my_page.educational_background_info') }}</h2>
      <a class="button button--with-icon" href="{{ route('members.academic-history.index') }}">
        <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
        {{ __('lang.label.my_page.to_edit') }}
      </a>
    </div>
    <div class="card__body">
      @forelse ($user->academicHistories as $academicHistory)
        <div class="card__item">
          <form class="form" action="">
            <div class="form__wrapper">
              <div class="flex items-center min-w-[25%]">
                <label class="form__label text-primary-gray">{{ $academicHistory->graduation_date }}</label>
              </div>
              <div class="w-full">
                <p class="form__label">
                  {{ $academicHistory->school_name }}<span class="font-normal text-primary-gray ml-1">({{ $academicHistory->graduationSchoolType->graduation_school_type }})</span>
                </p>
                <p class="text-primary-gray">{{ __('lang.label.my_page.majoring').' '.$academicHistory->majoring }}</p>
              </div>
            </div>
          </form>
        </div>
      @empty
        <div class="card__item text-center">
          {{ __('lang.label.no_data_available') }}
        </div>
      @endforelse
    </div>
  </div>
  <div class="card mt-10">
    <div class="card__header">
      <h2 class="card__heading">{{ __('lang.label.my_page.job_history_info') }}</h2>
      <a class="button button--with-icon" href="#">
        <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
        {{ __('lang.label.my_page.to_edit') }}
      </a>
    </div>
    <div class="card__body">
      @forelse ($user->employmentHistories as $employmentHistory)
        <div class="card__item">
          <form class="form" action="">
            <div class="form__wrapper">
              <div class="flex items-center min-w-[25%]">
                <p class="form__label text-primary-gray">{{ $employmentHistory->employment_period }}</p>
              </div>
              <div class="w-full dash pb-2.5">
                <p class="card__title no-underline">{{ $employmentHistory->company->company_name }}</p>
                <div class="card__corporation-details pb-2.5">
                  <div class="flex-center-layout mr-4"><img class="card__icon" src="{{ url('img/icon/map.svg') }}" alt="map">
                    <p class="card__corporation-text">{{ $employmentHistory->company->prefecture->prefecture }}</p>
                  </div>
                  <div class="flex-center-layout"><img class="card__icon" src="{{ url('img/icon/building.svg') }}" alt="map">
                    <p class="card__corporation-text">{{ $employmentHistory->company->businessDomain->business_domain_name }}</p>
                  </div>
                </div>
                <p class="card__title no-underline text-primary-gray font-normal">
                  {{ $employmentHistory->employmentOccupation->occupation.': '.$employmentHistory->employmentPosition->position }}
                </p>
                <p class="text-primary-gray">
                  {{ $employmentHistory->job_details }}
                </p>
              </div>
            </div>
          </form>
        </div>
      @empty
        <div class="card__item text-center">
          {{ __('lang.label.no_data_available') }}
        </div>
      @endforelse
    </div>
  </div>
  <div class="card mt-10">
    <div class="card__header">
      <h2 class="card__heading">{{ __('lang.label.my_page.qualifications_skills') }}</h2>
      <a class="button button--with-icon" href="{{ route('members.edit.qualification') }}">
        <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
        {{ __('lang.label.my_page.to_edit') }}
      </a>
    </div>
    <div class="card__body">
      @forelse ($user->skills as $skill)
        <div class="card__item">
          <form class="form">
            <div class="form__wrapper">
              <div class="flex items-center min-w-[25%]">
                <label class="form__label text-primary-gray uppercase">{{ $skill->skill_name }}</label>
              </div>
              <div class="w-full dash">
                <label class="form__label font-normal">{{ $skill->skill_details }}</label>
              </div>
            </div>
          </form>
        </div>
      @empty
        <div class="card__item text-center">
          {{ __('lang.label.no_data_available') }}
        </div>
      @endforelse
    </div>
  </div>
  <div class="flex justify-between mt-10" id="job_change_conditions">
    <h2 class="heading">{{ __('lang.label.my_page.job_change_conditions') }}</h2>
    <a class="button button--with-icon" href="{{ route('members.jobChangeCondition.show', auth()->id()) }}">
      <img class="mr-2" src="{{ url('img/icon/pen.svg') }}" alt="edit">
      {{ __('lang.label.my_page.to_edit') }}
    </a>
  </div>
  <div class="section__wrapper mt-10">
    <form class="form">
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.desire_to_change_jobs') }}</label>
        </div>
        <div class="w-full dash">
          <p class="form__label font-normal">{{ $user->jobChangeCondition->degree->jb_degree_name }}</p>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.desired_business_domain') }}</label>
        </div>
        <div class="w-full dash">
          <p class="form__label font-normal">{{ $user->jobChangeCondition->businessDomain->business_domain_name }}</p>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.desired_occupation') }}</label>
        </div>
        <div class="w-full dash">
          <p class="form__label font-normal">{{ $user->jobChangeCondition->jobChangeOccupation->occupation }}</p>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.desired_job_location') }}</label>
        </div>
        <div class="w-full dash">
          <p class="form__label font-normal">{{ $user->jobChangeCondition->place->prefecture }}</p>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.desired_annual_income') }}</label>
        </div>
        <div class="w-full dash">
          <p class="form__label font-normal">{{ $user->jobChangeCondition->salary->salary }}</p>
        </div>
      </div>
      <div class="form__wrapper">
        <div class="flex items-center min-w-[25%]">
          <label class="form__label text-primary-gray">
            {{ __('lang.label.my_page.desired_attributes') }}
          </label>
        </div>
        <div class="w-full dash flex flex-wrap min-h-[48px]">
          @for ($ctr = 0; $ctr <= 9; $ctr++)
            @if ($user->jobChangeCondition['jc_attribute'.$ctr])
              <button class="button button--with-icon mr-2 mb-2" disabled>
                {{ __($attributes[$ctr-1]['description']) }}
              </button>
            @endif
          @endfor
        </div>
      </div>
    </form>
  </div>
  <div class="flex justify-between mt-10" id="site_notification_settings">
    <h2 class="heading">{{ __('lang.label.my_page.notification_settings') }}</h2>
  </div>
  <div class="section__wrapper mt-10">
    <form class="form">
      <div class="form__wrapper">
        <div class="flex items-center min-w-[45%]">
          <label class="form__label text-primary-gray">{{ __('lang.label.my_page.site_notification_settings') }}</label>
        </div>
        <div class="w-full">
          <div class="form__toggle-wrapper">
            <input class="form__toggle" id="toggle_button" type="checkbox" v-model="checkedValue" @if ($user->notification_flg) checked @endif>
            <span class="toggle__switch"></span>

            <label for="toggle_button">
              <span v-if="isActive" class="toggle__label"> ON</span>
              <span v-if="!isActive" class="toggle__label"> OFF</span>
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@include('layouts.applicant.sidebar')
@vite('resources/js/member/show.js')
@endsection