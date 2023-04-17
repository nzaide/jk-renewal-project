<!DOCTYPE html>
<html>
  <div>
    <div>{{ __('We have received your inquiry with the following content.') }}</div>
    <br>
    <div>{{ __('Name') }}: {{ $inquiry['name'] }}</div>
    <div>{{ __('Company Name') }}: {{ $inquiry['company_name'] }}</div>
    <div>{{ __('Email Address') }}: {{ $inquiry['email'] }}</div>
    <div>{{ __('Tel no.') }}: {{ $inquiry['contact'] }}</div>
    <div>{{ __('Details') }}: {!! nl2br($inquiry['details']) !!}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>
