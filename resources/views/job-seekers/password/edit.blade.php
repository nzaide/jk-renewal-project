@extends('layouts.applicant.app')
@section('title', __('Change Password') . ' | ')
@section('body')
<section class="section">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 pb-5">
                <div class="mb-3">
                    <h4>{{ __('Change Password') }}</h4>
                </div>

                <form class="ml-5 mr-5"
                    action="{{ route('job-seekers.password.update', $jobSeeker) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                       <label class="form-control-label">{{ __('Enter new password') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="password"
                                class="form-control"
                                id="password"
                                name="password">
                        </div>
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Confirm new password') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="password"
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary rounded-pill">
                        {{ __('Change Password') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection