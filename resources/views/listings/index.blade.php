@extends('app')

@section('content')

@include('nav')

<div class="container-fluid">
  <div class="row">

  {{-- リスト --}}

  @foreach ($listings as $listing)
    @include('listings.list')
  @endforeach

  </div>
</div>

@endsection