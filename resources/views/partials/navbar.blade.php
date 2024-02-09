<nav class="navbar bg-danger navbar-expand-lg" data-bs-theme="dark" >
    <div class="container-fluid">
      <a class="navbar-brand pe-4 border-end" href="#">EnogNime</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName()=='home' ? 'active' : '' }}"  href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), ['index.anime', 'show.anime','show.episode']) ? 'active' : '' }}" href="{{ route('index.anime') }}">Anime</a>

          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()=='index.genre' || Route::currentRouteName()=='show.genre' ? 'active' : '' }}" href="{{ route('index.genre') }}">Genre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()=='index.studio' || Route::currentRouteName()=='show.studio' ? 'active' : '' }}" href="{{ route('index.studio') }}">Studio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()=='index.season' || Route::currentRouteName()=='show.season' ? 'active' : '' }}" href="{{ route('index.season') }}">Season</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()=='index.status' || Route::currentRouteName()=='show.status' ? 'active' : '' }}" href="{{ route('index.status') }}">Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()=='index.type' || Route::currentRouteName()=='show.type' ? 'active' : '' }}" href="{{ route('index.type') }}">Type</a>
          </li>
        </ul>
        <form class="d-flex" action="{{ route('index.anime') }}" >
          <input type="text" class="form-control me-2 border border-light" placeholder="Search" name="search" value="{{ request('search') }}" style="background-color: #b62b27">
          <button class="btn btn-outline-light" style="background-color: #b62b27" type="submit" >Search</button>
        </form>

      </div>
    </div>
  </nav>