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
		<section class="container mt40">
			<div class="row">
				<div class="col-md-9">
					<div class="row rowbox">
						@foreach($deals as $deal)
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="boxinfo wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
									<a href="{{ url('/' . $deal->type->slug . '/' . $deal->slug) }}" class="thumb">
										<div class="price">sale off <span class="autoResize">{{ $deal->discount_value }}</span>
										</div>
										<div class="thumbpre">
											{!! Html::image('/storage/' . $deal->image_thumb, $deal->title, ['class' => 'img-responsive']) !!}
										</div>
									</a>
									<div class="desc-container">
										<a class="title" href="{{ '/' . $deal->type->slug . '/' . $deal->slug }}">
											{{ $deal->title }}
										</a>
										<div class="desc">
											{{ $deal->description }}
										</div>
									</div>
								</div>
							</div>
						@endforeach
						<div class="paginate text-center">
							{{ $deals->links() }}
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
@endsection