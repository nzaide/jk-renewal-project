<!DOCTYPE html>
<html>
<div>
  <div>{{ __('Application Received') }}!</div>
  <br>
  <div> {{ __("I'd like to inform you that we received your application. We are currently sending your application to the employer.") }} </div>
  <br>
  <div>{{ __('Job Title') }}: {{ $jobPost->job_name }}</div>
  <div>{{ __('Company Name') }}: {{ $jobPost->company_name }}</div>
  <br>
  <div>{{ __('Name') }}: {{ $jobSeeker->fullname }}</div>
  <div>{{ __('Email') }}: {{ $jobSeeker->mail_address }}</div>
  <div>{{ __('Contact number') }}: {{ $jobSeeker->contact_number }}</div>
  <br>
  <br>
    @include('layouts.mails.footer')
</div>
</html>
