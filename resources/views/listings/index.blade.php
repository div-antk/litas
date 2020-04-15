@extends('app')

@section('content')

@include('nav')

{{-- <div class="topPage">
  <div class="listWrapper">
     @foreach ($listings as $listing) 
     <div class="card" style="width: 18rem;">
      はいはい
      <div class="list_header">
          <h2 class="list_header_title">{{ $listing->title }}</h2>
          <div class="list_header_action">
            <a onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')" href="{{ url('/listingsdelete', $listing->id) }}"><i class="fas fa-trash"></i></a>
            <a href="{{ url('/listingsedit', $listing->id) }}"><i class="fas fa-pen"></i></a>
          </div>
        </div>
      </div>
      @endforeach
  </div>
</div> --}}

<div class="container">
  <div class="row">

  <div class="col">
  <div class="card col-sm-4 p-3">けんさく
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">ライトコース</li>
        <li class="list-group-item">スタンダードコース</li>
        <li class="list-group-item">プロフェッショナルコース</li>
      </ul>
    </div>
  </div>
  </div>

  <div class="card col-sm-4 p-3">やる
      <div class="card mt-3">
        <h5 class="card-header">
          カードのヘッダ
        </h5>
        <div class="card-body">
          <p class="card-text">以下のテキストを追加のコンテンツへの自然な導入としてサポート。</p>
        </div>
      </div>

      <div class="card mt-3">
        <h5 class="card-header">
          カードのヘッダ
        </h5>
        <div class="card-body">
          <p class="card-text">以下のテキストを追加のコンテンツへの自然な導入としてサポート。</p>
        </div>
      </div>
  </div>

  <div class="card col-sm-4 p-3">やった
    <div class="card mt-3">
      <h5 class="card-header">
        カードのヘッダ
      </h5>
      <div class="card-body">
        <p class="card-text">以下のテキストを追加のコンテンツへの自然な導入としてサポート。</p>
      </div>
    </div>

    <div class="card mt-3">
      <h5 class="card-header">
        カードのヘッダ
      </h5>
      <div class="card-body">
        <p class="card-text">以下のテキストを追加のコンテンツへの自然な導入としてサポート。</p>
      </div>
    </div>
  </div>

  </div>
</div>

@endsection