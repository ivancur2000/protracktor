<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessRefusedController extends Controller
{
  public function accessRefused (){
    return view('accessRefused');
  }
}
