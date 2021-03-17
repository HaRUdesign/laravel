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
      <li><a class="current" href="{{ route('host.home.show')}}"><i class="fas fa-table icon-space"></i>ホーム</a></li>
      <li><a href="{{ route('host.post.show')}}"><i class="fas fa-calendar-alt icon-space"></i>イベントリスト</a></li>
      <li><a href="{{ route('host.member.show')}}"><i class="fas fa-user-edit icon-space"></i>会員リスト</a></li>
      <li><a href="{{ route('host.fee.show')}}"><i class="fas fa-money-check icon-space"></i>会費リスト</a></li>
      <li><a href="{{ route('host.auth.logout')}}"><i class="fab fa-houzz icon-space"></i>ログアウト</a></li>
    </ul>
  </div>

  <div class="dashboard-right">
    <section>
      <h2>EVENT UPDATE</h2>
      <form action="{{ route('host.post.update', $post) }}" method="post" enctype='multipart/form-data'>
      @csrf
      {{ method_field('patch') }}
        <div class="flex">
          <div class="post-edit-left">
             @if(isset( $post->post_img))
            <img src="{{ asset('post_img/').$post->post_img }}">
            @else
            <img src="{{ asset('img/lec/lec_001.jpg') }}">
            @endif

            <input type="file" name="post_img">
            @if ($errors->has('post_img'))
              <span class="error">{{ $errors->first('post_img')}}</span>
            @endif
          </div>

          <div class="post-edit-right">
            <ul>
              <li>ID：{{ $post->post_id }}</li>
              <li>日付：
                <select name="post_year">
                  <option value="2021" @if($post->post_year ==='2021') selected @endif>2021</option>
                  <option value="2022" @if($post->post_year ==='2022') selected @endif>2022</option>
                  <option value="2023" @if($post->post_year ==='2023') selected @endif>2023</option>
                  <option value="2024" @if($post->post_year ==='2024') selected @endif>2024</option>
                  <option value="2025" @if($post->post_year ==='2025') selected @endif>2025</option>
                  <option value="2026" @if($post->post_year ==='2026') selected @endif>2026</option>
                  <option value="2027" @if($post->post_year ==='2027') selected @endif>2027</option>
                  <option value="2028" @if($post->post_year ==='2028') selected @endif>2028</option>
                  <option value="2029" @if($post->post_year ==='2029') selected @endif>2029</option>
                  <option value="2030" @if($post->post_year ==='2030') selected @endif>2030</option>
                </select>　年
                <select name="post_month">
                  <option value="1" @if($post->post_year ==='1') selected @endif>01</option>
                  <option value="2" @if($post->post_year ==='2') selected @endif>02</option>
                  <option value="3" @if($post->post_year ==='3') selected @endif>03</option>
                  <option value="4" @if($post->post_year ==='4') selected @endif>04</option>
                  <option value="5" @if($post->post_year ==='5') selected @endif>05</option>
                  <option value="6" @if($post->post_year ==='6') selected @endif>06</option>
                  <option value="7" @if($post->post_year ==='7') selected @endif>07</option>
                  <option value="8" @if($post->post_year ==='8') selected @endif>08</option>
                  <option value="9" @if($post->post_year ==='9') selected @endif>09</option>
                  <option value="10" @if($post->post_year ==='10') selected @endif>10</option>
                  <option value="11" @if($post->post_year ==='11') selected @endif>11</option>
                  <option value="12" @if($post->post_year ==='12') selected @endif>12</option>
                </select>　月
                <select name="post_day">
                  <option value="1" @if($post->post_year ==='1') selected @endif>01</option>
                  <option value="2" @if($post->post_year ==='2') selected @endif>02</option>
                  <option value="3" @if($post->post_year ==='3') selected @endif>03</option>
                  <option value="4" @if($post->post_year ==='4') selected @endif>04</option>
                  <option value="5" @if($post->post_year ==='5') selected @endif>05</option>
                  <option value="6" @if($post->post_year ==='6') selected @endif>06</option>
                  <option value="7" @if($post->post_year ==='7') selected @endif>07</option>
                  <option value="8" @if($post->post_year ==='8') selected @endif>08</option>
                  <option value="9" @if($post->post_year ==='9') selected @endif>09</option>
                  <option value="10" @if($post->post_year ==='10') selected @endif>10</option>
                  <option value="11" @if($post->post_year ==='11') selected @endif>11</option>
                  <option value="12" @if($post->post_year ==='12') selected @endif>12</option>
                  <option value="13" @if($post->post_year ==='13') selected @endif>13</option>
                  <option value="14" @if($post->post_year ==='14') selected @endif>14</option>
                  <option value="15" @if($post->post_year ==='15') selected @endif>15</option>
                  <option value="16" @if($post->post_year ==='16') selected @endif>16</option>
                  <option value="17" @if($post->post_year ==='17') selected @endif>17</option>
                  <option value="18" @if($post->post_year ==='18') selected @endif>18</option>
                  <option value="19" @if($post->post_year ==='19') selected @endif>19</option>
                  <option value="20" @if($post->post_year ==='20') selected @endif>20</option>
                  <option value="21" @if($post->post_year ==='21') selected @endif>21</option>
                  <option value="22" @if($post->post_year ==='22') selected @endif>22</option>
                  <option value="23" @if($post->post_year ==='23') selected @endif>23</option>
                  <option value="24" @if($post->post_year ==='24') selected @endif>24</option>
                  <option value="25" @if($post->post_year ==='25') selected @endif>25</option>
                  <option value="26" @if($post->post_year ==='26') selected @endif>26</option>
                  <option value="27" @if($post->post_year ==='27') selected @endif>27</option>
                  <option value="28" @if($post->post_year ==='28') selected @endif>28</option>
                  <option value="29" @if($post->post_year ==='29') selected @endif>29</option>
                  <option value="30" @if($post->post_year ==='30') selected @endif>30</option>
                  <option value="31" @if($post->post_year ==='31') selected @endif>31</option>
                </select>　日
                @if ($errors->has('post_year'))
                <span class="error">{{ $errors->first('post_year')}}</span>
                @endif
                @if ($errors->has('post_month'))
                  <span class="error">{{ $errors->first('post_month')}}</span>
                @endif
                @if ($errors->has('post_day'))
                  <span class="error">{{ $errors->first('post_day')}}</span>
                @endif
              </li>
              <li>タイトル：
                <input type="text" name="post_name" value="{{ old('post_name',$post->post_name) }}">
                @if ($errors->has('post_name'))
                  <span class="error">{{ $errors->first('post_name')}}</span>
                @endif
              </li>
              <li>詳細：<br>
                <textarea name="post_detail">{{ old('post_detail',$post->post_detail) }}</textarea>

                @if ($errors->has('post_detail'))
                <span class="error">{{ $errors->first('post_detail')}}</span>
                @endif
              </li>
            </ul>
            <div class="member-btn flex">
              <a class="bk-link" href="javascript:history.back();">戻る</a>
              <input type="submit" value="変更する">
            </div>
          </div>
        </div>
      </form>

    </section>
  </div>
</main>
<footer>
</footer>
</body>
</html>
