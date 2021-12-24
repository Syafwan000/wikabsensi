<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custDashboard.css') }}">
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>

    <title>{{ $title }}</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('dashboard.partials.sidenav')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @yield('content')
    </main>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="logoutModalLabel">Keluar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin keluar ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tidak</button>
              <a href="/logout" type="button" class="btn bg-gradient-danger">Keluar</a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="registerModalLabel">Registrasi User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              Pilih yang akan anda tambahkan<br>
              <a href="/dashboard/admin/register-siswa" type="button" class="btn bg-gradient-info mt-3 mx-2"><i class="fas fa-user"></i>&nbsp;&nbsp;Siswa</a>
              <a href="/dashboard/admin/register-admin" type="button" class="btn bg-gradient-warning mt-3 mx-2"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Admin</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/soft-ui-dashboard.min.js') }}"></script>
</body>
</html>