@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <a href="/dashboard/admin/absen" class="btn bg-gradient-info mb-3 mt-3">Kembali</a>
    <div class="card">
        <div class="card-body p-5">
            <h4 class="mb-3">Edit Absen Siswa</h4>
            <form action="/dashboard/admin/absen/{{ $absens->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">NIS</label>
                    <p class="ms-1 text-sm mb-0">{{ $absens->nis }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Siswa</label>
                    <p class="ms-1 text-sm mb-0">{{ $student[0]['nama'] }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rombel</label>
                    <p class="ms-1 text-sm mb-0">{{ $student[0]['rombel'] }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rayon</label>
                    <p class="ms-1 text-sm mb-0">{{ $student[0]['rayon'] }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jam Kedatangan</label>
                    <input type="text" class="form-control @error('jam_kedatangan') is-invalid @enderror" name="jam_kedatangan" value="{{ $absens->jam_kedatangan }}" placeholder="Jam Kedatangan">
                    @error('jam_kedatangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jam Kepulangan</label>
                    <input type="text" class="form-control @error('jam_kepulangan') is-invalid @enderror" name="jam_kepulangan" value="{{ $absens->jam_kepulangan }}" placeholder="Jam Kepulangan">
                    @error('jam_kepulangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tanggal Absen</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $absens->tanggal }}" placeholder="Tanggal Absen">
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Keterangan</label><br>
                    <input type="radio" class="ms-1" name="keterangan" id="hadir" value="Hadir" {{ $absens->keterangan == 'Hadir' ? 'checked' : '' }}>
                    <label for="hadir">Hadir</label>
                    <input type="radio" class="ms-1" name="keterangan" id="izin" value="Izin" {{ $absens->keterangan == 'Izin' ? 'checked' : '' }}>
                    <label for="izin">Izin</label>
                    <input type="radio" class="ms-1" name="keterangan" id="sakit" value="Sakit" {{ $absens->keterangan == 'Sakit' ? 'checked' : '' }}>
                    <label for="sakit">Sakit</label>
                </div>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn bg-gradient-success">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection