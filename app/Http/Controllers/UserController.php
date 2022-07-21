<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{   
    public function profile()
    {
        return view('profile');
    }
    
    public function setProfilePhoto(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }
        $user->profile_photo_path = $request->file('file')->store('profile_photos', 'public');
        $user->save();
        return back()->with('success', 'Profile Photo updated successfully');
    }
}