@extends('sites.layout.app')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 booking-form">
				<h2>Book transfer</h2>
				<div class="page-input">
					<div class="row">
						<div class="col-md-9">
							<div class="block-step">
								<a href="#" class="step 1 active">
									<span class="label-step"><span>1</span></span>
									<span class="text-step">Transfer infomations</span>
								</a>
								<a href="#" class="step 2">
									<span class="label-step"><span>2</span></span>
									<span class="text-step">Order payment</span>
								</a>
							</div>
							<div class="block-description">
								<h5 class="unmb">
									{{ $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first()->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->where('places.id', $transfer->place_id)->first()->name }}
								</h5>
								<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
							</div>
							{!! Form::open(['url' => '/book-transfer/confirmation/' . $transfer->id, 'method' => 'POST', 'class' => 'form-label-left', 'id' => 'bookForm']) !!}
							<div class="block-form">
								<input type="hidden" name="trip" value="{{ $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first()->name }} - {{ $transfer->place->where('places.id', $transfer->place_id)->first()->name }}">
								<input type="hidden" name="duration" value="{{ $transfer->duration }}">
								<input type="hidden" name="class" value="{{ $register['class'] }}">
	                            <input type="hidden" name="price" value="{{ $register['price'] }}">
	                            <input type="hidden" name="passenger" value="{{ $register['passenger'] }}">
	                            <input type="hidden" name="pickupAddress" value="{{ $register['pickupAddress'] }}">
	                            <input type="hidden" name="departureDate" value="{{ $register['departureDate'] }}">
	                            <input type="hidden" name="departureTime" value="{{ $register['departureTime'] }}">
	                            <input type="hidden" name="dropoffAddress" value="{{ $register['dropoffAddress'] }}">
	                            <input type="hidden" name="name" value="{{ $register['name'] }}">
	                            <input type="hidden" name="surname" value="{{ $register['surname'] }}">
	                            <input type="hidden" name="email" value="{{ $register['email'] }}">
	                            <input type="hidden" name="phone" value="{{ $register['phone'] }}">
	                            <input type="hidden" name="note" value="{{ $register['phone'] }}">
								<!-- <fieldset>
							        <h3 class="fieldset-title">Vehicle</h3>
							        <div class="form-group">
							        	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="price">
			                            </label>
							        </div>
							        <div class="form-group">
			                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="passenger">
			                                The number of passengers <span class="required">*</span>
			                            </label>
			                            <div class="col-md-8 col-sm-8 col-xs-12 marked">
			                                <input id="passenger" class="form-control col-md-7 col-xs-12" name="passenger" required="required" type="number">
			                                <span class="passenger"><span class="glyphicon glyphicon-user"></span></span>
			                            </div>
									</div>
							    </fieldset>
							    <fieldset>
							        <h3 class="fieldset-title">Route</h3>
							        <div class="form-group">
							        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="pickupAddress">
			                                Pick-up <span class="required">*</span>
			                            </label>
							            <div class="col-md-10 col-sm-10 col-xs-12">
				                            <input type="text" name="pickupAddress" id="pickupAddress" required class="form-control">
				                            <span class="pick-up"><i class="fa fa-street-view"></i></span>
							            </div>
							        </div>
							        <div class="form-group">
			                            <label class="control-label col-md-12 col-sm-12 col-xs-12 mt20" for="departure">
			                                Departure date and time <span class="required">*</span>
			                            </label>
			                            <div class="col-md-12 col-sm-12 col-xs-12 marked">
		                                	<input id="departureDate" class="form-control fifty" name="departureDate" type="text" required placeholder="YYYY-MM-DD">
		                                	<span class="calendar"><i class="fa fa-calendar"></i></span>
			                                <input id="departureTime" class="form-control fifty" name="departureTime" required="required" type="text" placeholder="HH:mm">
			                                <span class="time"><i class="fa fa-clock-o"></i></span>
			                            </div>
									</div>
									<div class="form-group">
							        	<label class="control-label col-md-2 col-sm-2 col-xs-12 mt20" for="dropoffAddress">
			                                Drop-off <span class="required">*</span>
			                            </label>
							            <div class="col-md-10 col-sm-10 col-xs-12 mt20">
				                            <input type="text" name="dropoffAddress" id="dropoffAddress" required class="form-control">
				                            <span class="drop-off"><i class="fa fa-street-view"></i></span>
							            </div>
							        </div>
							    </fieldset>
							    <fieldset>
							        <h3 class="fieldset-title">Contacs</h3>
							        <div class="form-group">
			                            <label class="control-label col-md-12" for="name">
			                                Name and Surname <span class="required">*</span>
			                            </label>
			                            <div class="col-md-12 col-sm-12 col-xs-12">
			                                <input id="name" class="form-control fifty" name="name" type="text" placeholder="Your Name" required>
			                                <input id="surname" class="form-control fifty" name="surname" required="required" type="text" placeholder="Your Surname">
			                            </div>
									</div>
							        <div class="form-group">
							        	<label class="control-label col-md-2 col-sm-2 col-xs-12 mt20 marked" for="email">
			                                Your email <span class="required">*</span>
			                            </label>
							            <div class="col-md-10 col-sm-10 col-xs-12 mt20">
				                            <input type="text" name="email" id="email" required class="form-control">
				                            <span class="email"><i class="fa fa-envelope-o"></i></span>
							            </div>
							        </div>
									<div class="form-group">
							        	<label class="control-label col-md-5 col-sm-5 col-xs-12 mt20" for="phone">
			                                Phone number (with country code) <span class="required">*</span>
			                            </label>
							            <div class="col-md-7 col-sm-7 col-xs-12 mt20 marked">
				                            <input type="text" name="phone" id="phone" required class="form-control" placeholder="+84 1223434779">
				                            <span class="phone"><i class="fa fa-phone"></i></span>
							            </div>
							        </div>
							        <div class="form-group">
							        	<label class="control-label col-md-1 col-sm-1 col-xs-12 mt20" for="note">
			                                Notes
			                            </label>
							            <div class="col-md-11 col-sm-11 col-xs-12 mt20">
							            	<textarea class="form-control unset-height" name="note" id="note" rows="10">
							            		
							            	</textarea>
							            </div>
							        </div>
							    </fieldset> -->
							</div>
							<div class="button-group">
	                            <a href="" class="back_to_register"><span class="glyphicon glyphicon-menu-left"></span> Back</a>
                                <button id="send" type="submit" class="cont-button pull-right">Continue</button>
							</div>
		                    {!! Form::close() !!}
						</div>
						<div class="col-md-3 summary-container">
							<div class="summary">
								<div class="summary-content">
									<h3>Transfer summary</h3>
									<div class="summary-block">
										<h6 class="pick-up">Pick-up</h6>
										<p class="summary-text">{{ $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first()->name }}, {{ $register['pickupAddress'] }}</p>
									</div>
									<div class="summary-block">
										<h6 class="drop-off">Drop-off</h6>
										<p class="summary-text">{{ $transfer->place->where('places.id', $transfer->place_id)->first()->name }}, {{ $register['dropoffAddress'] }}</p>
									</div>
									<div class="summary-block">
										<h6 class="transfer car">Transfer car</h6>
										<p class="summary-text">
											Vehicle: {{ $register['class'] }} <br>
											<small>up to 1 passenger, 1 baggage</small><br>
											<small>~ 30 minutes of waiting(up to 2 hrs)</small>
										</p>
									</div>
									<div class="summary-block">
										<h6 class="passenger">Passengers: {{ $register['passenger'] }}</h6>
									</div>
								</div>
								<div class="summary-contact">
									<div class="summary-block">
										<h6 class="contact">Contact information</h6>
										<p class="summary-text">
											{{ $register['name'] . ' ' . $register['surname'] }} </p>
											<p>{{ $register['email'] }} </p>
											<p>{{ $register['phone'] }}
										</p>
									</div>
								</div>
								<div class="summary-cost">
									<h3>Transfer cost</h3>
									<div class="summary-block">
										<h6 class="vehicle-class">Vehicle {{ $register['class'] }} <span class="pull-right cost">{{ number_format($register['passenger'] * $register['price'], 2) }} VNĐ</span></s></h6>
									</div>
									<h3>Total <span class="pull-right">{{ number_format($register['passenger'] * $register['price'], 2) }} VNĐ</span></h3>
								</div>
							</div>
							<span class="pin-left"><span class="glyphicon glyphicon-pushpin"></span></span>
							<span class="pin-right"><span class="glyphicon glyphicon-pushpin"></span></span>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    {!! Form::open(['url' =>  '/book-transfer/' . $transfer->slug, 'method' => 'POST', 'id' => 'back_to_register']) !!}
    	<input type="hidden" name="class" value="{{ $register['class'] }}">
    	<input type="hidden" name="price" value="{{ $register['price'] }}">
    	<input type="hidden" name="passenger" value="{{ $register['passenger'] }}">
        <input type="hidden" name="pickupAddress" value="{{ $register['pickupAddress'] }}">
        <input type="hidden" name="departureDate" value="{{ $register['departureDate'] }}">
        <input type="hidden" name="departureTime" value="{{ $register['departureTime'] }}">
        <input type="hidden" name="dropoffAddress" value="{{ $register['dropoffAddress'] }}">
        <input type="hidden" name="name" value="{{ $register['name'] }}">
        <input type="hidden" name="surname" value="{{ $register['surname'] }}">
        <input type="hidden" name="email" value="{{ $register['email'] }}">
        <input type="hidden" name="phone" value="{{ $register['phone'] }}">
        <input type="hidden" name="note" value="{{ $register['note'] }}">
    {!! Form::close() !!}
@endsection