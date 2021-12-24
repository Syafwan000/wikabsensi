@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container mt-3">
    <a href="/dashboard/admin/register-siswa/create" class="btn bg-gradient-success mb-4">Buat Akun (Siswa)</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">NIS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Username</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Rombel</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Rayon</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($students as $student)                    
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->nis }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->nama }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->username }}</p>
                 </td>
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->rombel }}</p>
                 </td>   
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->rayon }}</p>
                 </td>
                  <td class="d-flex justify-content-center">
                    <a href="/dashboard/admin/register-siswa/{{ $student->id }}/edit" class="btn bg-gradient-info mx-2 my-2 font-weight-bold text-xs">
                      Edit
                    </a>
                    <form action="/dashboard/admin/register-siswa/{{ $student->id }}" method="post">
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
      {!! $students->links() !!}
</div>  

@endsection