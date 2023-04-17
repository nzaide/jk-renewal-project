@extends('layouts.applicant.app')
@section('title', __('Change Email') . ' | ')
@section('body')
<section class="section">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 pb-5">
                @include('layouts.applicant.flash')
                <div class="mb-3">
                    <h4>{{ __('1/2 Change Email Address') }}</h4>
                </div>

                <form class="ml-5 mr-5"
                    action="{{ route('job-seekers.email.update', $jobSeeker) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Current email address:') }}</label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control form-control-muted"
                                value="{{ $jobSeeker->mail_address }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('New email address:') }} <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="mail_address"
                                name="mail_address"
                                placeholder="{{ __('Email') }}">
                        </div>
                        @error('mail_address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary rounded-pill">
                        {{ __('Change Email') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection