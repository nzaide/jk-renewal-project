
@extends('layouts.admin.app')

@section('content')
<div class="d-flex justify-content-center pt-7">
    <div class="col-5">
        <div class="mb-5 text-center">
            <h6 class="h3 mb-1">{{ __('Admin Login') }}</h6>
        </div>
        <span class="clearfix"></span>
        <form action="{{ route('admin.login') }}" method="POST" novalidate>
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" id="mail_address" name="mail_address" value="{{ old('mail_address') }}" placeholder="{{ __('Email') }}">
                </div>
                @error("mail_address")
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}">
                </div>
                @error("password")
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-block btn-primary">{{ __('Login') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
