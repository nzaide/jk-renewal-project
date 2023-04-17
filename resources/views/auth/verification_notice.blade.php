@extends('layouts.applicant.app')

@section('title', __('User Registration Complete'))
@section('body')
<section class="section">
  <div class="container d-flex flex-column">
    <div class="align-items-center justify-content-center py-6">
      <div class=" text-center">
        <h2>{{ __('Email Address Registered') }}</h2>
        <h5>
          {{ __('An email has been sent to') }} <em> {{ $email }} </em>
          <br>
          {{ __("If you can't find this email, please check also the spam folder") }}
          <br>
          {{ __('Please click the URL on this email') }}
        </h5>
      </div>
    </div>
  </div>
</section>
@endsection
