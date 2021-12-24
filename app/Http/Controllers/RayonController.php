<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.rayon', [
            'title' => 'Dashboard | Rayon',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }
}
