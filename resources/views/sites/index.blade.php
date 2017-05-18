@extends('sites.layout.app')
@section('content')
	<div class="wrapcontent">
		{!! Html::style('css/slideshow.css') !!}
		<section class="wrapslide" style="background: url(../uploads/boracay-island-philippines.jpg) repeat center;">
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
							<iframe id="play-control" width="560" height="315" src="https://www.youtube.com/embed/64RVs2GK5hQ" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container relative">
			<h2 class="tthome"><span>Top Transfers</span></h2>
			<div class="starline-container">
				<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
			</div>
			<div class="row rowbox">
				@foreach($transfers as $transfer)
					<!-- <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
						<div class="transfer-image">
							<a href="{{ url('/' .$transfer->type->slug . '/' . $transfer->slug) }}">
								{{ Html::image('/storage/' . $transfer->image_thumb, '', ['class' => 'img-responsive']) }}
							</a>
						</div>
						<div class="transfer-content">
							<div class="transfer-title">
								<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">{{ $transfer->title }}</a>
							</div>
							<p>{{ $transfer->description }}</p>
						</div>
					</div> -->
					<div class="col-sm-6 col-md-4 col-xs-12">
						<div class="inner mb">
							<a class="img" href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">
								<div class="badge-price" style='display:none'>
									<div class="size1">Da</div>
									<div class="size2">US$ 0</div>
									<div class="size3">/Pers</div>
								</div>
								{{ Html::image('/storage/' . $transfer->image_thumb, $transfer->title, ['class' => 'image-wrap img-responsive', 'title' => $transfer->title]) }}
								<span class="fix">
									<em>
										<font class="color-two"><span >6 Days</span></font> - VTR01-Northwest Vietnam
									</em>
								</span>
							</a>
							<div class="decreption-three">
								<div class="title">
									<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">{{ $transfer->title }}</a>
								</div>
								<div class="clear"></div>
								<p>
									<p style="text-align: justify;">{{ $transfer->description }} &nbsp;</p>
								</p>
							</div>
							<a class="more" href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}"><span class="glyphicon glyphicon-menu-right"></span></a>
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
						<img src="img/loading.gif">
					</div>
				</div>
			</div>
		</section>
		<section class="container">
			<div class="hr"></div>
		</section>
		<section class="container relative">
			<h2 class="tthome"><span>Top Tours</span></h2>
			<div class="starline-container">
				<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
			</div>
			<div class="row rowbox">
				@foreach($transfers as $transfer)
					<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
						<div class="transfer-image">
							<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">
								{{ Html::image('/storage/' . $transfer->image_thumb) }}
							</a>
						</div>
						<div class="transfer-content">
							<div class="transfer-title">
								<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">{{ $transfer->title }}</a>
							</div>
							<p>{{ $transfer->description }}</p>
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
		<section class="topdeal">
			<div class="titledeal text-center">
				<div class="container">
					<h3>Today's Top Deals</h3>
					<p>Hurry up! 2 tours & activities with hot deals
						<a href="https://goasiadaytrip.com/deals.html" class="go">Go</a>
					</p>
				</div>
			</div>
			<div id="slidedealtour" class="owl-carousel owl-theme wow slideInLeft animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: slideInLeft;">
				<div class="cttopdeal item">
					<div class="img-bgtour"  style="background-image:url('/uploads/tam-coc_treasure-of-indochina.jpg');">
					</div>
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
										</span> Save 15%
									</p>
								</div>
							<img class="img-responsive" src="/uploads/tam-coc_treasure-of-indochina-750x520.jpg">
						</div>
					</div><!-- end slide tour -->
					<div class="col-sm-6 col-lg-7">
							<h2>Hoa Lu - Tam Coc Full-Day From Hanoi</h2>
							<p class="hidden-xs hidden-sm text-justify">
								Discover Hoa Lu - the ancient capital of Vietnam in 10th century. Witness the unique architecture of Dinh and Le Dynasties’ Temples. Nearby Tam Coc (Three Caves) is often referred to as “Ha Long Bay on land.” Admire a breathtaking landscape of green fields and limestone caves when boarding a&#8230;
							</p>
						<p>From <i class="pricesaleoff">US$46.00</i></p>
						<p class="pricedeal">
							<i class="fa fa-dollar"></i><span class="price">39.10</span>
							<span class='badge badge-warning'>-15%</span>
						</p>
						<div class="countdowntopdeal" id="VDT760835"></div><!-- end countdowntopdeal -->
						<a href="https://goasiadaytrip.com/tour/hoa-lu-to-tam-coc-day-trip.html" class="btn btnbookdeal">
							Book Now!
						</a>
					</div><!-- end col -->
					</div><!-- end container -->
				</div><!-- end cttopdeal -->
				<div class="cttopdeal item">
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
						</div><!-- end slide tour -->
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
							<div class="countdowntopdeal" id="VDT498318"></div><!-- end countdowntopdeal -->
							<a href="https://goasiadaytrip.com/tour/trang-an-bai-dinh-pagoda-tour.html" class="btn btnbookdeal">
								Book Now!
							</a>
						</div><!-- end col -->
					</div><!-- end container -->
				</div><!-- end cttopdeal -->
			</div><!-- end #slidedealtour -->
		</section>
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
@endsection