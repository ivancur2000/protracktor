<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;

class AllOfficeRepository {
    public function all() {
        $offices = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/offices'); 
        return $offices->json();
    }
}