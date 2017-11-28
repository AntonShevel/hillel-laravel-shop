@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('thankYou') }}" method="post" class="form-horizontal" id="checkout">
                    {{ csrf_field() }}
                    <div class="col-md-12 form-group">
                        <input type="text" name="name" placeholder="Ваше имя"
                               required="" autofocus="" value="">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="tel" name="tel" placeholder="Ваш телефон" required="">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" name="email" placeholder="Ваш email" required="">
                    </div>
                    <p class="title">Выберите способ доставки</p>
                    <div class="col-md-4 form-group radio radio-primary">
                        <input type="radio" name="delivery" id="nova_poshta" value="Новой почтой">
                        <label class="control-label" for="nova_poshta">Новой почтой</label>

                        <div id="np-map"> 
                            <button type="button" id="npw-map-open-button" class="">БЛИЖАЙШЕЕ ОТДЕЛЕНИЕ</button> 
                            <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPhm7Q29X5ldwjLtA7IMYHU_0xATiWK3A&amp;language=ru"></script>

                            <div class="form-group col-md-5 city">
                                <input type="text" name="city" placeholder="Ваш город" id="city">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" name="department" placeholder="Номер отделения" id="department">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 form-group radio radio-primary">
                        <input type="radio" name="delivery" id="curier" value="Курьером">
                        <label class="control-label" for="curier">Курьером</label>
                    </div>
                    <div class="col-md-4 form-group radio radio-primary">
                        <input type="radio" name="delivery" id="self" value="Самовывоз">
                        <label class="control-label" for="self">Самовывоз</label>
                    </div>
                    <div class="clearfix"></div>
                    <p class="title">Выберите способ оплаты</p>
                    <div class="col-md-6 form-group radio radio-primary">
                        <input type="radio" name="pay" id="to_curier" value="Оплата наличными курьеру">
                        <label class="control-label" for="to_curier">Оплата наличными курьеру</label>
                    </div>
                    <div class="col-md-6 form-group radio radio-primary">
                        <input type="radio" name="pay" id="by_card" value="Оплата на карту ПриватБанка">
                        <label class="control-label" for="by_card">Оплата на карту ПриватБанка</label>
                    </div>
                    <div class="col-md-12">
                        <p class="lead mt2">Итого: <b>${{ $finalPrice }}</b></p>
                    </div>

                    @foreach ($products as $product)
                        <!-- Второй параметр -> кол-во товара -->
                        <input name="product_id[]" type="hidden" value="{{ $product->id }} ">
                        <input name="product_amount[]" type="hidden" value="{{ $cart[$product->id] }} ">
                    @endforeach

                    <input type="hidden" name="finalPrice" value="{{ $finalPrice }}">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Оформить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type='text/javascript' id='map' charset='utf-8' data-lang='ua' apiKey='3482bff33fb1bbcb7a13351fb27a9e0c' data-town='undefined' data-town-name='undefined' data-town-id='undefined' src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/dist/map.min.js'></script>
@endpush
