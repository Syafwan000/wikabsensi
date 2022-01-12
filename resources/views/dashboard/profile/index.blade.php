@extends('dashboard.layouts.master')

@section('content')

<div class="container-fluid mt-3 text-end side-nav">
    <a href="javascript:;" class="p-0" id="iconNavbarSidenav">
      <i class="fas fa-th-large"></i>
    </a>
</div>

@if(Auth::guard('admins')->check())

<div class="container-fluid my-4">
    <div class="card p-2 px-4">
        <h4 class="my-3">Profile</h4>
        <div class="wrap">
            <h6 class="m-0">Nama Lengkap</h6>
            <p>{{ auth('admins')->user()->nama }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Role</h6>
            <p>
                @if(auth('admins')->user()->isSuperAdmin == true)
                    Super Admin
                @else
                    Admin
                @endif
            </p>
        </div>
        <h6 class="m-0">Foto Profile</h6>
        @if(auth('admins')->user()->image)
        <img class="border border-2 mb-3 col-sm-2" src="{{ asset($image) }}">
        <div class="wrap">
            <div class="row">
                <div class="col-1">
                    <form action="/dashboard/profile-update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_profile" value="{{ asset($image) }}">
                        <input type="file" name="image" accept="image/*" required><br>
                        <button type="submit" class="btn bg-gradient-primary mt-3">Edit Foto</button>
                    </form>
                </div>
                <div class="col-1 mt-4 pt-2 ms-1">
                    <form action="/dashboard/profile-delete" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image">
                        <button type="submit" class="btn bg-gradient-danger mt-3">Hapus Foto</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <img class="border border-2 mb-3 col-sm-2" src="{{ asset('profile/default.png') }}">
        <div class="wrap">
            <form action="/dashboard/profile" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" required><br>
                <button type="submit" class="btn bg-gradient-info mt-3">Simpan</button>
            </form>
        </div>
        @endif
    </div>
</div>

@elseif(Auth::guard('students')->check())

<div class="container-fluid my-4">
    <div class="card p-2 px-4">
        <h4 class="my-3">Profile</h4>
        <div class="wrap">
            <h6 class="m-0">NIS</h6>
            <p>{{ auth('students')->user()->nis }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Nama Lengkap</h6>
            <p>{{ auth('students')->user()->nama }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Rombel</h6>
            <p>{{ auth('students')->user()->rombel }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Rayon</h6>
            <p>{{ auth('students')->user()->rayon }}</p>
        </div>
        <h6 class="m-0">Foto Profile</h6>
        @if(auth('students')->user()->image)
        <img class="border border-2 mb-3 col-sm-2" src="{{ asset($image) }}">
        <div class="wrap">
            <div class="row">
                <div class="col-1">
                    <form action="/dashboard/profile-update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_profile" value="{{ asset($image) }}">
                        <input type="file" name="image" accept="image/*" required><br>
                        <button type="submit" class="btn bg-gradient-primary mt-3">Edit Foto</button>
                    </form>
                </div>
                <div class="col-1 mt-4 pt-2 ms-1">
                    <form action="/dashboard/profile-delete" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image">
                        <button type="submit" class="btn bg-gradient-danger mt-3">Hapus Foto</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <img class="border border-2 mb-3 col-sm-2" src="{{ asset('profile/default.png') }}">
        <div class="wrap">
            <form action="/dashboard/profile" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" required><br>
                <button type="submit" class="btn bg-gradient-info mt-3">Simpan</button>
            </form>
        </div>
        @endif
    </div>
</div>

@endif

@endsection