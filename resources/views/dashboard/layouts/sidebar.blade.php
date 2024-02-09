<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="position:fixed;bottom: 0;top:0px">
    <div class="position-sticky  " >
      <ul class="nav flex-column ">
        <li class="nav-item " >
           <a class="nav-link{{ Request::is('dashboard') ? ' active' : ''}} text-decoration-none"  aria-current="page" href="{{ route('dashboard.index') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        
        <li class="nav-item">
           {{-- dashboard/posts/...    otomatis aktif juka diberi * --}}
           <a class="nav-link{{ Request::is('dashboard/animes*') ? ' active' : ''}} text-decoration-none" href="{{ route('animes.index') }}">
            <span data-feather="file-text"></span>
           Anime
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link{{ Request::is('dashboard/seasons*') ? ' active' : ''}} text-decoration-none" href="{{ route('seasons.index') }}">
            <span data-feather="file-text"></span>
           Season
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link{{ Request::is('dashboard/types*') ? ' active' : ''}} text-decoration-none" href="{{ route('types.index') }}">
            <span data-feather="file-text"></span>
           Type
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link{{ Request::is('dashboard/statuses*') ? ' active' : ''}} text-decoration-none" href="{{ route('statuses.index') }}">
            <span data-feather="file-text"></span>
           Status
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link{{ Request::is('dashboard/genres*') ? ' active' : ''}} text-decoration-none" href="{{ route('genres.index') }}">
            <span data-feather="file-text"></span>
           Genre
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link{{ Request::is('dashboard/studios*') ? ' active' : ''}} text-decoration-none" href="{{ route('studios.index') }}">
            <span data-feather="file-text"></span>
           Studio
          </a>
        </li>

      </ul>

      
    </div>
  </nav>