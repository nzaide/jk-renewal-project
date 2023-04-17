@extends('layouts.applicant.app')

@section('title', __('Update Profile') . ' | ')
@section('body')
<section class="section">
    <div class="container pb-4">
        <div class="row">
            <div class="form-group col-lg-6 offset-lg-3 mb-1">
            <h4> {{ __('Update Profile') }} </h4>
            </div>
        </div>
        <form action="{{ route('job-seekers.update', $jobSeeker->id) }}" method="POST" class="form edit-detail-form"  enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-lg-6 offset-lg-3 mb-1">
                    <label for="fullname" class="form-control-label mb-1">{{ __('Name') }} <i class="text-danger">*</i></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $jobSeeker->fullname) }}" placeholder="{{ __('Fullname') }}">
                    </div>
                    <small class="font-weight-bold text-xs"> {{ __('Surname Firstname Middlename (if applicable)') }} </small>
                    @error("fullname")
                    <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6 offset-lg-3 mb-2">
                    <label for="nationality" class="form-control-label mb-1">{{ __('Nationality') }} <i class="text-danger">*</i></label>
                    <div class="input-group">
                        <select type="text" class="custom-select" id="nationality" name="nationality">
                            <option value="">{{ __('Nationality') }}</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->id }}" <?= old('nationality', $jobSeeker->nationality_id) == $nationality->id ? 'selected' : '' ?>>
                                    {{ $nationality->nationality }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error("nationality")
                    <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6 offset-lg-3 mb-0">
                    <label class="text-sm font-weight-bold mb-0">
                        {{ __('Can you speak language aside from English and Filipino?') }} <i class="text-danger">*</i>
                    </label>
                    <div class="input-group mb-2">
                        <div class="custom-control custom-radio m-0">
                            <input type="radio" id="languageYes" name="language" value="1" class="language-selection custom-control-input"
                                <?= !empty(old('language', $jobSeeker->language_first_id)) ? 'checked' : ''  ?>
                            >
                            <label class="custom-control-label h6" for="languageYes">{{ __('Yes') }}</label>
                        </div>
                        <div class="custom-control custom-radio m-0 ml-3">
                            <input type="radio" id="languageNo" name="language" value="0" class="language-selection custom-control-input"
                                <?= empty(old('language', $jobSeeker->language_first_id)) ? 'checked' : '' ?>
                            >
                            <label class="custom-control-label h6" for="languageNo">{{ __('No') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row other-languages mb-2" style="display:<?= empty(old('language', $jobSeeker->language_first_id)) ? 'none' : 'block' ?>">
                <div class="form-group col-lg-6 offset-lg-3 mb-1">
                    <label for="first_language" class="form-control-label mb-1">{{ __('First Language') }} <i class="text-danger">*</i></label>
                    <div class="input-group">
                        <select type="text" class="custom-select select-language" id="first_language" name="first_language">
                            <option value=""></option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" <?= old('first_language', $jobSeeker->language_first_id) == $language->id ? 'selected' : '' ?>>
                                    {{ $language->language }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error("first_language")
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6 offset-lg-3 mb-1">
                    <label for="second_language" class="form-control-label mb-1">{{ __('Second Language') }}</label>
                    <div class="input-group">
                        <select type="text" class="custom-select select-language" id="second_language" name="second_language">
                            <option value=""></option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" <?= old('second_language', $jobSeeker->language_second_id) == $language->id ? 'selected' : '' ?>>
                                    {{ $language->language }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error("second_language")
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6 offset-lg-3 mb-1">
                    <label for="third_language" class="form-control-label mb-1">{{ __('Third Language') }}</label>
                    <div class="input-group">
                        <select type="text" class="custom-select select-language" id="third_language" name="third_language">
                            <option value=""></option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" <?= old('third_language', $jobSeeker->language_third_id) == $language->id ? 'selected' : '' ?>>
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
                <div class="form-group col-lg-6 offset-lg-3 mb-2">
                    <label for="contact" class="form-control-label mb-1">{{ __('Contact') }} <i class="text-danger">*</i></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $jobSeeker->contact_number) }}" placeholder="{{ __('0801234567') }}">
                    </div>
                    @error("contact")
                    <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6 offset-lg-3">
                    <label class="form-control-label mb-1">{{ __('Upload Resume') }}</label>
                    <div class="form-group mb-1">
                        <input type="file" name="complete_blind_resume" id="complete_blind_resume" class="custom-input-file">
                        <label for="complete_blind_resume">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
                                <polyline points="16 16 12 12 8 16"></polyline>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                <polyline points="16 16 12 12 8 16"></polyline>
                            </svg>
                            <span class="pl-2 h6">{{ __('Upload CBR file') }}</span>
                        </label>
                        @error("complete_blind_resume")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="blind_resume" id="blind_resume" class="custom-input-file">
                        <label for="blind_resume">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
                                <polyline points="16 16 12 12 8 16"></polyline>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                <polyline points="16 16 12 12 8 16"></polyline>
                            </svg>
                            <span class="pl-2 h6">{{ __('Upload BR file') }}</span>
                        </label>
                        @error("blind_resume")
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="font-weight-bold text-xs">
                            {{ __('If you have available resume, you may upload it for fast process.') }}
                            <br>
                            {{ __('English and another language if applicable.(pdf/jpg/png/gif/word/excel, only up to 5MB)') }}
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3 mt-2">
                    <!-- <div class=""> -->
                        <button type="submit" class="btn btn-primary btn-block px-6">
                            {{ __('Submit') }}
                        </button>
                    <!-- </div> -->
                </div>
            </div>
        </form>
    </div>
</section>
@vite('resources/vendor/jk-network-static/js/quick-website.js')
<script type="text/javascript">
    $(function() {
        let formSelector = $('.edit-detail-form');
        formSelector.find('.language-selection').click(function() {
            let value = parseInt($(this).val());
            if (value === 1) {
                formSelector.find('.other-languages').fadeIn();
                formSelector.find('#first_language').val('<?= $jobSeeker->language_first_id ?>');
                formSelector.find('#second_language').val('<?= $jobSeeker->language_second_id ?>');
                formSelector.find('#third_language').val('<?= $jobSeeker->language_third_id ?>');
            } else {
                formSelector.find('.other-languages').fadeOut();
                formSelector.find('#first_language').val($('#first_language option:first').val());
                formSelector.find('#second_language').val($('#second_language option:first').val());
                formSelector.find('#third_language').val($('#third_language option:first').val());
                formSelector.find('.other-languages .text-danger').fadeOut().remove();
            }
        });
    });
</script>
@endsection