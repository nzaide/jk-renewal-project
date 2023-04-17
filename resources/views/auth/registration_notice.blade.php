@extends('layouts.applicant.app')
@section('title', __('Register Complete'))
@section('body')
<section class="section">
  <div class="container d-flex flex-column">
    <div class="align-items-center justify-content-center py-6">
      <div class=" text-center">
        <h3>{{ __('Sign Up Complete!') }}</h3>
        <h6>
          {{ __('Thank you for choosing J-K Network as your job hunting partner.') }}
          <br>
          {{ __('Please check your email for details.') }}
        </h6>
      </div>
    </div>
  </div>
</section>