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

<main class="flex w1940">
  <div class="dashboard-left">
     <ul>
      <li><a href="{{ route('host.home.show')}}"><i class="fas fa-table icon-space"></i>ホーム</a></li>
      <li><a href="{{ route('host.post.show')}}"><i class="fas fa-calendar-alt icon-space"></i>イベントリスト</a></li>
      <li><a href="{{ route('host.member.show')}}"><i class="fas fa-user-edit icon-space"></i>会員リスト</a></li>
      <li><a class="current" href="{{ route('host.fee.show')}}"><i class="fas fa-money-check icon-space"></i>会費リスト</a></li>
      <li><a href="{{ route('host.auth.logout')}}"><i class="fab fa-houzz icon-space"></i>ログアウト</a></li>

    </ul>
  </div>
  <div class="dashboard-right">


  </div>
</main>
<footer>

</footer>


</body>
</html>
