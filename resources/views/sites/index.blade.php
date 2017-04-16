@extends('sites.layout.app')
@section('content')
	<!-- <nav class="navbar navbar-inverse">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	      		<a class="navbar-brand" href="#">{{ Html::image('img/privatecar.png')}}</a>
	    	</div>
		    <ul class="nav navbar-nav">
		      	<li class="active"><a href="#">Home</a></li>
		      	<li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
		        	<span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          	<li><a href="#">Page 1-1</a></li>
			          	<li><a href="#">Page 1-2</a></li>
			          	<li><a href="#">Page 1-3</a></li>
			        </ul>
		      	</li>
			    <li><a href="#">Page 2</a></li>
			    <li><a href="#">Page 3</a></li>
		    </ul>
	  	</div>
	</nav> -->
	<div class="container">
		<div class="logo-head">
			<div class="logo col-xs-12 col-md-4 col-lg-4">
				<a class="navbar-brand" href="#">{{ Html::image('img/privatecar1.jpg') }}</a>
			</div>
			<div class="slogan col-xs-12 col-md-4 col-lg-4">
				Slogan
			</div>
			<div class="contact col-xs-12 col-md-4 col-lg-4">
				<p class="language clearfix">
		           <span>Choose language:</span>
		           <a href="http://www.orientalsails.com" class="flag en" hreflang="en"></a>
		           <a href="http://www.vietnamese.orientalsails.com/" class="flag vi" hreflang="vi"></a> 
		        </p>
		        <p class="text">CONTACT YOUR CRUISE PLANNER</p>
		        <p class="email">Email: sales@orientalsails.com</p>
		        <p><span class="phone"></span>Book online or call <b>84-4-39264009</b></p>
			</div>
		</div>
	</div>
	<div class="menu clearfix">
		<a class="logo-nav" href="http://luxurysimplifiedretreats.com/">{{ Html::image('img/logo.png') }}</a>
	    <a class="navigation" href="http://luxurysimplifiedretreats.com/#">
	        <span class="bar"></span>
	        <span class="bar"></span>
	        <span class="bar"></span>
	        &nbsp;
	        <span class="txt">MENU</span>
	    </a>
	</div>
	<div class="navigation-overlay">
		<ul class="list-unstyled">
			<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1112">
				<a href="http://bookings.luxurysimplifiedretreats.com/">Properties</a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136">
				<a href="http://luxurysimplifiedretreats.com/charleston/">Charleston</a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-134">
				<a href="http://luxurysimplifiedretreats.com/about/">About</a>
			</li>
			<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-138">
				<a target="_blank" href="http://blog.luxurysimplifiedretreats.com/">Blog</a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
				<a href="http://luxurysimplifiedretreats.com/list-your-property/">List Your Property</a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-133">
				<a href="http://luxurysimplifiedretreats.com/contact/">Contact</a>
			</li>
		</ul>		<!---  <ul class="list-unstyled">
	        <li><a href="?pagina=properties">View Rentals</a></li>
	        <li><a href="?pagina=charleston">Charleston</a></li>
	        <li><a href="?pagina=about">About</a></li>
	    </ul> -->
			
	    <!--<ul class="list-unstyled">
	        <li><a href="?pagina=list-your-property">List Your Property</a></li>
	        <li><a href="http://blog.luxurysimplifiedretreats.com/" target="_blank">Blog</a></li>
	        <li><a href="?pagina=contact">Contact</a></li>
	    </ul> -->
	</div>
	<div class="desktop-menu">
		<div class="clearfix">
	        <a class="logo-nav" href="http://luxurysimplifiedretreats.com/">{{ Html::image('img/logo.png') }}</a>
	        <div class="nav-left">
				<ul id="menu-left" class="list-inline">
					<li id="menu-item-1113" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1113">
						<a href="http://bookings.luxurysimplifiedretreats.com/">Properties</a>
					</li>
					<li id="menu-item-131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131">
						<a href="http://luxurysimplifiedretreats.com/charleston/">Charleston</a>
					</li>
					<li id="menu-item-132" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-132">
						<a href="http://luxurysimplifiedretreats.com/about/">About</a>
					</li>
				</ul>	            <!--<ul class="list-inline">
	                <li><a href="?pagina=properties">View Rentals</a></li>
	                <li><a href="?pagina=charleston">Charleston</a></li>
	                <li><a href="?pagina=about">About</a></li>
	            </ul> -->
	        </div> 
	        <div class="nav-right">
				<ul id="menu-right" class="list-inline">
					<li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29">
						<a href="http://luxurysimplifiedretreats.com/list-your-property/">List Your Property</a>
					</li>
					<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30">
						<a target="_blank" href="http://blog.luxurysimplifiedretreats.com/">Blog</a>
					</li>
					<li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
						<a href="http://luxurysimplifiedretreats.com/contact/">Contact</a>
					</li>
				</ul>	          <!--  <ul class="list-inline">
	                <li><a href="?pagina=list-your-property">List Your Property</a></li>
	                <li><a href="http://blog.luxurysimplifiedretreats.com/" target="_blank">Blog</a></li>
	                <li><a href="?pagina=contact">Contact</a></li>
	            </ul> -->
	        </div>
	    </div>
	</div>
	<a href="http://luxurysimplifiedretreats.com/##" class="back-to-top" style="display: none;">
		<i class="fa fa-arrow-up" aria-hidden="true"></i>
	</a>
	<!-- HOME CONTENT -->
	<div class="home-banner">
		<div class="main-slider-wrapper actived">
			<div class="custom-arrows-wrapper">
				<div class="slick slick-initialized slick-slider slick-dotted" role="toolbar">
					<div aria-live="polite" class="slick-list">
						<div class="slick-track" role="listbox" style="opacity: 1; width: 7902px; transform: translate3d(-1317px, 0px, 0px);">
							<div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/Home_Slider2.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 188.5px;">
										<h3>Maison Des Fleurs</h3>
										<h2>FRENCH QUARTERS</h2>
										<a href="http://luxurysimplifiedretreats.com/properties/maison-des-fleurs/" class="btn-layout" tabindex="-1">Read More</a>
									</div>
								</div>
							</div>
							<div class="slick-slide slick-current slick-active actived" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/bnn-01.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 233.5px;">
										<h2>RELAXED. REFRESHED. REFINED.</h2>
										<a href="http://luxurysimplifiedretreats.com/about/" class="btn-layout" tabindex="0">Read More</a>
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/bnn-02.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 188.5px;">
										<h3>"The View" at Folly Beach</h3>
										<h2>AWAY FROM IT ALL</h2>
										<a href="http://luxurysimplifiedretreats.com/the-view/" class="btn-layout" tabindex="-1">Read More</a>
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/Home_Slider1.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 188.5px;">
										<h3>Upstairs at Studio 36</h3>
										<h2>AN IDEAL ESCAPE</h2>
										<a href="http://luxurysimplifiedretreats.com/properties/upstairs-at-studio-36/" class="btn-layout" tabindex="-1">Read More</a>
									</div>
								</div>
							</div>
							<div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide03" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/Home_Slider2.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 188.5px;">
										<h3>Maison Des Fleurs</h3>
										<h2>FRENCH QUARTERS</h2>
										<a href="http://luxurysimplifiedretreats.com/properties/maison-des-fleurs/" class="btn-layout" tabindex="-1">Read More</a>
									</div>
								</div>
							</div>
							<div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 1317px;">
								<div class="background" style="background-image: url(&quot;http://luxurysimplifiedretreats.com/wp-content/themes/luxurys/assets/img/bnn-01.jpg&quot;); height: 557px;">
									<div class="text-center clearfix" style="top: 213.5px;">
										<h2>RELAXED. REFRESHED. REFINED.</h2>
										<a href="http://luxurysimplifiedretreats.com/about/" class="btn-layout" tabindex="-1">Read More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<ul class="slick-dots" style="display: block;" role="tablist">
						<li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation00" id="slick-slide00">
							<button type="button" data-role="none" role="button" tabindex="0">1</button>
						</li>
						<li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation01" id="slick-slide01" class="">
							<button type="button" data-role="none" role="button" tabindex="0">2</button>
						</li>
						<li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation02" id="slick-slide02" class="">
							<button type="button" data-role="none" role="button" tabindex="0">3</button>
						</li>
						<li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation03" id="slick-slide03" class="">
							<button type="button" data-role="none" role="button" tabindex="0">4</button>
						</li>
					</ul>
				</div>
				<div class="custom-arrows">
					<a href="http://luxurysimplifiedretreats.com/##" class="prev slick-arrow" style="display: block;">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
					</a>
					<a href="http://luxurysimplifiedretreats.com/##" class="next slick-arrow" style="display: block;">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Slick Slider -->
	<div class="default-content home-lyfestyle">
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
	</div>
	<div class="default-content home-properties">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-12">
	            	<h2>Featured Listings</h2>
	            </div>
	        </div>
	    </div>
	    <div class="listings-strip clearfix">
	        <div class="col-sm-4">
	            <a class="listings-strip-image" href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">
	            {{ Html::image('img/the-cotton-house.jpg') }}</a>
	            <h5><a href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">THE COTTON HOUSE</a></h5>
	            <p>Beautifully restored 1840’s Downtown Charleston home available to you as your perfect Historic getaway.</p>
	        </div>
	        <div class="col-sm-4">
	            <a class="listings-strip-image" href="http://luxurysimplifiedretreats.com/properties/upstairs-at-studio-36/">
	            {{ Html::image('img/27.jpg') }}
	            </a>
	            <h5><a href="http://luxurysimplifiedretreats.com/properties/upstairs-at-studio-36/">UPSTAIRS AT STUDIO 36</a></h5>
	            <p>Enjoy your morning coffee from the private balcony and then explore the city by bike—a feature provided for your stay.</p>
	        </div>
	        <div class="col-sm-4">
	            <a class="listings-strip-image" href="http://luxurysimplifiedretreats.com/properties/the-okeanos/">
	            {{ Html::image('img/the-okeanos-10.jpg') }}
	            </a>
	            <h5><a href="http://luxurysimplifiedretreats.com/properties/the-okeanos/">THE OKEANOS</a></h5>
	            <p>Enjoy life at the beach in this beautifully appointed Folly Beach home – just one row back from the ocean.</p>
	        </div>
	    </div>
	</div>
	<div class="default-content happy-customers">
		<div class="container">
	    	<div class="row">
	        	<div class="col-sm-12">
					<h2>Happy Customers<span><i class="fa fa-quote-right" aria-hidden="true"></i></span></h2>
	                <div class="custom-arrows-wrapper">
	                    <div class="slick-testimonials slick-initialized slick-slider">
							<div aria-live="polite" class="slick-list draggable">
								<div class="slick-track" role="listbox" style="opacity: 1; width: 7980px; transform: translate3d(-5700px, 0px, 0px); transition: transform 800ms ease;">
									<div class="slide slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 1140px;">
										<div>
			                                <p class="text">This was the perfect place to stay. Incredible view and well equipped. The management team did an excellent job making us feel comfortable as well as recommending charter services and dining. We will definitely be booking this location again.</p>
			                                <p class="author">Guest, Sea La Vie, Summer 2016</p>
										</div>
									</div>
									<div class="slide slick-slide actived" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 1140px;">
										<div>
			                                <p class="text">I arrived late in a pouring rain storm. The host, Luke, waited patiently and graciously. He then helped carry our suitcases in and directed us to the included parking garage. The location is incredible for walking. Great restaurants, City Market, Waterfront Park, Carriage rides, art galleries and much more are just a few blocks away. I would highly recommend “Downtown Charleston”. I hope it’s available next time I visit Charleston!</p>
			                                <p class="author">Guest, Maison Des Fluers, October 7, 2016</p>
										</div>
									</div>
									<div class="slide slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide11" style="width: 1140px;">
										<div>
											<p class="text">The apartment was beautiful and clean.. Better than the photos. Sophie was very accommodating especially with my flight difficulties. Fantastic place!</p>
											<p class="author">Guest, The King’s Line, October 10, 2016</p>
										</div>
									</div>
									<div class="slide slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide12" style="width: 1140px;">
										<div>
			                                <p class="text">We had a wonderful beach holiday at the View last week. The property was as described and more! Your attention to detail was appreciated by all 3 families. It was a home away from home and we especially enjoyed the fresh bed and bath linens. We would recommend this property to anyone, especially families! It was great to walk out the back door onto the beach to enjoy and return at lunch for food and naps. The adults enjoyed happy hour and sunset on the decks overlooking the amazing view.. The kids enjoyed the 2 minute walk to restaurants and shops. We are already discussing our next visit!</p>
			                                <p class="author">Guest, The View, June 21, 2016</p>
										</div>
									</div>
									<div class="slide slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide13" style="width: 1140px;">
										<div>
			                                <p class="text">I am new to the “Owner” role, and I interviewed a number of management companies before I decided which one was the best to manage my property in downtown Charleston. After speaking to Sophie Leigh-Jones and the team at Luxury Simplified Retreats, it was clear to me that they would be the best in helping me care for my property, and maximizing the rentals. They have been managing my property for over a year now, and I could not be more pleased with their performance. They are responsive, professional, and really make our guests feel at home. The comments so far on our rentals have been unbelievable, and I truly believe that is just as much about the service they give our guests as the state of the property. If you are considering hiring a management team for your vacation rental, I would highly recommend Luxury Simplified Retreats.</p>
			                                <p class="author">Owner, Studio 36 &amp; Upstairs Studio 36, Fall 2016</p>
										</div>
									</div>
									<div class="slide slick-slide slick-current slick-active" data-slick-index="4" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide14" style="width: 1140px;">
										<div>
			                                <p class="text">This was the perfect place to stay. Incredible view and well equipped. The management team did an excellent job making us feel comfortable as well as recommending charter services and dining. We will definitely be booking this location again.</p>
			                                <p class="author">Guest, Sea La Vie, Summer 2016</p>
										</div>
									</div>
									<div class="slide slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 1140px;">
										<div>
			                                <p class="text">I arrived late in a pouring rain storm. The host, Luke, waited patiently and graciously. He then helped carry our suitcases in and directed us to the included parking garage. The location is incredible for walking. Great restaurants, City Market, Waterfront Park, Carriage rides, art galleries and much more are just a few blocks away. I would highly recommend “Downtown Charleston”. I hope it’s available next time I visit Charleston!</p>
			                                <p class="author">Guest, Maison Des Fluers, October 7, 2016</p>
										</div>
									</div>
								</div>
							</div>
						</div>
	                    <div class="custom-arrows">
	                        <a href="http://luxurysimplifiedretreats.com/##" class="prev slick-arrow" style="display: inline-block;"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	                        <a href="http://luxurysimplifiedretreats.com/##" class="next slick-arrow" style="display: inline-block;"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
	<div class="default-content manager-quote">
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
	</div>
	<div class="default-content upcoming-event">
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
	</div>
	<div class="footer-wrapper">
	    <div class="footer">
	        <div class="container">
	        	<div class="row">
	            	<div class="col-sm-4">
	            		{{ Html::image('img/logo-footer.png') }}
	                    <p class="footer-margin-bottom">Relaxed. Refreshed. Refined.</p>
	                    <p>
	                    	<big>
	                    	<a href="http://www.facebook.com/LuxurySimplifiedRetreats" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
	                        <a href="http://instagram.com/luxurysimplifiedretreats/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>&nbsp;&nbsp;
	                        <a href="http://www.pinterest.com/luxsimpretreats/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
	                        </big>
	                    </p>
	                </div>
	                <div class="col-sm-4">
	                	<h3>Sitemap</h3>
	                    <ul class="list-unstyled">
	                    	<li><a href="http://luxurysimplifiedretreats.com/">Home</a></li>
	                        <li><a href="http://bookings.luxurysimplifiedretreats.com/">Properties</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/sun-seekers/">– Sun Seekers</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/historic-havens/">– Historic Havens</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/extended-holiday/">– Extended holiday</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/upscale-urban/">– upscale Urban</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/about/">About</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/charleston/">Charleston</a></li>
	                        <li><a href="http://luxurysimplifiedretreats.com/contact/">Contact</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-4">
	                	<h3>Get In Touch</h3>
	                    <p class="footer-margin-bottom"><a href="tel:+18438536055">+1 843-853-6055</a><br>
	                    	<a href="meilto:info@luxurysimplifiedretreats.com">info@luxurysimplifiedretreats.com</a><br>
	                    	95 Broad Street,<br>Charleston, SC 29401
	                    </p>
	                    <h3>Stay In the Loop</h3>
	                    <!-- /// -->
	                    <!--[if lte IE 8]>
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
						<![endif]-->
						<div class="hbspt-form" id="hbspt-form-1492222636636">
							<form novalidate="" accept-charset="UTF-8" action="https://forms.hubspot.com/uploads/form/v2/320289/22398efe-daf8-4fcd-8f61-ca8e02f91cb8" enctype="multipart/form-data" id="hsForm_22398efe-daf8-4fcd-8f61-ca8e02f91cb8" method="POST" class="theNewClassName hs-form hs-form-private hs-form-22398efe-daf8-4fcd-8f61-ca8e02f91cb8_bd537c8c-c822-46fe-8811-311bef09fc6f" data-form-id="22398efe-daf8-4fcd-8f61-ca8e02f91cb8" data-portal-id="320289" data-reactid=".hbspt-forms-0">
								<div class="hs_email field hs-form-field" data-reactid=".hbspt-forms-0.0:$0">
									<label class="" placeholder="Enter your " for="email-22398efe-daf8-4fcd-8f61-ca8e02f91cb8" data-reactid=".hbspt-forms-0.0:$0.0"><span data-reactid=".hbspt-forms-0.0:$0.0.0"></span><span class="hs-form-required" data-reactid=".hbspt-forms-0.0:$0.0.1">*</span>
									</label>
									<legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.0:$0.1"></legend>
									<div class="input" data-reactid=".hbspt-forms-0.0:$0.$email">
										<input id="email-22398efe-daf8-4fcd-8f61-ca8e02f91cb8" class="hs-input" type="email" name="email" required="" placeholder="Enter Your Email Address" value="" data-reactid=".hbspt-forms-0.0:$0.$email.0">
									</div>
								</div>
								<div class="hs_submit" data-reactid=".hbspt-forms-0.2">
									<div class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.2.0"></div>
									<div class="actions" data-reactid=".hbspt-forms-0.2.1">
										<input type="submit" value="Sign-up!" class="hs-button primary large" data-reactid=".hbspt-forms-0.2.1.0">
									</div>
								</div>
								<input name="hs_context" type="hidden" value="{&quot;rumScriptExecuteTime&quot;:6441.185,&quot;rumServiceResponseTime&quot;:8206.355,&quot;rumFormRenderTime&quot;:548.2149999999983,&quot;rumTotalRenderTime&quot;:8207.305,&quot;rumTotalRequestTime&quot;:544.6899999999987,&quot;css&quot;:&quot;&quot;,&quot;pageUrl&quot;:&quot;http://luxurysimplifiedretreats.com/&quot;,&quot;source&quot;:&quot;FormsNext-static-1.455&quot;,&quot;timestamp&quot;:1492222640391,&quot;userAgent&quot;:&quot;Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36&quot;,&quot;referrer&quot;:&quot;&quot;,&quot;hutk&quot;:{},&quot;originalEmbedContext&quot;:{&quot;css&quot;:&quot;&quot;,&quot;cssClass&quot;:&quot;theNewClassName&quot;,&quot;portalId&quot;:&quot;320289&quot;,&quot;formId&quot;:&quot;22398efe-daf8-4fcd-8f61-ca8e02f91cb8&quot;,&quot;target&quot;:&quot;#hbspt-form-1492222636636&quot;},&quot;recentFieldsCookie&quot;:{},&quot;boolCheckBoxFields&quot;:&quot;&quot;,&quot;dateFields&quot;:&quot;&quot;,&quot;smartFields&quot;:{},&quot;urlParams&quot;:{},&quot;formValidity&quot;:{},&quot;correlationId&quot;:&quot;218dbbdb-794b-416c-98cc-cf8192f658a0&quot;,&quot;disableCookieSubmission&quot;:false}" data-reactid=".hbspt-forms-0.3">
							</form>
						</div>
		                <!-- /// -->
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 footer-bottom">
	                    <p>Luxury Simplified Retreats is managed by Luxury Simplified Real Estate. Luxury Simplified Real Estate is a licensed brokerage company in the State of South Carolina.</p>
	                    <p>Broker in Charge – Rob Wilson, Cell: <a href="tel:8432966585">(843) 296-6585</a></p>
	                    <p>©2017&nbsp;Luxury Simplified Retreats. <a href="http://cnmwebsite.com/" target="_blank">Web Design, Development &amp; Hosting by Colophon</a></p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection