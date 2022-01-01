<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        Carbon::setLocale('id');
        $absens = Absen::where('nis', auth('students')->user()->nis)->latest()->paginate(5);

        return view('dashboard.absen', [
            'title' => 'Dashboard | Absen ',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'absens' => $absens
        ]);
    }

    public function storeAbsenHadir(Request $request)
    {
        $request['jam_kedatangan'] = Carbon::now()->timezone('Asia/Jakarta')->toTimeString();
        $request['tanggal'] = Carbon::now()->timezone('Asia/Jakarta')->toDateString();

        Absen::create($request->all());

        return redirect('/dashboard');
    }

    public function storeAbsenKepulangan(Request $request)
    {
        $request['jam_kepulangan'] = Carbon::now()->timezone('Asia/Jakarta')->toTimeString();

        Absen::where('nis', auth('students')->user()->nis)
             ->where('tanggal', Carbon::now()->timezone('Asia/Jakarta')->toDateString())->update($request->all());

        return redirect('/dashboard');
    }

    public function indexTidakHadir()
    {
        Carbon::setLocale('id');

        return view('dashboard.absenKet', [
            'title' => 'Dashboard',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }

    public function addTidakHadir(Request $request)
    {
        $rules = [
            'image' => 'image|file|max:1024'
        ];

        $absenTidakHadir = $request->validate($rules);

        $absenTidakHadir['nis'] = Auth::guard('students')->user()->nis;
        $absenTidakHadir['jam_kedatangan'] = '-';
        $absenTidakHadir['jam_kepulangan'] = '-';
        $absenTidakHadir['tanggal'] = Carbon::now()->timezone('Asia/Jakarta')->toDateString();
        $absenTidakHadir['keterangan'] = $request['keterangan'];
        $absenTidakHadir['image'] = $request->file('image')->store('bukti');

        Absen::create($absenTidakHadir);

        return redirect('/dashboard');
    }
}
