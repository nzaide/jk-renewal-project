@extends('layouts.applicant.app')

@section('title', __('Application Completed'))
@section('body')
<div class="container-fluid">
    <section class="section search mt-2">
        <div class="section__wrap search__container">
            <x-forms.job-search />
            <div class="js-searchsticky p-0"></div>
        </div>
    </section>

    <section class="section">
        <div class="container d-flex flex-column">
            <div class="text-center py-5">
                <h3>{{ __('Thank you for your Application') }}</h3>
                <br>
                {{ __('We have received your application.') }}
                <br>
                {{ __('Please expect an email about the next process.') }}
                </h5>
            </div>
        </div>
    </section>
</div>
@endsection