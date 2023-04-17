<!DOCTYPE html>
<html>
  <div>
    <div>{{ __('A referral has been submitted with the following data') }}:</div>
    <br>
    <div>{{ __('Referral Information') }}:</div>
    <br>
    <div>{{ __('Name') }}: {{ $data['name'] }}</div>
    <div>{{ __('Email') }}: {{ $data['email'] }}</div>
    <div>{{ __('Contact Number') }}: {{ $data['contact'] }}</div>
    <div>{{ __('Language') }}: {{ $language->language }}</div>
    <br>
    <div>{{ __('Jobseeker Information') }}:</div>
    <br>
    <div>{{ __('Name') }}: {{ $jobSeeker ? $jobSeeker->fullname : $data['jobSeeker_name'] }}</div>
    <div>{{ __('Email') }}: {{ $jobSeeker ? $jobSeeker->mail_address : $data['jobSeeker_email'] }}</div>
    <div>{{ __('Contact Number') }}: {{ $jobSeeker ? $jobSeeker->contact_number : $data['jobSeeker_contact'] }}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>
