@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <a href="/dashboard/admin/rombel" class="btn bg-gradient-info mb-3 mt-3">Kembali</a>
    <div class="card">
        <div class="card-body p-5">
            <h4 class="mb-4">Buat Rombel</h4>
            <form action="/dashboard/admin/rombel" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rombel</label>
                    <input type="text" class="form-control @error('rombel') is-invalid @enderror" name="rombel" placeholder="Rombel">
                    @error('rombel')
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