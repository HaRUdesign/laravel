<header class="header-home">
  <div class="header-wrap flex-between">
    <h1 class="logo"><a href="{{ route('web.index') }}"><img src="{{ asset('img/logo/logo_bk.svg') }}"></a></h1>
    <nav class="nav">
      <div></div>
      <div></div>
      <div></div>
    </nav>
  </div>
 <div class="header-menu">
      <ul>

        <li><a href="{{ route('user.home.index') }}">ホーム</a></li>
        <li></li>
        <li>レクチャーの情報</li>
        <li></li>
        <li><a href="{{ route('user.home.show') }}">メンバーの情報変更</a></li>
        <li></li>
        <li>パスワードの変更</li>
        <li></li>
        <li><a href="{{ route('user.payment.index') }}">決済の情報変更</a></li>
        <li></li>
        <li><a href="{{ route('user.logout') }}">ログアウト</a></li>
      </ul>
    </div>
</header>
