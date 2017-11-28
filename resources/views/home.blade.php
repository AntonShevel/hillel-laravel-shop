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
                    <h1>Ваши заказы</h1>

                    @foreach ($order_products as $order_product)

                        {{ $order_product }}
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #home_table td{border: 1px solid #222;}
</style>
@endsection
