@extends('layouts.applicant.app')

@section('title', __('Register') . ' | ')
@section('body')
<section class="section" style="background: rgb(250, 250, 250)">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-8 col-lg-5 py-4">
          <div class="mb-3">
            <center><img src="{{ url('img/logo.svg') }}" alt="logo"></center>
          </div>
          <span class="clearfix"></span>
          <form action="{{ route('job_seeker.register') }}" method="POST" class="form" novalidate>
            @csrf
              <div class="form-group">
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control form-control-prepend" id="mail_address" name="mail_address" value="{{ old('mail_address') }}" placeholder="{{ __('Email') }}">
                  <div class="input-group-prepend">
                    <label for="mail_address" class="input-group-text py-1 px-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                      </svg>
                    </label>
                  </div>
                </div>
                @error("mail_address")
                <div class="text-danger"> {{ $message }} </div>
                @enderror
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control form-control-prepend" id="password" name="password" placeholder="{{ __('Password') }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text py-1 px-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key">
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                      </svg>
                    </span>
                  </div>
                </div>
                @error("password")
                <div class="text-danger"> {{ $message }} </div>
                @enderror
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control form-control-prepend" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text py-1 px-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key">
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                      </svg>
                    </span>
                  </div>
                </div>
                @error("password")
                <div class="text-danger"> {{ $message }} </div>
                @enderror
              </div>
              <div class="">
                <div class="custom-control custom-checkbox mb-0">
                  <input type="checkbox" class="custom-control-input" id="terms_and_privacy" name="terms_and_privacy"
                    @if (old('terms_and_privacy'))
                      checked
                    @endif
                  >
                  <label class="custom-control-label" for="terms_and_privacy">
                    <small class="terms-and-privacy text-dark">
                      {{ __('I agree with the Terms of Services and Privacy Policy') }}
                    </small>
                  </label>
                </div>
                @error("terms_and_privacy")
                <div class="text-danger mt-0"> {{ $message }} </div>
                @enderror
              </div>
              <div class="mt-4 text-center">
                <button type="submit" class="btn btn-block btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
          </form>
          <div class="py-3 text-center text-dark">
            _______ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <span class="text-xs text-lowercase">{{ __('or') }}</span>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; _______
          </div>
          <!-- Links -->
          <div class="mt-3 text-center">
            <label class="text-dark font-weight-bold text-xs">{{ __('Already a member?') }}</label><br>
            <a href="{{ route('login') }}" class="font-weight-bold text-xs text-primary">{{ __('Login') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modals -->
  @include('layouts.applicant.modals.terms_of_services')
  @include('layouts.applicant.modals.privacy_policy')
</section>
<script type="text/javascript">
  $(function() {
    let termsAndPrivacy = $('.terms-and-privacy').text()
      .replace('{{ __("Terms of Services") }}', '<a href="#" data-toggle="modal" data-target="#terms-of-services-modal" class="text-primary">{{ __("Terms of Services") }}</a>')
      .replace('{{ __("Privacy Policy") }}', '<a href="#" data-toggle="modal" data-target="#privacy-policy-modal" class="text-primary">{{ __("Privacy Policy") }}</a>');
    $('.terms-and-privacy').html(termsAndPrivacy);
  });
</script>
@endsection
