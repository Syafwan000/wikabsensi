<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RegisterStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.registerStudent', [
            'title' => 'Dashboard | Registrasi Siswa',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'students' => Student::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.student.create', [
            'title' => 'Dashboard | Registrasi Siswa',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateSiswa = $request->validate([
            'nis' => 'required|max:8|unique:students,nis',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required|unique:students,username|unique:admins,username',
            'password' => 'required'
        ]);

        $validateSiswa['password'] = bcrypt($request['password']);

        Student::create($validateSiswa);

        return redirect('/dashboard/admin/register-siswa')->with('success', 'Berhasil menambahkan siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Carbon::setLocale('id');

        $students = Student::where('id', $id)->get();

        return view('dashboard.admin.student.edit', [
            'students' => $students,
            'title' => 'Dashboard | Registrasi Siswa',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'rombels' => Rombel::all(),
            'rayons' => Rayon::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateSiswa = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required'
        ]);
        
        if($request['new_password']) {
            $validateSiswa['password'] = bcrypt($request['new_password']);
        }

        Student::where('id', $id)->update($validateSiswa);

        return redirect('/dashboard/admin/register-siswa')->with('success', 'Berhasil merubah siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/dashboard/admin/register-siswa')->with('success', 'Berhasil menghapus siswa');
    }
}
