<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Order;
use LaravelShop\Mail\orderAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaravelShop\Http\Controllers\Controller;

class OrderController extends Controller
{
  /**
   * Доставка данного заказа.
   *
   * @param  Request  $request
   * @param  int  $orderId
   * @return Response
   */
  public function ship(Request $request, $orderId)
  {
    $order = Order::findOrFail($orderId);

    // Доставка заказа...

    Mail::to($request->user())->send(new orderAccepted($order));
  }
}


Mail::to($request->user())
    ->send(new orderAccepted($order));

