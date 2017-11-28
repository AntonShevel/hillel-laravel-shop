<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Http\Requests\ThankYouRequest;
use LaravelShop\Order;
use DB;
use LaravelShop\Services\CartServiceInterface;

class ThankYouController extends Controller
{
    public function sendPost(ThankYouRequest $request, CartServiceInterface $cartService)
    {
        $order_number = mt_rand(100, 999999);
        $test = DB::table('orders')->where('order_number', $order_number)->first();

        while($test !== null){
            $order_number = mt_rand(100, 999999);
            $test = DB::table('orders')->where('order_number', $order_number)->first();
        }

        DB::transaction(function() use($request, $cartService, $order_number) {
        /** @var Order $order */
            $order = Order::create([
                'order_number'     => $order_number,
                'client_name'      => $request->get('name'),
                'client_email'     => $request->get('email'),
                'client_phone'     => $request->get("tel"),
                'delivery_address' => $request->get("department"),
                'total_price'      => $cartService->getTotalPrice(),
                'comment'          => $request->get("comment", ''),
                'delivery_type_id' => 1,
                'payment_type_id'  => 1,
            ]);

            $cart = $cartService->getAmounts();

            foreach($cartService->getCart() as $product)
            {
                $order->orderProducts()->create([
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'amount' => $cart[$product->id],
                    'name' => $product->name
                ]);
            }

        });

        /*
         * выбор способоа оплаты/заказа из БД
         * отобразить сформированный заказ
         */
        $products = $cartService->getCart();
        $finalPrice = $cartService->getTotalPrice();

        return view('thankYou', [
            'products'       => $products,
            'cart'           => $cartService->getAmounts(),
            'finalPrice'     => $finalPrice,
            'order_number'   => $order_number,
            'products_count' => count($products)
        ]);
    }
}


