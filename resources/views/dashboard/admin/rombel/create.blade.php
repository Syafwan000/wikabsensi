@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <div class="card">
        <div class="card-body p-5">
            <h4 class="mb-4">Buat Rombel</h4>
            <form action="/dashboard/admin/rombel" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="rombel" placeholder="Nama Rombel">
                </div>
                <button type="submit" class="btn bg-gradient-success mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection