@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-4">
                            Товары
                        </div>
                        <div class="input-group col-md-8">
                            <form action="/search">
                            {{ csrf_field() }}
                                
                                <input type="text" class="form-control input-lg" placeholder="Поиск" name="search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach ($categories as $category)
                            <a href="{{ route('category', ['url' => $category->url]) }}">
                                {{$category->name}}
                            </a>
                        @endforeach
                        <hr>
                        @foreach ($products as $product)
                            {{-- <div>
                                <img src="{{route }}">
                            </div> --}}
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
