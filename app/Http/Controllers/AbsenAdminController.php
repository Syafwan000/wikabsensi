<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AbsenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        $absens = Absen::latest()->paginate(10);

        if($request['pencarian_absen']) {
            $absens = Absen::where('nis', 'like', '%' . $request['pencarian_absen'] . '%')
                           ->orWhere('tanggal', 'like', '%' . $request['pencarian_absen'] . '%')
                           ->orWhere('keterangan', 'like', '%' . $request['pencarian_absen'] . '%')->paginate(10)->withQueryString();
        }

        return view('dashboard.admin.absenAdmin', [
            'title' => 'Dashboard | Absen (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'absens' => $absens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        Carbon::setLocale('id');

        $student = Student::where('nis', $absen->nis)->get();

        return view('dashboard.admin.absen.index', [
            'title' => 'Dashboard | Absen (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'student' => $student,
            'absen' => $absen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        Carbon::setLocale('id');

        $student = Student::where('nis', $absen->nis)->get();

        return view('dashboard.admin.absen.edit', [
            'absens' => $absen,
            'student' => $student,
            'title' => 'Dashboard | Absen (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $request->validate([
            'jam_kedatangan' => 'required',
            'jam_kepulangan' => 'required',
            'tanggal' => 'required'
        ]);

        Absen::where('id', $absen->id)->update($request->except(['_token', '_method']));

        return redirect('/dashboard/admin/absen')->with('success', 'Berhasil mengubah absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
