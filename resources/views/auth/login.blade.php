@extends('layouts.applicant.app')
@section('title', __('Login') . ' | ')
@section('body')
<section class="section" style="background: rgb(250, 250, 250);">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-5 py-4">
                <div class="mb-3">
                    <center>
                        <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/logo.svg') }}" alt="logo">
                    </center>
                </div>
    
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                            </div>
                            <input type="text"
                                style="height: auto"
                                class="form-control"
                                id="mail_address"
                                name="mail_address"
                                value="{{ old('mail_address') }}"
                                placeholder="{{ __('Email') }}">
                        </div>
                        @error("mail_address")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg></span>
                            </div>
                            <input type="password"
                                style="height: auto"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="{{ __('Password') }}">
                        </div>
                        @error("password")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="float-right">
                        <a href="{{ route('password.request') }}"
                            style="color: #008aff">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
    
                <div class="py-3 text-center">
                    _______ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <span class="text-xs text-lowercase">{{ __('or') }}</span>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; _______
                </div>
    
                <div class="mt-3 mb-5 text-center">
                    <a href="{{ route('register') }}"
                        class="small font-weight-bold"
                        style="color: #008aff">
                        {{ __('Sign Up') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection