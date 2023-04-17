@extends('layouts.applicant.app')
@section('title', __('Inquiry Form') . ' | ')

@section('body')
<section class="section">
  <div class="container-fluid d-flex flex-column">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-7 pb-5">
        <div class="row">
          <div class="col-lg-9 offset-lg-1 mb-3">
            @if(Session::has('success'))
            @include('layouts.admin.flash', ['message' => session()->get('success'), 'alertClass'=> 'success'])
            @elseif(Session::has('error') || $errors->isNotEmpty())
            @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
            @endif
            <h4> {{ __('Corporate Inquiry') }} </h4>
            <label class="text-dark">
              {{ __('Please feel free to contact us for any inquiries about our services.') }}
            </label>
          </div>
        </div>
        <form action="{{ route('inquiries.store') }}" method="POST" id="inquiry-form" class="form" novalidate>
          @csrf
          <div class="row">
            <div class="form-group col-lg-9 offset-lg-1 mb-2">
              <label for="name" class="form-control-label mb-1">{{ __('Name') }} <i class="text-danger">*</i></label>
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}">
              </div>
              @error("name")
              <div class="text-danger"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mb-2">
              <label for="company_name" class="form-control-label mb-1">{{ __('Company') }} <i class="text-danger">*</i></label>
              <div class="input-group">
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="{{ __('Company') }}">
              </div>
              @error("company_name")
              <div class="text-danger"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mb-2">
              <label for="email" class="form-control-label mb-1">{{ __('E-mail address') }} <i class="text-danger">*</i></label>
              <div class="input-group">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}">
              </div>
              @error("email")
              <div class="text-danger"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mb-2">
              <label for="contact" class="form-control-label mb-1">{{ __('TEL') }} <i class="text-danger">*</i></label>
              <div class="input-group">
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" placeholder="{{ __('0801234567') }}">
              </div>
              @error("contact")
              <div class="text-danger"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mb-2">
              <label for="details" class="form-control-label mb-1">{{ __('Inquiry Details') }} <i class="text-danger">*</i></label>
              <div class="input-group">
                <textarea class="form-control" id="details" name="details" rows="3">{{ old('details') }}</textarea>
              </div>
              @error("details")
              <div class="text-danger"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mt-3 recaptcha-error">
              <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
              @error("g-recaptcha-response")
              <div class="text-danger mt-0"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group col-lg-9 offset-lg-1 mt-3">
              <button type="submit" class="btn btn-primary btn-block px-3">
                {{ __('Submit') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
<script src='https://www.google.com/recaptcha/api.js'></script>