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
									<span class="text-step">Confirmation</span>
								</a>
							</div>
							<div class="block-description">
								<h5 class="unmb">
									{{ $transfer->transferName->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->name }}
								</h5>
								<p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
							</div>
							{!! Form::open(['url' => '/book-transfer/complete', 'method' => 'POST', 'class' => 'form-label-left', 'id' => 'complete']) !!}
							<div class="block-form">
								<input type="hidden" name="trip" value="{{ $transfer->transferName->name }} - {{ $transfer->place->name }}" id="trip">
								<input type="hidden" name="duration" value="{{ $transfer->duration }}" id="duration">
								<input type="hidden" name="class" value="{{ $register['class'] }}" id="class">
	                            <input type="hidden" name="price" value="{{ $register['price'] }}" id="price">
	                            <input type="hidden" name="passenger" value="{{ $register['passenger'] }}" id="passenger">
	                            <input type="hidden" name="pickupAddress" value="{{ $register['pickupAddress'] }}" id="pickupAddress">
	                            <input type="hidden" name="departureDate" value="{{ $register['departureDate'] }}" id="departureDate">
	                            <input type="hidden" name="departureTime" value="{{ $register['departureTime'] }}" id="departureTime">
	                            <input type="hidden" name="dropoffAddress" value="{{ $register['dropoffAddress'] }}" id="dropoffAddress">
	                            <input type="hidden" name="name" value="{{ $register['name'] }}" id="name">
	                            <input type="hidden" name="surname" value="{{ $register['surname'] }}" id="surname">
	                            <input type="hidden" name="email" value="{{ $register['email'] }}" id="email">
	                            <input type="hidden" name="phone" value="{{ $register['phone'] }}" id="phone">
	                            <input type="hidden" name="note" value="{{ $register['note'] }}" id="note">
	                            <table class="table table-bordred">
									<thead>
										<tr>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr class="striped">
											<td colspan="2">Vehicle</td>
										</tr>
										<tr>
											<td>The number of passenger</td>
											<td>{{ $register['passenger'] }}</td>
										</tr>
										<tr>
											<td>Vehicle</td>
											<td>{{ $register['class'] }}</td>
										</tr>
										<tr class="striped">
											<td colspan="2">Route</td>
										</tr>
										<tr>
											<td>Pick-up address</td>
											<td>{{ $register['pickupAddress'] }}</td>
										</tr>
										<tr>
											<td>Drop-off address</td>
											<td>{{ $register['dropoffAddress'] }}</td>
										</tr>
										<tr>
											<td>Departure date and time</td>
											<td>{{ $register['departureDate'] . ', ' . $register['departureTime'] }}</td>
										</tr>
										<tr class="striped">
											<td colspan="2">Contact</td>
										</tr>
										<tr>
											<td>Name and Surname</td>
											<td>{{ $register['name'] . ' ' . $register['surname'] }}</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>{{ $register['email'] }}</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>{{ $register['phone'] }}</td>
										</tr>
										<tr>
											<td>Note</td>
											<td>{{ $register['note'] }}</td>
										</tr>
										<tr class="striped">
											<td colspan="2">Transfer cost</td>
										</tr>
										<tr>
											<td><strong>Total</strong></td>
											<td><strong>{{ number_format($register['passenger'] * $register['price'], 2) }} VNĐ</strong></td>
										</tr>
									</tbody>
	                            </table>
							</div>
							<div class="button-group">
	                            <a href="" class="back_to_register"><span class="glyphicon glyphicon-menu-left"></span> Back</a>
                                <button id="send" type="submit" class="cont-button pull-right">Confirm</button>
							</div>
		                    {!! Form::close() !!}
						</div>
						<div class="col-md-3 summary-container">
							<div class="summary">
								<div class="summary-content">
									<h3>Transfer summary</h3>
									<div class="summary-block">
										<h6 class="pick-up">Pick-up</h6>
										<p class="summary-text">{{ $transfer->transferName->name }}, {{ $register['pickupAddress'] }}</p>
									</div>
									<div class="summary-block">
										<h6 class="drop-off">Drop-off</h6>
										<p class="summary-text">{{ $transfer->place->name }}, {{ $register['dropoffAddress'] }}</p>
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
    {!! Form::open(['url' =>  '/book-transfer/' . $transfer->slug . '/' . $register['class'], 'method' => 'POST', 'id' => 'back_to_register']) !!}
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