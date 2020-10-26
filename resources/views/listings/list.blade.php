<div class="col-xl-3 col-md-4 col-sm-6 item">
  <div class="card p-3 mt-3 shadow-none bg-light ">
    <div class="card-text d-inline-block">
      {{ $listing->title }}

    @if( Auth::id() === $listing->user_id )
    
      {{-- カードを作成する --}}
      <a class="text-dark" href="/listing/{{$listing->id}}/card/new">
        <i class="far fa-plus-square fa-1x ml-1"></i>
      </a>

    @endif

    {{-- いいね機能 --}}
    <div class="card-text d-inline-block pl-2 text-muted">
      <listing-like
        :initial-is-liked-by='@json($listing->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($listing->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('listings.like', ['listing' => $listing]) }}"
      >
      </listing-like>
    </div>

      {{-- <div class="card-body pt-0 pb-2 pl-3 d-inline-block">
        <div class="card-text">
          <listing-like>
          </listing-like>
        </div>
      </div> --}}

      @if( Auth::id() === $listing->user_id )

      <!-- dropdown -->
        <div class="float-right ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('listings.edit', ['listing' => $listing]) }}">
                <i class="fas fa-pen mr-1"></i>リストを編集する
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
                  <a class="btn btn-outline-grey shadow-none" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger shadow-none">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->

        @else
        <a class="card-subtitle" href="{{ route('users.show', ['name' => $listing->user->name]) }}" class="text-dark">
          <br><div class="small text-muted">{{ '@'.$listing->user->name }}
        </div>
        </a>

        @endif

        {{-- タグの表示 --}}
        @foreach ($listing->tags as $tag)
          @if($loop->first)
            <div class="card-body py-2 pl-0">
              <div class="card-text line-height">
          @endif
                <a href="{{ route('tags.show', ['name' => $tag->name]) }}" 
                  class="p-1 mr-1 mt-1 text-muted">
                  {{ $tag->hashtag }}
                </a>
          @if($loop->last)
              </div>
            </div>
          @endif
        @endforeach

        {{-- カードの表示 --}}
        @foreach ($listing->cards()->orderBy('created_at', 'desc')->get() as $card)
          @include('card.card')
        @endforeach

      </div>
  </div>
</div>