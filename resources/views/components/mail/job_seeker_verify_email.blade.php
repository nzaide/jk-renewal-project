<!DOCTYPE html>
<html>

<body>
    <div>{{ __('Visit below page and finish to register on jknetwork-jobs.com within 24hours.') }}</div>
    <br>
    <div>
        {{ __('Activation link') }}:
        <a href="{{ $verificationUrl }}">
            {{ $verificationUrl }}
        </a>
    </div>
    <br>
    <div>{{ __("Please delete this email if you don't remember this request.") }}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>