@extends('layouts.applicant.app')
@section('title', __('Password Reset Completed'))
@section('body')
<section class="section" style="background: rgb(250, 250, 250)">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-12 col-lg-6">
        <div class="my-4 h2 text-center"> {{ __('Password Reset Completed') }} </div>
        <div class="my-4"><div>
          @csrf
        <div class="form-group">
            <div class="mt-4 text-center">
              <p> {{ __('You password has been reset.') }} </p>
            </div>
            <div class="mb-4 text-center">
              <p> {{ __('Please login using your new password.') }} </p>
            </div>
            <div class="my-4 text-center">
                <input class="btn btn-primary w-100" value="{{ __('Login') }}">
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

