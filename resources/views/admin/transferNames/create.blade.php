@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>New transfer name</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @include('admin.errors.error')

                    {!! Form::open(['url' => 'transferName', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'novalidate' => '', 'files' => true]) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-1 col-xs-12" for="name">
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Hue Transfer, Da Nang Transfer,..." required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="thumb">
                                Image thumb<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="input-2" name="thumb" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" required>
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-1 col-xs-12" for="description">
                                Description <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea id="description" class="form-control col-md-7 col-xs-12" name="description" required="required" type="text" rows=4></textarea>
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