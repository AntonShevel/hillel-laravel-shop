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
        DB::transaction(function() use($request, $cartService) {
        /** @var Order $order */
            $order = Order::create([
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

        return view('thankYou');
    }
}


