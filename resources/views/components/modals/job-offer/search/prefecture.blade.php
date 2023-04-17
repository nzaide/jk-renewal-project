<div class="modal" id="{{ $id }}" ref="{{ $id }}">
  <div class="modal__overlay" @click="closeAllModals()"></div>
  <div class="modal__content modal__content--lg">
    <div class="flex justify-end"><i class="modal__close block fa-solid fa-xmark" @click="closeAllModals()"></i></div>
    <div class="modal__header modal__header--gray">
      <h4 class="m-0">{{ __('lang.label.job_offer_search.add_duty') }}</h4>
    </div>
    <div class="form">
      <div class="flex sp:flex-col">
        <div class="prefecture sp:block hidden overflow-hidden mb-2">
          <div class="prefecture__wrapper">
            <input ref="dropdown_prefecture" class="prefecture__check" id="prefecture1" type="checkbox"/>
            <label class="prefecture__label bg-white" for="prefecture1">
              <span ref="current_region">{{ $regions[0]->prefecture_region }}</span>
              <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow"/>
            </label>
            <ul class="prefecture__list">
              @foreach ($regions as $region)
                <li class="prefecture__item" ref="mobile_prefectures{{$region->id}}" data-label="{{ $region->prefecture_region }}" @click="selectRegion({{ $region->id }})">
                  <input class="hidden" v-model="region" name="region" id="region_sp{{ $region->id }}" type="radio"
                    value="{{ $region->id }}" />
                  <label class="link" for="region_sp{{ $region->id }}">
                    {{ $region->prefecture_region }}
                  </label>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <ul class="modal__scrollbar h-[321px] mr-4 w-[48%] sp:hidden overflow-auto">
          @foreach ($regions as $region)
            <li class="modal__item regions" ref="main{{ $region->id }}" @click="selectRegion({{ $region->id }})">
              <input class="hidden" v-model="region" name="region" id="region{{ $region->id }}" type="radio"
                value="{{ $region->id }}" />
              <label class="cursor-pointer" for="region{{ $region->id }}">
                {{ $region->prefecture_region }}
              </label>
            </li>
          @endforeach
        </ul>
        @php $counter = 0; @endphp
        @foreach ($regions as $region)
          <div class="modal__blue prefecture @if ($counter != 0) hidden @endif"
            ref="region{{ $region->id }}">
            <div class="w-full">
              <div class="form__input-wrapper">
                @foreach ($region->prefectures as $prefecture)
                  <div class="form__check-wrapper w-[27%] sp:w-full">
                    <input v-model="temp_prefectures" class="form__check form__check--secondary"
                      id="prefecture{{ $prefecture->id }}" type="checkbox" name="prefectures"
                      value="{{ $prefecture->prefecture }}" />
                    <label class="form__text-label cursor-pointer" for="prefecture{{ $prefecture->id }}">
                      {{ $prefecture->prefecture }}
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
      <button @click="setPrefectures" class="button w-full min-w-[237px] min-h-[57px] sp:min-w-full sp:min-h-[40px]"
        type="button">{{ __('lang.label.job_offer_search.duty_btn') }}</button>
    </div>
  </div>
</div>
