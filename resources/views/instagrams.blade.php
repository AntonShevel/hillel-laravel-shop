@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-4">
                            Instagram absolem_shop
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
                        <h2>Pictures</h2>
                        <ul>
                            @foreach ($instagrams as $instagram)
                                <li>
                                    <img src="{{$instagram->images->low_resolution->url}}"
                                         width="{{$instagram->images->low_resolution->width}}" height="{{$instagram->images->low_resolution->height}}" alt="">
                                    {{$instagram->caption->text}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
