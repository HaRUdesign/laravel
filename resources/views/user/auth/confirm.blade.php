<!DOCTYPE html>
<html>
@include('parts.head')

<body class="confirm">
@include('parts.header-new')
<main class="main">
  <p class="title">CONFIRM</p>
  <h1>ユーザー登録(確認画面)</h1>
  <form action="{{ route('user.store') }}" method="post">
    @csrf
    <ul>
    <li>苗字：　{{ $input["user_familyname"] }}</li>
    <li></li>
    <li>名前：　{{ $input["user_firstname"] }}</li>
    <li></li>
    <li>苗字(カナ)：　{{ $input["user_kana_familyname"] }}</li>
    <li></li>
    <li>名前(カナ)：　{{ $input["user_kana_firstname"] }}</li>
    <li></li>
    <li>性別：　{{ $input["user_sex"] }}</li>
    <li></li>
    <li>メールアドレス：　{{ $input["user_mail"] }}</li>
    <li></li>
    <li>パスワード：　{{ $input["user_pass"] }}</li>
    <li></li>
    <li>電話番号：　{{ $input["user_tel"] }}</li>
    <li></li>
    <li>住所：　{{ $input["user_address"] }}</li>
    <li></li>
    <li>生年月日：　{{ $input["user_birthday_year"] }}年{{ $input["user_birthday_month"] }}月{{ $input["user_birthday_day"] }}日</li>
    <li></li>
    <li>ニュースレターを配信する：　{{ $input["user_newsletter"] }}
    </li>
    <li></li>
    <li>コメント：
    {{ $input["user_comment"] }}</li>
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
