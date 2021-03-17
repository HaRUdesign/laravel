
<!DOCTYPE html>
<html>
@include('parts.head')
<body class="complete">
@include('parts.header')
<main>
  <div class="w1940">
    <div class="w600">
      <div class="center">
        <h1>メンバー登録</h1>
      </div>
      <p>メンバー登録ありがとうございました。</p>
      <p>メンバー登録が完了です。</p>
      <div class="center">
        <p><a href="{!! url('/user/login') !!}">ログインへ</a></p>
      </div>
    </div>
  </div>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
