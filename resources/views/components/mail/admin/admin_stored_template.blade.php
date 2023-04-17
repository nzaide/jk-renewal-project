<!DOCTYPE html>
<html>
<div>
  <div>{{ __('A new admin with the following data has been created.') }}</div>
  <br>
  <div>{{ __('Name') }}: {{ $data->fullname }}</div>
  <div>{{ __('Email') }}: {{ $data->mail_address }}</div>
  <div>{{ __('Role') }}: {{ \App\Http\Enum\Role::cases()[($data->role - 1)]->getDescription() }}</div>
  <br>
  <br>
  @include('layouts.mails.footer')
</div>
</html>
