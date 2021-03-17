
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>laravel</title>
  <meta name="description" content="テスト" />
  <!-- Styles -->
  <link href="{{ asset('css/html5reset-1.6.1.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body class="complete">
<header>
</header>
<main>
  <div class="w1940">
    <div class="w600">
      <h1>ホスト登録</h1>
      <p>ホスト登録ありがとうございました。</p>
      <p>ホスト登録が完了です。</p>
      <a href="{!! url('/host/auth/login') !!}">ログインへ</a>
    </div>
  </div>
</main>

<footer>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/common.js') }}" defer></script>
</body>
</html>
