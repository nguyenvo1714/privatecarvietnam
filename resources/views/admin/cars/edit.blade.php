@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Edit transfer</h3>
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

                    {!! Form::open(['url' => 'transfer/' . $transfer->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left', 'novalidate' => '']) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                                Type transfer <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select class="required form-control col-md-7 col-xs-12" name="type_id" id="type" >
                                    <option value="">Choose option</option>
                                @foreach($types as $type)
                                    <option value={{ $type->id }}>{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="transferName">
                                Transfer name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="transferName" class="form-control col-md-7 col-xs-12" name="transferName" required="required" type="text" value="{{ $transfer->transferName }}">
                            </div>
                            <div class="alert">Please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="place_id">
                                To <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select class="required form-control col-md-7 col-xs-12" name="place_id" id="place">
                                    <option value="">Choose option</option>
                                @foreach($places as $place)
                                    <option value={{ $place->id }}>{{ $place->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="blog_id">
                                Blog <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select class="required form-control col-md-7 col-xs-12" name="blog_id" id="blog">
                                    <option value="">Choose option</option>
                                @foreach($blogs as $blog)
                                    <option value={{ $blog->id }}>{{ $blog->title }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
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