<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">
            @if(Auth::guard('admins')->check())
                {{ Auth::guard('admins')->user()->nama }}
            @elseif(Auth::guard('students')->check())
                {{ Auth::guard('students')->user()->nama }}
            @endif
          </h6>
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
              @if(Auth::guard('admins')->check())
                @if(Auth::guard('admins')->user()->isSuperAdmin == true)
                  Super Admin
                @else
                  Admin
                @endif
              @elseif(Auth::guard('students')->check())
                @if(Request::is('dashboard/rombel'))
                  {{ Auth::guard('students')->user()->rombel }} | Siswa
                @elseif(Request::is('dashboard/rayon'))
                  {{ Auth::guard('students')->user()->rayon }} | Siswa
                @else
                  Siswa
                @endif
              @endif
            </li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-0" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link text-body p-0">
                <i class="fas fa-calendar-day fixed-plugin-button-nav cursor-pointer"></i>&nbsp;&nbsp;
                <b>{{ $date }}</b>
              </a>
            </li>
          </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-end me-4 side-nav">
  <a href="javascript:;" class="p-0" id="iconNavbarSidenav">
    <i class="fas fa-th-large"></i>
  </a>
</div>