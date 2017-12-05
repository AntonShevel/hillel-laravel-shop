@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($orders as $order)
                        <table id="home">
                            <caption>Ваш список заказов</caption>
                            <thead>
                                <tr>
                                    <th>Название продукта</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderProducts as $orderProduct )
                                <tr>
                                    <td>{{ $orderProduct->name }}</td>
                                    <td>{{ $orderProduct->price }}</td>
                                    <td>{{ $orderProduct->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>Итого: {{ $order->total_price }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        #home{width: 100%;}
        #home td, #home th{border:1px solid #222;padding: 10px;}
    </style>
</div>
@endsection
