@extends('app')

@section('title')
ログイン / Litas
@stop

@section('content')
<body style="background-color: #005192">
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <img class="ml-2 mt-3" src="{{ asset('img/logo.png') }}" alt="logo" width="120px">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ログイン</h2>

            {{-- Googleでログイン --}}
            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" 
              class="btn btn-block btn-danger shadow-none">
              <i class="fab fa-google mr-1"></i>Googleでログイン
            </a>
            
            @include('common.errors')
            
            <div class="card-text">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>

                {{-- 次回から自動でログインする。を隠し項目で --}}
                <input type="hidden" name="remember" id="remember" value="on">

                <div class="text-left">
                  <a href="{{ route('password.request') }}" class="card-text">パスワードを忘れた方</a>
                </div>

                <button class="btn btn-block my-3 shadow-none text-white bg-primary" type="submit">ログイン</button>
              </form>

              <div class="mt-0">
                <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection