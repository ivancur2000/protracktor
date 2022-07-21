<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\PreferenceRepository;

class PreferenceController extends Controller
{   
    protected $preferenceRepo;

    public function __construct(PreferenceRepository $preferenceRepo)
    {
        $this->preferenceRepo = $preferenceRepo;
    }

    public function ordersTableSave(Request $request)
    {
        $this->preferenceRepo->setOrdersTablePreferences($request->columns);
        return response()->json([
            "status" => "OK"
        ], 200);
    }
}