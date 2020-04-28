@extends('app')

@section('title', 'ログイン')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center font-weight-bold"><a class="text-dark" href="/">
          <i class="fas fa-check-square mr-2"
          style="vertical-align: middle; color: #005192"></i>MyTODO</a></h1>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ログイン</h2>

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

                <button class="btn btn-block my-3 shadow-none text-white" style="background-color: #005192" type="submit">ログイン</button>

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
@endsection