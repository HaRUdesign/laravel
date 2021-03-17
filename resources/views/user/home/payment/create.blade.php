<!DOCTYPE html>
<html>
@include('parts.head')

<body class="payment">
@include('parts.header-home')
<main class="main">
<div class="card-body">
    <form action="{{route('user.payment.store')}}" class="card-form" id="form_payment" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">カード番号</label>
            <div id="cardNumber"></div>
        </div>

        <div class="form-group">
            <label for="name">セキュリティコード</label>
            <div id="securityCode"></div>
        </div>

        <div class="form-group">
            <label for="name">有効期限</label>
            <div id="expiration"></div>
        </div>

        <div class="form-group">
            <label for="name">カード名義</label>
            <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
        </div>

        <div class="btn center">
            <button type="submit" id="create_token" class="btn-primary">カードを登録する</button>
        </div>
    </form>
    <a href="{{route('user.payment.index')}}">クレジットカード情報ページに戻る</a>
</div>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
