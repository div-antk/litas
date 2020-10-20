@extends('app')

@section('title', 'Litas')

@section('content')

@include('nav')

<div class="container-fluid">
  <div class="row masonry-container">
    {{-- リスト --}}
    @foreach ($listings as $listing)
      @include('listings.list')
    @endforeach
  </div>
</div>

@endsection