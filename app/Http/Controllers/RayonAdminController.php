<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RayonAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.rayonAdmin', [
            'title' => 'Dashboard | Rayon (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'rayons' => Rayon::latest()->paginate(5)
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

        return view('dashboard.admin.rayon.create', [
            'title' => 'Dashboard | Rayon (Admin)',
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
        $validateRayon = $request->validate([
            'rayon' => 'required',
            'pembimbing_rayon' => 'required'
        ]);

        Rayon::create($validateRayon);

        return redirect('dashboard/admin/rayon')->with('success', 'Rayon berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.rayon.edit', [
            'rayons' => $rayon,
            'title' => 'Dashboard | Rayon (Admin)',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $validateRayon = $request->validate([
            'rayon' => 'required',
            'pembimbing_rayon' => 'required'
        ]);

        Rayon::where('id', $rayon->id)->update($validateRayon);

        return redirect('/dashboard/admin/rayon')->with('success', 'Berhasil mengubah rayon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        Rayon::destroy($rayon->id);

        return redirect('/dashboard/admin/rayon')->with('success', 'Berhasil menghapus rayon');
    }
}
