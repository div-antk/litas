@extends('app')

@section('title')
リストを編集する / Litas
@stop

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              <form method="POST" action="{{ route('listings.update', ['listing' => $listing]) }}">
                @method('PATCH')
                @include('listings.form')
                <button type="submit" class="btn btn-block shadow-none text-white" style="background-color: #005192">更新</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection