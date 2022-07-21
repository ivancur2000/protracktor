<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;
 


class OrderRepository {
    public function all() {

        if ($_ENV['USE_MOCKAPI'] == 'false'){

             
            $token = TokenRepository::jwt();                         
            $orders = Http::withToken($token)->get($_ENV['API_URL'].'api/Order');
            
        }
        else{
            $orders = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/orders'); 
        }            
        return $orders->json();

    }

    public function get($orderId) {
        if ($_ENV['USE_MOCKAPI'] == 'false'){
            $token = TokenRepository::jwt();                         
            $orders = Http::withToken($token)->get($_ENV['API_URL']."api/Order/$orderId");
        }
        else{
            $orders = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/orders'); 
        }            
        return sizeof($orders->json()) ?  $orders->json()[0] : null;
    }
     
}