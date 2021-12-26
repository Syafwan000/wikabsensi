<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AbsenAdminController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.absen.rombel', [
            'title' => 'Dashboard | Absen (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'rombels' => Rombel::latest()->paginate(5)
        ]);
    }
}
