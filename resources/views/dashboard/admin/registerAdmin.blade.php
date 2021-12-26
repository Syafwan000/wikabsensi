@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container mt-3">
  <a href="/dashboard/admin/register-admin/create" class="btn bg-gradient-success mb-4">Buat Akun (Admin)</a>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Username</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Role</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($admins as $admin)                    
              <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $admin->nama }}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 ps-2">{{ $admin->username }}</p>
                </td>
                <td>
                    @if($admin->isSuperAdmin == true)
                      <span class="bg-gradient-primary text-white text-xs p-2 rounded">
                        Super Admin
                      </span>
                    @else
                      <span class="bg-gradient-info text-white text-xs p-2 rounded">
                        Admin
                      </span>
                    @endif
                </td>
                <td class="d-flex justify-content-center">
                  @if($admin->isSuperAdmin == true)
                    <span class="my-3 text-white">`</span>
                  @else
                    @if(auth('admins')->user()->isSuperAdmin == $admin->isSuperAdmin)
                      <span class="my-3 text-white">`</span>
                    @else
                      <a href="/dashboard/admin/register-admin/{{ $admin->id }}/edit" class="btn bg-gradient-info mx-2 my-2 font-weight-bold text-xs">
                        Edit
                      </a>
                      <form action="/dashboard/admin/register-admin/{{ $admin->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn bg-gradient-danger my-2 font-weight-bold text-xs">Hapus</button>
                      </form>
                    @endif
                  @endif
                </td>
             </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
    {!! $admins->links() !!}
</div>

@endsection