@csrf
<div class="md-form">
  <label>カード名</label>
  <input type="text" name="title" class="form-control" required value="{{ $card->title ?? old('title') }}">
</div>

<div class="form-group">
  <label></label>
  <textarea name="memo" class="form-control" row="16" placeholder="詳細">{{ $card->memo ?? old('memo') }}</textarea>
</div>