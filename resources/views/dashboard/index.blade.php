@extends('dashboard.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url({{ asset('image/gedung-wikrama.jpg') }}); background-position-y: 50%;">
      <span class="mask bg-gradient-info opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @if(Auth::guard('admins')->check())
              @if(Auth::guard('admins')->user()->image)
                <img src="{{ asset(Auth::guard('admins')->user()->image) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @else
                <img src="{{ asset('profile/default.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @endif
            @elseif(Auth::guard('students')->check())
              @if(Auth::guard('students')->user()->image)
                <img src="{{ asset(Auth::guard('students')->user()->image) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @else
                <img src="{{ asset('profile/default.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @endif
            @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
                @if(Auth::guard('admins')->check())
                    {{ Auth::guard('admins')->user()->nama }}
                @elseif(Auth::guard('students')->check())
                    {{ Auth::guard('students')->user()->nama }}
                @endif
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
                @if(Auth::guard('admins')->check())
                    Admin
                @elseif(Auth::guard('students')->check())
                    {{ Auth::guard('students')->user()->nis }} | {{ Auth::guard('students')->user()->rombel }} | {{ Auth::guard('students')->user()->rayon }} | Siswa
                @endif
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="container">
                <h5 class="text-center my-1"><i class="fas fa-calendar-day"></i>&nbsp;&nbsp;<strong>{{ $date }} | <i class="fas fa-clock"></i>&nbsp;<span class="time"></span></strong></h5>
            </div>
        </div>
    </div>
</div>

@if(Auth::guard('admins')->check())

<div class="container-fluid pb-5">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admin</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalAdmin }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="fas fa-user-edit text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Siswa</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalSiswa }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="fas fa-user text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Rombel</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalRombel }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="fas fa-chalkboard-teacher text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Rayon</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalRayon }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="fas fa-book-reader text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@elseif(Auth::guard('students')->check())

@if($alreadyAbsen == 1)

<div class="container-fluid pb-5">
  <div class="card">
      <div class="card-body p-5">
        <h5 class="text-center mb-3"><i class="fas fa-plane-arrival"></i>&nbsp;&nbsp;Jam Kedatangan {{ $jam[0]['jam_kedatangan'] }}</h5>
        @if($jam[0]['jam_kepulangan'] !== '00:00:00')
          <h5 class="text-center mb-3"><i class="fas fa-plane-departure"></i>&nbsp;&nbsp;Jam Kepulangan {{ $jam[0]['jam_kepulangan'] }}</h5>
        @else
          <div class="container d-flex justify-content-center">
            <a href="/absen-kepulangan" class="btn bg-gradient-warning p-3 mb-0">Pulang</a>
          </div>
        @endif
      </div>
  </div>
</div>

@else

<div class="container-fluid pb-5">
  <div class="card">
      <div class="card-body p-5">
        <h4 class="text-center mb-3">Silahkan Melakukan Absensi</h4>
          <div class="container d-flex justify-content-center">
              <a class="btn bg-gradient-success p-3 mx-2 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Hadir</a>
              <a href="/dashboard/absen/tidak-hadir" class="btn bg-gradient-danger p-3 mx-2 mb-0">Tidak/Berhalangan Hadir</a>
          </div>
      </div>
  </div>
</div>

@endif

@endif

@if(Auth::guard('students')->check())

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Kehadiran</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6><strong>NIS</strong></h6>
        <p>{{ Auth::guard('students')->user()->nis }}</p>
        <h6><strong>Nama</strong></h6>
        <p>{{ Auth::guard('students')->user()->nama }}</p>
        <h6><strong>Hadir pada</strong></h6>
        <p>{{ $date }}</p>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <form action="/absen-hadir" method="post">
          @csrf
          <input type="hidden" name="nis" value="{{ Auth::guard('students')->user()->nis }}">
          <input type="hidden" name="jam_kedatangan">
          <input type="hidden" name="jam_kepulangan" value="00:00:00">
          <input type="hidden" name="keterangan" value="Hadir">
          <input type="hidden" name="image">
          <button type="submit" class="btn bg-gradient-success">Hadir</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endif

@endsection