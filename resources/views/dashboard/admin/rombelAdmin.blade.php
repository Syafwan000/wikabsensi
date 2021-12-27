@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container mt-3">
    <a href="/dashboard/admin/rombel/create" class="btn bg-gradient-success mb-4">Buat Rombel</a>
    <form action="/dashboard/admin/rombel">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="pencarian_rombel" placeholder="Cari Rombel" autocomplete="off">
        <button type="submit" class="btn bg-gradient-primary mb-0">Cari</button>
      </div>
    </form>
    @if(session()->has('success'))
      <div class="alert alert-success font-weight-bold  text-white " role="alert">
        {{ session('success') }}
      </div>
    @endif
      <div class="card mb-4">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Rombel</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($rombels as $key => $rombel)
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $rombels->firstItem() + $key }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $rombel->rombel }}</p>
                  </td>
                  <td class="d-flex justify-content-center">
                    <a href="/dashboard/admin/rombel/{{ $rombel->id }}/edit" class="btn bg-gradient-info mx-2 my-2 font-weight-bold text-xs">
                      Edit
                    </a>
                    <form action="/dashboard/admin/rombel/{{ $rombel->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn bg-gradient-danger my-2 font-weight-bold text-xs">Hapus</button>
                    </form>
                  </td>
               </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
      {!! $rombels->links() !!}
</div>  

@endsection