@extends('app')

@section('title', 'カードを追加する')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              <form method="POST" action="/listing/{{ $listing_id }}/card">
                @csrf
                <input value="{{ $listing_id }}" type="hidden" name="listing_id">
                @include('card.form')
                <button type="submit" class="btn btn-block shadow-none text-white" style="background-color: #005192">カードを追加する</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection