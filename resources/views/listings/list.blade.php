<div class="col-sm-4">
  <div class="card p-3 mt-3 shadow-none bg-light">
    <div class="card-text">
      {{ $listing->title }}

      @if( Auth::id() !== $listing->user_id )
        <a href="{{ route('users.show', ['name' => $listing->user->name]) }}" class="text-dark">
          <br><div class="small text-muted">作成者: {{ $listing->user->name }}
        </div>
        </a>
      @endif

      @if( Auth::id() === $listing->user_id )
    
      {{-- カードを作成する --}}
      <a class="text-dark" href="/listing/{{$listing->id}}/card/new">
        <i class="far fa-plus-square fa-1x ml-1"></i>
      </a>
      
      <!-- dropdown -->
        <div class="float-right card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('listings.edit', ['listing' => $listing]) }}">
                <i class="fas fa-pen mr-1"></i>リスト名を変更する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $listing->id }}">
                <i class="fas fa-trash-alt mr-1"></i>リストを削除する
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->
  
        <!-- modal -->
        <div id="modal-delete-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form method="POST" action="{{ route('listings.destroy', ['listing' => $listing]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                  リスト <b>{{ $listing->title }}</b> を削除します。よろしいですか？
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

        @endif

        {{-- カードの表示 --}}
        @foreach ($listing->cards()->orderBy('created_at', 'desc')->get() as $card)
          @include('card.card')
        @endforeach
      
      </div>
  </div>
</div>