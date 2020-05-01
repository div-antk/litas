@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center font-weight-bold"><a class="text-dark" href="/">
          <i class="fas fa-check-square mr-2"
            style="vertical-align: middle; color: #005192"></i>Litas</a></h1>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>

            @include('common.errors')
            <div class="card-text">
              <form method="POST"
                {{-- Laravelのroute関数を使って、localhost/register/google にPOST送信 --}}
                action="{{ route('register.{provider}', ['provider' => $provider]) }}">
                @csrf

                {{-- valueに渡されたトークンを設定 --}}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="md-form">

                  {{-- ユーザー名を入力 --}}
                  <label for="name">ユーザー名</label>
                  <input class="form-control" type="text" id="name" name="name" required>
                  <small>英数字3〜16文字（登録後の変更はできません）</small>
                
                </div>
                <div class="md-form">

                  {{-- valueにコントローラから渡されたメールアドレスを設定 --}}
                  <label for="email">メールアドレス</label>
                  {{-- disabled属性で入力、変更を不可にする（Googleから取得したメールアドレスであるため） --}}
                  <input class="form-control" type="text" id="email" name="email" value="{{ $email }}" disabled>
                
                </div>
                <button class="btn btn-block mt-3 shadow-none text-white" style="background-color: #005192" type="submit">ユーザー登録</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection