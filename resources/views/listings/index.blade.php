@extends('app')

@section('title', 'Litas')

@section('content')

@include('nav')

{{-- <nav class="navbar navbar-expand navbar-light bg-light shadow-none" style="height: 40px">
  <p class="text-muted my-0">
    みなさんのリスト
  </p>
</nav> --}}

<div class="container-fluid">
  <div class="row masonry-container">
    {{-- リスト --}}
    @foreach ($listings as $listing)
      @include('listings.list')
    @endforeach
  </div>
</div>

@endsection