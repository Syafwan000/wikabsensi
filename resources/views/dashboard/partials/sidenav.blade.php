<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/dashboard">
        <img src="{{ asset('image/logo-wk.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">WikAbsensi</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
            @if(Auth::guard('admins')->check())
              Dashboard
            @elseif(Auth::guard('students')->check())
              Absensi
            @endif
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} {{ Request::is('dashboard/absen/tidak-hadir') ? 'active' : '' }}" href="/dashboard">
            <span class="shape-icon">
              <i class="fas fa-clipboard"></i>
            </span>
            <span class="nav-link-text ms-1">
              @if(Auth::guard('admins')->check())
                Dashboard
              @elseif(Auth::guard('students')->check())
                Absen
              @endif
            </span>
          </a>
        </li>

        @if(Auth::guard('students')->check())

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/rombel') ? 'active' : '' }}" href="/dashboard/rombel">
            <span class="shape-icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </span>
            <span class="nav-link-text ms-1">Rombel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/rayon') ? 'active' : '' }}" href="/dashboard/rayon">
            <span class="shape-icon">
              <i class="fas fa-book-reader"></i>
            </span>
            <span class="nav-link-text ms-1">Rayon</span>
          </a>
        </li>

        @endif

        @if(Auth::guard('admins')->check())

          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/admin/rombel*') ? 'active' : '' }}" href="/dashboard/admin/rombel">
              <span class="shape-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </span>
              <span class="nav-link-text ms-1">Rombel (Admin)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/admin/rayon*') ? 'active' : '' }}" href="/dashboard/admin/rayon">
              <span class="shape-icon">
                <i class="fas fa-book-reader"></i>
              </span>
              <span class="nav-link-text ms-1">Rayon (Admin)</span>
            </a>
          </li>
          <li class="nav-item register-cursor">
            <a class="nav-link {{ Request::is('dashboard/admin/register-*') ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#registerModal">
              <span class="shape-icon">
                <i class="fas fa-clipboard-list"></i>
              </span>
              <span class="nav-link-text ms-1">Registrasi User</span>
            </a>
          </li>

        @endif
          
        <li class="nav-item logout-cursor">
          <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="nav-link">
            <span class="shape-icon-logout">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            <span class="nav-link-text ms-1 btn-logout">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
</aside>