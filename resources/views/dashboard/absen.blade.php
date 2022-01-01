@extends('dashboard.layouts.master')

@section('content')
    
@include('dashboard.partials.navbar')

<div class="container mt-3">
    <h4 class="mb-3">Absensi ({{ auth('students')->user()->nama }})</h4>
      <div class="card mb-4">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">NIS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Tanggal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Jam Kedatangan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Jam Kepulangan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Keterangan</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($absens as $key => $absen)
                <tr>
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $absens->firstItem() + $key }}</p>
                 </td>
                 <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $absen->nis }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2 mt-3 mb-3">{{ $absen->tanggal }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $absen->jam_kedatangan }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ps-2">{{ $absen->jam_kepulangan }}</p>
                  </td>
                  <td>
                    @if($absen->keterangan == 'Hadir')
                        <p class="bg-gradient-success d-inline text-white text-xs font-weight-bold mb-0 ms-2 px-2 py-2 rounded">{{ $absen->keterangan }}</p>
                    @elseif($absen->keterangan == 'Izin')
                        <p class="bg-gradient-info d-inline text-white text-xs font-weight-bold mb-0 ms-2 px-2 py-2 rounded">{{ $absen->keterangan }}</p>
                    @elseif($absen->keterangan == 'Sakit')
                        <p class="bg-gradient-warning d-inline text-white text-xs font-weight-bold mb-0 ms-2 px-2 py-2 rounded">{{ $absen->keterangan }}</p>
                    @endif
                  </td>
               </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
    {!! $absens->links() !!}
</div>  

@endsection