<!DOCTYPE html>
<html>
@include('parts.head')
<body class="login">
@include('parts.header-login')
<main class="main">
      <form action="{{ route('user.login') }}" method="post">
        @csrf
        <input id="user_mail" type="email" name="user_mail" placeholder="メールアドレス" value="{{ old('user_mail') }}" autocomplete="email">

        <input id="user_pass" type="password" name="user_pass" placeholder="パスワード">
         @if ($errors->has('user_mail'))
        <div class="error">{{ $errors->first('user_mail')}}</div>
        @endif
        @if ($errors->has('user_pass'))
        <div class="error">{{ $errors->first('user_pass')}}</div>
        @endif
         @if (session('mismatch'))
        <div class="error">{{ session('mismatch') }}</div>
        @endif
        <div class="btn">
          <input type="submit">
        </div>
          <p class="pass"><a href="#">パスワードを忘れた方はコチラ</a></p>
          <p class="new"><a href="{{ route('user.create') }}">新規登録の方はコチラ</a></p>
      </form>

  </div>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
