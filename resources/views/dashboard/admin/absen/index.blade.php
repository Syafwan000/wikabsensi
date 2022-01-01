@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container mt-3">
    <a href="/dashboard/admin/absen" class="btn bg-gradient-info mb-3">Kembali</a>
    <div class="card p-2 px-4 mb-4">
        <h4 class="my-3">Detail Absen</h4>
        <div class="wrap">
            <h6 class="m-0">Nama Lengkap</h6>
            <p class="text-sm">{{ $student[0]['nama'] }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">NIS</h6>
            <p class="text-sm">{{ $absen->nis }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Rombel</h6>
            <p class="text-sm">{{ $student[0]['rombel'] }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Rayon</h6>
            <p class="text-sm">{{ $student[0]['rayon'] }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Tanggal Absen</h6>
            <p class="text-sm">{{ $absen->tanggal }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Jam Kedatangan</h6>
            <p class="text-sm">{{ $absen->jam_kedatangan }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0">Jam Kepulangan</h6>
            <p class="text-sm">{{ $absen->jam_kepulangan }}</p>
        </div>
        <div class="wrap">
            <h6 class="m-0 mb-2">Keterangan</h6>
            @if($absen->keterangan == 'Hadir')
                <p class="bg-gradient-success d-inline text-white text-xs font-weight-bold px-2 py-2 rounded">{{ $absen->keterangan }}</p>
            @elseif($absen->keterangan == 'Izin')
                <p class="bg-gradient-info d-inline text-white text-xs font-weight-bold px-2 py-2 rounded">{{ $absen->keterangan }}</p>
            @elseif($absen->keterangan == 'Sakit')
                <p class="bg-gradient-warning d-inline text-white text-xs font-weight-bold px-2 py-2 rounded">{{ $absen->keterangan }}</p>
            @endif
        </div>
        <div class="wrap">
            <h6 class="m-0 mt-3">Lampiran</h6>
            @if($absen->image)
                <img src="{{ asset($absen->image) }}">
            @else
                <p><i>Tidak Ada Lampiran</i></p>
            @endif
        </div>
    </div>
</div>

@endsection