<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\UserAllRepository;

class UserAllController extends Controller
{   

 /**
    * The  repository instance.
    */
    protected $userAllRepo;

  /**
    * Create a new controller instance.
    *
    * @param  \App\Http\Repositories\UserAllRepository  $orders
    * @return void
    */     

    public function __construct(UserAllRepository $userAllRepo)
    {
        $this->userAllRepo = $userAllRepo;
      
    }

    public function index()
    {
        $userAllArray = $this->userAllRepo->all(); 
        return view('userAll', compact('userAllArray'));
    }
}