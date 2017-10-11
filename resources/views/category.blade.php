@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Товары в категории {{$category->name}}</div>
                    <div class="panel-body">
                        @foreach ($products as $product)
                            <div>
                                <a href="{{route('product', ['url' => $product->url])}}">{{$product->name}}</a>
                            </div>
                        @endforeach
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
