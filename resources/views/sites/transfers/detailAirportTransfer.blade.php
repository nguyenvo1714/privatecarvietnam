@extends('sites.layout.submenu')
@section('content')
	<div class="wrapcontent">
		<section class="container-fluid mt">
			<div class="row">
				<div class="col-md-9">
					<div class="">
						<div class="col-md-12 transfer-header">
							<div class="row">
								<p class="from-to unset-height">{{ $transfer->transfer_name->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->name }}</p>
								<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
								{{ Html::image('/storage/' . $transfer->image_head) }}
							</div>
						</div>
						@foreach($transfer->cars as $car)
							<div class="col-md-12 price-box">
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-12 car-introduce">
										<h4>{{ $car->class }}</h4>
										<p>{{ $car->fleet }}</p>
										<p>
											<span class="pax"><span class="glyphicon glyphicon-user"></span> &nbsp;{!! $car->capability !!} passengers</span> <span class="bag"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;{{ $car->baggage }}</span>
										</p>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 car-price">
										@if($transfer->is_discount == 1)
											<p><i class="pricesaleoff">{{ number_format($car->price) }} VNĐ</i></p>
											<p><strong>{{ $car->price - ($car->price * $transfer->discount_value) / 100 }} VNĐ</strong></p>
										@else
											<p>{{ $car->price }} VNĐ</p>
										@endif
										{!! Form::open(['url' => '/book-transfer/' . $transfer->slug . '/' . $car->class, 'method' => 'GET']) !!}
											<input type="submit" value="Book Transfer">
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="">
						<div class="col-md-12 transfer-blog">
							<h3>{{ $transfer->title }}</h3>
							{!! preg_replace('/<p>[img]/', '<p class="no-align">[img]', $transfer->blog) !!}
							<div class="share row">
								<strong>Share this</strong>
								<ul>
									<li class="google-plus">
										<a href="{{ url('https://plus.google.com/share?url=/' . $transfer->type->slug . '/' . $transfer->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-google-plus"></i> Google</a>
									</li>
									<li class="facebook">
										<a href="{{ url('https://www.facebook.com/sharer.php?u=/' . $transfer->type->slug . '/' . $transfer->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-facebook"></i> Facebook</a>
									</li>
									<li class="twister">
										<a href="{{ url('https://twitter.com/share?url=/' . $transfer->type->slug . '/' . $transfer->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-twitter"></i> Twister</a>
									</li>
									<li class="email">
										<a href="mailto:?subject={!! $transfer->title !!}&body={{ strip_tags($transfer->blog) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-envelope-o"></i> Email</a>
									</li>
									<li class="print">
										<a href="{{ url('/' . $transfer->type->slug . '/' . $transfer->slug . '#print') }}" target="_blank" class="btn btn-default share_link" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="rate">
							Stars rating
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="map">
							{{ Html::image('img/bandovietnam.jpg', '', ['class' => 'img-responsive mb']) }}
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
					</div>
				</div>
			</div>
		</section>
		<section class="container-fluid">
			<div class="hr"></div>
		</section>
		<section class="container-fluid">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="interested">You may interest</h4>
						<!-- <div class="starline-container">
							<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
						</div> -->
					</div>
					@foreach($relates as $relate)
						<div class="col-sm-6 col-md-3 col-xs-12">
							<div class="inner mb">
			                    <a class="img" href="{{ url('/' . $relate->type->slug . '/' . $relate->slug) }}">
									<div class="badge-price" style='display:none'>
										<div class="size1">Da</div>
										<div class="size2">US$ 0</div>
										<div class="size3">/Pers</div>
									</div>
									{{ Html::image('/storage/' . $relate->image_thumb, $relate->title, ['class' => 'image-wrap img-responsive', 'title' => $relate->title]) }}
									<span class="fix">
										<em>
											<font class="color-two"><span ><i class="fa fa-clock-o"></i></span></font> {{ $relate->duration }}
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
	</div>
@endsection
