<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thanks</title>
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
  <div class="thankyou-bg">Thank you</div>

  <div class="thankyou-content">
    <div class="thankyou-message">お問い合わせありがとうございました。</div>
    <a href="{{ url('/') }}" class=thankyou-button>HOME</a>
  </div>
</body>
</html>