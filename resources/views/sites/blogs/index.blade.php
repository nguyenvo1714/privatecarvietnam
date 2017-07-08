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
										{{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-pick']) }}
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
										{{ Html::image('img/ajax-search.gif', '', ['class' => 'animation-drop']) }}
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
		<!-- <section class="container">
			<div class="hr"></div>
		</section> -->
		<section class="container mt40">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach($indexBlogs as $indexBlog)
							<div class="col-md-12">
								<div class="row">
									<div class="boxradius for-blog" data-role="boxactivity">
										<div class="activitybanners"></div>
										<div class="row activitycontent">
											<div class="col-sm-4">
												<a href="url('/blog/' . $indexBlog->slug)">
													<img class="img-responsive height" alt="{{ $indexBlog->title }}" src="{{ $indexBlog->img }}">
												</a>
											</div>
											<div class="col-sm-8 activitysum">
												<h2 class="ttactivity mb5">
													<a href="{{ url('/blog/' . $indexBlog->slug) }}" class="color-green"> 
														{{ $indexBlog->title }}
													</a>
												</h2>
												<p class="pstar">
													<span class="glyphicon glyphicon-time"></span> {{ date_format($indexBlog->created_at, 'M d, Y') }}
												</p>
												<p class="quote font-large">
												<span class="noquote">{{ $indexBlog->description . '...' }}</span>
												</p>
												<div class="hr"></div>
												<div class="text-primary">
													<span class="glyphicon glyphicon-tags"></span> &nbsp;
													@foreach($indexBlog->tagged as $tagged)
													<a href="{{ url('/blog/tag/' . $tagged->tag_slug) }}" class="color-green">
														{{ $tagged->tag_name }}
													</a>
													@endforeach
													<a href="{{ url('/blog/' . $indexBlog->slug) }}" class="pull-right color-green"> Read more <i class="fa fa-hand-o-right"></i></a>
												</div>
											</div>
										</div>
										<!-- <a class="activitylink" href="{{ url('/private-transfer/view/' . $indexBlog->slug) }}"></a> -->
									</div>
								</div>
							</div>
						@endforeach
						<div class="paginate text-center">
							{{ $indexBlogs->links() }}
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="mail-booking">
								<h4 class="text-center">Book transfer</h4>
								{!! Form::open(['url' => '/mail-booking', 'method' => 'post', 'class' => 'mail-form', 'id' => 'mailForm']) !!}
									{!! Form::text('name', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your Name', 'required', 'id' => 'name']) !!}
									{!! Form::email('email', '', ['placeholder' => 'Your email', 'class' => 'form-control col-md-12 col-xs-12', 'required', 'id' => 'email']) !!}
									{!! Form::text('phone', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your phone', 'required', 'id' => 'phone']) !!}
									{!! Form::textarea('your_request', '', ['class' => 'form-control col-md-12 col-xs-12', 'placeholder' => 'Your request', 'cols' => 6, 'rows' => 5, 'required', 'id' => 'your_request']) !!}
									{!! Form::textarea('booking_info','', ['class' => 'form-control col-md-12 col-xs-12', 'rows' => 5, 'placeholder' => 'Time, Pick-up, Drop-off, how many people', 'required', 'id' => 'booking_info']) !!}
									{!! Form::submit('Send', ['class' => 'btn btn-default submit-mail']) !!}
									{{ Html::image('img/ajax-search.gif', '', ['class' => 'mail_form-animation submit-mail']) }}
								{!! Form::close() !!}
							</div>
							<!-- <div class="row"> -->
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
							<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection