<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Admin;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        if(auth('students')->check()) {
            $alreadyAbsen = Absen::select('*')
            ->where('nis', '=', auth('students')->user()->nis)
            ->whereDate('created_at', '=', Carbon::today()->toDateString())
            ->get();

            $jam = Absen::where('nis', '=', auth('students')->user()->nis)->get();

            return view('dashboard.index', [
                'title' => 'Dashboard',
                'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
                'totalAdmin' => count(Admin::all()),
                'totalSiswa' => count(Student::all()),
                'totalRombel' => count(Rombel::all()),
                'totalRayon' => count(Rayon::all()),
                'alreadyAbsen' => count($alreadyAbsen),
                'jam' => $jam
            ]);
        }

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'totalAdmin' => count(Admin::all()),
            'totalSiswa' => count(Student::all()),
            'totalRombel' => count(Rombel::all()),
            'totalRayon' => count(Rayon::all())
        ]);
    }
}
