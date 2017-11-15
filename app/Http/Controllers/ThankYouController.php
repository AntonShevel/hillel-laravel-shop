<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Order;
use LaravelShop\OrderProduct;
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

    public function sendPost(Request $request, CartService $cartService)
    {
        /** @var Order $order */
        $order = Order::create([
            'client_name' => $request->get('name'),
            'client_email' => 'temp@mail.com',
            'client_phone' => $request->get("tel"),
            'delivery_address' => $request->get("department"),
            'total_price' => $cartService->getTotalPrice(),
            'comment' => $request->get("comment", ''),
            'delivery_type_id' => 1,
            'payment_type_id' => 1,
        ]);

        $cart = $request->session()->get('cart', []);

        foreach($cartService->getCart() as $product)
        {
            $orderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'amount' => $cart[$product->id],
                'name' => $product->name
            ]);
            $order->orderProducts()->save($orderProduct);
        }

        dd($order);

        /*
         * добавить валидацию запроса
         * использовать relationship вместо указания order_id
         * выбор способоа оплаты/заказа из БД
         * отобразить сформированный заказ
         * создавать заказ в транзакции
         * исправить выбор отеделения НП в модальном окне
         */
    }
}


