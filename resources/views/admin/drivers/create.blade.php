@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>New driver</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Make sure you input (*) required information</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @include('admin.errors.error')
                    {!! Form::open(['url' => 'driver', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'driverForm']) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="fullname">
                                Full name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="fullName" class="form-control col-md-7 col-xs-12" name="fullName" required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">
                                Address <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="address" class="form-control col-md-7 col-xs-12" name="address" required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone">
                                Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="phone" class="form-control col-md-7 col-xs-12" name="phone" required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="birthday">
                                Date of birth <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="birthday" name="birthday" required="required" class="form-control col-md-7 col-xs-12" type="text">
                            </div>
                        </div>
                        <!-- <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="age">
                                Age <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="age" class="form-control col-md-7 col-xs-12" name="age" required="required" type="text">
                            </div>
                        </div> -->
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