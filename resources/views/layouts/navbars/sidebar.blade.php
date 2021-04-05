<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('assets') }}/img/brand/blueCopy.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          @if (Auth::user()->role == "admin")
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}" >
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-mahasiswa" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                <i class="fas fa-archive text-success"></i>
                <span class="nav-link-text">Data Mahasiswa</span>
              </a>
              <div class="collapse" id="navbar-mahasiswa">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link">Data User</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('mahasiswa') }}" class="nav-link">Biodata Mahasiswa</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('matakuliah') }}">
                <i class="fas fa-users text-primary"></i>
                <span class="nav-link-text">Data Mata Kuliah</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('datakrs') }}">
              <i class="fas fa-coins text-danger"></i>
                <span class="nav-link-text">Data KRS</span>
              </a>
            </li>
          </ul>
          @endif
          @if (Auth::user()->role == "user")
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}" >
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('isikrs') }}">
                <i class="fas fa-users text-primary"></i>
                <span class="nav-link-text">Isi KRS</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="{{ route('isikrs.show') }}">
              <i class="fas fa-coins text-danger"></i>
                <span class="nav-link-text">Cetak KRS</span>
              </a>
            </li> -->
          </ul>
          @endif
          <!-- Divider -->
          <hr class="my-3">
          </ul>
        </div>
      </div>
    </div>
  </nav>
