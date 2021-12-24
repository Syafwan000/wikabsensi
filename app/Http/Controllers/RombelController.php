<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.rombel', [
            'title' => 'Dashboard | Rombel',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }
}
