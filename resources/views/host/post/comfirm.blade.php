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

<body class="dashboard post">
<header class="header">
  <div class="flex w1940 header-wrap">
    <div class="header-left"></div>
    <div class="header-right flex">
    <div class="header-right-left">
      <p>Dashboard</p>
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
      <li><a href="{{ route('host.home.show')}}"><i class="fas fa-table icon-space fa-fw"></i>ホーム</a></li>
      <li><a href="{{ route('host.post.show')}}"><i class="fas fa-calendar-alt fa-fw icon-space"></i>イベントリスト</a></li>
      <li><a class="current" href="{{ route('host.member.show')}}"><i class="fas fa-user-edit fa-fw icon-space"></i>会員リスト</a></li>
      <li><a href="{{ route('host.fee.show')}}"><i class="fas fa-money-check fa-fw icon-space"></i>会費リスト</a></li>
      <li><a href="{{ route('host.auth.logout')}}"><i class="fab fa-houzz fa-fw icon-space"></i>ログアウト</a></li>

    </ul>
  </div>
  <div class="dashboard-right">
    <section>
        <h1>NEW EVENT</h1>
        <ul class="flex">
          <li><a href="">NEW</a></li>
          <li><a href="">ACTIVE</a></li>
          <li><a href="">REQUEST</a></li>
          <li><a href="">ALL</a></li>
        </ul>
        <ul>
            <li>
                <span class="form-category">日時<span class="required">*</span></span>
                <p>{{ $input->post_year }}　年 {{ $input->month }}　月{{ $input->day }}　日</p>
            </li>
            <li>
                <span class="form-category">イベント名<span class="required">*</span></span>
                <p>{{ $input->post_name }}</p>
            </li>
            <li>
                <span class="form-category">イベント詳細<span class="required">*</span></span>
                <p>{{ $input->post_detail }}</p>
            </li>
            <li>
                <div class="form-category">ステータス<span class="required">*</span></div>
                <p>{{ $input->post_status }}</p>
            </li>
            <li>
                <div class="form-category">イベントサムネイル<span class="required">*</span></div>
                <p><img src=""></p>
            </li>
        </ul>

        <a type="submit" value="登 録 す る">

      </form>


    </section>
  </div>
</main>
<footer>

</footer>


</body>
</html>
