@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container-fluid mt-3">
    <h4 class="m-0">Rombel ({{ $students[0]['rombel'] }})</h4>
    <p class="text-sm">Total {{ $total_students }} Siswa di {{ $students[0]['rombel'] }}</p>
      <div class="card mb-4">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">NIS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Rombel</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Rayon</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($students as $key => $student)
                <tr>
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $students->firstItem() + $key }}</p>
                 </td>
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $student->nis }}</p>
                 </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $student->nama }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->rombel }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $student->rayon }}</p>
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