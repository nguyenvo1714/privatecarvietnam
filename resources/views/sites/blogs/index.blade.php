@extends('sites.layout.app')
@section('content')
	<div class="wrapcontent">
		<section class="search-container">
			<div class="cttopdeal">
				<div class="img-bgtour" style="background-image:url('https://goasiadaytrip.com/img/halong-bay-sunset.jpg');"></div>
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
			</div>
		</section>
		<section class="container">
			<div class="hr"></div>
		</section>
		<section class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach($indexBlogs as $indexBlog)
							<div class="col-md-12">
								<div class="row">
									<div class="boxradius for-blog" data-role="boxactivity">
										<div class="activitybanners"></div>
										<div class="row activitycontent">
											<div class="col-sm-4">
												<a href="url('/blog/' . $indexBlog->slug)">
													<img class="img-responsive height" alt="{{ $indexBlog->title }}" src="{{ $indexBlog->img }}">
												</a>
											</div>
											<div class="col-sm-8 activitysum">
												<h2 class="ttactivity mb5">
													<a href="url('/blog/' . $indexBlog->slug)" class="color-green"> 
														{{ $indexBlog->title }}
													</a>
												</h2>
												<p class="pstar">
													<span class="glyphicon glyphicon-time"></span> {{ $indexBlog->created_at->format('Y-m-d') }}
												</p>
												<p class="quote font-large">
												<span class="noquote">{{ $indexBlog->description . '...' }}</span>
												</p>
												<div class="hr"></div>
												<div class="text-primary">
													<span class="glyphicon glyphicon-tags"></span> &nbsp; <a href="{{ url('/' . $indexBlog->type->slug) }}" class="color-green"> {{ $indexBlog->type->name }} </a>
													<a href="{{ url('/blog/' . $indexBlog->slug) }}" class="pull-right color-green"> Read more <i class="fa fa-hand-o-right"></i></a>
												</div>
											</div>
										</div>
										<!-- <a class="activitylink" href="{{ url('/private-transfer/view/' . $indexBlog->slug) }}"></a> -->
									</div>
								</div>
							</div>
						@endforeach
						<div id="results"></div>
						<div class="col-sm-12">
							<div align="center" class="mb">
								<button class="load_more btn btn-primary" id="load_more_button">
									<i class='fa fa-spinner'></i> Show 4 more cruises
								</button>
								<div class="animation_image" style="display:none;"><img src="img/loading.gif"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<!-- <div class="row"> -->
								<div class="help-booking no-background">
									<div class="help-title">
										<h4>Need help booking</h4>
									</div>
									<div class="help-content">
										Call our customer services team on the number below to speak to one of our advisors who heil you with all of your holiday needs.
										<div class="telephone">
											<a href="tel: +84 911611246">
												<span class="glyphicon glyphicon-earphone"></span> +84 122345678
											</a>
										</div>
									</div>
								</div>
								<div class="why-choose-us no-background">
									<div class="help-title">
										<h4>Why Us</h4>
									</div>
									<ul>
										<li><i class="fa fa-hand-o-right"></i> Local Experience</li>
										<li><i class="fa fa-hand-o-right"></i> Easy transfer booking</li>
										<li><i class="fa fa-hand-o-right"></i> Instant confirmation</li>
										<li><i class="fa fa-hand-o-right"></i> Reschedule anytime</li>
										<li><i class="fa fa-hand-o-right"></i> Best price guaranteed</li>
										<li><i class="fa fa-hand-o-right"></i> 24/7 Customer Support</li>
									</ul>
								</div>
								<div class="tripvisor no-background">
									<div class="visor-header">
										<dl>
											<dt>
												<a href="https://www.tripadvisor.com/" target="_blank">
													{!! Html::image('img/trip_logo.svg') !!}
												</a>
											</dt>
											<dd class="small">Know better. Book better. Go better</dd>
										</dl>
									</div>
									<div class="visor-title">
										<dl>
											<dt>
												<a href="#" target="_blank">
													PrivateCarVietNam - Transfer
												</a>
											</dt>
										</dl>
										<dl>
											<dt><small>TripAdvisor Transfer Rating</small></dt>
											<dd>
												{!! Html::image('img/visor.gif') !!}
												<div class="user-rate">
													Base on 25 transfers review
												</div>
											</dd>
										</dl>
									</div>
									<div class="recent-review">
										<dl>
											<dt><small>Most Recent Transfers Review</small></dt>
											<dd>
												<ul>
													<li>
														<span class="glyphicon glyphicon-circle-arrow-right"></span>
													</li>
													<li>
														<span class="glyphicon glyphicon-circle-arrow-right"></span>
													</li>
													<li>
														<span class="glyphicon glyphicon-circle-arrow-right"></span>
													</li>
													<li>
														<span class="glyphicon glyphicon-circle-arrow-right"></span>
													</li>
												</ul>
											</dd>
										</dl>
										<div class="review-link">
											<div>
												<span class="glyphicon glyphicon-menu-right"></span>
												<a target="_blank" href="#">Read Reviews</a>
											</div>
											<div>
												<span class="glyphicon glyphicon-menu-right"></span>
												<a target="_blank" href="#">Write a Reviews</a>
											</div>
										</div>
										<div class="copy">
											<p><small>&copy; 2017 PrivateCarVietNam</small></p>
										</div>
									</div>
								</div>
							<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
		    var track_click = 1;
		    var total_pages = {{ $total_pages }};
		    var perpage = {{ $perpage }};
		    host = baseUrl + '/private-transfer-load-more';
			if (track_click > total_pages-1) {
				$(".load_more").addClass("hidden");
			}
			$(".load_more").click(function (e) {
				$(this).hide();
				$('.animation_image').show();
				if(track_click <= total_pages) {
					$.get(host,{'page': track_click, 'perpage': perpage}, function(response) {
						var results = '';
						$.each(response.data, function (key, obj){
							results +=
							'<div class="col-md-12">' +
								'<div class="boxradius" data-role="boxactivity">' +
									'<div class="activitybanners"></div>' +
									'<div class="row activitycontent">' +
										'<div class="col-sm-3">' +
											'<img class="img-responsive acthumbnail" alt="' + obj.name + '" src="' + baseUrl + '/storage/' + obj.thumb + '">' +
										'</div>' +
										'<div class="col-sm-7 activitysum">' +
											'<h2 class="ttactivity">' + obj.name + '</h2>' +
											'<p class="pstar">' +
												'<span class="star">' +
													'<i class="fa fa-star"></i>' +
													'<i class="fa fa-star"></i>' +
													'<i class="fa fa-star"></i>' +
													'<i class="fa fa-star"></i>' +
													'<i class="fa fa-star"></i>' +
													'<i class="fa fa-thumbs-o-up"></i>' +
												'</span>' +
											'</p>' +
											'<p class="quote">' +
												'“<span class="noquote">' + obj.description + '</span> ”' +
											'</p>' +
											'<div class="hr"></div>' +
											'<div class="text-primary">' +
												'<i class="fa fa-bus"></i> Free shuttle round trip &nbsp;&nbsp;' +
												'<i class="fa fa-wifi"></i> Free wifi &nbsp;&nbsp;' + 
												'<i class="fa fa-comments-o"></i> English speaking guide' +
											'</div>' +
										'</div>' +
										'<div class="col-sm-2">' +
											'<div class="boxprice">' +
												'<p>' +
													'<a class="circlego">Go</a>' +
												'</p>' +
											'</div>' +
										'</div>' +
									'</div>' +
									'<a class="activitylink" href="' + baseUrl + '/private-transfer/view/' + obj.slug + '"></a>' +
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