@csrf
<div class="md-form">
  <label>リスト名</label>
  <input type="text" name="title" class="form-control" required value="{{ $listing->title ?? old('title') }}">
</div>
<div class="form-group">
  <listing-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </listing-tags-input>
</div>