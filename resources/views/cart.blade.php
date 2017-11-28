@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th>Товар</th>
                    <th>Цена за единицу</th>
                    <th>Количество</th>
                </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', ['url' => $product->url])}}">{{$product->name}}</a>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <form method="post" action="{{ route('cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input name="product_id" type="hidden" value="{{ $product->id }}">
                                <input name="amount" type="number" value="{{ $cart[$product->id] }}">
                                <button type="submit" class="btn btn-default btn-xs">Обновить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <div class="col-md-6">
                <p class="lead">Итого: <b>${{ $finalPrice }}</b></p>
            </div>
            <div class="col-md-6">
                <a href="{{ route('checkout') }}">
                    <button type="submit" class="btn btn-default">Оформить заказ</button>
                </a>
            </div>
        </div>
    </div>
@endsection
