<!DOCTYPE html>
<html>
  <div>
    <div>{{ __('A request to change the email address has been sent. Please click the url below to proceed.') }}</div>
    <br/>
    <div><a href="{{ $urlLink }}">{{ $urlLink }}</a></div>
    <br>
    <div>{{ __('Please ignore this email if you do not remember this request.') }}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>