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
		<div class="listings-strip clearfix">
			<div class="col-md-8 col-sm-12">
				@foreach($privateTransfers as $privateTransfer)
			        <div class="col-md-4 col-xs-12">
			            <a class="listings-strip-image" href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">
			            {{ Html::image('/storage/' . $privateTransfer->image_thumb) }}</a>
			            <h5>
							<a href="http://luxurysimplifiedretreats.com/properties/the-cotton-house/">{{ $privateTransfer->title }}</a>
			            </h5>
			            <p>{{ $privateTransfer->description }}</p>
			        </div>
			    @endforeach
			</div>
			<div class="col-md-4 col-sm-12">
				{{ Html::image('img/bandovietnam.jpg') }}
			</div>
	    </div>
	</div>
@endsection