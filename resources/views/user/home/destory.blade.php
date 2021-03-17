<!DOCTYPE html>
<html>
@include('parts.head')
<body class="destory">
@include('parts.header-home')

<main class="main">
  <section class="s-1 flex-between">
    <h1>HELLO ! {{$user->user_familyname}} さん</h1>
    <div class="wrap flex-right">
      <p class="login-time">最終ログイン：{{ $user->last_login_at }}</p>
      <p class="logout"><a href="{{ route('user.logout') }}">ログアウト</a></p>
    </div>
  </section>
  <section class="s-2">
    <p class="title">MEMBER INFO</p>
    <div class="bar"></div>
    <h2>トリコメンバーの退会</h2>
    <div class="text">
      <p>今までの活動履歴やその他の保存されているデータが全部消えてしまいます。以後、如何なる理由によりましても、復元ができません。</p>
      <p>本当に退会しますか？</p>
    </div>
    <form action="{{ route('user.home.delete') }}" method="post">
      @csrf
      <input type="submit" value="退会する">
    </form>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
