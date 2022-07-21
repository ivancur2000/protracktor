<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\PreferenceRepository;

use App\Models\Timeline;

class OrderController extends Controller
{   
    protected $orderRepo;
    protected $preferenceRepo;

    public function __construct(OrderRepository $orderRepo, PreferenceRepository $preferenceRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->preferenceRepo = $preferenceRepo;
    }

    public function index()
    {
        $ordersArray = $this->orderRepo->all(); 
        $columns = $this->preferenceRepo->getOrdersTablePreferences();
        return view('order.index', compact('ordersArray', 'columns'));
    }
    
    public function show($orderId)
    {
        $order = $this->orderRepo->get($orderId);

        $timeLine = Timeline::get()->where('publish',1)->first(); 

        return view('order.show', compact('order','timeLine'));

    }

    
}