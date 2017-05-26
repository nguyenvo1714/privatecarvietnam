@extends('sites.layout.submenu')
@section('content')
	<div class="wrapcontent">
		<section class="container-fluid mt">
			<div class="row">
				<div class="col-md-9">
					<div class="">
						<div class="col-md-12 transfer-header">
							<!-- <h3>{{ $transfer->title }}</h3> -->
							<p class="from-to unset-height">{{ $transfer->transfer_name->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->name }}</p>
							<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
							{{ Html::image('/storage/' . $transfer->image_head) }}
						</div>
						@foreach($transfer->cars as $car)
							<div class="col-md-12 border-bottom">
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
						<div class="col-md-12">
							{{ Html::image('img/bandovietnam.jpg', '', ['class' => 'img-responsive mb']) }}
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
