<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;


class UserAllRepository {
    public function all() {

        if ($_ENV['USE_MOCKAPI'] == 'false'){
                                 
            $token = TokenRepository::jwt();        
            $users = Http::withToken($token)->get($_ENV['API_URL'].'api/User');
        }
        else{
            $users = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/users'); 
        }
      
        return $users->json();
    }

   
}