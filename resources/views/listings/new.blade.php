@extends('app')

@section('content')
<div class="panel-body">

  {{-- バリデーションエラー時 --}}
  @include('common.errors')

  {{-- リスト作成 --}}
  <form action="{{ url('listings') }}" method="POST" class="form-horizontal">
  @csrf
    <div class="form-group">
      <label for="listing" class="col-sm-3 control-label">リスト名</label> 
      <div class="col-sm-6"> 
        {{-- oldヘルパー。直前に入力したデータの取得をすることができる --}}
        <input type="text" name="list_name" class="form-control" value="{{ old('list_name') }}">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"></i> 作成 </button> 
      </div>
    </div>
  </form>
</div> 
@endsection