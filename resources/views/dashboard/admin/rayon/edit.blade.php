@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid pb-5">
    <a href="/dashboard/admin/rayon" class="btn bg-gradient-info mb-3 mt-3">Kembali</a>
    <div class="card">
        <div class="card-body p-5">
            <h4 class="mb-4">Edit Rayon</h4>
            <form action="/dashboard/admin/rayon/{{ $rayons->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rayon</label>
                    <input type="text" class="form-control @error('rayon') is-invalid @enderror" name="rayon" value="{{ $rayons->rayon }}" placeholder="Rayon">
                    @error('rayon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pembimbing Rayon</label>
                    <input type="text" class="form-control @error('pembimbing_rayon') is-invalid @enderror" name="pembimbing_rayon" value="{{ $rayons->pembimbing_rayon }}" placeholder="Pembimbing Rayon">
                    @error('pembimbing_rayon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn bg-gradient-success mt-3">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection