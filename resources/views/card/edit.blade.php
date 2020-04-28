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
              {{-- <form method="POST" action="{{ url('/card/edit') }}"> --}}
              <form method="POST" action="{{ route('cards.update', ['card' => $card]) }}">
                @method('PATCH')
                @include('card.form')
                <input type="hidden" name="listing_id" value="{{  $listing->id ?? old('id') }}">
                <button type="submit" class="btn btn-block shadow-none text-white" style="background-color: #005192">カードを編集する</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection