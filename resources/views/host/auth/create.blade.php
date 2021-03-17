<!DOCTYPE html>
<html>
@include('parts.head')

<body class="create">

@include('parts.header-new')
<main class="main">
  <p class="title">NEW HOST</p>
  <h1>ホスト登録</h1>

  <form action="{{ route('host.confirm') }}" method="post">
    @csrf
    <ul>
      <li><div class="form-category">名前<span class="required">*</span></div>
      <input type="text" name="host_name" value="{{ old('host_name') }}">
      @if ($errors->has('host_name'))
      <div class="error">{{ $errors->first('host_name')}}</div>
      @endif
      </li>

      <li><div class="form-category">メールアドレス<span class="required">*</span></div>
      <input type="email" name="host_mail" value="{{ old('host_mail') }}">
      @if ($errors->has('host_mail'))
      <div class="error">{{ $errors->first('host_mail')}}</div>
      @endif
      </li>

       <li>
          <div class="form-category">パスワード(8文字以上20文字以内/半角英数字のみ)<span class="required">*</span></div>
          <input type="password" name="host_pass" value="{{ old('host_pass') }}">
          @if ($errors->has('host_pass'))
          <div class="error">{{ $errors->first('host_pass')}}</div>
          @endif
        </li>

      <li>
          <div class="form-category">パスワード確認用<span class="required">*</span></div>
          <input type="password" name="host_pass_confirmation">
          @if ($errors->has('host_pass_confirmation'))
          <div class="error">{{ $errors->first('host_pass_confirmation')}}</div>
          @endif
        </li>

    </ul>

     <div class="btn">
      <input type="submit" value="登 録 す る">
    </div>

  </form>
</main>
@include('parts.footer')
@include('parts.scripts-js')
</body>
</html>
