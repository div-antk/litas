@extends('app')

@section('title', 'リストをつくる')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              <form method="POST" action="{{ route('listings.store') }}">
                @csrf
                <div class="md-form">
                  <label>リスト名</label>
                  <input type="text" name="list_name" class="form-control" required value="{{ old('list_title') }}">
                </div>
                <button type="submit" class="btn btn-block shadow-none text-white" style="background-color: #005192">作成</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection