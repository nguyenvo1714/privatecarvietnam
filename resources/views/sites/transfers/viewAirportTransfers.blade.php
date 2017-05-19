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
		<section class="container-fluid">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="interested">Recommended</h4>
						<div class="starline-container">
							<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
						</div>
					</div>
					@foreach($interestTransfers as $interestTransfer)
						<div class="col-sm-6 col-md-3 col-xs-12">
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
											<font class="color-two"><span >6 Days</span></font> - VTR01-Northwest Vietnam
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
								<a class="more" href="{{ url('/' . $interestTransfer->type->slug . '/' . $interestTransfer->slug) }}"><span class="glyphicon glyphicon-menu-right"></span></a>
							</div>
						</div>
					@endforeach
				</div>
			<!-- </div> -->
		</section>
		<section class="container-fluid">
			<div class="hr"></div>
		</section>
		<section class="container-fluid">
			<div class="row">
				<div class="col-sm-9">
					<h4 class="interested">{{ str_replace('-', ' ', $name) }}</h4>
					<div class="starline-container">
						<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						@foreach($transfers as $transfer)
					        <div class="col-md-4 col-sm-4 col-xs-12 transfer-list">
								<div class="private-thumbnail">
									{{ Html::image('/storage/' . $transfer->image_thumb) }}
									<div class="position">
										<div class="label-detail"><a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">Learn more</a></div>
									</div>
								</div>
								<h5>
									<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug) }}">{{ $transfer->title }}</a>
								</h5>
								<p>{{ substr($transfer->description, 0, 100) . '...' }}</p>
							</div>
						@endforeach
						<div id="results"></div>
						<div class="col-sm-12">
							<div align="center" class="mb">
								<button class="load_more btn btn-primary" id="load_more_button">
									<i class='fa fa-spinner'></i> Show 6 more cruises
								</button>
								<div class="animation_image" style="display:none;"><img src="img/loading.gif"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
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
		    var transfer_name_id = {{ $transfer_name_id }};
		    host = baseUrl + '/view-transfer-load-more';
			if (track_click > total_pages-1) {
				$(".load_more").addClass("hidden");
			}
			$(".load_more").click(function (e) {
				$(this).hide();
				$('.animation_image').show();
				if(track_click <= total_pages) {
					$.get(host,{'page': track_click, 'perpage': perpage, 'transfer_name_id' : transfer_name_id}, function(response) {
						var results = '';
						$.each(response.data, function (key, obj){
							results +=
							'<div class="col-md-4 col-sm-4 col-xs-12 transfer-list">' +
								'<div class="private-thumbnail">' +
									'<img class="img-responsive acthumbnail" alt="' + obj.title + '" src="' + baseUrl + '/storage/' + obj.image_thumb + '">' +
									'<div class="position">' +
										'<div class="label-detail">' +
										'<a href="' + baseUrl+ '/' + $obj.type.slug + '/' + $obj.slug + '">Learn more</a>' +
										'</div>' +
									'</div>' +
								'</div>' +
								'<h5>' +
									'<a href="' + baseUrl + '/' + $obj.type.slug + '/' . $obj.slug + '">' + obj.title + '</a>' +
								'</h5>' +
								'<p>' + obj.description + '</p>' +
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