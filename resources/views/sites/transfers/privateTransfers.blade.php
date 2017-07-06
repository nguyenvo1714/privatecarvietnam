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
										{{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-pick']) }}
										<input type="hidden" name="pick-up" id="pick-value">
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
										{{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-drop']) }}
										<input type="hidden" name="pick-up" id="drop-value">
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
			<!-- <div class="container"> -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="recommended">Recommended</h4>
						<div class="starline-container">
							<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
						</div>
					</div>
					@foreach($interestTransfers as $interestTransfer)
						<div class="col-md-3 box-relate">
							<div class="image">
								<a href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}">
									{{ Html::image('/storage/' . $interestTransfer->image_thumb, $interestTransfer->title, ['class' => 'image-wrap img-responsive', 'title' => $interestTransfer->title]) }}
								</a>
								<div class="time">
									<i class="fa fa-clock-o"></i> {{ $interestTransfer->duration }}
								</div>
								<a href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}">
									<div class="overlay">
										<span class="glyphicon glyphicon-play-circle b-relate"></span>
									</div>
								</a>
							</div>
							<div class="title title-cont">
								<h4>
									<a href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}" >
										{{ $interestTransfer->title }}
									</a>
								</h4>
								<div class="trait">
									<a href="{{ url('/' . $interestTransfer->type->slug) }}">
										<i class="fa fa-tags"></i> {{ $interestTransfer->cars[0]->price }}&#36;
									</a>
									<a href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}" class="pull-right">Go</a>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-6 col-md-3 col-xs-12">
							<div class="inner mb">
			                    <a class="img" href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}">
									<div class="badge-price" style='display:none'>
										<div class="size1">Da</div>
										<div class="size2">US$ 0</div>
										<div class="size3">/Pers</div>
									</div>
									{{ Html::image('/storage/' . $interestTransfer->image_thumb, $interestTransfer->title, ['class' => 'image-wrap img-responsive', 'title' => $interestTransfer->title]) }}
									<span class="fix">
										<em>
											<font class="color-two"><span ><i class="fa fa-clock-o"></i></span></font> {{ $interestTransfer->duration }}
										</em>
									</span>
								</a>
								<div class="decreption-three">
									<div class="title">
									    <a href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}">{{ $interestTransfer->title }}</a>
									</div>
									<div class="clear"></div>
									<p>
										<p style="text-align: justify;">{{ substr($interestTransfer->description, 0, 100) . '...' }} &nbsp;</p>
									</p>
								</div>
								<a class="more" href="{{ url('/private-transfer/package/' . $interestTransfer->slug) }}"><span class="glyphicon glyphicon-menu-right"></span></a>
							</div>
						</div> -->
					@endforeach
				</div>
			<!-- </div> -->
		</section>
		<section class="container">
			<div class="hr"></div>
		</section>
		<section class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach($privateTransfers as $privateTransfer)
							<div class="col-md-12">
								<div class="boxradius" data-role="boxactivity">
									<div class="activitybanners"></div>
									<div class="row activitycontent">
										<div class="col-sm-3">
											{{ Html::image('/storage/' . $privateTransfer->thumb, $privateTransfer->name, ['class' => 'img-responsive acthumbnail']) }}
										</div>
										<div class="col-sm-7 activitysum">
											<h2 class="ttactivity">{{ $privateTransfer->name }}</h2>
											<p class="pstar">
												<span class="star">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-thumbs-o-up"></i>
												</span>
											</p>
											<p class="quote">
											“<span class="noquote">{{ $privateTransfer->description }}</span> ”
											</p>
											<div class="hr"></div>
											<div class="text-primary">
												<i class="fa fa-wifi"></i> Free wifi &nbsp;&nbsp; 
												<i class="fa fa-comments-o"></i> English speaking driver &nbsp;&nbsp;
												<i class="fa fa-child"></i> Children seat 
											</div>
										</div>
										<div class="col-sm-2">
											<div class="boxprice">
												<!-- <p>From</p> -->
												<!-- <p class="pprice">
													<span class="price">$172.50</span> <br> (per person)
												</p> -->
												<p>
													<a class="circlego">Go</a>
												</p>
											</div><!-- End boxprice -->
										</div>
									</div>
									<a class="activitylink" href="{{ url('/private-transfer/view/' . $privateTransfer->slug) }}"></a>
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
							<div class="mail-booking">
								<h4 class="text-center">Book transfer</h4>
								{!! Form::open(['url' => '/mail-booking', 'method' => 'post', 'class' => 'mail-form']) !!}
									{!! Form::text('name', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your Name', 'required']) !!}
									{!! Form::email('email', '', ['placeholder' => 'Your email', 'class' => 'form-control col-md-12 col-xs-12', 'required']) !!}
									{!! Form::text('phone', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your phone', 'required']) !!}
									{!! Form::textarea('request', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your request', 'cols' => 6, 'rows' => 5, 'required']) !!}
									{!! Form::textarea('booking-info','', ['class' => 'form-control col-md-12 col-xs-12', 'rows' => 5, 'placeholder' => 'Time, Pick-up, Drop-off, how many people', 'required']) !!}
									{!! Form::submit('Send', ['class' => 'btn btn-default submit-mail']) !!}
								{!! Form::close() !!}
							</div>
							{{ Html::image('img/bandovietnam.jpg', '', ['class' => 'img-responsive mb']) }}
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
		    var type = {{ $type }};
		    host = baseUrl + '/private-transfer-load-more';
			if (track_click > total_pages-1) {
				$(".load_more").addClass("hidden");
			}
			$(".load_more").click(function (e) {
				$(this).hide();
				$('.animation_image').show();
				if(track_click <= total_pages) {
					$.get(host,{'page': track_click, 'perpage': perpage, 'type_id' : type}, function(response) {
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
												'<i class="fa fa-wifi"></i> Free wifi &nbsp;&nbsp;' + 
												'<i class="fa fa-comments-o"></i> English speaking guide &nbsp;&nbsp;' +
												'<i class="fa fa-child"></i> Children seat' +
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