@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <div class="card">
        <div class="card-body p-5">
            <h4 class="mb-4">Buat Rayon</h4>
            <form action="/dashboard/admin/rayon" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="rayon" placeholder="Nama Rayon">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pembimbing_rayon" placeholder="Pembimbing Rayon">
                </div>
                <button type="submit" class="btn bg-gradient-success mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection