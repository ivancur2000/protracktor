<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockedOutController extends Controller
{
    public function index()
    {
        return view('auth.locked-out');
    }
}