<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- this tag to detect screen size -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/ico/favicon.ico">
            <!-- MAKE SURE IT WORKS ON IE WITH COMPATIBILITY -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        {!! Html::style('css/app.css') !!}
        {!! Html::style('css/font-awesome.min.css') !!}
        {!! Html::style('css/fileinput.min.css') !!}
        {!! Html::style('css/slick.css') !!}
        {!! Html::style('css/slick-theme.css') !!}
        {!! Html::style('css/jquery-ui.min.css') !!}
        {!! Html::style('css/animate.css') !!}
        {!! Html::style('css/owl.carousel.min.css') !!}
        {!! Html::style('css/owl.theme.default.min.css') !!}
        {!! Html::style('css/bootstrap-formhelpers.min.css') !!}
        {!! Html::style('css/style.css') !!}
        <!-- Scripts -->
        {!! Html::script('js/app.js') !!}
        {!! Html::script('js/bootstrap-formhelpers.min.js') !!}
        {!! Html::script('js/fileinput.min.js') !!}
        {!! Html::script('js/jquery.awesomeCloud-0.2.js') !!}
        {!! Html::script('js/jquery-ui.min.js') !!}
        {!! Html::script('js/jquery.validate.min.js') !!}
        {!! Html::script('js/additional-methods.min.js') !!}
        {!! Html::script('js/parallax.min.js') !!}
        {!! Html::script('js/wow.min.js') !!}
        {!! Html::script('js/owl.carousel.min.js') !!}
        {!! Html::script('js/jquery.validate.min.js') !!}
        {!! Html::script('js/additional-methods.min.js') !!}
        {!! Html::script('js/custom.validate.js') !!}
        {!! Html::script('js/script.js') !!}
        {!! Html::script('js/blog.custome.js') !!}
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans+Condensed:300,700|PT+Sans:400,400i,700|PT+Serif:400,400i,700|Satisfy');
        </style>
        <link rel="canonical" href="http://privatecarvietnam.com/">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://privatecarvietnam.com/">
        <meta property="og:site_name" content="privatecarvietnam.com website">
        <meta name="twitter:card" content="summary">
        <!-- / Yoast SEO plugin. -->

        <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        </style>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

        </script>
        <script type="text/javascript">
            $(function() {
                $('#pick-up').autocomplete({
                    source: function(request, response) {
                        $('.animation-pick').show();
                        $.ajax({
                            dataType: 'JSON',
                            url: '/pick-up',
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                $('.animation-pick').hide();
                                response($.map(data, function(item) {
                                    return {
                                        value: item.name,
                                        real: item.id
                                    }
                                }));
                            }
                        });
                    },
                    select: function(event, ui) {
                        $('#pick-value').val(ui.item.real);
                    }
                });

                $('#drop-off').autocomplete({
                    source: function(request, response) {
                        $('.animation-drop').show();
                        $.ajax({
                            dataType: 'JSON',
                            url: '/drop-off',
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                $('.animation-drop').hide();
                                response($.map(data, function(item) {
                                    return {
                                        value: item.name,
                                        real: item.id
                                    }
                                }));
                            }
                        });
                    },
                    select: function(event, ui) {
                        $('#drop-value').val(ui.item.real);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            var baseUrl = '{{ URL::to("/") }}';
        </script>
        <script type="text/javascript">
            $(function() {
                $('#departureDate').datepicker({
                    dateFormat: "yy-mm-dd"
                });
            })
        </script>
        <script type="text/javascript">
            
            var baseUrl = '{{ URL::to("/") }}';
            $(function() {
                var action = '{{ $action }}';
                if(action == 'bookForm') {
                    $('.1').addClass('active');
                }
                if(action == 'confirmation') {
                    $('.1').children().find('span').html('<i class="fa fa-check"></i>');
                    $('.1').removeClass('active');
                    $('.1').addClass('completed');
                    $('.2').addClass('active');
                }
            })
        </script>
        <!-- <script type="text/javascript">
            $(function() {
                $('#tagCloud').awesomeCloud({
                    "size" : {
                        "grid" : 16,
                        "normalize": false
                    },
                    "options" : {
                        "color" : "random-dark",
                        "rotationRatio" : 0.35
                    },
                    "shape" : "square"
                });
            })
        </script> -->
        <style>
          /* Note: Try to remove the following lines to see the effect of CSS positioning */
            .affix {
                top: 0;
                width: 102%;
            }
            .affix + .container-fluid {
                padding-top: 70px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" title="PrivatecarVietnam" href="http://privatecarvietnam.com/">
                            {!! Html::image('img/privatecarvietnam.png') !!}
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <!-- <ul class="nav navbar-nav hidden-xs hidden-sm hidden-md">
                            <li  class="slogan"> <span>privatecarvietnam.com</span></li>
                        </ul> -->
                        <ul class="nav navbar-nav">
                            <li class="{{ $active = $action == 'index' ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li class="dropdown {{ $active = $action == 'privateTransfer' ? 'active' : '' }}{{ $active = $action == 'viewTransfer' ? 'active' : '' }}">
                                <a href="{{ url('/private-transfer') }}" role="button"><i class="fa hidden-sm fa fa-car"></i> Private Transfer <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menuuser">
                                    @foreach($transferNames as $transferName)
                                        @if($transferName->type_id == 4)
                                            <li><a href="{{ url('/private-transfer/view/' . $transferName->slug) }}">{{ $transferName->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown {{ $active = $action == 'airportTransfer' ? 'active' : '' }}{{ $active = $action == 'viewAirportTransfer' ? 'active' : '' }}">
                                <a href="{{ url('/airport-transfer') }}" type="button" id="dropdownMenu1" style="clear: both;">
                                    <i class="fa hidden-sm fa fa-car"></i> Airport Transfer
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    @foreach($transferNames as $transferName)
                                        @if($transferName->type_id == 3)
                                            <li><a href="{{ url('/airport-transfer/view/' . $transferName->slug) }}">{{ $transferName->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ $active = $action == 'blog' ? 'active' : '' }}"><a href="{{ url('/blog') }}" style="clear: both;">Blog</a></li>
                            <li class="{{ $active = $action == 'contact' ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact us</a></li>
                            <!-- <li><a href="mailto:info@privatecarvietnam.com">info@privatecarvietnam.com</li>
                            <li><a href="tel:+84 122345678">84 122345678</li> -->
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-sm hidden-md">
                            <li><a href="mailto:info@privatecarvietnam.com"><i class="fa fa-envelope"></i> info@privatecarvietnam.com</a></li>
                            <li><a href="tel:+84 122345678"><i class="fa fa-whatsapp"></i> +84 122345678</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
            <a href="#" class="back-to-top" style="display: none;">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </a>
            <section class="search-container">
            <div class="cttopdeal">
                <div class="img-bgtour" style="background-image:url('/uploads/bau-trang-phan-thiet.jpg');"></div>
                    <div class="overlay-darkquare overlay-darken"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-md-offset-1">
                                {!! Form::open(['url' => '/find-transfer', 'method' => 'POST', 'class' => 'form-inline search-form col-md-12', 'id' => 'searchForm']) !!}
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label class="control-label" for="pick-up">
                                            Pick-up
                                        </label>
                                        <div class="wrapper-input">
                                            <input id="pick-up" class="form-control col-md-7 col-xs-12 pick-up input-text" name="pick-up" placeholder="Type airport, city or train station" required="required" type="text">
                                            <input type="hidden" name="pick-up" id="pick-value">
                                            {{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-pick']) }}
                                        </div>
                                    </div>
                                    <!-- <div class="form-group col-md-1 col-xs-12">
                                        <a href="javascript:void(0)" class="swap-locations">
                                            <i class="fa fa-exchange"></i>
                                        </a>
                                    </div> -->
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label class="control-label" for="drop-off">
                                            Drop-off
                                        </label>
                                        <div class="wrapper-input">
                                            <input id="drop-off" class="form-control col-md-7 col-xs-12 drop-off input-text" name="drop-off" placeholder="Type airport, city or train station" required="required" type="text">
                                            <input type="hidden" name="pick-up" id="drop-value">
                                            {{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-drop']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <button id="send" type="submit" class="button button-red">
                                            <span class="glyphicon glyphicon-search"></span>Find transfer
                                        </button>
                                    </div>
                                {!! Form::close() !!}
                            </div> <!-- End Wrap Quicksearch -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="submenu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ url('/') }}" class="brhome" title="Home"><i class="fa fa-home"></i></a>
                                </li>
                                @if(in_array($action, ['viewTransfer', 'viewAirportTransfer']))
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="{{ url('/' . $transfer_name->type->slug) }}" itemprop="url">
                                            <span itemprop="title">{{ $transfer_name->type->name }}</span>
                                        </a>
                                    </li>
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <span itemprop="title">{{ $transfer_name->name }}</span>
                                    </li>
                                @elseif($action == 'content')
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="{{ url('/blog') }}" itemprop="url">
                                            <span itemprop="title">Blog</span>
                                        </a>
                                    </li>
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <span itemprop="title">{{ $detail->title }}</span>
                                    </li>
                                @else
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="{{ url('/' . $transfer->type->slug) }}" itemprop="url">
                                            <span itemprop="title">{{ $transfer->type->name }}</span>
                                        </a>
                                    </li>
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="{{ url('/' . $transfer->type->slug . '/view/' . $transfer->transfer_name->slug) }}" itemprop="url">
                                            <span itemprop="title">{{ $transfer->transfer_name->name }}</span>
                                        </a>
                                    </li>
                                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <span itemprop="title">{{ $transfer->title }}</span>
                                    </li>
                                @endif
                            </ol>
                        </div>
                    </div>
                  </div>
            </section>
            @yield('content')
        </div>
        <div class="modal"><!-- Place at bottom of page --></div>
        <div class="cover"><!-- Place at bottom of page --></div>
    </body>
    <footer class="wrapfooter">
        <div class="container footer">
            <div class="row">
                <div class="col-md-3 col-sm-6 wow slideInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInUp;">
                    <div class="contact-us">
                        <h3>Contact Us</h3>
                        <p class="contact">{{ Html::image('img/phone.png') }} ...</p>
                        <p class="email">{{ Html::image('img/email.png') }} info@privatecarvietnam.com</p>
                        <p class="address">{{ Html::image('img/paper-plane.png') }} info@privatecarvietnam.com</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 our-blog wow slideInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInUp;">
                    <h3>Our blog</h3>
                    <ul class="list-unstyled">
                        @foreach($blogs as $blog)
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ $blog->img }}">
                                </div>
                                <div class="media-body">
                                    <h5><a href="#">{{ $blog->title}}</a></h5>
                                    <p>{{ $blog->description . ' ...' }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 wow slideInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInUp;">
                    <h3>TripAdVisor</h3>
                    <div class="tripadvisor-wrapper">
                        <div class="tripadvisor-experience">
                            <h5 class="tripadvisor-title"><a href="https://www.tripadvisor.com/" target="_blank">Private Car VietNam Experience</a></h5>
                            <p class="strong-text">TripAdvisor Traveler Rating</p>
                            {{ Html::image('img/visor.gif') }}
                            <p class="normal-text">Based on 401 traveler reviews</p>
                        </div>
                        <div class="tripadvisor-review">
                            <h5 class="tripadvisor-title"><a href="https://www.tripadvisor.com/" target="_blank">Review VietNam Private Car</a></h5>
                            <a href="https://www.tripadvisor.com/" target="_blank">
                                {{ Html::image('img/tripadvisor_green_background.png') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center wow slideInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInUp;">
                    <div class="socialfooter">
                        <h3 class='ttfollowus'>Follow us</h3>
                        <a href="https://www.facebook.com/privatecarvietnam" class="fb"><i class='fa fa-facebook'></i> Facebook</a>
                        <a href="https://instagram.com/privatecarvietnam" class="ins"><i class='fa fa-instagram'></i> Instagram</a>
                        <a href="https://twitter.com/privatecarvietnam" class="tw"><i class='fa fa-twitter'></i> Twitter</a>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 footer-bottom text-center">
                    <p>©2017&nbsp;<a href="http://privatecarvietnam.com">Private Car VietNam</a> - Let Us Show You VietNam</p>
                </div>
            </div>
        </div> <!-- End .footer -->
    </footer> <!-- End .wwrapfooter -->
</html>