<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\DocumentRepository;

class DocumentController extends Controller
{   
    /**
    * The  repository instance.
    */
    protected $documentRepo;


    /**
    * Create a new controller instance.
    *
    * @param  \App\Http\Repositories\DocumentRepository  $orders
    * @return void
    */
    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepo = $documentRepo;        
    }

    public function index()
    {
        $documentsArray = $this->documentRepo->all(); 
      
        return view('document', compact('documentsArray'));
    }

}