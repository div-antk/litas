@extends('app')

@section('title')
{{ $keyword }} / Litas
@stop


@section('content')

@include('nav')

<nav class="navbar navbar-expand navbar-light bg-light shadow-none" style="height: 80px">

  <h4 class="navbar-text text-dark font-weight-bold my-0 mr-1">
    {{ $keyword }}
  </h4>
  <br>
  <p class="ml-4 my-0">
    {{ $result->count() }}件ありました
  </p>

</nav>

<div class="container-fluid">
  <div class="row">

    @foreach($result as $listing)
      @include('listings.list')
    @endforeach
  </div>
</div>
@endsection