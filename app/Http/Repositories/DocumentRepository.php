<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;

class DocumentRepository {
    public function all() {
        $documents = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/documents'); 
        return $documents->json();
    }
}