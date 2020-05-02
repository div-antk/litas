@extends('app')

@section('title')
パスワード再設定 / Litas
@stop

@section('content')
<body style="background-color: #005192">
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <img class="ml-2 mt-3" src="{{ asset('img/logo.png') }}" alt="logo" width="120px">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">新しいパスワードを設定</h2>

            @include('common.errors')

            <div class="card-text">
              <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="md-form">
                  <label for="password">新しいパスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>

                <div class="md-form">
                  <label for="password">新しいパスワード（再入力）</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button class="btn btn-block my-3 shadow-none text-white bg-primary" type="submit">送信</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection