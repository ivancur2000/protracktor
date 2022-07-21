<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddNewUserController extends Controller
{   
    public function index()
    {
        return view('addNewUser');
    }
}