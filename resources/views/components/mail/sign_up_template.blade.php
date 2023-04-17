<!DOCTYPE html>
<html>
<div>
    <div>「転ジョーク会議」の新規会員登録が完了しました。</div>
    <div>これより、「転ジョーク会議」のサービスがご利用いただけます。</div>
    <br />
    <div>■ログイン情報</div>
    <div>　・メールアドレス：{{ $user->email }}</div>
    <div>　・パスワード：{{ $user->raw_password }}</div>
    <br />
    <div>▼「転ジョーク会議」ログインページ</div>
    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('login') }}">トップページへ戻る</a></div>
    <br />
    <div>　※ログイン後、マイページにて、会員情報の変更可能です</div>
    <div>　※パスワードは、定期的に変更いただくことをお奨めします</div>
    <br /><br />
    <div>こちらのメールに心当たりがない、またはご不明な点がございましたら、</div>
    <div>お問い合わせは下記までご連絡お願いします。</div>
    <br />
    <div>▼お問合せ先</div>
    <!-- Inquiry link not yet develop -->
    <div>　{問い合わせ先URL URL for inquiry-form}</div>
    <br />
    <div>本メールは配信専用です。ご返信なさらぬようご注意ください。</div>
    <br />
    <div>──────────────────</div>
    <div><strong>転ジョーク会議運営事務局</strong></div>
</div>

</html>