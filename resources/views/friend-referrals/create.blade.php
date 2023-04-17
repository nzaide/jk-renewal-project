@extends('layouts.applicant.app')
@section('title', __('Refer A Friend') . ' | ')
@push('style')
<style>
    .modal-open {
        max-height: 100% !important;
    }
</style>
@endpush
@section('body')
<section class="section">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 pb-5">
                <div class="mb-3">
                    <h4>{{ __('Referral Information') }}</h4>
                    <p>{{ __('Please provide the details of the person you want to refer.') }}</p>
                </div>

                <form class="ml-md-5 mr-md-5"
                    action="{{ route('friend-referrals.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Name') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="{{ __('Fullname') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Email Address') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('Email') }}">
                        </div>
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Contact Number') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="contact"
                                name="contact"
                                value="{{ old('contact') }}"
                                placeholder="0801234567">
                        </div>
                        @error('contact')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Language') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select type="text"
                                class="custom-select"
                                id="language"
                                name="language">
                                <option value="none" selected disabled hidden></option>
                                @forelse ($languages as $language)
                                    <option value="{{ $language->id }}" {{ old('language') == $language->id ? 'selected' : ''}} >{{ $language->language }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('language')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Upload Resume') }}</label>
                        <div class="input-group">
                            <input type="file"
                                name="resume"
                                id="resume"
                                class="custom-input-file">
                            <label class="w-100" for="resume">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                    <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                </svg>
                                <span id="resume_label" class="pl-2 h6">{{ __('Choose File') }}</span>
                            </label>
                            @error('resume')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <h4>{{ __('Your contact details') }}</h4>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Name') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="jobSeeker_name"
                                name="jobSeeker_name"
                                value="{{ $jobSeeker ? $jobSeeker->fullname : old('jobSeeker_name') }}"
                                placeholder="{{ __('Fullname') }}"
                                {{ $jobSeeker ? 'readonly' : '' }}>
                        </div>
                        @error('jobSeeker_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Email Address') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="jobSeeker_email"
                                name="jobSeeker_email"
                                value="{{ $jobSeeker ? $jobSeeker->mail_address : old('jobSeeker_email') }}"
                                placeholder="{{ __('Email') }}"
                                {{ $jobSeeker ? 'readonly' : '' }}>
                        </div>
                        @error('jobSeeker_email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Contact Number') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="jobSeeker_contact"
                                name="jobSeeker_contact"
                                value="{{ $jobSeeker ? $jobSeeker->contact_number : old('jobSeeker_contact') }}"
                                placeholder="0801234567"
                                {{ $jobSeeker ? 'readonly' : '' }}>
                        </div>
                        @error('jobSeeker_contact')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <p>{{ __('We will get in touch with you within 24 to 48 business hours regarding the status of your referral.') }}</p>
                    <div>
                        <div class="custom-control custom-checkbox mb-0">
                            <input type="checkbox"
                                class="custom-control-input"
                                id="terms_and_privacy"
                                name="terms_and_privacy" @if (old('terms_and_privacy')) checked @endif>
                            <label class="custom-control-label" for="terms_and_privacy">
                                <small class="terms-and-privacy text-dark">
                                    {{ __('I agree with the Terms of Services and Privacy Policy') }}
                                </small>
                            </label>
                        </div>
                        @error("terms_and_privacy")
                            <div class="text-danger mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary rounded-pill">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('layouts.applicant.modals.terms_of_services')
@include('layouts.applicant.modals.privacy_policy')
@endsection

@push('script')
<script type="text/javascript">
// translations
let choose_file = "{{ __('Choose File') }}";
let file_must_be_less_than_5MB = "{{ __('File must be less than 5MB') }}";
let terms_of_services = "{{ __('Terms of Services') }}";
let privacy_policy = "{{ __('Privacy Policy') }}"
</script>
@vite('resources/js/friend-referrals/create.js');
@endpush