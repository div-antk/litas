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

      {{-- <nav class="navbar navbar-expand navbar-dark bg-light shadow-none">
        <a class="card p-2 shadow-none col-sm-12 font-weight-bold text-light text-center" href="{{ route('new') }}" style="background-color: #005192">
          リストをつくる</a>
      </nav> --}}

<div class="container-fluid">
  <div class="row">

  {{-- リスト --}}

  @foreach($listings as $listing)
    @include('listings.list')
  @endforeach

  </div>
</div>

@endsection