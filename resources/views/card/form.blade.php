@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="card_title" class="form-control" required value="{{ old('card_title') }}">
</div>

<div class="form-group">
  <label></label>
  <textarea name="card_memo" required class="form-control" row="16" placeholder="詳細">{{ old('card_memo') }}</textarea>
</div>