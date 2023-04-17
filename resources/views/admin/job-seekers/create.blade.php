@extends('layouts.admin.app')

@section('content')
<div class="mx-5">
    @if(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
</div>
<form action="{{ route('admin.job-seekers.store') }}" method="POST">
    @csrf
    <div class="card mx-5">
        <div class="card-body">
            <h5 class="card-title">{{ __('Add jobseeker') }}</h5>
            <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Date interviewed') }} <i class="text-danger">*</i></label>
                            <input type="text" name="interview_date" value="{{ old('interview_date') }}" class="form-control flatpickr">
                            @error("interview_date")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Job posting') }} <i class="text-danger">*</i></label>
                            <input type="text" name="job_posting" value="{{ old('job_posting') }}" class="form-control">
                            @error("job_posting")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Name') }} <i class="text-danger">*</i></label>
                            <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control">
                            @error("fullname")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('English Name') }}</label>
                            <input type="text" name="english_name" value="{{ old('english_name') }}" class="form-control">
                            @error("english_name")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Gender') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="gender">
                                    <option value=""></option>
                                    @foreach (\App\Enums\Gender::cases() as $gender)
                                    <option value="{{ $gender->value }}" @selected($gender->value == old('gender'))>
                                        {{ $gender->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("gender")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Birth date') }} <i class="text-danger">*</i></label>
                            <input type="text" name="birth_date" value="{{ old('birth_date') }}" class="form-control flatpickr">
                            @error("birth_date")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Location Philippines') }} <i class="text-danger">*</i></label>
                            <select
                                class="selectpicker form-control"
                                name="location_philippines[]"
                                multiple
                                data-live-search="true"
                                data-show-tick="true"
                            >
                                @foreach ($phLocations as $phLocation)
                                <option value="{{ $phLocation->id }}" @selected(in_array($phLocation->id, old('location_philippines', [])))>
                                    {{ $phLocation->location }}
                                </option>
                                @endforeach
                            </select>
                            @error("location_philippines")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Location Abroad') }}</label>
                            <select
                                class="selectpicker form-control"
                                name="location_abroad[]"
                                multiple
                                data-live-search="true"
                                data-show-tick="true"
                            >
                                @foreach ($abLocations as $abLocation)
                                <option value="{{ $abLocation->id }}" @selected(in_array($abLocation->id, old('location_abroad', [])))>
                                    {{ $abLocation->location }}
                                </option>
                                @endforeach
                            </select>
                            @error("location_abroad")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Marital status') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="marital_status">
                                    <option value=""></option>
                                    @foreach (\App\Enums\MaritalStatus::cases() as $maritalStatus)
                                    <option value="{{ $maritalStatus->value }}" @selected($maritalStatus->value == old('marital_status'))>
                                        {{ $maritalStatus->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("marital_status")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Visa type') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="visa_id">
                                    <option value=""></option>
                                    @foreach (\App\Enums\Visa::cases() as $visa)
                                    <option value="{{ $visa->value }}" @selected($visa->value == old('visa_id'))>
                                        {{ $visa->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("visa_id")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Nationality') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="nationality_id">
                                    <option value=""></option>
                                    @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}" @selected($nationality->id == old('nationality_id'))>
                                        {{ $nationality->nationality }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("nationality_id")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('English fluency') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="english_fluency">
                                    <option value=""></option>
                                    @foreach (\App\Enums\EnglishFluency::cases() as $fluency)
                                    <option value="{{ $fluency->value }}" @selected($fluency->value == old('english_fluency'))>
                                        {{ $fluency->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("english_fluency")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Languages 1st') }} <i class="text-danger">*</i></label>
                            <div>
                                <select
                                    class="selectpicker form-control mw-100"
                                    name="language_first"
                                    data-live-search="true"
                                    data-show-content="false"
                                    data-show-tick="true"
                                >
                                    <option value=""></option>
                                    @foreach ($languages as $language)
                                    @php
                                    switch ($language->language) {
                                        case 'Japanese':
                                            $fluencies = \App\Enums\JapaneseFluency::cases();
                                            break;
                                        case 'Korean':
                                            $fluencies = \App\Enums\KoreanFluency::cases();
                                            break;
                                        case 'Mandarin':
                                            $fluencies = \App\Enums\MandarinFluency::cases();
                                            break;
                                        default:
                                            $fluencies = \App\Enums\OtherFluency::cases();
                                            break;
                                    }
                                    @endphp
                                    <optgroup>
                                        <option
                                            value="{{ $language->id . ',0' }}"
                                            class="ml-n2"
                                            @selected($language->id . ',0' == old('language_first'))
                                        >
                                            {{ $language->language }}
                                        </option>
                                        @foreach ($fluencies as $fluency)
                                        <option
                                            value="{{ $language->id . ',' . $fluency->value }}"
                                            data-content="{{ $fluency->text() }}<span class='d-none'>{{ $language->language }}</span>"
                                            @selected($language->id . ',' . $fluency->value == old('language_first'))
                                        >
                                            {{ $language->language . ': ' . $fluency->text() }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            @error("language_first_id")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @if (!$errors->first('language_first_id') && $errors->first('language_first_fluency'))
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($errors->first('language_first_fluency')) }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Languages 2nd') }}</label>
                            <div>
                                <select
                                    class="selectpicker form-control mw-100"
                                    name="language_second"
                                    data-live-search="true"
                                    data-show-content="false"
                                    data-show-tick="true"
                                >
                                    <option value="0,0"></option>
                                    @foreach ($languages as $language)
                                    @php
                                    switch ($language->language) {
                                        case 'Japanese':
                                            $fluencies = \App\Enums\JapaneseFluency::cases();
                                            break;
                                        case 'Korean':
                                            $fluencies = \App\Enums\KoreanFluency::cases();
                                            break;
                                        case 'Mandarin':
                                            $fluencies = \App\Enums\MandarinFluency::cases();
                                            break;
                                        default:
                                            $fluencies = \App\Enums\OtherFluency::cases();
                                            break;
                                    }
                                    @endphp
                                    <optgroup>
                                        <option
                                            value="{{ $language->id . ',0' }}"
                                            class="ml-n2"
                                            @selected($language->id . ',0' == old('language_second'))
                                        >
                                            {{ $language->language }}
                                        </option>
                                        @foreach ($fluencies as $fluency)
                                        <option
                                            value="{{ $language->id . ',' . $fluency->value }}"
                                            data-content="{{ $fluency->text() }}<span class='d-none'>{{ $language->language }}</span>"
                                            @selected($language->id . ',' . $fluency->value == old('language_second'))
                                        >
                                            {{ $language->language . ': ' . $fluency->text() }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            @error("language_second_id")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_second_fluency")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Languages 2nd Skills') }}</label>
                            <div>
                                <select
                                    class="selectpicker w-100"
                                    name="language_second_skills[]"
                                    multiple
                                    data-show-content="false"
                                >
                                    <optgroup label="Speaking">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 's,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Speaking</span>"
                                            @selected(in_array('s,' . $i, old('language_second_skills', [])))
                                        >
                                            {{ 'Speaking: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                    <optgroup label="Reading">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 'r,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Reading</span>"
                                            @selected(in_array('r,' . $i, old('language_second_skills', [])))
                                        >
                                            {{ 'Reading: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                    <optgroup label="Writing">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 'w,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Writing</span>"
                                            @selected(in_array('w,' . $i, old('language_second_skills', [])))
                                        >
                                            {{ 'Writing: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                </select>
                            </div>
                            @error("language_second_speaking")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_second_reading")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_second_writing")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Languages 3rd') }}</label>
                            <div>
                                <select
                                    class="selectpicker form-control mw-100"
                                    name="language_third"
                                    data-live-search="true"
                                    data-show-content="false"
                                    data-show-tick="true"
                                >
                                    <option value="0,0"></option>
                                    @foreach ($languages as $language)
                                    @php
                                    switch ($language->language) {
                                        case 'Japanese':
                                            $fluencies = \App\Enums\JapaneseFluency::cases();
                                            break;
                                        case 'Korean':
                                            $fluencies = \App\Enums\KoreanFluency::cases();
                                            break;
                                        case 'Mandarin':
                                            $fluencies = \App\Enums\MandarinFluency::cases();
                                            break;
                                        default:
                                            $fluencies = \App\Enums\OtherFluency::cases();
                                            break;
                                    }
                                    @endphp
                                    <optgroup>
                                        <option
                                            value="{{ $language->id . ',0' }}"
                                            class="ml-n2"
                                            @selected($language->id . ',0' == old('language_third'))
                                        >
                                            {{ $language->language }}
                                        </option>
                                        @foreach ($fluencies as $fluency)
                                        <option
                                            value="{{ $language->id . ',' . $fluency->value }}"
                                            data-content="{{ $fluency->text() }}<span class='d-none'>{{ $language->language }}</span>"
                                            @selected($language->id . ',' . $fluency->value == old('language_third'))
                                        >
                                            {{ $language->language . ': ' . $fluency->text() }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            @error("language_third_id")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_third_fluency")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Languages 3rd Skills') }}</label>
                            <div>
                                <select
                                    class="selectpicker w-100"
                                    name="language_third_skills[]"
                                    multiple
                                    data-show-content="false"
                                >
                                    <optgroup label="Speaking">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 's,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Speaking</span>"
                                            @selected(in_array('s,' . $i, old('language_third_skills', [])))
                                        >
                                            {{ 'Speaking: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                    <optgroup label="Reading">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 'r,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Reading</span>"
                                            @selected(in_array('r,' . $i, old('language_third_skills', [])))
                                        >
                                            {{ 'Reading: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                    <optgroup label="Writing">
                                        @for ($i = 1; $i <= 10; $i++)
                                        <option
                                            value="{{ 'w,' . $i }}"
                                            data-content="{{ $i }}<span class='d-none'>Writing</span>"
                                            @selected(in_array('w,' . $i, old('language_third_skills', [])))
                                        >
                                            {{ 'Writing: ' . $i }}
                                        </option>
                                        @endfor
                                    </optgroup>
                                </select>
                            </div>
                            @error("language_third_speaking")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_third_reading")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @error("language_third_writing")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Profile or Background') }}</label>
                            <textarea name="profile" class="form-control">{{ old('profile') }}</textarea>
                            @error("profile")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Contact number') }} <i class="text-danger">*</i></label>
                            <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control">
                            @error("contact_number")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Email Address') }} <i class="text-danger">*</i></label>
                            <input type="text" name="mail_address" value="{{ old('mail_address') }}" class="form-control">
                            @error("mail_address")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Password') }} <i class="text-danger">*</i></label>
                            <input type="password" name="password" class="form-control form-control-prepend">
                            @error("password")
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6"></div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Confirm password') }} <i class="text-danger">*</i></label>
                            <input type="password" name="password_confirmation" class="form-control form-control-prepend">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Landline number') }}</label>
                            <input type="text" name="landline" value="{{ old('landline') }}" class="form-control">
                            @error("landline")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Social media and other account') }}</label>
                            <input type="text" name="social_media" value="{{ old('social_media') }}" class="form-control">
                            @error("social_media")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Other contact details') }} <i class="text-danger">*</i></label>
                            <textarea name="other_contact" class="form-control">{{ old('other_contact') }}</textarea>
                            @error("other_contact")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Highest educational level') }} <i class="text-danger">*</i></label>
                            <div>
                                <select
                                    class="selectpicker w-100"
                                    name="education"
                                    data-show-content="false"
                                    data-show-tick="true"
                                >
                                    <option value=""></option>
                                    @foreach (\App\Enums\HighestDegree::cases() as $highestDegree)
                                    @php
                                    switch ($highestDegree->value) {
                                        case \App\Enums\HighestDegree::Graduate->value:
                                            $levels = \App\Enums\GraduateLevel::cases();
                                            break;
                                        case \App\Enums\HighestDegree::Undergraduate->value:
                                            $levels = \App\Enums\UndergraduateLevel::cases();
                                            break;
                                        case \App\Enums\HighestDegree::Highschool->value:
                                            $levels = \App\Enums\HighschoolLevel::cases();
                                            break;
                                        default:
                                            $levels = null;
                                    }
                                    @endphp
                                    @if ($levels)
                                    <optgroup label="{{ $highestDegree->text() }}">
                                        @foreach ($levels as $level)
                                        <option
                                            value="{{ $highestDegree->value . ',' . $level->value }}"
                                            data-content="{{ $level->text() }}<span class='d-none'>{{ $highestDegree->text() }}</span>"
                                            @selected($highestDegree->value . ',' . $level->value == old('education'))
                                        >
                                            {{ $highestDegree->text() . ': ' . $level->text() }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @else
                                    <option
                                        value="{{ $highestDegree->value . ',0' }}"
                                        data-content="{{ $highestDegree->text() }}"
                                        @selected($highestDegree->value . ',0' == old('education'))
                                    >
                                        {{ $highestDegree->text() }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @error("highest_degree")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                            @if (!$errors->first('highest_degree') && $errors->first('education_level'))
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($errors->first('education_level')) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Status of employment') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="employment_status">
                                    <option value=""></option>
                                    @foreach (\App\Enums\EmploymentStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected($status->value == old('employment_status'))>
                                        {{ $status->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("employment_status")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Major in University') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="university_major">
                                    <option value=""></option>
                                    @foreach (\App\Enums\UniversityMajor::cases() as $major)
                                    <option value="{{ $major->value }}" @selected($major->value == old('university_major'))>
                                        {{ $major->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("university_major")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Present employer/Latest employer') }} <i class="text-danger">*</i></label>
                            <input type="text" name="present_employer" value="{{ old('present_employer') }}" class="form-control">
                            @error("present_employer")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Industry') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="selectpicker w-100" name="industry_ids[]" multiple data-live-search="true">
                                    @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}" @selected(in_array($industry->id, old('industry_ids', [])))>
                                        {{ $industry->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("industry_ids")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Field and Job Title') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="selectpicker w-100" name="job_field_ids[]" multiple data-live-search="true">
                                    @foreach ($jobFields as $jobField)
                                    <option value="{{ $jobField->id }}" @selected(in_array($jobField->id, old('job_field_ids', [])))>
                                        {{ $jobField->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("job_field_ids")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Licenses / Certificate') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="selectpicker w-100" name="license_ids[]" multiple data-live-search="true">
                                    @foreach ($licenses as $license)
                                    <option value="{{ $license->id }}" @selected(in_array($license->id, old('license_ids', [])))>
                                        {{ $license->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("license_ids")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Availability to start') }} <i class="text-danger">*</i></label>
                            <input type="text" name="start_availability" value="{{ old('start_availability') }}" class="form-control">
                            @error("start_availability")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Current salary') }} <i class="text-danger">*</i></label>
                            <input type="text" name="current_salary" value="{{ old('current_salary') }}" class="form-control">
                            @error("current_salary")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Availability to have an interview') }} <i class="text-danger">*</i></label>
                            <input type="text" name="interview_availability" value="{{ old('interview_availability') }}" class="form-control">
                            @error("interview_availability")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Reason for leaving') }} <i class="text-danger">*</i></label>
                            <input type="text" name="resignation_reason" value="{{ old('resignation_reason') }}" class="form-control">
                            @error("resignation_reason")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Expected salary') }} <i class="text-danger">*</i></label>
                            <input type="text" name="expected_salary" value="{{ old('expected_salary') }}" class="form-control">
                            @error("expected_salary")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Pending application') }} <i class="text-danger">*</i></label>
                            <input type="text" name="pending_application" value="{{ old('pending_application') }}" class="form-control">
                            @error("pending_application")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Preferred shift') }} <i class="text-danger">*</i></label>
                            <input type="text" name="preferred_shift" value="{{ old('preferred_shift') }}" class="form-control">
                            @error("preferred_shift")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Preferred Employment') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="form-control" name="preferred_employment">
                                    <option value=""></option>
                                    @foreach (\App\Enums\EmploymentType::cases() as $type)
                                    <option value="{{ $type->value }}" @selected($type->value == old('preferred_employment'))>
                                        {{ $type->text() }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("preferred_employment")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Preferred jobs') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="selectpicker w-100" name="job_ids[]" multiple data-live-search="true">
                                    @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}" @selected(in_array($job->id, old('job_ids', [])))>
                                        {{ $job->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("job_ids")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Preferred location') }} <i class="text-danger">*</i></label>
                            <div>
                                <select class="selectpicker w-100" name="other_tag_ids[]" multiple data-live-search="true">
                                    @foreach ($otherTags as $otherTag)
                                    <option value="{{ $otherTag->id }}" @selected(in_array($otherTag->id, old('other_tag_ids', [])))>
                                        {{ $otherTag->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error("other_tag_ids")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Reactivation Date') }}</label>
                            <input type="text" name="reactivation_date" value="{{ old('reactivation_date') }}" class="form-control flatpickr">
                            @error("reactivation_date")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Complete Blind Resume') }}</label>
                            <input type="file" id="completeBlindResume" class="custom-input-file file-input" data-max="5000"/>
                            <label for="completeBlindResume">
                                <i class="fas fa-upload"></i>
                                <span id="completeBlindResumeNameDisplay">{{ old('complete_blind_resume_name') ?: __('Choose a file…') }}</span>
                            </label>
                            <small class="form-text text-muted mt-2">{{ __('(pdf/jpg/png/gif/word/excel only, up to 5MB') }}</small>
                            <input name="complete_blind_resume_base64" type="hidden" id="completeBlindResumeBase64" value="{{ old('complete_blind_resume_base64') }}"/>
                            <input name="complete_blind_resume_name" type="hidden" id="completeBlindResumeName" value="{{ old('complete_blind_resume_name') }}"/>
                            @error("complete_blind_resume")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Blind Resume') }}</label>
                            <input type="file" id="blindResume" class="custom-input-file file-input" data-max="5000"/>
                            <label for="blindResume">
                                <i class="fas fa-upload"></i>
                                <span id="blindResumeNameDisplay">{{ old('blind_resume_name') ?: __('Choose a file…') }}</span>
                            </label>
                            <small class="form-text text-muted mt-2">{{ __('(pdf/jpg/png/gif/word/excel only, up to 5MB') }}</small>
                            <input name="blind_resume_base64" type="hidden" id="blindResumeBase64" value="{{ old('blind_resume_base64') }}"/>
                            <input name="blind_resume_name" type="hidden" id="blindResumeName" value="{{ old('blind_resume_name') }}"/>
                            @error("blind_resume")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Original Resume') }}</label>
                            <input type="file" id="originalResume" class="custom-input-file file-input" data-max="5000"/>
                            <label for="originalResume">
                                <i class="fas fa-upload"></i>
                                <span id="originalResumeNameDisplay">{{ old('original_resume_name') ?: __('Choose a file…') }}</span>
                            </label>
                            <small class="form-text text-muted mt-2">{{ __('(pdf/jpg/png/gif/word/excel only, up to 5MB') }}</small>
                            <input name="original_resume_base64" type="hidden" id="originalResumeBase64" value="{{ old('original_resume_base64') }}"/>
                            <input name="original_resume_name" type="hidden" id="originalResumeName" value="{{ old('original_resume_name') }}"/>
                            @error("original_resume")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Shokumu Keirekisho') }}</label>
                            <input type="file" id="shokumuKeirekisho" class="custom-input-file file-input" data-max="5000"/>
                            <label for="shokumuKeirekisho">
                                <i class="fas fa-upload"></i>
                                <span id="shokumuKeirekishoNameDisplay">{{ old('shokumu_keirekisho_name') ?: __('Choose a file…') }}</span>
                            </label>
                            <small class="form-text text-muted mt-2">{{ __('(pdf/jpg/png/gif/word/excel only, up to 5MB') }}</small>
                            <input name="shokumu_keirekisho_base64" type="hidden" id="shokumuKeirekishoBase64" value="{{ old('shokumu_keirekisho_base64') }}"/>
                            <input name="shokumu_keirekisho_name" type="hidden" id="shokumuKeirekishoName" value="{{ old('shokumu_keirekisho_name') }}"/>
                            @error("shokumu_keirekisho")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Rirekisho') }}</label>
                            <input type="file" id="rirekisho" class="custom-input-file file-input" data-max="5000"/>
                            <label for="rirekisho">
                                <i class="fas fa-upload"></i>
                                <span id="rirekishoNameDisplay">{{ old('rirekisho_name') ?: __('Choose a file…') }}</span>
                            </label>
                            <small class="form-text text-muted mt-2">{{ __('(pdf/jpg/png/gif/word/excel only, up to 5MB') }}</small>
                            <input name="rirekisho_base64" type="hidden" id="rirekishoBase64" value="{{ old('rirekisho_base64') }}"/>
                            <input name="rirekisho_name" type="hidden" id="rirekishoName" value="{{ old('rirekisho_name') }}"/>
                            @error("rirekisho")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Request and Restriction') }}</label>
                            <textarea name="request" class="form-control">{{ old('request') }}</textarea>
                            @error("request")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-control-label">{{ __('Interviewer') }} <i class="text-danger">*</i></label>
                            <input type="text" name="interviewer" value="{{ old('interviewer') }}" class="form-control">
                            @error("interviewer")
                            <div class="text-danger mt-1">
                                {{ Str::ucfirst($message) }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary col-3">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
    const sizeValidationMessage = "{{ __('validation.max.file', ['attribute' => __('file')]) }}";
</script>
@vite('resources/js/admin/job-seekers/create.js')
@endpush
