<!DOCTYPE html>
<html>
<div>
  <div>{{ __('Login with not registered IP address has been detected.') }}</div>
  <br/>
  <div>{{ $ip }}</div>
  <br>
  <br>
  @include('layouts.mails.footer')
</div>
</html>
