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

<main class="flex w1940 member-list">
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
    @if(isset( $sort ))
    {{ $users->appends(['sort' => $sort])->links() }}
    @else
    {{ $users->links() }}
    @endif
    <table>
    <tr>
      <th>ID<a href="/host/member-list?sort=user_id"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a></th>
      <th>ネーム<a href="/host/member-list?sort=user_nickname"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a></th>
      <th>苗字</th>
      <th>名前</th>
      <th>苗字(カナ)<a href="/host/member-list?sort=user_kana_familyname"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a></th>
      <th>名前(カナ)<a href="/host/member-list?sort=user_kana_firstname"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a></th>
      <th>性別</th>
      <th>メール<a href="/host/member-list?sort=user_mail"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a></th>
      <th>電話番号</th>
      <th>住まい</th>
      <th>生年月日
      <a href="/host/member-list?sort=user_birthday_year"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a>
      <a href="/host/member-list?sort=user_birthday_year"><i class="fas fa-sort-amount-up fa-fw"></i></a>
      </th>
      <th>レター
      <a href="/host/member-list?sort=newsletter_on"><i class="fas fa-comment fa-fw"></i></a>
      <a href="/host/member-list?sort=newsletter_on"><i class="fas fa-comment-slash fa-fw"></i></a>
      </th>
      <th>登録日
      <a href="/host/member-list?sort=created_at&oder=asc"><i class="fas fa-sort-amount-down-alt fa-fw"></i></a>
      <a href="/host/member-list?sort=created_at&oder=desc"><i class="fas fa-sort-amount-up fa-fw"></i>
      </th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->user_id }}</td>
      <td>{{ $user->user_nickname }}</td>
      <td>{{ $user->user_familyname }}</td>
      <td>{{ $user->user_firstname }}</td>
      <td>{{ $user->user_kana_familyname }}</td>
      <td>{{ $user->user_kana_firstname }}</td>
      <td>{{ $user->user_sex }}</td>
      <td>{{ $user->user_mail }}</td>
      <td>{{ $user->user_tel }}</td>
      <td>{{ $user->user_address }}</td>
      <td>{{ $user->user_birthday_year }}年{{ $user->user_birthday_month }}月{{ $user->user_birthday_day }}日</td>
      <td>{{ $user->user_newsletter }}</td>
      <td>{{ $user->created_at }}</td>
      <td><a href="{{ route('host.member', $user->user_id) }}">詳細</a></td>
    </tr>
    @endforeach
    </table>






  </div>
</main>
<footer>

</footer>


</body>
</html>
