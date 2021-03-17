<header class="header">
  <div class="header-wrap flex-between">
    <h1 class="logo"><a href="{{ route('web.index') }}"><img src="{{ asset('img/logo/logo_w.svg') }}"></a></h1>
    <nav>
        @auth
        <ul class="flex-right">
            <li>
                <a href="">トリセツ</a>
            </li>
            <li>
                <a href="{{ route('user.home.index') }}">マイページ</a>
            </li>
            <li>
                <a href="{{ route('user.logout') }}">ログアウト</a>
            </li>
        </ul>
        @endauth
        @guest
        <ul class="flex-right">
            <li>
              <a href="">トリセツ</a>
            </li>
            <li>
              <a href="{{ route('user.create') }}">会員登録</a>
            </li>
            <li>
              <a href="{{ route('user.login') }}">ログイン</a>
            </li>
        </ul>
        @endguest
    </nav>
  </div>
</header>
