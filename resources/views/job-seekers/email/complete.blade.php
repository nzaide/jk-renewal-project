@extends('layouts.applicant.app')
@section('title', __('User Email Address Edit'))
@section('body')
<div class="container">
    <section class="section mt-5 mb-5">
        <div class="text-center">
            <h1 class="mb-4">{{ __('Email Address Updated') }}</h1>
            <p>{{ __('Your email address has been changed successfully.') }}<br>{{ __('User your new email address when you login next time.') }}</p>
        </div>
    </section>
</div>
@endsection