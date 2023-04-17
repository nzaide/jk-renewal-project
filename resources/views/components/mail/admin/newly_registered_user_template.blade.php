<!DOCTYPE html>
<html>
<div>
  <div>{{ __('A new user with the following data has been registered.') }}</div>
  <br>
  <div>{{ __('ID') }}: {{ $user->id }}</div>
  <div>{{ __('Name') }}: {{ $user->fullname }}</div>
  <div>{{ __('Email') }}: {{ $user->mail_address }}</div>
  <br>
  <br>
  @include('layouts.mails.footer')
</div>
</html>