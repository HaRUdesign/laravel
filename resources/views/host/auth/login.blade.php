<!DOCTYPE html>
<html>
@include('parts.head')
<body class="login">
@include('parts.header-login')
<main class="main">
      <form action="{{ route('host.login') }}" method="post">
        @csrf
        <input id="host_mail" type="email" name="host_mail" placeholder="メールアドレス" value="{{ old('host_mail') }}" autocomplete="email">

        <input id="host_pass" type="password" name="host_pass" placeholder="パスワード">
         @if ($errors->has('host_mail'))
        <div class="error">{{ $errors->first('host_mail')}}</div>
        @endif
        @if ($errors->has('host_pass'))
        <div class="error">{{ $errors->first('host_pass')}}</div>
        @endif
         @if (session('mismatch'))
        <div class="error">{{ session('mismatch') }}</div>
        @endif
        <div class="btn">
          <input type="submit">
        </div>
          <p class="pass"><a href="#">パスワードを忘れた方はコチラ</a></p>
          <p class="new"><a href="{{ route('host.create') }}">新規登録の方はコチラ</a></p>
      </form>

  </div>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
