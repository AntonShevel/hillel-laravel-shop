@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Товары</div>
                    <div class="panel-body">
                        @foreach ($categories as $category)
                            <a href="{{ route('category', ['url' => $category->url]) }}">
                                {{$category->name}}
                            </a>
                        @endforeach
                        <hr>
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
