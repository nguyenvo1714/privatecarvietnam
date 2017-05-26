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
		<section class="container-fluid mt20">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach($deals as $deal)
					        <div class="col-md-4 col-sm-4 col-xs-12 deal-list">
								<div class="private-thumbnail">
									{{ Html::image('/storage/' . $deal->image_thumb) }}
									<div class="position">
										<div class="label-detail"><a href="{{ url('/' . $deal->type->slug . '/' . $deal->slug) }}"><strong>Save {{ $deal->discount_value }}</strong></a></div>
									</div>
								</div>
								<h5>
									<a href="{{ url('/' . $deal->type->slug . '/' . $deal->slug) }}">{{ $deal->title }}</a>
								</h5>
								<p>{{ substr($deal->description, 0, 200) . '...' }}</p>
							</div>
						@endforeach
						<!-- <div id="results"></div>
						<div class="col-sm-12">
							<div align="center" class="mb">
								<button class="load_more btn btn-primary" id="load_more_button">
									<i class='fa fa-spinner'></i> Show 6 more cruises
								</button>
								<div class="animation_image" style="display:none;">{!! Html::image('img/loading.gif') !!}</div>
							</div>
						</div> -->
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