@extends('app')

@section('content')

@include('nav')

{{-- <div class="topPage">
  <div class="listWrapper">
     @foreach ($listing ?? ''s as $listing ?? '') 
     <div class="card" style="width: 18rem;">
      はいはい
      <div class="list_header">
          <h2 class="list_header_title">{{ $listing ?? ''->title }}</h2>
          <div class="list_header_action">
            <a onclick="return confirm('{{ $listing ?? ''->title }}を削除して大丈夫ですか？')" href="{{ url('/listingsdelete', $listing ?? ''->id) }}"><i class="fas fa-trash"></i></a>
            <a href="{{ url('/listingsedit', $listing ?? ''->id) }}"><i class="fas fa-pen"></i></a>
          </div>
        </div>
      </div>
      @endforeach
  </div>
</div> --}}

<div class="container-fluid">
  <div class="row">

  <div class="col-sm-4">
    <div class="card p-3 mt-3 shadow-none bg-light">けんさく
      <div class="card mt-3 shadow-sm">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">ライトコース</li>
          <li class="list-group-item">スタンダードコース</li>
          <li class="list-group-item">プロフェッショナルコース</li>
        </ul>
      </div>
    </div>
  </div>

  {{-- テスト --}}

  @foreach($listings as $listing)
  <div class="col-sm-4">
    <div class="card p-3 mt-3 shadow-none font-weight-bold bg-light">
      {{ $listing->title }}
      <div class="ml-auto card-text">
        <a onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')" href="{{ url('/listingsdelete', $listing->id) }}">
          <i class="fas fa-trash"></i>
        </a>
      </div>
      <a href="/listing/{{$listing->id}}/card/new" class="text-dark">
        <i class="far fa-plus-square fa-1x"></i>
      </a>
    </div>
  </div>
  @endforeach

  {{-- やったことリスト --}}

  <div class="col-sm-4">
    <div class="card p-3 mt-3 shadow-none bg-light">やった
      @include('card.done_card')
    </div>
  </div>


  </div>
</div>

@endsection