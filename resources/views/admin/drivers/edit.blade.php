@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Edit driver</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $driver->fullName }}</h2>
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

                    {!! Form::open(['url' => 'driver/' . $driver->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left', 'novalidate' => '']) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="fullName">
                                Full name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name" class="form-control col-md-8 col-xs-12" name="fullName" value="{{ $driver->fullName }}" required="required" type="text">
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">
                                Address <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="address" class="form-control col-md-8 col-xs-12" name="address" value="{{ $driver->address }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone">
                                Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="phone" class="form-control col-md-8 col-xs-12" name="phone" value="{{ $driver->phone }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="birthday">
                                Date of birth <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="birthday" name="birthday" required="required" class="form-control col-md-8 col-xs-12" type="text" value="{{ $driver->birthday }}">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection