@extends('layouts.applicant.app')
@section('title', __('User Password Edit Complete'))
@section('body')
<div class="container">
    <section class="section mt-5 mb-5">
        <div class="text-center">
            <h1 class="mb-4">{{ __('Password Updated') }}</h1>
            <p>{{ __('Your password has been changed successfully.') }}<br>{{ __('Use your new password when you login next time.') }}</p>
        </div>
    </section>
</div>
@endsection