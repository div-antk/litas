<div class="card mt-2 shadow-sm dropdown" >
  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="card-header">
      {{ $card->title }}
    </div>
  </a>

  {{-- カードの詳細 --}}
  <div class="dropdown-menu dropdown-menu-right">
    <div class="card-body text-muted">
      <i class="fas fa-file-alt mr-2"></i>{{ $card->memo }}
    </div>

  @if( Auth::id() === $listing->user_id )

    <div class="dropdown-divider"></div>
      <a class="dropdown-item small" href="/listing/{{ $listing->id }}/card/{{ $card->id }}/edit">
        <i class="fas fa-pen mr-1"></i>カードを編集する
      </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item text-danger small" data-toggle="modal" data-target="#modal-delete-{{ $card->id }}">
      <i class="fas fa-trash-alt mr-1"></i>カードを削除する
    </a>
    
  @endif

  </div>
</div>

<!-- modal -->
<div id="modal-delete-{{ $card->id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <form method="post" action="listing/{{$listing->id}}/card/{{$card->id}}">
        @csrf
        @method('DELETE')
        <div class="modal-body text-center">
          カード <b>{{ $card->title }}</b> を削除します。よろしいですか？
        </div>
        <div class="modal-footer justify-content-between">
          <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
          <button type="submit" class="btn btn-danger">削除する</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal -->