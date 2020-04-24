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
              <form method="post" action="{{ url('/card/edit') }}">
                @csrf
                <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
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