
<!DOCTYPE html>
<html>
@include('parts.head')

<body class="home">
@include('parts.header-home')
<main class="main">
  <section class="s-1 flex-between">
    <h1>HELLO ! {{$user->user_familyname}} さん</h1>
    <div class="wrap flex-right">
      <p class="login-time">最終ログイン：{{ $user->last_login_at }}</p>
      <p class="logout"><a href="{{ route('user.logout') }}">ログアウト</a></p>
    </div>
  </section>


</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
