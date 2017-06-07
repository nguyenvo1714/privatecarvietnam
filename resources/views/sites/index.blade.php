@extends('sites.layout.app')
@section('content')
	<div class="wrapcontent">
		{!! Html::style('css/slideshow.css') !!}
		<section class="wrapslide" style="background: url(../uploads/Vietnam.png) repeat center;">
			<ul class="slideshow">
				<li><span>Boracay Island Philippines</span></li>
				<li><span>Shwedagon Pagoda Myanmar</span></li>
				<li><span>Son Doong Cave Vietnam</span></li>
				<li><span>Inle Lake Myanmar</span></li>
				<li><span>Angkor Wat Cambodia</span></li>
				<li><span>Hon Chong Nha Trang Vietnam</span></li>
			</ul>
			<div class="container">
				<div class="row slidetext">
					<div class="col-sm-12 col-lg-10 col-lg-offset-1">
						<div class="txtslider">
							<h1 class="h1slide">Explore a wide range of exotic tours &amp; activities in Southeast Asia</h1>
						</div>
					</div>
				</div>
				<div class="container wrapfrsearch">
					<div class="col-sm-12 col-lg-10 col-lg-offset-1 search-form">
						{!! Form::open(['url' => '/find-transfer', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'searchForm']) !!}
							<div class="form-group col-md-4 col-xs-12">
							<label class="control-label" for="pick-up">
								Pick-up
							</label>
							<div class="wrapper-input">
								<input id="pick-up" class="form-control col-md-7 col-xs-12 pick-up input-text" name="pick-up" placeholder="Type airport, city or train station" required="required" type="text">
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
		</section>
		<section class="wrapwhyus">
			<div class="">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="row br pt">
						<div class="col-md-6 col-sm-6 col-xs-12 mb">
							<i class="fa fa-shopping-cart text-center"></i> Easy Tour Booking
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 mb">
							<i class='fa fa-tags text-center'></i> Best Services
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 mb">
							<i class='fa fa-dollar text-center'></i> Lowest Tour Prices
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 mb">
							<i class='fa fa-comments text-center'></i> 24/7 Customer Support
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					Testimonial
				</div>
			</div>
		</section>
		<section class="welcome-to-vietname">
			<div class="parallax-container" style="height: 300px">
				<div class="parallax">
					<a class="modal-trigger" href="#modal1">
						<div class="banner-logo">
							<h1 class="marbot15 wow fadeInLeft animated animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
								Welcome to VietNam
							</h1>
							<i class="wow fadeInRight animated fa fa-youtube-play youtube animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;"></i>
						</div>
					</a>
					<div id="modal1" class="modal1">
						<div class="video-container">
							<iframe id="play-control" src="https://www.youtube.com/embed/64RVs2GK5hQ" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container relative mt20">
			<h2 class="tthome"><span>Top Transfers</span></h2>
			<div class="underline"></div>
			<!-- <div class="starline-container">
				<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
			</div> -->
			<div class="row rowbox">
				@foreach($transfers as $transfer)
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="boxinfo transfer wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
							<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}" class="thumb">
								<div class="overlay">
									<div class="hover-content">
										<i class="fa fa-search-plus"></i>
										<span class="glyphicon glyphicon-time"></span> ~ {{ $transfer->duration }}
									</div>
								</div>
								<div class="thumbpre">
									{!! Html::image('/storage/' . $transfer->image_thumb, $transfer->title, ['class' => 'img-responsive']) !!}
								</div>
							</a>
							<div class="desc-container">
								<a class="title" href="{{ '/' . $transfer->type->slug . '/' . $transfer->slug }}">
									{{ $transfer->title }}
								</a>
								<div class="desc">
									{{ $transfer->description }}
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<div id="results"></div>
			</div>
			<div class="col-sm-12">
				<div align="center">
					<button class="load_more btn btn-default" id="load_more_button">
						<i class='fa fa-spinner'></i> Show more transfers
					</button>
					<div class="animation_image" style="display:none;">
						{!! Html::image('img/loading.gif') !!}
					</div>
				</div>
			</div>
		</section>
		<section class="container">
			<div class="hr"></div>
		</section>
		<section class="container relative">
			<h2 class="tthome"><span>Top Tours</span></h2>
			<div class="underline"></div>
			<div class="row rowbox">
				@foreach($transfers as $transfer)
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="boxinfo wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
							<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}" class="thumb">
								<div class="price">from <span class="autoResize">{{ '&#8363;' . number_format($transfer->cars[0]->price) }}</span>
								</div>
								<div class="thumbpre">
									{!! Html::image('/storage/' . $transfer->image_thumb, $transfer->title, ['class' => 'img-responsive']) !!}
								</div>
							</a>
							<div class="desc-container">
								<a class="title" href="{{ '/' . $transfer->type->slug . '/' . $transfer->slug }}">
									{{ $transfer->title }}
								</a>
								<div class="desc">
									{{ $transfer->description }}
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-sm-12">
				<div align="center">
					<button class="load_more btn btn-default" id="load_more_button">
						<i class='fa fa-spinner'></i> Show all transfers
					</button>
					<div class="animation_image" style="display:none;">
						<img src="https://goasiadaytrip.com/image/loading.gif">
					</div>
				</div>
			</div>
		</section>
		@if($dealTransfers->count() > 0)
			<section class="topdeal">
				<div class="titledeal text-center">
					<div class="container">
						<h3>Today's Top Deals</h3>
						<p>Hurry up! {{ $dealTransfers->count() }} transfers & tours with hot deals
							<a href="{{ url('/deal') }}" class="go">Go</a>
						</p>
					</div>
				</div>
				<div id="slidedealtour" class="owl-carousel owl-theme wow slideInLeft animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInLeft;">
					@foreach($dealTransfers as $dealTransfer)
						<div class="cttopdeal item">
							{!! Html::image('/storage/' . $dealTransfer->image_thumb, $dealTransfer->title, ['class' => 'img-bgtour']) !!}
							<div class="overlay-darken"></div>
							<div class="container">
							<div class="col-sm-6 col-lg-5 hidden-xs">
								<div class="imgdeal">
									<div class="activitybanners">
										<p class="acbestseller acbanner">
											<span class="facircle"><i class="fa fa-star"></i></span> Best seller
										</p>
										<p class="acdeal acbanner">
											<span class="facircle">
												<i class="fa fa-credit-card" style="font-size:1em"></i>
											</span> Save {{ $dealTransfer->discount_value }}
										</p>
									</div>
									{!! Html::image('/storage/' . $dealTransfer->image_thumb, $dealTransfer->title, ['class' => 'img-responsive']) !!}
								</div>
							</div><!-- end slide tour -->
							<div class="col-sm-6 col-lg-7">
									<h2>{{ $dealTransfer->title }}</h2>
									<p class="hidden-xs hidden-sm text-justify">
										{{ $dealTransfer->description }}&#8230;
									</p>
								<p>From <i class="pricesaleoff">{{ '&#8363;' . number_format($dealTransfer->cars[0]->price) }}</i></p>
								<p class="pricedeal">
									<span class="price">{{ '&#8363;' . number_format($dealTransfer->cars[0]->price - ($dealTransfer->cars[0]->price * (int)$dealTransfer->discount_value) / 100) }}</span>
									<span class='badge badge-warning'>-{{ $dealTransfer->discount_value }}</span>
								</p>
								<div class="countdowntopdeal" id="VDT760835"></div><!-- end countdowntopdeal -->
								<a href="{{ url('/' . $dealTransfer->type->slug . '/' . $dealTransfer->slug) }}" class="btn btnbookdeal">
									Book Now!
								</a>
							</div><!-- end col -->
							</div><!-- end container -->
						</div><!-- end cttopdeal -->
					@endforeach
					<!-- <div class="cttopdeal item">
						<div class="img-bgtour"  style="background-image:url('/uploads/Trang-An-Eco-2.jpg'); width: 100%;"></div>
						<div class="overlay-darken"></div>  
						<div class="container">
							<div class="col-sm-6 col-lg-5 hidden-xs">
								<div class="imgdeal">
									<div class="activitybanners">
										<p class="acdeal acbanner">
										<span class="facircle">
											<i class="fa fa-credit-card" style="font-size:1em"></i>
										</span> Save 15%
									</p>
									</div>
									<img class="img-responsive" src="/uploads/Trang-An-Eco-2-750x520.jpg">
								</div>
							</div>
							<div class="col-sm-6 col-lg-7">
								<h2>Trang An Ecotourism Complex - Bai Dinh Pagoda Full Day</h2>
								<p class="hidden-xs hidden-sm text-justify">
									This excursion takes you to the Trang An Tourism Complex which is included in the world heritage list by the UNESCO’s World Heritage Committee and Bai Dinh Complex – one of the biggest Buddhism Center of Southeast Asia. You will discover the marvellous architecture of Bai Dinh and also explore&#8230;
								</p>
								<p>From <i class="pricesaleoff">US$46.00</i></p>
								<p class="pricedeal">
									<i class="fa fa-dollar"></i>
									<span class="price">39.10</span>
									<span class='badge badge-warning'>-15%</span>
								</p>
								<div class="countdowntopdeal" id="VDT498318"></div>
								<a href="https://goasiadaytrip.com/tour/trang-an-bai-dinh-pagoda-tour.html" class="btn btnbookdeal">
									Book Now!
								</a>
							</div>
						</div>
					</div> --><!-- end cttopdeal -->
				</div><!-- end #slidedealtour -->
			</section>
		@endif
	</div>
	<script type="text/javascript">
		$(".owl-carousel").owlCarousel({
			nav:true,
			navText: [
				"<span class='glyphicon glyphicon-menu-left hidden-xs'></i>",
				"<i class='glyphicon glyphicon-menu-right hidden-xs'></i>"
			],
			dots: true,
			slideSpeed : 200,
			items: 1,
			margin:0,
			autoHeight: true,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			lazyLoad: true,
			loop:true,
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		    var track_click = 1;
		    var total_pages = {{ $total_pages }};
		    var perpage = {{ $perpage }};
		    var is_hot = {{ ! empty($transfer) ? $transfer->is_hot : 0 }};
		    host = baseUrl + '/top-load-more';
			if (track_click > total_pages-1) {
				$(".load_more").addClass("hidden");
			}
			$(".load_more").click(function (e) {
				$(this).hide();
				$('.animation_image').show();
				if(track_click <= total_pages) {
					$.get(host,{'page': track_click, 'perpage': perpage, 'is_hot' : is_hot}, function(response) {
						var results = '';
						$.each(response.data, function (key, obj){
							results +=
							'<div class="col-sm-6 col-md-3 col-xs-12">' +
								'<div class="boxinfo transfer wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">' +
									'<a href="' + baseUrl + '/' + obj.type.slug + '/' + obj.slug + '" class="thumb">' +
										'<div class="overlay">' +
											'<div class="hover-content">' +
												'<i class="fa fa-search-plus"></i>' +
												'<span class="glyphicon glyphicon-time"></span>' + obj.duration + 
											'</div>' +
										'</div>' +
										'<div class="thumbpre">' +
											'{!! Html::image("/storage/' + obj.image_thumb + '", "' + obj.title + '", ["class" => "img-responsive"]) !!}' +
										'</div>' +
									'</a>' +
									'<div class="desc-container">' +
										'<a class="title" href="' + baseUrl + '/' + obj.type.slug + '/' + obj.slug + '">' +
											obj.title +
										'</a>' +
										'<div class="desc">' +
											obj.description +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>';
						});
						$(".load_more").show();
						$("#results").append(results);
						$("html, body").animate({scrollTop: $("#load_more_button").offset().bottom}, 500);
						$('.animation_image').hide();
						track_click++;
					}).fail(function(xhr, ajaxOptions, thrownError) {
						alert(thrownError);
						$(".load_more").show();
						$('.animation_image').hide();
					});
					if(track_click >= total_pages-1) {
						$(".load_more").addClass("hidden");
					}
				}
			});
		});
	</script>
@endsection