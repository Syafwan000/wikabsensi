<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        if(Auth::guard('admins')->check()) {
            $username = Auth::guard('admins')->user()->username;
            $image = Auth::guard('admins')->user()->image;
        } else if(Auth::guard('students')->check()) {
            $username = Auth::guard('students')->user()->username;
            $image = Auth::guard('students')->user()->image;
        }

        return view('dashboard.profile.index', [
            'title' => 'Dashboard | ' . $username,
            'image' => $image,
        ]);
    }

    public function storePhoto(Request $request)
    {
        $photo = $request->validate([
            'image' => 'required|image|file|max:1024'
        ]);

        $photo['image'] = $request->file('image')->store('profile');

        if(Auth::guard('admins')->check()) {
            Admin::where('id', Auth::guard('admins')->user()->id)->update($photo);

            return redirect('/dashboard/profile');
            
        } elseif(Auth::guard('students')->check()) {
            Student::where('id', Auth::guard('students')->user()->id)->update($photo);

            return redirect('/dashboard/profile');
        }
    }

    public function updatePhoto(Request $request)
    {
        $photo = $request->validate([
            'image' => 'required|image|file|max:1024'
        ]);

        $oldprofile = explode('/', $request->old_profile);

        if($request->file('image')) {
            if($request->old_profile) {
                Storage::delete('profile/' . $oldprofile[4]);
            }
            $photo['image'] = $request->file('image')->store('profile');
        }

        if(Auth::guard('admins')->check()) {
            Admin::where('id', Auth::guard('admins')->user()->id)->update($photo);

            return redirect('/dashboard/profile');

        } elseif(Auth::guard('students')->check()) {
            Student::where('id', Auth::guard('students')->user()->id)->update($photo);

            return redirect('/dashboard/profile');
        }
    }

    public function deletePhoto()
    {
        $photo['image'] = null;

        if(Auth::guard('admins')->check()) {
            Admin::where('id', Auth::guard('admins')->user()->id)->update($photo);

            $admin_photo = explode('/', auth('admins')->user()->image);

            Storage::delete('profile/' . $admin_photo[1]);

            return redirect('/dashboard/profile');

        } elseif(Auth::guard('students')->check()) {
            Student::where('id', Auth::guard('students')->user()->id)->update($photo);

            $student_photo = explode('/', auth('students')->user()->image);

            Storage::delete('profile/' . $student_photo[1]);

            return redirect('/dashboard/profile');
        }
    }
}
