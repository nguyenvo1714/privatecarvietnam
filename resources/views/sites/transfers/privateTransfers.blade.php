@extends('sites.layout.app')
@section('content')
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
											<a href="{{ url('/private-transfer/package/' . $interestTransfer->slug) }}">
		                                        {{ Html::image('/storage/' . $interestTransfer->image_thumb) }}
		                                    </a>
	                                    </div>
	                                    <div class="media-body">
	                                        <h5><a href="{{ url('/private-transfer/package/' . $interestTransfer->slug) }}">{{ $interestTransfer->title}}</a></h5>
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