<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RombelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.rombelAdmin', [
            'title' => 'Dashboard | Rombel (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'rombels' => Rombel::latest()->paginate(5)
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

        return view('dashboard.admin.rombel.create', [
            'title' => 'Dashboard | Rombel (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
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
        $validateRombel = $request->validate([
            'rombel' => 'required'
        ]);

        Rombel::create($validateRombel);

        return redirect('dashboard/admin/rombel')->with('success', 'Rombel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.rombel.edit', [
            'rombels' => $rombel,
            'title' => 'Dashboard | Rombel (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        $validateRombel = $request->validate([
            'rombel' => 'required'
        ]);

        Rombel::where('id', $rombel->id)->update($validateRombel);

        return redirect('/dashboard/admin/rombel')->with('success', 'Berhasil mengubah rombel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        Rombel::destroy($rombel->id);

        return redirect('/dashboard/admin/rombel')->with('success', 'Berhasil menghapus rombel');
    }
}
