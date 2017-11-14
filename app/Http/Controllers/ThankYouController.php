<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Orders;
use Illuminate\Http\Request;
use LaravelShop\Services\CartService;

use Illuminate\Database\Connection;


class ThankYouController extends Controller
{
    public function show()
    {	
        return view('thankYou');
    }

    public function sendPost(Request $request)
    {	
    	$user_name 		= $_POST["name"];
    	$user_phone 	= $_POST["tel"];
    	$city    		= $_POST["city"];
    	$department 	= $_POST["department"];
    	$product_id 	= $_POST["product_id"];
    	$product_amount = $_POST["product_amount"];
    	$final_price 	= $_POST["finalPrice"];
    	$delivery		= isset($_POST["delivery"]) ? $_POST["delivery"] : '';
    	$pay			= isset($_POST["pay"]) ? $_POST["pay"] : '';

    	//if(!is_int($product_id)) return false;
    	//if(!is_int($product_amount)) return false;

    	$values = [
    		'user_name' 	 => $user_name,
    		'user_phone' 	 => $user_phone,
    		'product_id' 	 => $product_id,
    		'product_amount' => $product_amount,
    		'city' 			 => $city,
    		'department' 	 => $department,
    		'final_price' 	 => $final_price,
    		'delivery' 	 	 => $delivery,
    		'pay' 	 		 => $pay
		];
		
		foreach ($values as $value) {
 
            Orders::create(array(
                'value' => json_encode($value)
            ));
 			dd($value);
        }

        $orders = Orders::insert($values);
    }
}
