<!DOCTYPE html>
<html>
  <div>
    <div>{{ __('Greetings') }}!</div>
    <br/>
    <div>{{ __('Thank you very much for recommending us for your referral.') }}</div>
    <div>{{ __('We have received your referral for Mr/Ms. :referral_name with the following data', ['referral_name' => $data['name']]) }}:</div>
    <br>
    <div>{{ __('Referral Information') }}:</div>
    <br>
    <div>{{ __('Name') }}: {{ $data['name'] }}</div>
    <div>{{ __('Email') }}: {{ $data['email'] }}</div>
    <div>{{ __('Contact Number') }}: {{ $data['contact'] }}</div>
    <div>{{ __('Language') }}: {{ $language->language }}</div>
    <br>
    <br>
    @include('layouts.mails.footer')
  </div>
</html>