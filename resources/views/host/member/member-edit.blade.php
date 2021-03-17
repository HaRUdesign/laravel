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

<main class="flex w1940 member-edit">
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
    <form class="edit" action="{{ route('host.updateMember',['user'=>$user->user_id]) }}" method="post">
      @csrf
      <div class="flex">
        <div>ID：</div>
        <div>
        <!-- <input type="hidden" name="user_id" value="{{ $user->user_id}}"> -->
        {{ $user->user_id }}</div>
      </div>

      <div class="flex">
        <div>ニックネーム：</div>
        <div>
          <input type="text" name="user_nickname" value="{{ $user->user_nickname}}">
          @if ($errors->has('user_nickname'))
            <span class="error">{{ $errors->first('user_nickname')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>苗字：</div>
        <div>
          <input type="text" name="user_familyname" value="{{ $user->user_familyname}}">
          @if ($errors->has('user_familyname'))
            <span class="error">{{ $errors->first('user_familyname')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>名前：</div>
        <div>
          <input type="text" name="user_firstname" value="{{ $user->user_firstname}}">
          @if ($errors->has('user_firstname'))
            <span class="error">{{ $errors->first('user_firstname')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>苗字(カナ)：</div>
        <div>
          <input type="text" name="user_kana_familyname" value="{{ $user->user_kana_familyname}}">
          @if ($errors->has('user_kana_familyname'))
            <span class="error">{{ $errors->first('user_kana_familyname')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>名前(カナ)：</div>
        <div>
          <input type="text" name="user_kana_firstname" value="{{ $user->user_kana_firstname}}">
          @if ($errors->has('user_kana_firstname'))
            <span class="error">{{ $errors->first('user_kana_firstname')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>性別：</div>
        <div class="radio">
          <input id="men" name="user_sex" type="radio" value="男性" @if($user->user_sex ==='男性') checked="checked" @endif><label for="men">男性</label>
          <input id="women" name="user_sex" type="radio" value="女性" @if($user->user_sex ==='女性') checked="checked" @endif><label for="women">女性</label>
          @if ($errors->has('user_sex'))
            <span class="error">{{ $errors->first('user_sex')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>メールアドレス：</div>
        <div>
          <input type="email" name="user_mail" value="{{ $user->user_mail}}">
          @if ($errors->has('user_mail'))
            <span class="error">{{ $errors->first('user_mail')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>電話番号：</div>
        <div>
          <input type="text" name="user_tel" value="{{ $user->user_tel}}">
          @if ($errors->has('user_tel'))
            <span class="error">{{ $errors->first('user_tel')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>住所：</div>
        <div>
          <select name="user_address">
            <option value="北海道" @if($user->user_address ==='北海道') selected @endif>北海道</option>
            <option value="青森県" @if($user->user_address ==='青森県') selected @endif>青森県</option>
            <option value="岩手県" @if($user->user_address ==='岩手県') selected @endif>岩手県</option>
            <option value="宮城県" @if($user->user_address ==='宮城県') selected @endif>宮城県</option>
            <option value="秋田県" @if($user->user_address ==='秋田県') selected @endif>秋田県</option>
            <option value="山形県" @if($user->user_address ==='山形県') selected @endif>山形県</option>
            <option value="福島県" @if($user->user_address ==='福島県') selected @endif>福島県</option>
            <option value="茨城県" @if($user->user_address ==='茨城県') selected @endif>茨城県</option>
            <option value="栃木県" @if($user->user_address ==='栃木県') selected @endif>栃木県</option>
            <option value="群馬県" @if($user->user_address ==='群馬県') selected @endif>群馬県</option>
            <option value="埼玉県" @if($user->user_address ==='埼玉県') selected @endif>埼玉県</option>
            <option value="千葉県" @if($user->user_address ==='千葉県') selected @endif>千葉県</option>
            <option value="東京都" @if($user->user_address ==='東京都') selected @endif>東京都</option>
            <option value="神奈川県" @if($user->user_address ==='神奈川県') selected @endif>神奈川県</option>
            <option value="新潟県" @if($user->user_address ==='新潟県') selected @endif>新潟県</option>
            <option value="富山県" @if($user->user_address ==='富山県') selected @endif>富山県</option>
            <option value="石川県" @if($user->user_address ==='石川県') selected @endif>石川県</option>
            <option value="福井県" @if($user->user_address ==='福井県') selected @endif>福井県</option>
            <option value="山梨県" @if($user->user_address ==='山梨県') selected @endif>山梨県</option>
            <option value="長野県" @if($user->user_address ==='長野県') selected @endif>長野県</option>
            <option value="岐阜県" @if($user->user_address ==='岐阜県') selected @endif>岐阜県</option>
            <option value="静岡県" @if($user->user_address ==='静岡県') selected @endif>静岡県</option>
            <option value="愛知県" @if($user->user_address ==='愛知県') selected @endif>愛知県</option>
            <option value="三重県" @if($user->user_address ==='三重県') selected @endif>三重県</option>
            <option value="滋賀県" @if($user->user_address ==='滋賀県') selected @endif>滋賀県</option>
            <option value="京都府" @if($user->user_address ==='京都府') selected @endif>京都府</option>
            <option value="大阪府" @if($user->user_address ==='大阪府') selected @endif>大阪府</option>
            <option value="兵庫県" @if($user->user_address ==='兵庫県') selected @endif>兵庫県</option>
            <option value="奈良県" @if($user->user_address ==='奈良県') selected @endif>奈良県</option>
            <option value="和歌山県" @if($user->user_address ==='和歌山県') selected @endif>和歌山県</option>
            <option value="鳥取県" @if($user->user_address ==='鳥取県') selected @endif>鳥取県</option>
            <option value="島根県" @if($user->user_address ==='島根県') selected @endif>島根県</option>
            <option value="岡山県" @if($user->user_address ==='岡山県') selected @endif>岡山県</option>
            <option value="広島県" @if($user->user_address ==='広島県') selected @endif>広島県</option>
            <option value="山口県" @if($user->user_address ==='山口県') selected @endif>山口県</option>
            <option value="徳島県" @if($user->user_address ==='徳島県') selected @endif>徳島県</option>
            <option value="香川県" @if($user->user_address ==='香川県') selected @endif>香川県</option>
            <option value="愛媛県" @if($user->user_address ==='愛媛県') selected @endif>愛媛県</option>
            <option value="高知県" @if($user->user_address ==='高知県') selected @endif>高知県</option>
            <option value="福岡県" @if($user->user_address ==='福岡県') selected @endif>福岡県</option>
            <option value="佐賀県" @if($user->user_address ==='佐賀県') selected @endif>佐賀県</option>
            <option value="長崎県" @if($user->user_address ==='長崎県') selected @endif>長崎県</option>
            <option value="熊本県" @if($user->user_address ==='熊本県') selected @endif>熊本県</option>
            <option value="大分県" @if($user->user_address ==='大分県') selected @endif>大分県</option>
            <option value="宮崎県" @if($user->user_address ==='宮崎県') selected @endif>宮崎県</option>
            <option value="鹿児島県" @if($user->user_address ==='鹿児島県') selected @endif>鹿児島県</option>
            <option value="沖縄県" @if($user->user_address ==='沖縄県') selected @endif>沖縄県</option>
          </select>
          @if ($errors->has('user_address'))
            <span class="error">{{ $errors->first('user_address')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>生年月日：</div>
        <div>
          <select name="user_birthday_year">
            <option value="1900" @if($user->user_birthday_year ==='1900') selected @endif>1900</option>
            <option value="1901" @if($user->user_birthday_year ==='1901') selected @endif>1901</option>
            <option value="1902" @if($user->user_birthday_year ==='1902') selected @endif>1902</option>
            <option value="1903" @if($user->user_birthday_year ==='1903') selected @endif>1903</option>
            <option value="1904" @if($user->user_birthday_year ==='1904') selected @endif>1904</option>
            <option value="1905" @if($user->user_birthday_year ==='1905') selected @endif>1905</option>
            <option value="1906" @if($user->user_birthday_year ==='1906') selected @endif>1906</option>
            <option value="1907" @if($user->user_birthday_year ==='1907') selected @endif>1907</option>
            <option value="1908" @if($user->user_birthday_year ==='1908') selected @endif>1908</option>
            <option value="1909" @if($user->user_birthday_year ==='1909') selected @endif>1909</option>
            <option value="1910" @if($user->user_birthday_year ==='1910') selected @endif>1910</option>
            <option value="1911" @if($user->user_birthday_year ==='1911') selected @endif>1911</option>
            <option value="1912" @if($user->user_birthday_year ==='1912') selected @endif>1912</option>
            <option value="1913" @if($user->user_birthday_year ==='1913') selected @endif>1913</option>
            <option value="1914" @if($user->user_birthday_year ==='1914') selected @endif>1914</option>
            <option value="1915" @if($user->user_birthday_year ==='1915') selected @endif>1915</option>
            <option value="1916" @if($user->user_birthday_year ==='1916') selected @endif>1916</option>
            <option value="1917" @if($user->user_birthday_year ==='1917') selected @endif>1917</option>
            <option value="1918" @if($user->user_birthday_year ==='1918') selected @endif>1918</option>
            <option value="1919" @if($user->user_birthday_year ==='1919') selected @endif>1919</option>
            <option value="1920" @if($user->user_birthday_year ==='1920') selected @endif>1920</option>
            <option value="1921" @if($user->user_birthday_year ==='1921') selected @endif>1921</option>
            <option value="1922" @if($user->user_birthday_year ==='1922') selected @endif>1922</option>
            <option value="1923" @if($user->user_birthday_year ==='1923') selected @endif>1923</option>
            <option value="1924" @if($user->user_birthday_year ==='1924') selected @endif>1924</option>
            <option value="1925" @if($user->user_birthday_year ==='1925') selected @endif>1925</option>
            <option value="1926" @if($user->user_birthday_year ==='1926') selected @endif>1926</option>
            <option value="1927" @if($user->user_birthday_year ==='1927') selected @endif>1927</option>
            <option value="1928" @if($user->user_birthday_year ==='1928') selected @endif>1928</option>
            <option value="1929" @if($user->user_birthday_year ==='1929') selected @endif>1929</option>
            <option value="1930" @if($user->user_birthday_year ==='1930') selected @endif>1930</option>
            <option value="1931" @if($user->user_birthday_year ==='1931') selected @endif>1931</option>
            <option value="1932" @if($user->user_birthday_year ==='1932') selected @endif>1932</option>
            <option value="1933" @if($user->user_birthday_year ==='1933') selected @endif>1933</option>
            <option value="1934" @if($user->user_birthday_year ==='1934') selected @endif>1934</option>
            <option value="1935" @if($user->user_birthday_year ==='1935') selected @endif>1935</option>
            <option value="1936" @if($user->user_birthday_year ==='1936') selected @endif>1936</option>
            <option value="1937" @if($user->user_birthday_year ==='1937') selected @endif>1937</option>
            <option value="1938" @if($user->user_birthday_year ==='1938') selected @endif>1938</option>
            <option value="1939" @if($user->user_birthday_year ==='1939') selected @endif>1939</option>
            <option value="1940" @if($user->user_birthday_year ==='1940') selected @endif>1940</option>
            <option value="1941" @if($user->user_birthday_year ==='1941') selected @endif>1941</option>
            <option value="1942" @if($user->user_birthday_year ==='1942') selected @endif>1942</option>
            <option value="1943" @if($user->user_birthday_year ==='1943') selected @endif>1943</option>
            <option value="1944" @if($user->user_birthday_year ==='1944') selected @endif>1944</option>
            <option value="1945" @if($user->user_birthday_year ==='1945') selected @endif>1945</option>
            <option value="1946" @if($user->user_birthday_year ==='1946') selected @endif>1946</option>
            <option value="1947" @if($user->user_birthday_year ==='1947') selected @endif>1947</option>
            <option value="1948" @if($user->user_birthday_year ==='1948') selected @endif>1948</option>
            <option value="1949" @if($user->user_birthday_year ==='1949') selected @endif>1949</option>
            <option value="1950" @if($user->user_birthday_year ==='1950') selected @endif>1950</option>
            <option value="1951" @if($user->user_birthday_year ==='1951') selected @endif>1951</option>
            <option value="1952" @if($user->user_birthday_year ==='1952') selected @endif>1952</option>
            <option value="1953" @if($user->user_birthday_year ==='1953') selected @endif>1953</option>
            <option value="1954" @if($user->user_birthday_year ==='1954') selected @endif>1954</option>
            <option value="1955" @if($user->user_birthday_year ==='1955') selected @endif>1955</option>
            <option value="1956" @if($user->user_birthday_year ==='1956') selected @endif>1956</option>
            <option value="1957" @if($user->user_birthday_year ==='1957') selected @endif>1957</option>
            <option value="1958" @if($user->user_birthday_year ==='1958') selected @endif>1958</option>
            <option value="1959" @if($user->user_birthday_year ==='1959') selected @endif>1959</option>
            <option value="1960" @if($user->user_birthday_year ==='1960') selected @endif>1960</option>
            <option value="1961" @if($user->user_birthday_year ==='1961') selected @endif>1961</option>
            <option value="1962" @if($user->user_birthday_year ==='1962') selected @endif>1962</option>
            <option value="1963" @if($user->user_birthday_year ==='1963') selected @endif>1963</option>
            <option value="1964" @if($user->user_birthday_year ==='1964') selected @endif>1964</option>
            <option value="1965" @if($user->user_birthday_year ==='1965') selected @endif>1965</option>
            <option value="1966" @if($user->user_birthday_year ==='1966') selected @endif>1966</option>
            <option value="1967" @if($user->user_birthday_year ==='1967') selected @endif>1967</option>
            <option value="1968" @if($user->user_birthday_year ==='1968') selected @endif>1968</option>
            <option value="1969" @if($user->user_birthday_year ==='1969') selected @endif>1969</option>
            <option value="1970" @if($user->user_birthday_year ==='1970') selected @endif>1970</option>
            <option value="1971" @if($user->user_birthday_year ==='1971') selected @endif>1971</option>
            <option value="1972" @if($user->user_birthday_year ==='1972') selected @endif>1972</option>
            <option value="1973" @if($user->user_birthday_year ==='1973') selected @endif>1973</option>
            <option value="1974" @if($user->user_birthday_year ==='1974') selected @endif>1974</option>
            <option value="1975" @if($user->user_birthday_year ==='1975') selected @endif>1975</option>
            <option value="1976" @if($user->user_birthday_year ==='1976') selected @endif>1976</option>
            <option value="1977" @if($user->user_birthday_year ==='1977') selected @endif>1977</option>
            <option value="1978" @if($user->user_birthday_year ==='1978') selected @endif>1978</option>
            <option value="1979" @if($user->user_birthday_year ==='1979') selected @endif>1979</option>
            <option value="1980" @if($user->user_birthday_year ==='1980') selected @endif>1980</option>
            <option value="1981" @if($user->user_birthday_year ==='1981') selected @endif>1981</option>
            <option value="1982" @if($user->user_birthday_year ==='1982') selected @endif>1982</option>
            <option value="1983" @if($user->user_birthday_year ==='1983') selected @endif>1983</option>
            <option value="1984" @if($user->user_birthday_year ==='1984') selected @endif>1984</option>
            <option value="1985" @if($user->user_birthday_year ==='1985') selected @endif>1985</option>
            <option value="1986" @if($user->user_birthday_year ==='1986') selected @endif>1986</option>
            <option value="1987" @if($user->user_birthday_year ==='1987') selected @endif>1987</option>
            <option value="1988" @if($user->user_birthday_year ==='1988') selected @endif>1988</option>
            <option value="1989" @if($user->user_birthday_year ==='1989') selected @endif>1989</option>
            <option value="1990" @if($user->user_birthday_year ==='1990') selected @endif>1990</option>
            <option value="1991" @if($user->user_birthday_year ==='1991') selected @endif>1991</option>
            <option value="1992" @if($user->user_birthday_year ==='1992') selected @endif>1992</option>
            <option value="1993" @if($user->user_birthday_year ==='1993') selected @endif>1993</option>
            <option value="1994" @if($user->user_birthday_year ==='1994') selected @endif>1994</option>
            <option value="1995" @if($user->user_birthday_year ==='1995') selected @endif>1995</option>
            <option value="1996" @if($user->user_birthday_year ==='1996') selected @endif>1996</option>
            <option value="1997" @if($user->user_birthday_year ==='1997') selected @endif>1997</option>
            <option value="1998" @if($user->user_birthday_year ==='1998') selected @endif>1998</option>
            <option value="1999" @if($user->user_birthday_year ==='1999') selected @endif>1999</option>
            <option value="2000" @if($user->user_birthday_year ==='2000') selected @endif>2000</option>
            <option value="2001" @if($user->user_birthday_year ==='2001') selected @endif>2001</option>
            <option value="2002" @if($user->user_birthday_year ==='2002') selected @endif>2002</option>
            <option value="2003" @if($user->user_birthday_year ==='2003') selected @endif>2003</option>
            <option value="2004" @if($user->user_birthday_year ==='2004') selected @endif>2004</option>
            <option value="2005" @if($user->user_birthday_year ==='2005') selected @endif>2005</option>
            <option value="2006" @if($user->user_birthday_year ==='2006') selected @endif>2006</option>
            <option value="2007" @if($user->user_birthday_year ==='2007') selected @endif>2007</option>
            <option value="2008" @if($user->user_birthday_year ==='2008') selected @endif>2008</option>
            <option value="2009" @if($user->user_birthday_year ==='2009') selected @endif>2009</option>
            <option value="2010" @if($user->user_birthday_year ==='2010') selected @endif>2010</option>
            <option value="2011" @if($user->user_birthday_year ==='2011') selected @endif>2011</option>
            <option value="2012" @if($user->user_birthday_year ==='2012') selected @endif>2012</option>
            <option value="2013" @if($user->user_birthday_year ==='2013') selected @endif>2013</option>
            <option value="2014" @if($user->user_birthday_year ==='2014') selected @endif>2014</option>
            <option value="2015" @if($user->user_birthday_year ==='2015') selected @endif>2015</option>
            <option value="2016" @if($user->user_birthday_year ==='2016') selected @endif>2016</option>
            <option value="2017" @if($user->user_birthday_year ==='2017') selected @endif>2017</option>
            <option value="2018" @if($user->user_birthday_year ==='2018') selected @endif>2018</option>
            <option value="2019" @if($user->user_birthday_year ==='2019') selected @endif>2019</option>
            <option value="2020" @if($user->user_birthday_year ==='2020') selected @endif>2020</option>
            <option value="2021" @if($user->user_birthday_year ==='2021') selected @endif>2021</option>
            <option value="2022" @if($user->user_birthday_year ==='2022') selected @endif>2022</option>
            <option value="2023" @if($user->user_birthday_year ==='2023') selected @endif>2023</option>
            <option value="2024" @if($user->user_birthday_year ==='2024') selected @endif>2024</option>
            <option value="2025" @if($user->user_birthday_year ==='2025') selected @endif>2025</option>
            <option value="2026" @if($user->user_birthday_year ==='2026') selected @endif>2026</option>
            <option value="2027" @if($user->user_birthday_year ==='2027') selected @endif>2027</option>
            <option value="2028" @if($user->user_birthday_year ==='2028') selected @endif>2028</option>
            <option value="2029" @if($user->user_birthday_year ==='2029') selected @endif>2029</option>
            <option value="2030" @if($user->user_birthday_year ==='2030') selected @endif>2030</option>
          </select>　年　
          <select name="user_birthday_month">
            <option value="1" @if($user->user_birthday_month ==='1') selected @endif>1</option>
            <option value="2" @if($user->user_birthday_month ==='2') selected @endif>2</option>
            <option value="3" @if($user->user_birthday_month ==='3') selected @endif>3</option>
            <option value="4" @if($user->user_birthday_month ==='4') selected @endif>4</option>
            <option value="5" @if($user->user_birthday_month ==='5') selected @endif>5</option>
            <option value="6" @if($user->user_birthday_month ==='6') selected @endif>6</option>
            <option value="7" @if($user->user_birthday_month ==='7') selected @endif>7</option>
            <option value="8" @if($user->user_birthday_month ==='8') selected @endif>8</option>
            <option value="9" @if($user->user_birthday_month ==='9') selected @endif>9</option>
            <option value="10" @if($user->user_birthday_month ==='10') selected @endif>10</option>
            <option value="11" @if($user->user_birthday_month ==='11') selected @endif>11</option>
            <option value="12" @if($user->user_birthday_month ==='12') selected @endif>12</option>
          </select>　月　
          <select name="user_birthday_day">
            <option value="1" @if($user->user_birthday_day ==='1') selected @endif>1</option>
            <option value="2" @if($user->user_birthday_day ==='2') selected @endif>2</option>
            <option value="3" @if($user->user_birthday_day ==='3') selected @endif>3</option>
            <option value="4" @if($user->user_birthday_day ==='4') selected @endif>4</option>
            <option value="5" @if($user->user_birthday_day ==='5') selected @endif>5</option>
            <option value="6" @if($user->user_birthday_day ==='6') selected @endif>6</option>
            <option value="7" @if($user->user_birthday_day ==='7') selected @endif>7</option>
            <option value="8" @if($user->user_birthday_day ==='8') selected @endif>8</option>
            <option value="9" @if($user->user_birthday_day ==='9') selected @endif>9</option>
            <option value="10" @if($user->user_birthday_day ==='10') selected @endif>10</option>
            <option value="11" @if($user->user_birthday_day ==='11') selected @endif>11</option>
            <option value="12" @if($user->user_birthday_day ==='12') selected @endif>12</option>
            <option value="13" @if($user->user_birthday_day ==='13') selected @endif>13</option>
            <option value="14" @if($user->user_birthday_day ==='14') selected @endif>14</option>
            <option value="15" @if($user->user_birthday_day ==='15') selected @endif>15</option>
            <option value="16" @if($user->user_birthday_day ==='16') selected @endif>16</option>
            <option value="17" @if($user->user_birthday_day ==='17') selected @endif>17</option>
            <option value="18" @if($user->user_birthday_day ==='18') selected @endif>18</option>
            <option value="19" @if($user->user_birthday_day ==='19') selected @endif>19</option>
            <option value="20" @if($user->user_birthday_day ==='20') selected @endif>20</option>
            <option value="21" @if($user->user_birthday_day ==='21') selected @endif>21</option>
            <option value="22" @if($user->user_birthday_day ==='22') selected @endif>22</option>
            <option value="23" @if($user->user_birthday_day ==='23') selected @endif>23</option>
            <option value="24" @if($user->user_birthday_day ==='24') selected @endif>24</option>
            <option value="25" @if($user->user_birthday_day ==='25') selected @endif>25</option>
            <option value="26" @if($user->user_birthday_day ==='26') selected @endif>26</option>
            <option value="27" @if($user->user_birthday_day ==='27') selected @endif>27</option>
            <option value="28" @if($user->user_birthday_day ==='28') selected @endif>28</option>
            <option value="29" @if($user->user_birthday_day ==='29') selected @endif>29</option>
            <option value="30" @if($user->user_birthday_day ==='30') selected @endif>30</option>
            <option value="31" @if($user->user_birthday_day ==='31') selected @endif>31</option>
          </select>　日　
          @if ($errors->has('user_birthday_year'))
            <span class="error">{{ $errors->first('user_birthday_year')}}</span>
          @endif
          @if ($errors->has('user_birthday_month'))
            <span class="error">{{ $errors->first('user_birthday_month')}}</span>
          @endif
          @if ($errors->has('user_birthday_day'))
            <span class="error">{{ $errors->first('user_birthday_day')}}</span>
          @endif
        </div>
      </div>

      <div class="flex">
        <div>お知らせ：</div>
        <div>
          <input class="check" type="hidden" value="no" name="user_newsletter">
          <label><input class="check" @if($user->user_newsletter ==='yes') checked @endif value="yes" type="checkbox" name="user_newsletter"><span>YES</span></label>
          @if ($errors->has('user_newsletter'))
            <span class="error">{{ $errors->first('user_newsletter')}}</span>
          @endif
        </div>
      </div>

      <div class="member-btn flex">
        <input type="submit" value="変更する">
        <a class="bk-link" href="{{ route('host.member',$user->user_id) }}">戻る</a>
      </div>
  </form>
 </div>

</main>
<footer>

</footer>


</body>
</html>
