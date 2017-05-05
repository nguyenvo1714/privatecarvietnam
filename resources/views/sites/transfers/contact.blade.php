@extends('sites.layout.app')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 booking-form">
				<h2>contact us</h2>
				<div class="page-input">
					<div class="row">
						<div class="col-md-9">
							<div class="contact-header">
								<h3>Contact us</h3>
							</div>
							<section class="contact-content">
								<p>
									To send a pre-booking information request please email us at <a href="mailto:info@privatecarvietnam.com">infor@privatecatvietnam.com</a> or or just simply access our 24/7 Check Rate system to get instant confirmation. Make sure you enter (*) required information where indicated.	 
								</p>
								<div class="contact-form">
									{!! Form::open(['url' => '/book-transfer/confirmation', 'method' => 'POST', 'class' => 'form-label-left', 'id' => 'contactForm']) !!}
										<div class="row">
											<div class="form-group col-md-4">
					                            <label class="control-label" for="name">
					                                Your name <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="name" class="form-control" name="name" required="required">
					                                <span class="passenger"><span class="glyphicon glyphicon-user"></span></span>
					                            </div>
					                        </div>
											<div class="form-group col-md-4">
					                            <label class="control-label" for="email">
					                                Your email <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="email" class="form-control" name="email" required="required">
					                            </div>
					                        </div>
											<div class="form-group col-md-4">
					                            <label class="control-label" for="country">
					                                Your country <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="country" class="form-control" name="country">
					                            </div>
					                        </div>
										</div>
										<div class="row mt20">
											<div class="form-group col-md-4">
												<label class="control-label" for="phone">
					                                Your phone
					                            </label>
					                            <div class="marked">
					                                <input id="phone" class="form-control" name="phone">
					                            </div>
											</div>
											<div class="form-group col-md-8">
												<label class="control-label" for="findus">
					                                How do you find us
					                            </label>
					                            <div class="marked">
					                                <input id="findus" class="form-control" name="findus">
					                            </div>
											</div>
										</div>
										<div class="row mt20">
											<div class="form-group col-md-12">
												<label class="control-label" for="subject">
					                                Subject <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="subject" class="form-control" name="subject" required>
					                            </div>
											</div>
										</div>
										<div class="row mt20">
											<div class="form-group col-md-12">
												<label class="control-label" for="person">
					                                Person
					                            </label>
					                            <div class="marked">
					                                <input id="person" class="form-control" name="person">
					                            </div>
											</div>
										</div>
										<div class="row mt20">
											<div class="form-group col-md-12">
												<label class="control-label" for="message">
					                                Your message <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <textarea id="message" class="form-control" name="message" required rows="10" style="height: auto;"></textarea>
					                            </div>
											</div>
										</div>
									</div>
								</section>
							<div class="button-group">
	                            <a href="#" class="back"><span class="glyphicon glyphicon-menu-left"></span> Back</a>
                                <button type="submit" class="cont-button pull-right">Continue</button>
							</div>
		                    {!! Form::close() !!}
						</div>
						<div class="col-md-3 summary-container">
							<div class="summary">
							</div>
							<span class="pin-left"><span class="glyphicon glyphicon-pushpin"></span></span>
							<span class="pin-right"><span class="glyphicon glyphicon-pushpin"></span></span>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection