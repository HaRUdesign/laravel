<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="テスト" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- font -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!-- Styles -->
  <link href="{{ asset('css/html5reset-1.6.1.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
   <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('js/common.js') }}" defer></script>
</head>
<body class="dashboard">
<header class="header">
  <div class="flex w1940 header-wrap">
    <div class="header-left"></div>
    <div class="header-right flex">
    <div class="header-right-left">
      <h1>Dashboard</h1>
      <p class="header-time">
      @php
      echo date("l, d l Y");
      @endphp
      </p>
    </div>
    <div class="header-right-right">
    <ul class="flex">
      <li><i class="far fa-bell"></i></li>
      <li><i class="far fa-question-circle"></i></li>
      <li><span class="">{{auth()->user()->host_name }}</span></li>
    </ul>

    </div>
    </div>
  </div>
</header>

<main class="flex w1940 member">
  <div class="dashboard-left">
     <ul>
      <li><a href="{{ route('host.home.show')}}"><i class="fas fa-table icon-space fa-fw"></i>ホーム</a></li>
      <li><a href="{{ route('host.post.show')}}"><i class="fas fa-calendar-alt fa-fw icon-space"></i>イベントリスト</a></li>
      <li><a class="current" href="{{ route('host.member.show')}}"><i class="fas fa-user-edit fa-fw icon-space"></i>会員リスト</a></li>
      <li><a href="{{ route('host.fee.show')}}"><i class="fas fa-money-check fa-fw icon-space"></i>会費リスト</a></li>
      <li><a href="{{ route('host.auth.logout')}}"><i class="fab fa-houzz fa-fw icon-space"></i>ログアウト</a></li>
    </ul>
  </div>
  <div class="dashboard-right">
  <div class="flex">

    <p class="user-icon">
      @if(!$user->user_icon)
        <img src="{{ asset('img/dashboard/icon.png') }}">
      @else
        <img src="{{asset(\Storage::url($user->user_icon))}}">
      @endif
    </p>
    <div class="form-wrap">
      <div>ID：{{ $user->user_id }}</div>
      <div>ニックネーム：{{ $user->user_nickname }}</div>
      <div>氏名：{{ $user->user_familyname }} {{ $user->user_firstname }}</div>
      <div>フリガナ：{{ $user->user_kana_familyname }} {{ $user->user_kana_firstname }}</div>
      <div>性別：{{ $user->user_sex }}</div>
      <div>電話番号：{{ $user->user_tel }}</div>
      <div>メールアドレス：{{ $user->user_mail }}</div>
      <div>生年月日：{{ $user->user_birthday_year }}年{{ $user->user_birthday_month }}月{{ $user->user_birthday_day }}日</div>
      <div>お知らせ：{{ $user->user_newsletter }}</div>
      <div>登録日：{{ $user->created_at }}</div>
      <div>更新日：{{ $user->updated_at }}</div>
      <div>退会日：{{ $user->deleted_at }}</div>
      <div class="member-btn flex">
        <a class="advance-link" href="{{ action('Host\HomeController@editMember', $user->user_id) }}">修正する</a>
        <a class="bk-link" href="{{ action('Host\HomeController@showMemberlist') }}">戻る</a>
      </div>
    </div>
  </div>


</main>
<footer>

</footer>


</body>
</html>
