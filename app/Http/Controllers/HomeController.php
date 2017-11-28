<?php

namespace LaravelShop\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $user_name = $user->name;
        $orders = DB::table('orders')->where('client_name', $user_name)->get();

        $order_products = [];
        foreach ($orders as $order) {
          $ordersId = $order->id;
          $order_products[] = DB::table('order_products')->where('order_id', $ordersId)->get()->toArray();
        }

        dd($order_products);

        return view('home', [
            'order_products' => $order_products
        ]);
    }
}
