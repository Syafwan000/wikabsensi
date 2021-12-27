<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $students = Student::where('rombel', auth('students')->user()->rombel)->paginate(5);
        $total_students = Student::where('rombel', auth('students')->user()->rombel)->get();
        $rombel = $students[0]['rombel'];

        return view('dashboard.rombel', [
            'title' => 'Dashboard | Rombel ' . ' (' . $rombel . ')',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'students' => $students,
            'total_students' => count($total_students)
        ]);
    }
}
