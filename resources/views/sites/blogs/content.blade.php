@extends('sites.layout.submenu')
@section('content')
	<div class="wrapcontent">
		<section class="container">
			<div class="row">
				<div class="blog-title">
					<h4>{{ $detail->title }}</h4>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="blog-title">
							<div class="hr"></div>
						</div>
						<div class="boxradius for-blog" data-role="boxactivity">
							<div class="blog-content">
								{!! $detail->content !!}
							</div>
							<div class="share row">
								<strong>Share this</strong>
								<ul>
									<li class="google-plus">
										<a href="{{ url('https://plus.google.com/share?url=/blog/' . $detail->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-google-plus"></i> Google</a>
									</li>
									<li class="facebook">
										<a href="{{ url('https://www.facebook.com/sharer.php?u=/blog/' . $detail->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-facebook"></i> Facebook</a>
									</li>
									<li class="twister">
										<a href="{{ url('https://twitter.com/share?url=/blog/' . $detail->slug) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-twitter"></i> Twister</a>
									</li>
									<li class="email">
										<a href="mailto:?subject={!! $detail->title !!}&body={{ strip_tags($detail->content) }}" target="_blank" class="btn btn-default share_link"><i class="fa fa-envelope-o"></i> Email</a>
									</li>
									<li class="print">
										<a href="{{ url('/blog/' . $detail->slug . '#print') }}" target="_blank" class="btn btn-default share_link" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
									</li>
								</ul>
							</div>
							<div class="hr"></div>
							<div class="blog-end row">
								<ul>
									<li class="time">
										<i class="fa fa-clock-o"></i> {{ date_format($detail->created_at, 'M d, Y') }}
									</li>
									<li class="tag">
										<i class="fa fa-tags"></i> <a href="{{ url('/' . $detail->type->slug) }}"> {{ $detail->type->name }}</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="paginate">
							<div class="">
								@if( ! empty($prev))
									<div class="prev col-md-4 col-sm-12">
										<div class="row">
											<a href="{{ url('/blog/' . $prev->slug) }}" class="btn btn-default">
												@if(strlen($prev->title) > 25)
													<span class="glyphicon glyphicon-step-backward"></span> Prev blog: {{ mb_substr($prev->title, 0, 25) . '...' }}
												@else
													<span class="glyphicon glyphicon-step-backward"></span> Prev blog: {{ $prev->title }}
												@endif
											</a>
										</div>
									</div>
								@endif
								@if( ! empty($next))
									<div class="next col-md-offset-4 col-md-4 col-sm-12">
										<div class="row">
											<a href="{{ url('/blog/' . $next->slug) }}" class="btn btn-default">
												<div class="text-left"> Next blog:
													@if(strlen($next->title) > 25)
														{{ mb_substr($next->title, 0, 25) . '...' }} <span class="glyphicon glyphicon-step-forward"></span>
													@else
														{{ $next->title }} <span class="glyphicon glyphicon-step-forward"></span>
													@endif
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						</div>
						@if($relates->count() > 0)
							<div class="relate-blog">
								<div class="relate-title">
									<h4>Relate blogs</h4>
									<div class="hr"></div>
								</div>
								<div class="relate-content row">
									@foreach($relates as $relate)
										<div class="col-md-4 box-relate">
											<div class="image">
												<a href="{{ url('/blog/' . $relate->slug) }}">
													<img class="img-responsive" src="{{ $relate->img }}">
												</a>
												<div class="time">
													<i class="fa fa-clock-o"></i> {{ date_format($relate->created_at, 'M d, Y') }}
												</div>
												<a href="{{ url('/blog/' . $relate->slug) }}">
													<div class="overlay">
														<span class="glyphicon glyphicon-play-circle"></span>
													</div>
												</a>
											</div>
											<div class="title">
												<h4>
													<a href="{{ url('/blog/' . $relate->slug) }}" >
														{{ $relate->title }}
													</a>
												</h4>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12 sidebar-right">
							<!-- <div class="row"> -->
							<div class="blog-title">
								<div class="hr"></div>
							</div>
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
		</section>
	</div>
@endsection