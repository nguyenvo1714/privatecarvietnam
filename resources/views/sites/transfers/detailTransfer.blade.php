@extends('sites.layout.app')
@section('content')
	<div class="default-content home-properties" style="background-color: unset; padding-top: unset;">
		<!-- <div class="container">
	    	<div class="row">
	        	<div class="col-sm-12">
					<h2>{{ $transfer->title }}</h2>
	            </div>
	        </div>
	    </div> -->
		<div class="listings-strip private clearfix">
			<div class="col-md-8 col-sm-12">
				<div class="row">
					<div class="col-md-12 transfer-header">
						<h3>{{ $transfer->title }}</h3>
						<p class="from-to unset-height">{{ $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first()->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->where('places.id', $transfer->place_id)->first()->name }}</p>
						<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
					</div>
					@foreach($transfer->cars as $car)
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8 car-introduce">
								<h4>{{ $car->class }}</h4>
								<p>{{ $car->fleet }}</p>
								<p>
									<span class="pax"><span class="glyphicon glyphicon-user"></span> &nbsp;{!! $car->capability !!} passengers</span> <span class="bag"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;{{ $car->baggage }}</span>
								</p>
							</div>
							<div class="col-md-4 car-price">
								<p>{{ $car->price }} VNĐ</p>
								{!! Form::open(['url' => '/private-transfer/' . $name . '/book-transfer/' . $transfer->id]) !!}
									<input type="hidden" name="price" value="{{ $car->price }}">
									<input type="submit" name="">
								{!! Form::close() !!}
								<!-- <a href="#">Book transfer</a> -->
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="row">
					<div class="col-md-12">
						{{ Html::image('img/bandovietnam.jpg') }}
					</div>
				</div>
				<h3>Transfer you may interest</h3>
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<ul class="list-unstyled interest">
							@foreach($interestTransfers as $interestTransfer)
								<li>
									<div class="media">
	                                    <div class="media-left">
	                                        {{ Html::image('/storage/' . $interestTransfer->image_thumb) }}
	                                    </div>
	                                    <div class="media-body">
	                                        <h5><a href="#">{{ $interestTransfer->title}}</a></h5>
	                                        <p>{!! substr($interestTransfer->description, 0, 200). '...' !!}</p>
	                                    </div>
	                                </div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
	    </div>
	</div>
@endsection