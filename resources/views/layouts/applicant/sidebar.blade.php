<aside class="sidebar">
  <div class="sidebar__card mb-5">
    <p class="sidebar__card-header">
      {{ __('lang.label.my_page.personal_settings') }}
    </p>
    <ul class="sidebar__list">
      <li class="sidebar__item">
        <a class="sidebar__link" href="#member_profile">
          <span>{{ __('lang.label.my_page.member_profile') }}</span>
          <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow">
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#detail_information_title">
          <span>{{ __('lang.label.my_page.detail_information_title') }}</span>
          <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow">
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#job_change_conditions">
          <span>{{ __('lang.label.my_page.job_change_conditions') }}</span>
          <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow">
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#site_notification_settings">
          <span>{{ __('lang.label.my_page.notification_settings') }}</span>
          <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow">
        </a>
      </li>
    </ul>
  </div>
  <ul class="sidebar__list sidebar__list--rounded">
    <li class="sidebar__item">
      <a class="sidebar__link" href="#">
        <span>{{ __('lang.label.top_page') }}</span>
        <img src="{{ url('img/icon/arrow.svg') }}" alt="arrow">
      </a>
    </li>
    <li class="sidebar__item">
      <a class="sidebar__link" href="#">
        <span>{{ __('lang.label.companies_page') }}</span>
        <img src="{{ url('img/icon/arrow.svg') }}" alt="arrow">
      </a>
    </li>
    <li class="sidebar__item">
      <a class="sidebar__link" href="#">
        <span>{{ __('lang.label.job_offers_page') }}</span>
        <img src="{{ url('img/icon/arrow.svg') }}" alt="arrow">
      </a>
    </li>
    <li class="sidebar__item">
      <a class="sidebar__link" href="#">
        <span>{{ __('lang.label.evaluation_management_page') }}</span>
        <img src="{{ url('img/icon/arrow.svg') }}" alt="arrow">
      </a>
    </li>
    <li class="sidebar__item">
      <a class="sidebar__link" href="#">
        <span>{{ __('lang.label.withdrawal_page') }}</span>
        <img src="{{ url('img/icon/arrow.svg') }}" alt="arrow">
      </a>
    </li>
  </ul>
</aside>