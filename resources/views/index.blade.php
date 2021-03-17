<!DOCTYPE html>
<html>
<head>
@include('parts.head')
</head>

<body class="top">
@include('parts.header')

<main class="main">
  <div class="mv">
    <p class="mv-img"><img src="{{ asset('img/test/001.jpg') }}"></p>
    <div class="mv-ol"></div>
  </div>
  <section class="lesson">
    <div class="w1200">
      <p class="title">CREATIVE</p>
      <div class="bar"></div>
      <h2>クリエイティブレッスン</h2>
      <ul class="flex">
      @foreach($posts as $post)
      <li>
        <a href="{{ route('web.posts.showPost',$post) }}">
          <img src="{{ asset('img/test/001.jpg') }}">
          <h3>{{$post->post_name}}</h3>
        </a>
      </li>
      @endforeach
      </ul>
    </div>
  </section>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
