<!DOCTYPE html>
<html>
@include('parts.head')

<body class="confirm">
@include('parts.header-new')
<main class="main">
  <p class="title">CONFIRM</p>
  <h1>ユーザー登録(確認画面)</h1>

  <form action="{{ route('host.store') }}" method="post">
    @csrf
    <ul>
      <li>名前：　{{ $input["host_name"] }}</li>
      <li>メールアドレス：　{{ $input["host_mail"] }}</li>
      <li></li>
      <li>パスワード：　{{ $input["host_pass"] }}</li>
      <li></li>
    </ul>
    <div class="flex">
      <input class="submit-back" name="back" type="submit" value="戻る" />
      <input class="submit" type="submit" value="送信" />
    </div>
  </form>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
