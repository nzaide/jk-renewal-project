@if ($paginator->hasPages())
  <div class="pagination">
    <ol class="pagination__list">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="pagination__item pagination__item--disabled" aria-disabled="true"
          aria-label="{{ __('lang.label.job_offer_search.prev') }}">
          <a class="pagination__link">
            <img class="pagination__icon pagination__icon--prev" src="{{ url('img/icon/arrow-white.svg') }}"
              alt="arrow">
            {{ __('lang.label.job_offer_search.prev') }}
          </a>
        </li>
      @else
        <li class="pagination__item">
          <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link"
            aria-label="{{ __('lang.label.job_offer_search.prev') }}">
            <img class="pagination__icon pagination__icon--prev" src="{{ url('img/icon/arrow.svg') }}"
              alt="arrow">
            {{ __('lang.label.job_offer_search.prev') }}
          </a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="pagination__item" aria-disabled="true">
            <span
              class="pagination__link">{{ $element }}</span>
          </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="pagination__item">
                <span class="pagination__link pagination__item--active">{{ $page }}</span>
              </li>
            @else
              <li class="pagination__item">
                <a href="{{ $url }}" class="pagination__link"
                  aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                  {{ $page }}
                </a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="pagination__item">
          <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link"
            aria-label="{{ __('lang.label.job_offer_search.next') }}">
            {{ __('lang.label.job_offer_search.next') }}
            <img class="pagination__icon" src="{{ url('img/icon/arrow-gray.svg') }}"
              alt="arrow">
          </a>
        </li>
      @else
        <li class="pagination__item pagination__item--disabled" aria-disabled="true"
          aria-label="{{ __('lang.label.job_offer_search.next') }}">
          <a class="pagination__link">
            {{ __('lang.label.job_offer_search.next') }}
            <img class="pagination__icon" src="{{ url('img/icon/arrow-gray.svg') }}"
              alt="arrow">
          </a>
        </li>
      @endif
    </ol>
  </div>
@endif