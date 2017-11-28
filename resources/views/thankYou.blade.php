@extends('layouts.app')

@section('content')
    <div class="container thank">
        <div class="row">
            <h1>Спасибо, ваш заказ принят!</h1>
            <p>В ближайшее время с Вами свяжется наш менеджер</p>
            <div class="col-md-12">
            	<table id="checkout">
	            	<caption>Ваш заказ</caption>
	            	<thead>
	            		<tr>
	            			<th>Номер заказа</th>
	            			<th>Товар</th>
	            			<th>Цена</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $count = 0 ?>
	            		@foreach ($products as $product)
	            		<?php $count++ ?>
	            		<tr>
	            			<td>
	            				<?php if( $count === 1) echo $order_number ?>
	            			</td>
        					<td>
        						{{ $product->name }}
        					</td>

            				<td>
            					{{ $product->price }}
            				</td>
	            		</tr>
        				@endforeach
	            	</tbody>
	            </table>
            </div>
            <div class="col-md-12">
                <p class="lead mt2">Итого: <b>${{ $finalPrice }}</b></p>
            </div>
        </div>
    </div>

    <style>
    	#checkout{margin: 0 auto;}
    	#checkout td, #checkout th{border: 1px solid #222;padding: 10px 20px;}
    	.thank .lead{text-align: center; margin-top: 20px;}
    	caption{font-size: 20px;text-align: center;}
    </style>
@endsection
