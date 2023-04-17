<!DOCTYPE html>
<html>
  <div>
    <div>{{ __('Password reset request has been sent for this email address. Please click below URL to proceed reset password') }}:</div>
    <br>
    <div>
        <a href="{{ $url }}">{{ $url }}</a>
    </div>
    <br>
    <div>{{ __("Please delete this email if you don't remember this request.") }}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>
