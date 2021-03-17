<!DOCTYPE html>
<html>
@include('parts.head')
<body class="show">

@include('parts.header-home')

<main class="main">
  <section class="s-1 flex-between">
    <h1>HELLO ! {{$user->user_familyname}} さん</h1>
    <div class="wrap flex-right">
      <p class="login-time">最終ログイン：{{ $user->last_login_at }}</p>
      <p class="logout"><a href="{{ route('user.logout') }}">ログアウト</a></p>
    </div>
  </section>

  <section class="s-2">
    @if(session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif
    <p class="title">MEMBER INFO</p>
    <div class="bar"></div>
    <h2>基本情報の変更</h2>

    <div class="flex form-wrap">
      <div class="left">
        @if(!$user->user_icon)
        <img src="{{ asset('img/home/icon.png') }}">
        @else
        <img src="{{asset(\Storage::url($user->user_icon))}}">
        @endif
      </div>

      <div class="right">
        <ul>
          <li class="flex">
            <div class="form-left">ニックネーム：</div>
            <div class="form-right">{{ $user->user_nickname }}</div>
          </li>
          <li class="flex">
            <div class="form-left">苗字：</div>
            <div class="form-right">{{ $user->user_familyname }}</div>
          </li>
          <li class="flex">
            <div class="form-left">名前：</div>
            <div class="form-right">{{ $user->user_firstname }}</div>
          </li>
          <li class="flex">
            <div class="form-left">苗字(カナ)：</div>
            <div class="form-right">{{ $user->user_kana_familyname }}</div>
          </li>
          <li class="flex">
            <div class="form-left">名前(カナ)：</div>
            <div class="form-right">{{ $user->user_kana_firstname }}</div>
          </li>
          <li class="flex">
            <div class="form-left">性別：</div>
            <div class="form-right">{{ $user->user_sex }}</div>
          </li>
          <li class="flex">
            <div class="form-left">生年月日：</div>
            <div class="form-right">{{ $user->user_birthday_year }}年{{ $user->user_birthday_month }}月{{ $user->user_birthday_day }}日</div>
          </li>
          <li class="flex">
            <div class="form-left">メールアドレス：</div>
            <div class="form-right">{{ $user->user_mail }}</div>
          </li>
          <li class="flex">
            <div class="form-left">電話番号：</div>
            <div class="form-right">{{ $user->user_tel }}</div>
          </li>
          <li class="flex">
            <div class="form-left">パスワード：</div>
            <div class="form-right">********</div>
          </li>
          <li class="flex">
            <div class="form-left">住所：</div>
            <div class="form-right">{{ $user->user_address }}</div>
          </li>
          <li class="flex">
            <div class="form-left">告知の配信：</div>
            <div class="form-right">{{ $user->user_newsletter }}</div>
          </li>
          <li class="flex">
            <a class="back-btn" href="javascript:history.back();">戻る</a>
            <a  class="submit" href="{{ route('user.home.edit') }}">変更する</a>
          </li>
        </ul>

      </div>
    </div>

  </section>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
