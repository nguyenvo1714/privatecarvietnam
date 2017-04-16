@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Edit Type</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      	<li>
                      		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      	</li>
                      	<li class="dropdown">
                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        		<i class="fa fa-wrench"></i>
                        	</a>
	                        <ul class="dropdown-menu" role="menu">
	                          	<li><a href="#">Settings 1</a></li>
	                          	<li><a href="#">Settings 2</a></li>
	                        </ul>
                      	</li>
                      	<li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul> -->
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @include('admin.errors.error')

                    {!! Form::open(['url' => '/type/'.$type->id, 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
                        {{ method_field('PUT') }}
                    <!-- <form class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ url('blog') }}"> -->
                        <!-- <span class="section">Personal Info</span> -->

                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="name" value="{{ $type->name }}" required="required" type="text">
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" style="pointer-events: none;">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection