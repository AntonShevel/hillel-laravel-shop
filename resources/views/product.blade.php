@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $product->name }}</div>
                    <div class="panel-body">
                        <ul>
                            <li>id {{ $product->id }}</li>
                            <li>visible {{ $product->visible }}</li>
                            <li>price {{ $product->price }}</li>
                            <li>url {{ $product->url }}</li>
                            <li>
                                @foreach ($images as $image)
                                    <img src="{{ asset('img/' . $image -> filename) }}" width="200">
                                @endforeach
                            </li>
                        </ul>
                        <p>
                            {{ $product->description }}
                        </p>
                        @include('product.add_to_cart', ['product_id' => $product->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
