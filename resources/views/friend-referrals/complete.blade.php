@extends('layouts.applicant.app')
@section('title', __('Refer friends complete'))
@section('body')
<section class="section search js-anima-fade">
    <div class="section__wrap search__container">
        <x-forms.job-search />
        <div class="js-searchsticky"></div>
    </div>
</section>
<div class="container">
    <section class="section mt-5 mb-5">
        <div class="text-center">
            <h1 class="mb-4">{{ __('Thank you for your referral') }}</h1>
            <p>{{ __('We have received your referral.') }}<br>{{ __('Please expect an email about the next process.') }}</p>
        </div>
    </section>
</div>
@endsection