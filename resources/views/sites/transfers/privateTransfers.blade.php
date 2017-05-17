@extends('sites.layout.for_index')
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
						<h4 class="ttreleated">Recommended</h4>
					</div>
					@foreach($interestTransfers as $interestTransfer)
						<div class="col-sm-6 col-md-3">
							<div class="interest-thumbnail">
								{{ Html::image('/storage/' . $interestTransfer->image_thumb) }}
								<div class="position">
									<div class="label-detail"><a href="{{ url('/private-transfer/view/' . $interestTransfer->slug) }}">Learn more</a></div>
								</div>
							</div>
							<h5>
								<a href="{{ url('/private-transfer/view/' . $interestTransfer->slug) }}">{{ $interestTransfer->name }}</a>
							</h5>
							<p>{{ substr($interestTransfer->description, 0, 100) . '...' }}</p>
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
				<div class="col-md-9">
					<div class="boxradius" data-role="boxactivity">
						<div class="activitybanners"></div>
						<div class="row activitycontent">
							<div class="col-sm-3">
								<img src="/uploads/Cruises/Aphrodite/overview-4-240x160.jpg" class="img-responsive acthumbnail">
							</div>
							<div class="col-sm-7 activitysum">
							<h2 class="ttactivity">Aphrodite Cruises Halong</h2>
								<p class="pstar"><span class="star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-thumbs-o-up"></i></span></p>
								<p class="quote">
								“<span class="noquote">We were on the one night cruise and enjoyed it very much. 
									The food was excellent, they have made each member of our family exactly what he likes (in terms of vegetarian, food allergies, etc). The room are specious and clean. The staff made all efforts to make sure that we are satisfied and enjoying our trip. Highly recommended.</span> ”
								</p>
								<div class="hr"></div>
								<div class="text-primary">
									<i class="fa fa-bus"></i> Free shuttle round trip &nbsp;&nbsp;<i class="fa fa-wifi"></i> Free wifi &nbsp;&nbsp; <i class="fa fa-comments-o"></i> English speaking guide
								</div>
							</div>
							<div class="col-sm-2">
								<div class="boxprice">
									<p>From</p>
									<p class="pprice">
										<span class="price">$172.50</span> <br> (per person)</p><p><a class="circlego">Go</a>
									</p>
								</div><!-- End boxprice -->
							</div>
						</div>
						<a class="activitylink" href="https://goasiadaytrip.com/cruise_aphrodite-cruises-halong.html"></a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							{{ Html::image('img/bandovietnam.jpg') }}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="default-content home-properties">
		<div class="container">
	    	<div class="row">
			<div class="col-sm-12">
					<h2>Private Transfers</h2>
	            </div>
	        </div>
	    </div>
		<div class="listings-strip private clearfix">
			<div class="col-md-8 col-sm-12">
				<div class="row">
					@foreach($privateTransfers as $privateTransfer)
				        <div class="col-md-4 col-sm-4 col-xs-12 transfer-list">
							<div class="private-thumbnail">
								{{ Html::image('/storage/' . $privateTransfer->thumb) }}
								<div class="position">
									<div class="label-detail"><a href="{{ url('/private-transfer/view/' . $privateTransfer->slug) }}">Learn more</a></div>
								</div>
				            </div>
				            <h5>
								<a href="{{ url('/private-transfer/view/' . $privateTransfer->slug) }}">{{ $privateTransfer->name }}</a>
				            </h5>
				            <p>{{ substr($privateTransfer->description, 0, 100) . '...' }}</p>
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
											<a href="{{ url('/' . $interestTransfer->type->slug . '/package/' . $interestTransfer->slug) }}">
		                                        {{ Html::image('/storage/' . $interestTransfer->image_thumb) }}
		                                    </a>
	                                    </div>
	                                    <div class="media-body">
	                                        <h5><a href="{{ url('/' . $interestTransfer->type->slug . '/package/' . $interestTransfer->slug) }}">{{ $interestTransfer->title}}</a></h5>
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