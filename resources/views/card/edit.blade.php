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
                
                {{-- @include('card.form') --}}
                <div class="md-form">
                  <label>カード名</label>
                  <input type="text" name="card_title" class="form-control" required value="{{ $card->title ?? old('title') }}">
                  {{-- <input type="text" name="card_title" class="form-control" required value="{{ old('card_title', $card->title) }}"> --}}

                </div>
                
                <div class="form-group">
                  <label></label>
                  <textarea name="card_memo" class="form-control" row="16" placeholder="詳細">{{ $card->memo ?? old('memo') }}</textarea>
                  {{-- <textarea name="card_memo" class="form-control" row="16" placeholder="詳細">{{ old('card_memo', $card->memo) }}</textarea> --}}
                </div>

                <button type="submit" class="btn btn-block shadow-none text-white" style="background-color: #005192">カードを追加する</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection