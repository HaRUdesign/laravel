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

  <main class="dashboard-home flex w1940">
    <div class="dashboard-left">
      <ul>
        <li><a class="current" href="{{ route('host.home.show') }}"><i class="fas fa-table icon-space"></i>ホーム</a></li>
        <li><a href="{{ route('host.post.show') }}"><i class="fas fa-calendar-alt icon-space"></i>イベントリスト</a></li>
        <li><a href="{{ route('host.member.show') }}"><i class="fas fa-user-edit icon-space"></i>会員リスト</a></li>
        <li><a href="{{ route('host.fee.show') }}"><i class="fas fa-money-check icon-space"></i>会費リスト</a></li>
        <li><a href="{{ route('host.auth.logout') }}"><i class="fab fa-houzz icon-space"></i>ログアウト</a></li>
      </ul>
    </div>

    <div class="dashboard-right">

      <section>
        <h2>ANALYSIS</h2>
        <ul class="flex">
          <li>
            <p></p>
            アクティブ合計
          </li>
          <li>住まい</li>
          <li>男女比</li>
          <li>登録曜日</li>
        </ul>
      </section>

      <section>
        <h2>ACTIVE EVENT</h2>
        @foreach($posts as $post)
          @if($loop->iteration %2 !=0)
              <div class="flex">
              @endif
              <div class ="flex post-block">
                <div class="post-left">
                @if(isset( $post->post_img))
                <img src="{{ asset(\Storage::url($post->post_img)) }}">
                @else
                <img src="{{ asset('img/lec/lec_001.jpg') }}">
                @endif
                </div>

                <div class="post-right">
                  <div class="post-date">{{ $post->post_year }}年{{ $post->post_month }}月{{ $post->post_day }}日</div>
                  <div class="post-title">{{ $post->post_name }}</div>
                  <div class="post-detail">{{ $post->post_detail }}</div>
                  <a href="{{ route('host.post.edit', $post) }}">詳細</a>
                </div>
              </div>
              @if($loop->iteration %2 ==0)
            </div>
        @endif
        @endforeach
      </section>

      <section>
        <h2>NEW MEMBER</h2>
        <table>
          <tr>
            <th>ID</th>
            <th>ネーム</th>
            <th>苗字</th>
            <th>名前</th>
            <th>苗字(カナ)</th>
            <th>名前(カナ)</th>
            <th>性別</th>
            <th>メール</th>
            <th>電話番号</th>
            <th>住まい</th>
            <th>生年月日</th>
            <th>レター</th>
            <th>登録日</th>
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
      </section>
    </div>
  </main>
  <footer>
  </footer>
</body>
</html>
