@extends('sites.layout.for_index')
@section('content')
	<!-- <div class="container-fluid">
		<div class="logo-head">
			<div class="logo col-xs-12 col-md-4 col-lg-4">
				<a class="logo-link" href="#">{{ Html::image('img/logo-vmtravel.png') }}</a>
			</div>
			<div class="slogan col-xs-12 col-md-4 col-lg-4">
				<h2>Let Us Show You VietNam</h2>
			</div>
			<div class="contact col-xs-12 col-md-4 col-lg-4">
				<p class="language clearfix">
		           <span>Choose language:</span>
		           <a href="http://www.orientalsails.com" class="flag en" hreflang="en"></a>
		           <a href="http://www.vietnamese.orientalsails.com/" class="flag vi" hreflang="vi"></a> 
		        </p>
		        <p class="text">CONTACT YOUR TRIP PLANNER</p>
		        <p class="email">Email: info@privatecarvietnam.com</p>
		        <p><span class="phone"></span>Book online or call <b>84-4-39264009</b></p>
			</div>
		</div>
		<div class="menu clearfix">
		    <a class="navigation" href="#">
		        <span class="bar"></span>
		        <span class="bar"></span>
		        <span class="bar"></span>
		        &nbsp;
		        <span class="txt">MENU</span>
		    </a>
		</div>
		<div class="desktop-menu" data-spy="affix" data-offset-top="197">
	        <div class="">
				<ul class="top-menu">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="#">Private Transfer <span class="caret"></span></a>
						<ul>
							<li><a href="#">Hue Transfer</a></li>
							<li><a href="#">Quang Binh Transfer</a></li>
							<li><a href="#">Da Nang Transfer</a></li>
							<li><a href="#">Hoi An Transfer</a></li>
						</ul>
					</li>
					<li><a href="#">Airport Transfer <span class="caret"></span></a>
						<ul>
							<li><a href="#">Phu Bai Transfer</a></li>
							<li><a href="#">Dong Hoi Transfer</a></li>
							<li><a href="#">Da Nang Transfer</a></li>
							<li><a href="#">Chu Lai Transfer</a></li>
						</ul>
					</li>
					<li><a href="3">Blog</a></li>
					<li><a href="3">Contact us</a></li>
				</ul>
	        </div>
		</div>
		<a href="#" class="back-to-top" style="display: none;">
			<i class="fa fa-arrow-up" aria-hidden="true"></i>
		</a>
	</div> -->
	
	<!-- HOME CONTENT -->
	<div class="home-banner">
		<div class="main-slider-wrapper actived">
			<div class="custom-arrows-wrapper">
				<div class="slick slick-slider slick-dotted" role="toolbar">
					<div>{{ Html::image('img/Home_Slider2.jpg') }}</div>
					<div>{{ Html::image('img/bnn-01.jpg') }}</div>
					<div>{{ Html::image('img/bnn-02.jpg') }}</div>
					<div>{{ Html::image('img/Home_Slider1.jpg') }}</div>
				</div>	
				<div class="custom-arrows">
					<a href="##" class="prev slick-arrow" style="display: block;">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
					</a>
					<a href="##" class="next slick-arrow" style="display: block;">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Slick Slider -->
	{!! Html::script('js/jquery-migrate.min.js') !!}
	{!! Html::script('js/slick.min.js') !!}
	{!! Html::script('js/custome.slick.js') !!}

	<div class="container clearfix submargin">
		<form class="search-form col-md-10 col-md-offset-1 form-inline">
			<div class="form-group col-md-4 col-xs-12">
                <label class="control-label" for="pick-up">
                    Pick-up
                </label>
                <div class="wrapper-input">
                    <input id="pick-up" class="form-control col-md-7 col-xs-12 pick-up input-text" name="pick-up" placeholder="Type airport, city or train station" required="required" type="text">
                </div>
                <div class="alert" style="display: none;">please put something here</div>
            </div>
            <div class="form-group col-md-1 col-xs-12">
				<a href="#" class="swap-locations">
					<i class="fa fa-exchange"></i>
				</a>
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label class="control-label" for="drop-off">
                    Drop-off
                </label>
                <div class="wrapper-input">
                    <input id="drop-off" class="form-control col-md-7 col-xs-12 drop-off input-text" name="drop-off" placeholder="Type airport, city or train station" required="required" type="text">
                </div>
                <div class="alert" style="display: none;">please put something here</div>
            </div>

            <div class="form-group col-md-3 col-xs-12">
                <button id="send" type="submit" class="button button-red">
					<span class="glyphicon glyphicon-search"></span>Find transfer
                </button>
            </div>
		</form>
	</div>
	<!-- <div class="default-content home-lyfestyle">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-offset-1 col-sm-10 text-center">
	            	<h2>Retreats by Lifestyle</h2>
	                <p>There’s nothing like vacationing in a locale that matches your lifestyle and meets all your expectations. Whether it’s vacation rentals downtown in Charleston SC or folly beach rentals, explore our exclusive portfolio based on your ideal preferences.</p>
	            </div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-12">
	            	<div class="row lyfestyles-grid">
	                	<div class="col-xs-6">
	                    	<a href="http://luxurysimplifiedretreats.com/sun-seekers/" class="image-content">
	                        	<span class="hover-overlay"></span>
	                        	<span class="top" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/1Home_LifeStyles11.jpg&quot;); bottom: 0px;">
	                            	<span>Sun Seekers</span>
	                            </span>
	                            <span class="bottom" style="bottom: -84px;">
	                            	<span>Palms blowing in the ocean breeze sand between your toes ... discover island living at its most luxurious.</span>
	                            </span>
	                        </a>
	                    </div>
	                    <div class="col-xs-6">
	                    	<a href="http://luxurysimplifiedretreats.com/historic-havens/" class="image-content">
	                        	<span class="hover-overlay"></span>
	                        	<span class="top" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/1Home_LifeStyles2.jpg&quot;); bottom: 0px;">
	                            	<span>Historic Havens</span>
	                            </span>
	                            <span class="bottom" style="bottom: -84px;">
	                            	<span>Classic and charming these downtown dwellings immerse you in Charleston’s rich southern coastal culture.</span>
	                            </span>
	                        </a>
	                    </div>
	                    <div class="col-xs-6">
	                    	<a href="http://luxurysimplifiedretreats.com/upscale-urban/" class="image-content">
	                        	<span class="hover-overlay"></span>
	                        	<span class="top" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/1Home_LifeStyles1.jpg&quot;); bottom: 0px;">
	                            	<span>Updscale Urban</span>
	                            </span>
	                            <span class="bottom" style="bottom: -84px;">
	                            	<span>From fashionable cafes to trendy nightlife stay close to the action with these stylish getaways.</span>
	                            </span>
	                        </a>
	                    </div>
	                    <div class="col-xs-6">
	                    	<a href="http://luxurysimplifiedretreats.com/extended-holiday/" class="image-content">
	                        	<span class="hover-overlay"></span>
	                        	<span class="top" style="background-image:url(http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/1Home_LifeStyles3.jpg)">
	                            	<span>Extended Holiday</span>
	                            </span>
	                            <span class="bottom" style="bottom: -84px;">
	                            	<span>On an prolonged vacation? Looking for space to spread out? These downtown properties offer room with a view.</span>
	                            </span>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div> -->
	<div class="default-content home-properties">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-12">
					<h2>Vietname's Transfers</h2>
	            </div>
	        </div>
	    </div>
	    <div class="listings-strip clearfix">
			@foreach($transfers as $transfer)
		        <div class="col-md-4 col-xs-12">
		            <a class="listings-strip-image" href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">
		            {{ Html::image('/storage/' . $transfer->image_thumb) }}</a>
		            <h5>
				    	<a href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">{{ $transfer->title }}</a>
		            </h5>
		            <p>{{ $transfer->description }}</p>
		        </div>
		    @endforeach
	    </div>
	</div>
	<div class="default-content happy-customers">
		<div class="container">
	    	<div class="row">
				<div class="col-sm-6">
					<div class="why-us">
						<h2 class="pull-left">Why us?</h2>
						<div class="custom-arrows-wrapper clear">
							<p class="text">
								With eight years full of professional experiences organizing numerous Ha Long Bay tours for international guests, Oriental Sails Co., Ltd has set a new standard for deluxe cruising with The Oriental Sails & Calypso Cruiser and luxury cruising with The Starlight Cruise. 
								While Oriental Sails and Calypso Cruiser are designed in time- honored traditional style, Starlight Cruise is the most modern ship with contemporary and luxurious cabins and facilities compared to the rest of Halong Bay cruises. The entire cruise fleet is well equipped with safety guidelines.
								Being one of the leading companies in Halong Bay tours, we are now widely known as the favorite choice of many travelers. What better way to experience the natural beauty and spectacular seascape of this UNESCO World Heritage site than onboard an Oriental Sails.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<h2>Happy Customers<span><i class="fa fa-quote-right" aria-hidden="true"></i></span></h2>
	                <div class="custom-arrows-wrapper">
	                    <div class="slick-testimonials slick-slider">
							<div>
								<p class="text">This was the perfect place to stay. Incredible view and well equipped. The management team did an excellent job making us feel comfortable as well as recommending charter services and dining. We will definitely be booking this location again.</p>
			                    <p class="author">Guest, Sea La Vie, Summer 2016</p>
							</div>
							<div>
								<p class="text">I arrived late in a pouring rain storm. The host, Luke, waited patiently and graciously. He then helped carry our suitcases in and directed us to the included parking garage. The location is incredible for walking. Great restaurants, City Market, Waterfront Park, Carriage rides, art galleries and much more are just a few blocks away. I would highly recommend “Downtown Charleston”. I hope it’s available next time I visit Charleston!</p>
                                <p class="author">Guest, Maison Des Fluers, October 7, 2016</p>
							</div>
							<div>
								<p class="text">The apartment was beautiful and clean.. Better than the photos. Sophie was very accommodating especially with my flight difficulties. Fantastic place!</p>
								<p class="author">Guest, The King’s Line, October 10, 2016</p>
							</div>
							<div>
								<p class="text">I am new to the “Owner” role, and I interviewed a number of management companies before I decided which one was the best to manage my property in downtown Charleston. After speaking to Sophie Leigh-Jones and the team at Luxury Simplified Retreats, it was clear to me that they would be the best in helping me care for my property, and maximizing the rentals. They have been managing my property for over a year now, and I could not be more pleased with their performance. They are responsive, professional, and really make our guests feel at home. The comments so far on our rentals have been unbelievable, and I truly believe that is just as much about the service they give our guests as the state of the property. If you are considering hiring a management team for your vacation rental, I would highly recommend Luxury Simplified Retreats.</p>
                                <p class="author">Owner, Studio 36 &amp; Upstairs Studio 36, Fall 2016</p>
							</div>
						</div>
	                    <div class="custom-arrows">
	                        <a href="##" class="prev slick-arrow" style="display: inline-block;"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	                        <a href="##" class="next slick-arrow" style="display: inline-block;"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
	                    </div>
		       		</div>
	        	</div>
	    	</div>
		</div>
	</div>
	<div class="default-content featured-strip">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-6">
	            	<h2>MATCH MADE IN HEAVEN</h2>
	                <p>Our property managers are the best in the industry. We handle everything for our clients so they can rest easy knowing that we have their vacation rentals and the needs of their rental guests well in hand. Our reputation is as respected as it is renowned.</p>
	                <a href="http://luxurysimplifiedretreats.com/?pagina=list-your-property" class="btn-layout">Learn More</a>
	            </div>
	            <div class="col-sm-6">
	            	{{ Html::image('img/Home_CTA2.jpg') }}
	            </div>
	        </div>
	    </div>
	</div>
	<div class="default-content featured-strip" style="background-color: #f6f3f3">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-6">
	        		{{ Html::image('img/IMG_1775.jpg') }}
	            </div>
	        	<div class="col-sm-6">
	            	<h2>New Listing:<br>NEWEST LISTING: TODD’S PLACE</h2>
	                <p>This contemporary, urban family home is compliment with iron work, dark wood and colourful décor making it the perfect place for your Charleston getaway! With 2 queen beds and one full bed, there is plenty of room to stretch out and relax after a long day of exploring this beautiful city. Located in walking distance to Upper King Street restaurants and bars and a strait shot to nearby beaches.</p>
	                <a href="http://dev.colophondev.com/properties/the-cotton-house/" class="btn-layout">Learn More</a>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- <div class="default-content manager-quote">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-12">
	            	<h2>WE WOULDN’T HAVE IT ANY OTHER WAY</h2>
	                <p>“Luxury accommodations, impeccable personal service and meticulous attention to detail – every time.”<br>
					Because your experience should be just as perfect as your pictures.<br>
					– Sophie Leigh-Jones<br>
					Operations Manager, Luxury Simplified Retreats</p>
					{{ Html::image('img/camera.jpg') }}
	            </div>
	        </div>
	    </div>
	</div> -->
	<!-- <div class="default-content upcoming-event">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-12 top">
	                <h2>Upcoming Event</h2>
	                <span class="line"></span>
	            </div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-12 col-md-offset-1 col-md-10">
	                <div class="row">
	                    <div class="col-sm-3">
	                    	{{ Html::image('img/Events-100x100.png', 'Events') }}
	                    </div>
	                    <div class="col-sm-9">
	                        <h3>Charleston Spoleto Festival</h3>
		                        <p>Charleston comes ALIVE with music and dance as the world-renowned Spoleto Festival springs to life May 26th through June 11th! Spoleto Festival USA, one of America's major performing arts festivals is full of 17-days worth of events showcasing both established and emerging artists in more than 150 performances of opera, dance, theater, classical music, and jazz.  There's something for everyone so mark your calendars NOW!. For a full list of performances and an event schedule, please visit the link below. </p>
	                    </div>
	                </div>
	                <div class="row bottom">
	                    <div class="col-sm-offset-3 col-sm-4">
	                        <a href="https://spoletousa.org/" class="btn-layout">Read more</a>
	                    </div>
	                    <div class="col-sm-5">
	                        <p><strong>05/26/2017 – 06/11/2017</strong></p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div> -->
@endsection