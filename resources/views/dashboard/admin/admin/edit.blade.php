@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <div class="card">
        <div class="card-body p-5">
            <a href="/dashboard/admin/register-admin" class="btn bg-gradient-info mb-4">Kembali</a>
            <h4 class="mb-4">Edit Admin</h4>
            <form action="/dashboard/admin/register-admin/{{ $admins[0]['id'] }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Admin</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $admins[0]['nama'] }}" placeholder="Nama Admin">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admins[0]['username'] }}" placeholder="Username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Password">
                    @error('new_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <p class="text-xs mt-2">*password tidak akan ditampilkan. kosongkan kolom jika tidak merubah password</p>
                </div>
                <button type="submit" class="btn bg-gradient-success mt-3">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection