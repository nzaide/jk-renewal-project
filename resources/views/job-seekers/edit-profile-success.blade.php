@extends('layouts.applicant.app')

@section('title', __('User Detail Edit Complete'))
@section('body')
<section class="section">
    <div class="container d-flex flex-column">
        <div class="align-items-center justify-content-center py-6">
            <div class=" text-center">
                <h2>{{ __('Profile Update Complete') }}</h2>
                <h5>{{ __('Your profile has been updated') }}</h5>
                <a href="{{ route('home') }}" class="btn btn-primary text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    <span class="">{{ __('Back to My Page') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection