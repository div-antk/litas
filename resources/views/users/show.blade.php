@extends('app')

@section('content')

@include('nav')

<nav class="navbar navbar-expand navbar-light bg-light shadow-none" style="height: 40px">

  <p class="navbar-text text-muted font-weight-bold my-0 mr-1">
    {{ $user->name }}
  </p>
  <p class="text-muted my-0">
    さんのリスト
  </p>

</nav>

<div class="container-fluid">
  <div class="row">

  {{-- リスト --}}

  @foreach ($listings as $listing)
    @include('listings.list')
  @endforeach

  </div>
</div>

@endsection