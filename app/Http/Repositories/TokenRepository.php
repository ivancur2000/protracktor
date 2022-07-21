<?php

namespace App\Http\Repositories;
use Firebase\JWT\JWT;

abstract class TokenRepository {
    public static function jwt() {
        $payload = [
            'nameid' => auth()->user()->email,      // Time when JWT was issued. 
            'exp' => time() +  60*60*2,// Expiration time
            'nbf' => time(),            
            'iat'=> time()
        ];
        return JWT::encode($payload,$_ENV['JWT_SECRET'],"HS256"); 
    }
}

