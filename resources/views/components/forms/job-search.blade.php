<div class="search__box js-search">
    <div class="search__title js-search-toggle">
        <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-search.svg') }}" alt="icon-search">
        <h2>{{ __('Search for Multilingual Jobs') }}</h2>
    </div>

    <form method="GET" action="{{ route('job-posts.search') }}" class="search__content">
        <div class="search__content-wrap">
            <div class="search__fields">
                <div class="search__input-wrap">
                    <div class="search__input">
                        <input type="text" name="q" class="form-control" placeholder="Keywords..."
                            value="{{ request('q') }}">
                    </div>

                    <div class="search__input has-icon">
                        <select name="la" class="custom-select">
                            <option value>{{ __('Language') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}" @selected(request('la')==$language->id)>
                                {{ $language->language }}
                            </option>
                            @endforeach
                        </select>

                        <div class="search__input-icon">
                            <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-lang.svg') }}"
                                alt="icon-lang">
                        </div>
                    </div>

                    <div class="search__input has-icon">
                        <select name="l" class="custom-select">
                            <option value>{{ __('Location') }}</option>
                            @foreach (\App\Enums\JobPostSearchLocations::cases() as $location)
                            <option value="{{ $location->value }}" @selected(request('l')==$location->value)>
                                {{ $location->value }}
                            </option>
                            @endforeach
                        </select>
                        <div class="search__input-icon"><img
                                src="{{ Vite::asset('resources/vendor/jk-network-static/img/icon/icon-loc-gray.svg') }}"
                                alt="icon-loc"></div>
                    </div>
                </div>
                <div class="search__input-wrap search__input-wrap--cbx">
                    <label class="search__cbx">
                        <input type="checkbox" name="t[]" value="1"
                            @checked(in_array(\App\Enums\JobPostTarget::Foreigner->value, request('t', [])))>
                        <span>{{ __(\App\Enums\JobPostTarget::Foreigner->text()) }}</span>
                    </label>

                    <label class="search__cbx">
                        <input type="checkbox" name="t[]" value="2"
                            @checked(in_array(\App\Enums\JobPostTarget::Multilingual->value, request('t', [])))>
                        <span>{{ __(\App\Enums\JobPostTarget::Multilingual->text()) }}</span>
                    </label>

                    <label class="search__cbx">
                        <input type="checkbox" name="t[]" value="3"
                            @checked(in_array(\App\Enums\JobPostTarget::Filipino->value, request('t', [])))>
                        <span>{{ __(\App\Enums\JobPostTarget::Filipino->text()) }}</span>
                    </label>

                    <a class="search__refer" href="{{ route('friend-referrals.create') }}">
                        {{ __('Refer A Friend') }}
                    </a>
                </div>
            </div>

            @if ($localeQueryParameter->value)
            <input type="hidden" name="{{ $localeQueryParameter->value }}">
            @endif

            <div class="search__submit">
                <button type="submit" class="button button--rounded fill-container">
                    {{ __('Search') }}
                </button>
            </div>
        </div>
    </form>
</div>