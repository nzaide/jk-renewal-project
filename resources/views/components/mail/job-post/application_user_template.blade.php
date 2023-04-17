<!DOCTYPE html>
<html>
<div>
  <div>{{ __('Application Submitted') }}!</div>
  <br>
  <div>
    {{ __('A new application for position :job_title to :company_name has beed submitted.', ['job_title' => $jobPost->job_name, 'company_name' => $jobPost->company_name]) }}
  </div>
  <br>
  <div>{{ __('Name') }}: {{ $jobSeeker->fullname }}</div>
  <div>{{ __('Email') }}: {{ $jobSeeker->mail_address }}</div>
  <div>{{ __('Contact number') }}: {{ $jobSeeker->contact_number }}</div>
  <br>
  <br>
  @include('layouts.mails.footer')
</div>
</html>
