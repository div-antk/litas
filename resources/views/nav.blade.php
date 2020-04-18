<nav class="navbar navbar-expand navbar-dark shadow-none" style="background-color: #005192">

  <div class="row no-gutters">
    <a class="navbar-brand font-weight-bold shadow-none" href="/" style="color: white; line-height: 100%">
    <i class="fas fa-check-square mr-2" style="font-size: 32px; color: white; vertical-align: middle"></i>MyTODO</a>
  </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="ユーザーを検索" aria-label="検索">
    <button type="submit" class="btn btn-sm btn-outline-success rounded-pill shadow-none"><i class="fas fa-search"></i></button>
  </form>
  
  <ul class="navbar-nav ml-auto">

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <li class="nav-item">
      {{-- <a class="nav-link" href="{{ route('listings.new') }}"><i class="fas fa-pen mr-1"></i>投稿する</a> --}}
      <a class="nav-link" href="{{ route('new') }}"><i class="fas fa-pen mr-1"></i>リストをつくる</a>
    </li>
    @endauth

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                {{-- onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'"> --}}
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  </ul>

</nav>