@extends('app')

@section('title', '記事投稿')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              {{-- <form method="POST" action="{{ route('card.store') }}"> --}}
                @include('card.form')
                <button type="submit" class="btn blue-gradient btn-block">カードを追加する</button>
              {{-- </from> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection