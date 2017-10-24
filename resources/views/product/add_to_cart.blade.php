<form method="post" action="{{ route('cart') }}">
    {{ csrf_field() }}
    <input name="product_id" type="hidden" value="{{ $product_id }}">
    <button type="submit">В Корзину</button>
</form>
