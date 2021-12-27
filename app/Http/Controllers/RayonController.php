<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $students = Student::where('rayon', auth('students')->user()->rayon)->paginate(5);
        $total_students = Student::where('rayon', auth('students')->user()->rayon)->get();
        $rayons = Rayon::where('rayon', auth('students')->user()->rayon)->get();
        $rayon = $students[0]['rayon'];

        return view('dashboard.rayon', [
            'title' => 'Dashboard | Rayon ' . ' (' . $rayon . ')',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'students' => $students,
            'rayons' => $rayons,
            'total_students' => count($total_students)
        ]);
    }
}
