@extends('sites.layout.submenu')
@section('content')
	<div class="wrapcontent">
		<section class="container mt40">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach($transfers as $transfer)
							<div class="col-md-4 col-sm-6 col-xs-12">
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
											{{ $transfer->description .' ...' }}
										</div>
									</div>
								</div>
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
							<div class="mail-booking">
								<h4 class="text-center">Book transfer</h4>
								{!! Form::open(['url' => '/mail-booking', 'method' => 'post', 'class' => 'mail-form', 'id' => 'mailForm']) !!}
									{!! Form::text('name', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your Name', 'required', 'id' => 'name']) !!}
									{!! Form::email('email', '', ['placeholder' => 'Your email', 'class' => 'form-control col-md-12 col-xs-12', 'required', 'id' => 'email']) !!}
									{!! Form::text('phone', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your phone', 'required', 'id' => 'phone']) !!}
									{!! Form::textarea('booking_info','', ['class' => 'form-control col-md-12 col-xs-12', 'rows' => 5, 'placeholder' => 'Time, Pick-up, Drop-off, how many people', 'required', 'id' => 'booking_info']) !!}
									{!! Form::textarea('your_request', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your request', 'cols' => 6, 'rows' => 5, 'required', 'id' => 'your_request']) !!}
									{!! Form::submit('Send', ['class' => 'btn btn-default submit-mail']) !!}
									{{ Html::image('img/ajax-search.gif', '', ['class' => 'mail_form-animation submit-mail']) }}
								{!! Form::close() !!}
							</div>
							@if (count($bestSells) > 0)
								<div class="best-sell no-background">
									<h4>Best seller</h4>
									@foreach ($bestSells as $bestSell)
										<div class="media">
											<a href="{{ url('/' . $bestSell->type->slug . '/' . $bestSell->slug) }}" class="media-left">
												{{ Html::image('/storage/' . $bestSell->image_thumb, '', ['class' => 'media-object', 'style' => 'width: 60px']) }}
											</a>
											<div class="media-body">
												<h5 class="media-heading"><a href="{{ url('/' . $bestSell->type->slug . '/' . $bestSell->slug) }}">{{ $bestSell->title }}</a></h5>
												<p class="duration">~ {{ $bestSell->duration }}</p>
											</div>
										</div>
									@endforeach
								</div>
							@endif
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
			var transfer_name_id = {{ $transfer_name->id }};
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
							'<div class="col-sm-6 col-md-4 col-xs-12">' +
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