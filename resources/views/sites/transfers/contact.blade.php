@extends('sites.layout.app')
@section('content')
	<div class="container">
    	<div class="row">
			<div class="col-sm-12 booking-form ">
				<div class="page-input">
					<div class="row">
						<div class="col-md-9">
							<h2>contact us</h2>
							<section class="contact-content">
								<p>
									To send a pre-booking information request please email us at <a href="mailto:info@privatecarvietnam.com">infor@privatecatvietnam.com</a> or or just simply access our 24/7 Check Rate system to get instant confirmation. Make sure you enter (*) required information where indicated.	 
								</p>
								<div class="contact-form">
									{!! Form::open(['url' => '/sendContact', 'method' => 'POST', 'class' => 'form-label-left', 'id' => 'contactForm']) !!}
										<div class="row">
											<div class="form-group col-md-4">
							                    <label class="control-label" for="name">
					                                Your name <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="name" class="form-control" name="name">
					                            </div>
					                        </div>
											<div class="form-group col-md-4">
					                            <label class="control-label" for="email">
					                                Your email <span class="required">*</span>
					                            </label>
					                            <div class="marked">
					                                <input id="email" class="form-control" name="email">
					                            </div>
					                        </div>
											<div class="form-group col-md-4">
					                            <label class="control-label" for="country">
					                                Your country
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
					                                <input id="subject" class="form-control" name="subject">
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
					                                <textarea id="message" class="form-control" name="message" rows="10" style="height: auto;"></textarea>
					                            </div>
											</div>
										</div>
									</div>
									<div class="button-group">
		                                <button type="submit" class="cont-button">Send</button>
									</div>
			                    {!! Form::close() !!}
							</section>
							<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.153321792369!2d107.57672391396564!3d16.4677723886358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a6d3467e9b3d%3A0xbc393903490905c4!2sHue+Royal+Palace!5e0!3m2!1sen!2s!4v1494340963755" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div class="office">
								<a href="javascrip: void(0)" class="contact-office">Office</a>
								<p><strong>Address:</strong> Hue Royal Palace</p>
								<p><strong>Mobile:</strong> +84 911-611-246</p>
								<p><strong>Email:</strong> <a href="mailto: info@privatecarvietname">info@privatecarvietname</a></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="need-help-booking">
								<h2>Need help booking</h2>
								<section class="help-content">
									<p>
										Call our customer services team on the number below to speak to one of our advisors who heil you with all of your holiday needs.
									</p>
									<p>
										<span class="glyphicon glyphicon-earphone"></span> <strong><a href="tel: +84-911-611-246">84 911-611-246</a></strong>
									</p>
								</section>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
@endsection