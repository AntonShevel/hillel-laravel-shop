<?php

namespace LaravelShop\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use LaravelShop\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id     = Auth::user()->id;
        $orders = Order::where('client_id', $id)->with('orderProducts')->paginate(10);

        return view('home', [
            'orders'   => $orders 
        ]);
    }
}
