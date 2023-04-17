<!DOCTYPE html>
<html>
<div>
  <div>「転ジョーク会議」パスワード再設定完了のお知らせ</div>
    <br/>
  <div>平素より、「転ジョーク会議」をご利用いただき、誠にありがとうございます。</div>
  <div>パスワードの再設定が完了いたしましたので、ご連絡いたします。</div>
  <div>引き続き、「転ジョーク会議」のサービスがご利用いただけます。</div>
    <br/>
  <div> ■ログイン情報</div>
  　<br/>
  <div>・メールアドレス：{{ $user->email }}</div>
  　<br/>
  <div>・パスワード：{{ $user->rawPassword }}</div>
    <br/>
  <div> ▼「転ジョーク会議」ログインページ</div>
  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('login') }}">トップページへ戻る</a></div>
    <br/>

  <div>ご不明な点がございましたら、お問い合わせは下記までご連絡お願いします。</div>
    <br/>
  <div> ▼お問合せ先</div>
  {{--Todo: Url for inquiry-form yet to be developed--}}
  <div>　<a href="{{ route('inquiry.create') }}">問い合わせフォーム</a></div>
    <br/>
  <div> 本メールは配信専用です。ご返信なさらぬようご注意ください。</div>
    <br/>
  <div> ──────────────────</div>
  <div>転ジョーク会議運営事務局</div>
</div>

</html>