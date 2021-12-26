<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');

        return view('dashboard.admin.registerAdmin', [
            'title' => 'Dashboard | Registrasi Admin',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'admins' => Admin::latest()->paginate(5)
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

        return view('dashboard.admin.admin.create', [
            'title' => 'Dashboard | Registrasi Admin',
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
        $validateAdmin = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:admins,username|unique:students,username',
            'password' => 'required'
        ]);

        $validateAdmin['password'] = bcrypt($request['password']);

        Admin::create($validateAdmin);

        return redirect('/dashboard/admin/register-admin')->with('success', 'Berhasil menambah admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Carbon::setLocale('id');

        $admins = Admin::where('id', $id)->get();

        return view('dashboard.admin.admin.edit', [
            'admins' => $admins,
            'title' => 'Dashboard | Registrasi Admin',
            'date' => Carbon::now()->isoFormat('dddd, D MMMM Y')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateAdmin = $request->validate([
            'nama' => 'required',
            'username' => 'required'
        ]);
        
        if($request['new_password']) {
            $validateAdmin['password'] = bcrypt($request['new_password']);
        }

        Admin::where('id', $id)->update($validateAdmin);

        return redirect('/dashboard/admin/register-admin')->with('success', 'Berhasil merubah admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return redirect('/dashboard/admin/register-admin')->with('success', 'Berhasil menghapus admin');
    }
}
