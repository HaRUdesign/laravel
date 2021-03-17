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

        <form action="{{ route('host.confirm') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <ul>
            <li>
                <span class="form-category">日時<span class="required">*</span></span>
                <select name="post_year">
                    <option value="">-</option>
                    <option value="2020" @if(old('post_year')==='2020') selected @endif>2020</option>
                    <option value="2021" @if(old('post_year')==='2021') selected @endif>2021</option>
                    <option value="2022" @if(old('post_year')==='2022') selected @endif>2022</option>
                    <option value="2023" @if(old('post_year')==='2023') selected @endif>2023</option>
                    <option value="2024" @if(old('post_year')==='2024') selected @endif>2024</option>
                    <option value="2025" @if(old('post_year')==='2025') selected @endif>2025</option>
                    <option value="2026" @if(old('post_year')==='2026') selected @endif>2026</option>
                    <option value="2027" @if(old('post_year')==='2027') selected @endif>2027</option>
                    <option value="2028" @if(old('post_year')==='2028') selected @endif>2028</option>
                    <option value="2029" @if(old('post_year')==='2029') selected @endif>2029</option>
                    <option value="2030" @if(old('post_year')==='2030') selected @endif>2030</option>
                </select>　年
                <select name="post_month">
                    <option value="">-</option>
                    <option value="1" @if(old('post_month')==='1') selected @endif>01</option>
                    <option value="2" @if(old('post_month')==='2') selected @endif>02</option>
                    <option value="3" @if(old('post_month')==='3') selected @endif>03</option>
                    <option value="4" @if(old('post_month')==='4') selected @endif>04</option>
                    <option value="5" @if(old('post_month')==='5') selected @endif>05</option>
                    <option value="6" @if(old('post_month')==='6') selected @endif>06</option>
                    <option value="7" @if(old('post_month')==='7') selected @endif>07</option>
                    <option value="8" @if(old('post_month')==='8') selected @endif>08</option>
                    <option value="9" @if(old('post_month')==='9') selected @endif>09</option>
                    <option value="10" @if(old('post_month')==='10') selected @endif>10</option>
                    <option value="11" @if(old('post_month')==='11') selected @endif>11</option>
                    <option value="12" @if(old('post_month')==='12') selected @endif>12</option>
                </select>　月
                <select name="post_day">
                    <option value="">-</option>
                    <option value="1" @if(old('post_day')==='1') selected @endif>01</option>
                    <option value="2" @if(old('post_day')==='2') selected @endif>02</option>
                    <option value="3" @if(old('post_day')==='3') selected @endif>03</option>
                    <option value="4" @if(old('post_day')==='4') selected @endif>04</option>
                    <option value="5" @if(old('post_day')==='5') selected @endif>05</option>
                    <option value="6" @if(old('post_day')==='6') selected @endif>06</option>
                    <option value="7" @if(old('post_day')==='7') selected @endif>07</option>
                    <option value="8" @if(old('post_day')==='8') selected @endif>08</option>
                    <option value="9" @if(old('post_day')==='9') selected @endif>09</option>
                    <option value="10" @if(old('post_day')==='10') selected @endif>10</option>
                    <option value="11" @if(old('post_day')==='11') selected @endif>11</option>
                    <option value="12" @if(old('post_day')==='12') selected @endif>12</option>
                    <option value="13" @if(old('post_day')==='13') selected @endif>13</option>
                    <option value="14" @if(old('post_day')==='14') selected @endif>14</option>
                    <option value="15" @if(old('post_day')==='15') selected @endif>15</option>
                    <option value="16" @if(old('post_day')==='16') selected @endif>16</option>
                    <option value="17" @if(old('post_day')==='17') selected @endif>17</option>
                    <option value="18" @if(old('post_day')==='18') selected @endif>18</option>
                    <option value="19" @if(old('post_day')==='19') selected @endif>19</option>
                    <option value="20" @if(old('post_day')==='20') selected @endif>20</option>
                    <option value="21" @if(old('post_day')==='21') selected @endif>21</option>
                    <option value="22" @if(old('post_day')==='22') selected @endif>22</option>
                    <option value="23" @if(old('post_day')==='23') selected @endif>23</option>
                    <option value="24" @if(old('post_day')==='24') selected @endif>24</option>
                    <option value="25" @if(old('post_day')==='25') selected @endif>25</option>
                    <option value="26" @if(old('post_day')==='26') selected @endif>26</option>
                    <option value="27" @if(old('post_day')==='27') selected @endif>27</option>
                    <option value="28" @if(old('post_day')==='28') selected @endif>28</option>
                    <option value="29" @if(old('post_day')==='29') selected @endif>29</option>
                    <option value="30" @if(old('post_day')==='30') selected @endif>30</option>
                    <option value="31" @if(old('post_day')==='31') selected @endif>31</option>
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
            <li>
                <span class="form-category">イベント名<span class="required">*</span></span>
                <input type="text" name="post_name" value="{{ old('post_name') }}">
                @if ($errors->has('post_name'))
                <span class="error">{{ $errors->first('post_name')}}</span>
                @endif
            </li>
            <li>
                <span class="form-category">イベント詳細<span class="required">*</span></span>
                <textarea name="post_detail">{{ old('post_detail') }}</textarea>
                @if ($errors->has('post_detail'))
                <span class="error">{{ $errors->first('post_detail')}}</span>
                @endif
            </li>
            <li class="radio">
                <div class="form-category">ステータス<span class="required">*</span></div>
                <input id="active" name="post_status" type="radio" value="active" @if(old('post_status')==='active') checked="checked" @endif>
                <label for="active">募集中</label>
                <input id="req" name="post_status" type="radio" value="req" @if(old('post_status')==='req') checked="checked" @endif>
                <label for="req">リクエスト中</label>
                <input id="finish" name="post_status" type="radio" value="finish" @if(old('post_status')==='finish') checked="checked" @endif>
                <label for="finish">終了</label>
                @if ($errors->has('post_status'))
                <span class="error">{{ $errors->first('post_status')}}</span>
                @endif
            </li>
            <li>
                <div class="form-category">イベントサムネイル<span class="required">*</span></div>
                <input type="file" name="post_img">
                @if ($errors->has('post_img'))
                <span class="error">{{ $errors->first('post_img')}}</span>
                @endif
            </li>
        </ul>

        <input type="submit" value="登 録 す る">

      </form>


    </section>
  </div>
</main>
<footer>

</footer>


</body>
</html>
