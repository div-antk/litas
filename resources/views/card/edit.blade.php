@extends('app')

@section('title', 'カードを編集する')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              <form method="POST" action="{{ route('cards.update', ['listing' => $listing, 'card' => $card]) }}">
                @csrf
                {{-- <input value="{{ $listing_id }}" type="hidden" name="listing_id"> --}}
                @include('card.form')
                <button type="submit" class="btn blue-gradient btn-block">カードを追加する</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection