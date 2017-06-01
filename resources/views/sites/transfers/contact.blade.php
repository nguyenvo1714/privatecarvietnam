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
		<section class="container">
			<div class="row">
				<div class="col-sm-12 booking-form ">
					<div class="page-input">
						<div class="row">
							<div class="col-md-9">
								<h3>contact us</h3>
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
									<strong class="contact-office">PrivateCarVietnam office</strong>
									<p><strong>Address:</strong> Hue Royal Palace</p>
									<p><strong>Mobile:</strong><a href="tel: +84-911-611-246"> +84 123456789</a></p>
									<p>
										<strong>Email:</strong> <a href="mailto: info@privatecarvietname">info@privatecarvietnam.com</a>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-12 sidebar-right">
										<div class="help-booking no-background">
											<div class="help-title">
												<h4>Need help booking</h4>
											</div>
											<div class="help-content">
												Call our customer services team on the number below to speak to one of our advisors who heil you with all of your holiday needs.
												<div class="telephone">
													<a href="tel: +84 911611246">
														<span class="glyphicon glyphicon-earphone"></span> +84 122345678
													</a>
												</div>
											</div>
										</div>
										<div class="why-choose-us no-background">
											<div class="help-title">
												<h4>Why Us</h4>
											</div>
											<ul>
												<li><i class="fa fa-hand-o-right"></i> Local Experience</li>
												<li><i class="fa fa-hand-o-right"></i> Easy transfer booking</li>
												<li><i class="fa fa-hand-o-right"></i> Instant confirmation</li>
												<li><i class="fa fa-hand-o-right"></i> Reschedule anytime</li>
												<li><i class="fa fa-hand-o-right"></i> Best price guaranteed</li>
												<li><i class="fa fa-hand-o-right"></i> 24/7 Customer Support</li>
											</ul>
										</div>
										<div class="tripvisor no-background">
											<div class="visor-header">
												<dl>
													<dt>
														<a href="https://www.tripadvisor.com/" target="_blank">
															{!! Html::image('img/trip_logo.svg') !!}
														</a>
													</dt>
													<dd class="small">Know better. Book better. Go better</dd>
												</dl>
											</div>
											<div class="visor-title">
												<dl>
													<dt>
														<a href="#" target="_blank">
															PrivateCarVietNam - Transfer
														</a>
													</dt>
												</dl>
												<dl>
													<dt><small>TripAdvisor Transfer Rating</small></dt>
													<dd>
														{!! Html::image('img/visor.gif') !!}
														<div class="user-rate">
															Base on 25 transfers review
														</div>
													</dd>
												</dl>
											</div>
											<div class="recent-review">
												<dl>
													<dt><small>Most Recent Transfers Review</small></dt>
													<dd>
														<ul>
															<li>
																<span class="glyphicon glyphicon-circle-arrow-right"></span>
															</li>
															<li>
																<span class="glyphicon glyphicon-circle-arrow-right"></span>
															</li>
															<li>
																<span class="glyphicon glyphicon-circle-arrow-right"></span>
															</li>
															<li>
																<span class="glyphicon glyphicon-circle-arrow-right"></span>
															</li>
														</ul>
													</dd>
												</dl>
												<div class="review-link">
													<div>
														<span class="glyphicon glyphicon-menu-right"></span>
														<a target="_blank" href="#">Read Reviews</a>
													</div>
													<div>
														<span class="glyphicon glyphicon-menu-right"></span>
														<a target="_blank" href="#">Write a Reviews</a>
													</div>
												</div>
												<div class="copy">
													<p><small>&copy; 2017 PrivateCarVietNam</small></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			    </div>
			</div>
		</section>
	</div>
@endsection