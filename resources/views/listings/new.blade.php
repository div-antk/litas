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
              <form method="POST" action="{{ url('listings') }}">
                @csrf
                <div class="md-form">
                  <label>タイトル</label>
                  <input type="text" name="list_name" class="form-control" required value="{{ old('list_name') }}">
                </div>
                <button type="submit" class="btn blue-gradient btn-block">作成</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection