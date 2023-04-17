<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Gender') }}
        </label>

        <select name="gender" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerGenders as $jobSeekerGender)
            <option value="{{ $jobSeekerGender->value }}" @selected(request('gender')==$jobSeekerGender->value)>
                {{ __($jobSeekerGender->text()) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Birth Date') }}
        </label>

        <div class="row">
            <div class="col-6">
                <select name="birth_month" id="birth-month-selector" class="custom-select custom-select-sm">
                    <option value>{{ __('Month') }}</option>
                    @foreach ($months as $key => $value)
                    <option value="{{ $key }}" @selected(request('birth_month')==$key)>
                        {{ __($value) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <select name="birth_day" id="birth-day-selector" class="custom-select custom-select-sm"
                    data-selected="{{ request('birth_day') }}">
                    <option value>{{ __('Day') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Age') }}
        </label>

        <div class="align-items-center d-flex">
            <input type="number" name="age_start" class="form-control form-control-sm" placeholder="{{ __('From') }}"
                value="{{ request('age_start') }}">
            <div class="px-1">-</div>
            <input type="number" name="age_end" class="form-control form-control-sm" placeholder="{{ __('To') }}"
                value="{{ request('age_end') }}">
        </div>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Status') }}
        </label>

        <select name="employment_status" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerEmploymentStatuses as $jobSeekerEmploymentStatus)
            <option value="{{ $jobSeekerEmploymentStatus->value }}"
                @selected(request('employment_status')==$jobSeekerEmploymentStatus->value)>
                {{ __($jobSeekerEmploymentStatus->text()) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Marital Status') }}
        </label>

        <select name="marital_status" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerMaritalStatuses as $jobSeekerMaritalStatus)
            <option value="{{ $jobSeekerMaritalStatus->value }}"
                @selected(request('marital_status')==$jobSeekerMaritalStatus->value)>
                {{ __($jobSeekerMaritalStatus->text()) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Visa Type') }}
        </label>

        <select name="visa_id" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerVisaIds as $jobSeekerVisaId)
            <option value="{{ $jobSeekerVisaId->value }}" @selected(request('visa_id')==$jobSeekerVisaId->value)>
                {{ __($jobSeekerVisaId->text()) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Location Philippines') }}
        </label>

        <select name="location_philippines" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($phLocations as $phLocation)
            <option value="{{ $phLocation->id }}" @selected(request('location_philippines')==$phLocation->id)>
                {{ __($phLocation->location) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Location Abroad') }}
        </label>

        <select name="location_abroad" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($nonPhLocations as $nonPhLocation)
            <option value="{{ $nonPhLocation->id }}" @selected(request('location_abroad')==$nonPhLocation->id)>
                {{ __($nonPhLocation->location) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Interested Jobs') }}
        </label>

        <select name="job_ids[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
            data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
            @foreach ($jobs as $job)
            <option value="{{ $job->id }}" @selected(in_array($job->id, request('job_ids', [])))>
                {{ __($job->name) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Present/Latest Employer') }}
        </label>

        <input type="text" name="present_employer" class="form-control form-control-sm"
            value="{{ request('present_employer') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('English Fluency') }}
        </label>

        <select name="english_fluency" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerEnglishFluencies as $jobSeekerEnglishFluency)
            <option value="{{ $jobSeekerEnglishFluency->value }}"
                @selected(request('english_fluency')==$jobSeekerEnglishFluency->value)>
                {{ __($jobSeekerEnglishFluency->text()) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Highest Education') }}
        </label>

        <div class="row">
            <div class="col-6">
                <select name="highest_degree" id="highest-degree-selector" class="custom-select custom-select-sm">
                    <option value>{{ __('Degree') }}</option>
                    @foreach ($jobSeekerHighestDegrees as $jobSeekerHighestDegree)
                    <option value="{{ $jobSeekerHighestDegree->value }}"
                        @selected(request('highest_degree')==$jobSeekerHighestDegree->value)>
                        {{ __($jobSeekerHighestDegree->text()) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <select name="education_level" id="education-level-selector" class="custom-select custom-select-sm"
                    data-selected="{{ request('education_level') }}">
                    <option value>{{ __('Level') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Major in University') }}
        </label>

        <select name="university_major" class="custom-select custom-select-sm">
            <option value>{{ __('Select an option') }}</option>
            @foreach ($jobSeekerUniversityMajors as $jobSeekerUniversityMajor)
            <option value="{{ $jobSeekerUniversityMajor->value }}"
                @selected(request('university_major')==$jobSeekerUniversityMajor->value)>
                {{ __($jobSeekerUniversityMajor->text()) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('License and Certificates') }}
        </label>

        <select name="license_ids[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
            data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
            @foreach ($licenses as $license)
            <option value="{{ $license->id }}" @selected(in_array($license->id, request('license_ids', [])))>
                {{ __($license->name) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">
        {{ __('Language (for 2nd and 3rd languages only)') }}
    </label>

    <div class="row">
        <div class="col-md-6 form-group">
            <select name="language_second_id" class="custom-select custom-select-sm">
                <option value>{{ __('Language') }}</option>
                @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected(request('language_second_id')==$language->id)>
                    {{ __($language->language) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 form-group">
            <select name="language_second_speaking" class="custom-select custom-select-sm">
                <option value>{{ __('Speak') }}</option>
                @foreach ($languageSpeakingSkills as $languageSpeakingSkill)
                <option value="{{ $languageSpeakingSkill }}"
                    @selected(request('language_second_speaking')==$languageSpeakingSkill)>
                    {{ __($languageSpeakingSkill) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 form-group">
            <select name="language_second_reading" class="custom-select custom-select-sm">
                <option value>{{ __('Read') }}</option>
                @foreach ($languageReadingSkills as $languageReadingSkill)
                <option value="{{ $languageReadingSkill }}"
                    @selected(request('language_second_reading')==$languageReadingSkill)>
                    {{ __($languageReadingSkill) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 form-group">
            <select name="language_second_writing" class="custom-select custom-select-sm">
                <option value>{{ __('Write') }}</option>
                @foreach ($languageWritingSkills as $languageWritingSkill)
                <option value="{{ $languageWritingSkill }}"
                    @selected(request('language_second_writing')==$languageWritingSkill)>
                    {{ __($languageWritingSkill) }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Job Source') }}
        </label>

        <input type="text" name="job_posting" class="form-control form-control-sm" value="{{ request('job_posting') }}">
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Interviewer') }}
        </label>

        <input type="text" name="interviewer" class="form-control form-control-sm" value="{{ request('interviewer') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Remarks') }}
        </label>

        <input type="text" name="request" class="form-control form-control-sm" value="{{ request('request') }}">
    </div>

    <div class="col-md-6 form-group">
        <label class="form-control-label">
            {{ __('Other Tags') }}
        </label>

        <select name="other_tag_ids[]" class="form-control form-control-sm selectpicker" data-actions-box="true"
            data-live-search="true" data-style="bg-white btn-light px-3 py-2 rounded" multiple>
            @foreach ($otherTags as $otherTag)
            <option value="{{ $otherTag->id }}" @selected(in_array($otherTag->id, request('other_tag_ids', [])))>
                {{ __($otherTag->name) }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">
        {{ __('Reactivation Date') }}
    </label>

    <div class="row">
        <div class="col-6">
            <input type="text" id="reactivation-start-date-input" name="reactivation_date_start"
                class="bg-white form-control form-control-sm" value="{{ request('reactivation_date_start') }}"
                placeholder="{{ __('Start Date') }}" value="{{ request('reactivation_date_start') }}">
        </div>
        <div class="col-6">
            <input type="text" id="reactivation-end-date-input" name="reactivation_date_end"
                class="bg-white form-control form-control-sm" value="{{ request('reactivation_date_end') }}"
                placeholder="{{ __('End Date') }}" value="{{ request('reactivation_date_end') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" id="blacklist-excluder" name="exclude_blacklisted" class="custom-control-input"
            @checked(request('exclude_blacklisted')) value="1">
        <label for="blacklist-excluder" class="custom-control-label">
            {{ __('Exclude Blacklisted') }}
        </label>
    </div>
</div>