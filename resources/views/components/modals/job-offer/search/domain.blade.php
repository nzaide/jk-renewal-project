<div class="modal" id="{{ $id }}" ref="{{ $id }}">
  <div class="modal__overlay" @click="closeAllModals()"></div>
  <div class="modal__content modal__content--lg">
    <div class="flex justify-end"><i class="modal__close block fa-solid fa-xmark" @click="closeAllModals()"></i></div>
    <div class="modal__header modal__header--gray">
      <h4 class="m-0">{{ __('lang.label.job_offer_search.add_industry') }}</h4>
    </div>
    <div class="form">
      <div class="flex">
        <div class="prefecture sp:block hidden overflow-hidden mb-2">
          <div class="prefecture__wrapper">
            <input ref="dropdown_domain" class="prefecture__check" id="domain1" type="checkbox" />
            <label class="prefecture__label bg-white" for="domain1">
              <span ref="current_domain">{{ $domains[0]->business_domain_name }}</span>
              <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow" />
            </label>
            <ul class="prefecture__list">
              @foreach ($domains as $domain)
                <li class="prefecture__item" ref="mobile_domains{{ $domain->id }}"
                  data-label="{{ $domain->business_domain_name }}" @click="selectDomain({{ $domain->id }})">
                  <input class="hidden" v-model="domain" name="domain" id="domain{{ $domain->id }}" type="radio"
                    value="{{ $domain->id }}" />
                  <label class="link" for="domain{{ $domain->id }}">
                    {{ $domain->business_domain_name }}
                  </label>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <ul class="modal__scrollbar h-[321px] mr-4 w-[48%] sp:w-[204px]">
          @foreach ($domains as $domain)
            <li class="modal__item domains" ref="main_dm{{ $domain->id }}"
              @click="selectDomain({{ $domain->id }})">
              <input class="hidden" v-model="domain" name="domain" id="domain{{ $domain->id }}" type="radio"
                value="{{ $domain->id }}" />
              <label class="cursor-pointer" for="domain{{ $domain->id }}">
                {{ $domain->business_domain_name }}
              </label>
            </li>
          @endforeach
        </ul>
        @php $counter = 0; @endphp
        @foreach ($domains as $domain)
          <div class="modal__blue domain @if ($counter != 0) hidden @endif"
            ref="domain{{ $domain->id }}">
            <div class="w-full">
              <div class="form__input-wrapper">
                @foreach ($domain->details as $detail)
                  <div class="form__check-wrapper w-[45.5%] sp:w-full">
                    <input v-model="temp_domains" class="form__check form__check--secondary"
                      id="domain_detail{{ $detail->id }}" type="checkbox" name="domain_details"
                      value="{{ $detail->business_domain_name }}" />
                    <label class="form__text-label cursor-pointer" for="domain_detail{{ $detail->id }}">
                      {{ $detail->business_domain_name }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          @php $counter++; @endphp
        @endforeach
      </div>
    </div>
    <div class="modal__button-wrapper modal__button-wrapper--confirmation">
      <button @click="setDomains" class="button w-full min-w-[237px] min-h-[57px] sp:min-w-full sp:min-h-[40px]"
        type="button">{{ __('lang.label.job_offer_search.industry_btn') }}</button>
    </div>
  </div>
</div>
