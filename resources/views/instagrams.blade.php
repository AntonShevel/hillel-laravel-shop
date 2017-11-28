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
                        <div class="gamma-container gamma-loading" id="gamma-container">

                            <ul class="gamma-gallery">
                                @foreach ($instagrams as $instagram)
                                <li>
                                    <div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
                                        <div data-src="{{$instagram->url}}" data-min-width="1300"></div>
                                        <div data-src="{{$instagram->url}}" data-min-width="1000"></div>
                                        <div data-src="{{$instagram->url}}" data-min-width="700"></div>
                                        <div data-src="{{$instagram->url}}" data-min-width="300"></div>
                                        <div data-src="{{$instagram->url}}" data-min-width="200"></div>
                                        <div data-src="{{$instagram->url}}" data-min-width="140"></div>
                                        <div data-src="{{$instagram->url}}"></div>
                                        <noscript>
                                            <img src="{{$instagram->url}}" alt="img03"/>
                                        </noscript>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/jquery.masonry.min.js"></script>
    <script src="js/jquery.history.js"></script>
    <script src="js/js-url.min.js"></script>
    <script src="js/jquerypp.custom.js"></script>
    <script src="js/gamma.js"></script>
    <script type="text/javascript">

        $(function() {

            var GammaSettings = {
                // order is important!
                viewport : [ {
                    width : 1200,
                    columns : 5
                }, {
                    width : 900,
                    columns : 4
                }, {
                    width : 500,
                    columns : 3
                }, {
                    width : 320,
                    columns : 2
                }, {
                    width : 0,
                    columns : 2
                } ]
            };

            Gamma.init( GammaSettings, fncallback );


            // Example how to add more items (just a dummy):

            var page = 0,
                items = ['<li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li>']

            function fncallback() {

                $( '#loadmore' ).show().on( 'click', function() {

                    ++page;
                    var newitems = items[page-1]
                    if( page <= 1 ) {

                        Gamma.add( $( newitems ) );

                    }
                    if( page === 1 ) {

                        $( this ).remove();

                    }

                } );

            }

        });

    </script>
@endsection
