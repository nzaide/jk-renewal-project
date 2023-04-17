<div class="modal" id="{{ $id }}" ref="{{ $id }}">
    <div class="modal__overlay" @click="closeAllModals()"></div>
    <div class="modal__content modal__content--lg">
      <div class="flex justify-end"><i class="modal__close block fa-solid fa-xmark" @click="closeAllModals()"></i></div>
      <div class="modal__header modal__header--gray">
        <h4 class="m-0">{{ __('lang.label.job_offer_search.add_job_title') }}</h4>
      </div>
      <div class="form">
        <div class="flex">
          <div class="prefecture sp:block hidden overflow-hidden mb-2">
            <div class="prefecture__wrapper">
              <input ref="dropdown_occupation" class="prefecture__check" id="occupation1" type="checkbox"/>
              <label class="prefecture__label bg-white" for="occupation1">
                <span ref="current_occupation">{{ $occupations[0]->occupation }}</span>
                <img src="{{ url('img/icon/arrow-gray.svg') }}" alt="arrow"/>
              </label>
              <ul class="prefecture__list">
                @foreach ($occupations as $occupation)
                  <li class="prefecture__item" ref="mobile_occupations{{$occupation->id}}" data-label="{{ $occupation->occupation }}" @click="selectOccupation({{ $occupation->id }})">
                    <input class="hidden" v-model="occupation" name="occupation" id="occupation{{ $occupation->id }}" type="radio"
                      value="{{ $occupation->id }}" />
                    <label class="link" for="occupation{{ $occupation->id }}">
                      {{ $occupation->occupation }}
                    </label>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          <ul class="modal__scrollbar h-[321px] mr-4 w-[48%] sp:w-[204px]">
            @foreach ($occupations as $occupation)
              <li class="modal__item occupations" ref="main_oc{{ $occupation->id }}" @click="selectOccupation({{ $occupation->id }})">
                <input class="hidden" v-model="occupation" name="occupation" id="occupation{{ $occupation->id }}" type="radio"
                  value="{{ $occupation->id }}" />
                <label class="cursor-pointer" for="occupation{{ $occupation->id }}">
                  {{ $occupation->occupation }}
                </label>
              </li>
            @endforeach
          </ul>
          @php $counter = 0; @endphp
          @foreach ($occupations as $occupation)
            <div class="modal__blue occupation @if ($counter != 0) hidden @endif"
              ref="occupation{{ $occupation->id }}">
              <div class="w-full">
                <div class="form__input-wrapper">
                  @foreach ($occupation->occupationDetails as $detail)
                    <div class="form__check-wrapper w-[48%] sp:w-full">
                      <input v-model="temp_occupations" class="form__check form__check--secondary"
                        id="occupation_detail{{ $detail->id }}" type="checkbox" name="occupation_details"
                        value="{{ $detail->occupation_detail_name }}" />
                      <label class="form__text-label cursor-pointer" for="occupation_detail{{ $detail->id }}">
                        {{ $detail->occupation_detail_name }}
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
        <button @click="setOccupations" class="button w-full min-w-[237px] min-h-[57px] sp:min-w-full sp:min-h-[40px]"
          type="button">{{ __('lang.label.job_offer_search.job_title_btn') }}</button>
      </div>
    </div>
  </div>
  