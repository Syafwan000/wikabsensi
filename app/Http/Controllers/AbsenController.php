<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function storeAbsenHadir(Request $request)
    {
        $request['jam_kedatangan'] = Carbon::now()->timezone('Asia/Jakarta')->toTimeString();

        Absen::create($request->all());

        return redirect('/dashboard')->with('absenHadir', 'Terimakasih Sudah Mengisi Absensi');
    }

    public function storeAbsenKepulangan(Request $request)
    {
        $request['jam_kepulangan'] = Carbon::now()->timezone('Asia/Jakarta')->toTimeString();

        Absen::where('nis', '=', auth('students')->user()->nis)->update($request->all());

        return redirect('/dashboard')->with('absenHadir', 'Terimakasih Sudah Mengisi Absensi');
    }

    // public function indexTidakHadir()
    // {
    //     Carbon::setLocale('id');

    //     return view('dashboard.absenKet', [
    //         'title' => 'Dashboard',
    //         'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
    //     ]);
    // }

    // public function addTidakHadir(Request $request)
    // {
    //     $rules = [
    //         'nis' => 'required',
    //         'jam_kedatangan' => 'required',
    //         'jam_kepulangan' => 'required',
    //         'keterangan' => 'required',
    //         'image' => 'image|file|max:1024'
    //     ];

    //     $absenTidakHadir = $request->validate($rules);

    //     $absenTidakHadir['image'] = $request->file('image')->store('image');
        
    //     $absenTidakHadir['jam_kedatangan'] = '-';
    //     $absenTidakHadir['jam_kepulangan'] = '-';

    //     Absen::create($absenTidakHadir);

    //     return redirect('/dashboard');
    // }
}
