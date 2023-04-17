@extends('layouts.applicant.app')

@section('title', __('Register Detail') . ' | ')
@section('body')
<section class="section">
  <div class="container-fluid d-flex flex-column">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8 pb-5">
            <div class="mb-3">
                <h4> {{ __('2/2 Steps to Register') }} </h4>
                <label class="text-dark">
                    {{ __('Please fill out the below items to complete your registration. You can apply jobs after filling out.') }}
                </label>
            </div>
            <form action="{{ route('job_seeker.register-detail') }}" method="POST" class="form register-detail-form"  enctype="multipart/form-data" novalidate>
                @csrf
                <input type="hidden" name="job_seeker_id" value="<?= $preRegisteredUser->id ?>">
                <div class="row">
                    <div class="form-group col-lg-9 offset-lg-1 mb-1">
                        <label for="fullname" class="form-control-label mb-1">{{ __('Name') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="{{ __('Fullname') }}">
                        </div>
                        <small class="font-weight-bold text-xs"> {{ __('Surname Firstname Middlename (if applicable)') }} </small>
                        @error("fullname")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-9 offset-lg-1 mb-2">
                        <label for="nationality" class="form-control-label mb-1">{{ __('Nationality') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select type="text" class="custom-select" id="nationality" name="nationality" value="{{ old('nationality') }}">
                                <option value="">{{ __('Nationality') }}</option>
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}" <?= old('nationality') == $nationality->id ? 'selected' : '' ?>>
                                        {{ $nationality->nationality }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error("nationality")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-9 offset-lg-1 mb-0">
                        <label class="text-sm font-weight-bold mb-0">
                            {{ __('Can you speak language aside from English and Filipino?') }} <i class="text-danger">*</i>
                        </label>
                        <div class="input-group m-0">
                            <label class="custom-radio pr-2 col-form-label text-dark">
                                <input type="radio" class="language-selection" name="language" value="1" <?= old('language') == 1 ? 'checked' : '' ?>>
                                <span class="h6">{{ __('Yes') }}</span>
                                <span class="checkmark"></span>
                            </label>
                            <label class="custom-radio pr-2 col-form-label text-dark">
                                <input type="radio" class="language-selection" name="language" value="0" <?= old('language') == 0 ? 'checked' : '' ?>>
                                <span class="h6">{{ __('No') }}</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row other-languages mb-2" <?= old('language') == 0 ? 'style="display: none;"' : '' ?>>
                    <div class="form-group  col-lg-9 offset-lg-1 mb-1">
                        <label for="first_language" class="form-control-label mb-1">{{ __('First Language') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select type="text" class="custom-select select-language" id="first_language" name="first_language" value="{{ old('first_language') }}">
                                <option value=""></option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" <?= old('first_language') == $language->id ? 'selected' : '' ?>>
                                        {{ $language->language }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error("first_language")
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-9 offset-lg-1 mb-1">
                        <label for="second_language" class="form-control-label mb-1">{{ __('Second Language') }}</label>
                        <div class="input-group">
                            <select type="text" class="custom-select select-language" id="second_language" name="second_language" value="{{ old('second_language') }}">
                                <option value=""></option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" <?= old('second_language') == $language->id ? 'selected' : '' ?>>
                                        {{ $language->language }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error("second_language")
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-9 offset-lg-1 mb-1">
                        <label for="third_language" class="form-control-label mb-1">{{ __('Third Language') }}</label>
                        <div class="input-group">
                            <select type="text" class="custom-select select-language" id="third_language" name="third_language" value="{{ old('third_language') }}">
                                <option value=""></option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" <?= old('third_language') == $language->id ? 'selected' : '' ?>>
                                        {{ $language->language }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error("third_language")
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-9 offset-lg-1 mb-2">
                        <label for="contact" class="form-control-label mb-1">{{ __('Contact') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" placeholder="{{ __('0801234567') }}">
                        </div>
                        @error("contact")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-9 offset-lg-1">
                        <label class="form-control-label mb-1">{{ __('Upload Resume') }}</label>
                        <input type="file" name="upload_resume" id="upload_resume" class="custom-input-file">
                        <label for="upload_resume">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
                                <polyline points="16 16 12 12 8 16"></polyline>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                <polyline points="16 16 12 12 8 16"></polyline>
                            </svg>
                            <span class="pl-2 h6">{{ __('Choose File') }}</span>
                        </label>
                        @error("upload_resume")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                        <div class="mt-3">
                            <label class="font-weight-bold text-xs">
                                {{ __('If you have available resume, you may upload it for fast process.') }}
                                <br>
                                {{ __('English and another language if applicable.(pdf/jpg/png/gif/word/excel, only up to 5MB)') }}
                            </label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="col-lg-9 offset-lg-1">
                            <label class="terms-condition-notice font-weight-bold text-xs text-dark">
                                {{ __('By Clicking Complete Register you agree to J-K Network`s Terms and Conditions (https://jknetworks-jobs.com/privacyPolicy) and is allowing your Personal information to be processed in connection to your application.') }}
                            </label>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-block px-6">
                                    {{ __('Complete Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</section>
@vite('resources/vendor/jk-network-static/js/quick-website.js')
<script type="text/javascript">
    $(function() {
        let formSelector = $('.register-detail-form');
        formSelector.find('.language-selection').click(function() {
            let value = parseInt($(this).val());
            if (value === 1) {
                formSelector.find('.other-languages').fadeIn();
            } else {
                formSelector.find('.other-languages').fadeOut();
                formSelector.find('#first_language').val($('#first_language option:first').val());
                formSelector.find('#second_language').val($('#second_language option:first').val());
                formSelector.find('#third_language').val($('#third_language option:first').val());
                formSelector.find('.other-languages .text-danger').fadeOut().remove();
            }
        });

        let termsAndCondition = formSelector.find('.terms-condition-notice').text()
            .replace('{{ __("Complete Register") }}', '"{{ __("Complete Register") }}"');
        $('.terms-condition-notice').html(termsAndCondition);
    });
</script>
@endsection