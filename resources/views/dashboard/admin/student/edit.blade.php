@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <div class="card">
        <div class="card-body p-5">
            <a href="/dashboard/admin/register-siswa" class="btn bg-gradient-info mb-4">Kembali</a>
            <h4 class="mb-4">Edit Siswa</h4>
            <form action="/dashboard/admin/register-siswa/{{ $students[0]['id'] }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">NIS</label>
                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $students[0]['nis'] }}" placeholder="NIS Siswa">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Siswa</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $students[0]['nama'] }}" placeholder="Nama Siswa">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rombel</label>
                    <select class="form-control @error('rombel') is-invalid @enderror" name="rombel" id="exampleFormControlSelect1">
                        @foreach($rombels as $rombel)
                            @if($rombel->rombel == $students[0]['rombel'])
                                <option value="{{ $students[0]['rombel'] }}" selected>{{ $students[0]['rombel'] }}</option>
                            @else
                                <option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
                            @endif
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
                    <select class="form-control" @error('rayon') is-invalid @enderror name="rayon" id="exampleFormControlSelect1">
                        @foreach($rayons as $rayon)
                            @if($rayon->rayon == $students[0]['rayon'])
                                <option value="{{ $students[0]['rayon'] }}" selected>{{ $students[0]['rayon'] }}</option>
                            @else
                                <option value="{{ $rayon->rayon }}">{{ $rayon->rayon }}</option>
                            @endif
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
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $students[0]['username'] }}" placeholder="Username">
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