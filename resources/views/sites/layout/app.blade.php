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
        {!! Html::style('js/validator/fv.css') !!}
        {!! Html::style('css/wp-customer-reviews-generated.css') !!}
        {!! Html::style('css/style.css') !!}
        {!! Html::style('css/slick.css') !!}
        {!! Html::style('css/slick-theme.css') !!}
        <!-- Scripts -->
        {!! Html::script('js/app.js') !!}
        {!! Html::script('js/underscore-min.js') !!}
        {!! Html::script('js/backbone-min.js') !!}
        {!! Html::script('js/backbone.localStorage-min.js') !!}
        {!! Html::script('js/fileinput.min.js') !!}
        {!! Html::script('js/menu-addon.js') !!}
        {!! Html::script('js/script.js') !!}
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans+Condensed:300,700|PT+Sans:400,400i,700|PT+Serif:400,400i,700|Satisfy');
        </style>
        <link rel="canonical" href="http://luxurysimplifiedretreats.com/">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://luxurysimplifiedretreats.com/">
        <meta property="og:site_name" content="luxurysimplifiedretreats.com website">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Vacation Rentals, Charleston SC, Luxury Simplified Retreats">
        <!-- / Yoast SEO plugin. -->

        <link rel="dns-prefetch" href="http://s.w.org/">
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
        <link rel="https://api.w.org/" href="http://luxurysimplifiedretreats.com/wp-json/">
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://luxurysimplifiedretreats.com/xmlrpc.php?rsd">
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://luxurysimplifiedretreats.com/wp-includes/wlwmanifest.xml"> 
        <link rel="shortlink" href="http://luxurysimplifiedretreats.com/">
        <link rel="alternate" type="application/json+oembed" href="http://luxurysimplifiedretreats.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fluxurysimplifiedretreats.com%2F">
        <link rel="alternate" type="text/xml+oembed" href="http://luxurysimplifiedretreats.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fluxurysimplifiedretreats.com%2F&amp;format=xml">
        <style type="text/css">.pika-single{z-index:9999;display:block;position:relative;color:#333;background:#fff;border:1px solid #ccc;border-bottom-color:#bbb;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.pika-single.is-hidden{display:none}.pika-single.is-bound{position:absolute;box-shadow:0 5px 15px -5px rgba(0,0,0,0.5)}.pika-single{*zoom:1}.pika-single:before,.pika-single:after{content:" ";display:table}.pika-single:after{clear:both}.pika-lendar{float:left;width:240px;margin:8px}.pika-title{position:relative;text-align:center}.pika-title select{cursor:pointer;position:absolute;z-index:9998;margin:0;left:0;top:5px;filter:alpha(opacity=0);opacity:0}.pika-label{display:inline-block;*display:inline;position:relative;z-index:9999;overflow:hidden;margin:0;padding:5px 3px;font-size:14px;line-height:20px;font-weight:bold;background-color:#fff}.pika-prev,.pika-next{display:block;cursor:pointer;position:relative;outline:none;border:0;padding:0;width:20px;height:30px;text-indent:20px;white-space:nowrap;overflow:hidden;background-color:transparent;background-position:center center;background-repeat:no-repeat;background-size:75% 75%;opacity:0.5;*position:absolute;*top:0}.pika-prev:hover,.pika-next:hover{opacity:1}.pika-prev.is-disabled,.pika-next.is-disabled{cursor:default;opacity:0.2}.pika-prev,.is-rtl .pika-next{float:left;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAeCAYAAAAsEj5rAAAAUklEQVR42u3VMQoAIBADQf8Pgj+OD9hG2CtONJB2ymQkKe0HbwAP0xucDiQWARITIDEBEnMgMQ8S8+AqBIl6kKgHiXqQqAeJepBo/z38J/U0uAHlaBkBl9I4GwAAAABJRU5ErkJggg==");*left:0}.pika-next,.is-rtl .pika-prev{float:right;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAeCAYAAAAsEj5rAAAAU0lEQVR42u3VOwoAMAgE0dwfAnNjU26bYkBCFGwfiL9VVWoO+BJ4Gf3gtsEKKoFBNTCoCAYVwaAiGNQGMUHMkjGbgjk2mIONuXo0nC8XnCf1JXgArVIZAQh5TKYAAAAASUVORK5CYII=");*right:0}.pika-select{display:inline-block;*display:inline}.pika-table{width:100%;border-collapse:collapse;border-spacing:0;border:0}.pika-table th,.pika-table td{width:14.28571%;padding:0}.pika-table th{color:#999;font-size:12px;line-height:25px;font-weight:bold;text-align:center}.pika-table abbr{border-bottom:none;cursor:help}.pika-button{cursor:pointer;display:block;-moz-box-sizing:border-box;box-sizing:border-box;outline:none;border:0;margin:0;width:100%;padding:5px;color:#666;font-size:12px;line-height:15px;text-align:right;background:#f5f5f5}.is-today .pika-button{color:#3af;font-weight:bold}.is-selected .pika-button{color:#fff;font-weight:bold;background:#3af;box-shadow:inset 0 1px 3px #178fe5;border-radius:3px}.is-disabled .pika-button{pointer-events:none;cursor:default;color:#999;opacity:0.3}.pika-button:hover{color:#fff !important;background:#ff8000 !important;box-shadow:none !important;border-radius:3px !important}.pika-week{font-size:11px;color:#999}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset{border:0;padding:0;margin:0;max-width:500px}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-1 .hs-input{width:95%}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-1 .input{margin-right:8px}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-1 input[type="checkbox"],.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-1 input[type="radio"]{width:auto}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-2 .hs-form-field{width:50%;float:left}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-2 .input{margin-right:8px}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-3 .hs-form-field{width:32.7%;float:left}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f fieldset.form-columns-3 .input{margin-right:8px}.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f label.hs-hidden{visibility:hidden}.hsformerror{margin:0 0 2px;padding:2px 6px;height:auto;background-color:#fdd2d0;font-size:11px;border:1px solid #fcb3af;padding:4px 16px 4px 10px;color:#000;display:none;background-image:-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fefefe), color-stop(100%, #fdd2d0));background-image:-webkit-linear-gradient(#fefefe, #fdd2d0);background-image:-moz-linear-gradient(#fefefe, #fdd2d0);background-image:-o-linear-gradient(#fefefe, #fdd2d0);background-image:linear-gradient(#fefefe,#fdd2d0);-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-o-border-radius:4px;border-radius:4px;-webkit-box-shadow:0 0 6px #ddd;-moz-box-shadow:0 0 6px #ddd;box-shadow:0 0 6px #ddd;z-index:99999}.hsformerror em{border:10px solid;border-color:#fdd2d0 transparent transparent;bottom:-17px;display:block;height:0;left:60px;position:absolute;width:0}.hsformerror p{font-family:Lucida Grande,Lucida Sans Unicode,bitstream vera sans,trebuchet ms,verdana,sans-serif;margin:0;float:left;margin-right:8px}.hsformerror:hover{cursor:default}.hsformerror .close-form-error{float:right;display:inline;top:3px;position:absolute;font-family:Verdana !important;color:#b17c79 !important;cursor:pointer !important;font-size:11px !important;font-weight:normal !important}.hsformerror .close-form-error:hover{color:#cc8884}@media (max-width: 400px), (min-device-width: 320px) and (max-device-width: 480px){form.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f .form-columns-2 .hs-form-field,form.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f .form-columns-3 .hs-form-field{float:none;width:100%}form.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f .form-columns-2 .hs-form-field .hs-input,form.hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f .form-columns-3 .hs-form-field .hs-input{width:95%}}
        </style>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

        </script>
        <style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 97.5%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  </style>
    </head>
    <body>
        <div id="app">
            @yield('content')    
        </div>
    </body>
    <footer class="footer-wrapper">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-us">
                            <h3>Contact Us</h3>
                            <p class="contact">{{ Html::image('img/phone.png') }} +84-911 611 246</p>
                            <p class="email">{{ Html::image('img/email.png') }} info@privatecarvietnam.com</p>
                            <p class="address">{{ Html::image('img/paper-plane.png') }} info@privatecarvietnam.com</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 our-blog">
                        <h3>Our blog</h3>
                        <ul class="list-unstyled">
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        {{ Html::image('img/admin.jpg') }}
                                    </div>
                                    <div class="media-body">
                                        <h5><a href="#">Oriental Sails fleet – Certificate of Excellence in The Guide Awards 2016</a></h5>
                                        <p>With much attempt in building a professional team...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        {{ Html::image('img/admin.jpg') }}
                                    </div>
                                    <div class="media-body">
                                        <h5><a href="#">Oriental Sails fleet – Certificate of Excellence in The Guide Awards 2016</a></h5>
                                        <p>With much attempt in building a professional team...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        {{ Html::image('img/admin.jpg') }}
                                    </div>
                                    <div class="media-body">
                                        <h5><a href="#">Oriental Sails fleet – Certificate of Excellence in The Guide Awards 2016</a></h5>
                                        <p>With much attempt in building a professional team...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        {{ Html::image('img/admin.jpg') }}
                                    </div>
                                    <div class="media-body">
                                        <h5><a href="#">Oriental Sails fleet – Certificate of Excellence in The Guide Awards 2016</a></h5>
                                        <p>With much attempt in building a professional team...</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>TripAdVisor</h3>
                        <div class="tripadvisor-wrapper">
                            <div class="tripadvisor-header">
                                <a href="https://www.tripadvisor.com/" target="_blank">
                                    {{ Html::image('img/tripadvisor.png') }}
                                </a>
                                <p class="normal-text">Know better. Book better. Go better.</p>
                            </div>
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
                    <div class="col-md-3 col-sm-6">
                        <h3>Facebook</h3>
                        <p>
                            <big>
                            <a href="http://www.facebook.com/LuxurySimplifiedRetreats" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="http://instagram.com/luxurysimplifiedretreats/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <a href="http://www.pinterest.com/luxsimpretreats/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </big>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 footer-bottom">
                        <p>Private Car VietName - Let Us Show You VietNam</p>
                        <p>Broker in Charge – Rob Wilson, Cell: <a href="tel:8432966585">(843) 296-6585</a></p>
                        <p>©2017&nbsp;Luxury Simplified Retreats. <a href="http://cnmwebsite.com/" target="_blank">Web Design, Development &amp; Hosting by Colophon</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>