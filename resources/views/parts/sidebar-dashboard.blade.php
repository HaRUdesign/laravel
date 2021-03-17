<ul>
  <li>
    <a class="current" href="{{ route('user.home.show')}}"><i class="fas fa-table icon-space"></i>ホーム</a>
  </li>
  <li>
    <a href="{{ route('user.home.info')}}"><i class="far fa-bell icon-space"></i>お知らせ</a>
  </li>
  <li>
    <a href="{{ route('user.home.memberinfo',$user) }}"><i class="far fa-edit icon-space"></i>会員情報</a>
  </li>
  <li>
    <a href="{{ route('user.home.activity')}}"><i class="fas fa-chalkboard icon-space"></i>参加情報</a>
  </li>
  <li>
    <a href="{{ route('user.logout')}}"><i class="fab fa-houzz icon-space"></i>ログアウト</a>
  </li>
</ul>
