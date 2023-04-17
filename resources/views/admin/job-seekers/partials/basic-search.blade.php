<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Start Date') }}
        </label>

        <input type="text" id="start-date-input" name="created_at_start" class="bg-white form-control form-control-sm"
            value="{{ request('created_at_start') }}">
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('End Date') }}
        </label>

        <input type="text" id="end-date-input" name="created_at_end" class="bg-white form-control form-control-sm"
            value="{{ request('created_at_end') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Name') }}
        </label>

        <input type="text" name="fullname" class="form-control form-control-sm" value="{{ request('fullname') }}">
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Nationality') }}
        </label>

        <select name="nationality_id" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($nationalities as $nationality)
            <option value="{{ $nationality->id }}" @selected(request('nationality_id')==$nationality->id)>
                {{ __($nationality->nationality) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Contact Number') }}
        </label>

        <input type="tel" name="contact_number" class="form-control form-control-sm"
            value="{{ request('contact_number') }}">
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Email') }}
        </label>

        <input type="email" name="mail_address" class="form-control form-control-sm"
            value="{{ request('mail_address') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Preferred Employment') }}
        </label>

        <select name="preferred_employment" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerPreferredEmployments as $jobSeekerPreferredEmployment)
            <option value="{{ $jobSeekerPreferredEmployment->value }}"
                @selected(request('preferred_employment')==$jobSeekerPreferredEmployment->value)>
                {{ __($jobSeekerPreferredEmployment->text()) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">
        {{ __('Industry') }}
    </label>

    <select name="industry_ids[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
        data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
        @foreach ($industries as $industry)
        <option value="{{ $industry->id }}" @selected(in_array($industry->id, request('industry_ids', [])))>
            {{ __($industry->name) }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-control-label">
        {{ __('Field and Job Title') }}
    </label>

    <select name="job_field_ids[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
        data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
        @foreach ($jobFields as $jobField)
        <option value="{{ $jobField->id }}" @selected(in_array($jobField->id, request('job_field_ids', [])))>
            {{ __($jobField->name) }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-control-label">
        {{ __('Languages') }}
    </label>

    <select name="language_fluencies[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
        data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
        @foreach ($languages as $language)
        <optgroup>
            @php $value = $language->id . '-0' @endphp
            <option value="{{ $value }}" @selected(in_array($value, request('language_fluencies', [])))
                data-tokens="{{ $language->language }}"
                title="{{ $language->language }}"
                class="ml-n2">
                {{ $language->language }}
            </option>
            @foreach ($language->fluencies as $fluency)
            @php $value = $language->id . '-' . $fluency->value @endphp

            <option value="{{ $value }}" @selected(in_array($value, request('language_fluencies', [])))
                data-tokens="{{ $language->language . ' ' . $fluency->text() }}"
                title="{{ $language->language . ': ' . $fluency->text() }}">
                {{ $fluency->text() }}
            </option>
            @endforeach
        </optgroup>
        @endforeach
    </select>
</div>