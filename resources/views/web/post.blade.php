<!DOCTYPE html>
<html>
<head>
@include('parts.head')
</head>

<body class="post">
@include('parts.header-sub')

<main class="main">
  <article>
    <section>
      <p class="img"><img src="{{ asset('img/test/001.jpg') }}"></p>
      <p class="title">{{ $post->post_category }}</p>
      <div class="bar"></div>
      <h2>{{ $post->post_name }}</h2>
      <p class="point">{{ $post->post_point }}</p>
      <div class="flex wrap">
        <div class="notice-1">
          <h3>※申し込み前に一読ください。</h3>
          <p>{{ $post->post_cancel }}</p>
        </div>
        <div class="notice-2">
          <h3>{{ $post->post_name }}</h3>
          <p>{{ $post->post_fee }}円(税込)</p>
        </div>
      </div>




      @auth
      <div class="btn center">
      <form action="{{ route('payment.charge') }}" method="POST">
        {{ csrf_field() }}
          <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                  data-amount="1000"
                  data-name="Stripe Demo"
                  data-label="決済をする"
                  data-description="Online course about integrating Stripe"
                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                  data-locale="auto"
                  data-currency="JPY">
          </script>
            </form>
      </div>
      @endauth
      @guest
      <p>ログインしてからお申し込みください。</p>
      <div class="btn center">
        <a href="{{ route('user.login') }}">ログインする</a>
      </div>
      @endguest
    </section>
  </article>
</main>

@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
