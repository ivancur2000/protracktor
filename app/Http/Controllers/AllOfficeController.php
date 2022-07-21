<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\AllOfficeRepository;


class AllOfficeController extends Controller
{   

    
 /**
    * The  repository instance.
    */
    protected $allOfficeRepo;
    protected $preferenceRepo;

  /**
    * Create a new controller instance.
    *
    * @param  \App\Http\Repositories\AllOfficeRepository  
    * @return void
    */     

    public function __construct(AllOfficeRepository $allOfficeRepo)
    {
        $this->allOfficeRepo = $allOfficeRepo;
      
    }

    public function index()
    {
        $allOfficeArray = $this->allOfficeRepo->all(); 
        return view('allOffice', compact('allOfficeArray'));
    }
}