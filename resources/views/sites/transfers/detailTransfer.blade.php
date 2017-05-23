@extends('sites.layout.submenu')
@section('content')
	<div class="wrapcontent">
		<section class="container-fluid mt">
			<div class="row">
				<!-- <div class="col-sm-9">
					<h4 class="interested">{{ str_replace('-', ' ', $name) }}</h4>
					<div class="starline-container">
						<h4 class="starline"><span class="glyphicon glyphicon-star"></span></h4>
					</div>
				</div> -->
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12 transfer-header">
							<!-- <h3>{{ $transfer->title }}</h3> -->
							<p class="from-to unset-height">{{ $transfer->transfer_name->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->name }}</p>
							<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
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
										<p>{{ $car->price }} VNĐ</p>
										{!! Form::open(['url' => '/book-transfer/' . $transfer->slug . '/' . $car->class, 'method' => 'GET']) !!}
											<input type="submit" value="Book Transfer">
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12 transfer-blog">
							<h3>{{ $transfer->title }}</h3>
							{{ Html::image('/storage/' . $transfer->image_head) }}
							{!! preg_replace('/<p>[img]/', '<p class="no-aling">[img]', $transfer->blog->content) !!}
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
	</div>
@endsection