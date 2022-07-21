<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\SettingRepository;

class SettingController extends Controller
{   
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }
    
    public function index()
    {
        $global_api_keys =$this->settingRepository->getApiKeys();
        return view('setting', compact('global_api_keys'));
    }
}