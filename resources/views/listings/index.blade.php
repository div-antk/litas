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

  {{-- リスト --}}

  @foreach ($listings as $listing)
    @include('listings.list')
      @foreach ($listings->cards as $card)
        <div class="card mt-3 shadow-sm">
          <a href="/listing/{{$listing->id}}/card/{{$card->id}}">
            <h5 class="card-header">
              {{ $card->title }}
            </h5>
            <div class="card-body">
            <p class="card-text">やったこと。</p>
          </div>
        </div>
      @endforeach
  @endforeach

  </div>
</div>

@endsection