@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <div class="card">
        <div class="card-body p-5">
            <a href="/dashboard/admin/register-siswa" class="btn bg-gradient-info mb-4">Kembali</a>
            <h4 class="mb-4">Buat Siswa</h4>
            <form action="/dashboard/admin/register-siswa" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">NIS</label>
                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" placeholder="NIS Siswa">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Siswa</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Siswa">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rombel</label>
                    <select class="form-control @error('rombel') is-invalid @enderror" name="rombel" id="exampleFormControlSelect1">
                    @foreach ($rombels as $rombel)
                        <option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
                    @endforeach
                    </select>
                    @error('rombel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rayon</label>
                    <select class="form-control @error('rayon') is-invalid @enderror" name="rayon" id="exampleFormControlSelect1">
                    @foreach ($rayons as $rayon)
                        <option value="{{ $rayon->rayon }}">{{ $rayon->rayon }}</option>
                    @endforeach
                    </select>
                    @error('rayon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn bg-gradient-success mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection