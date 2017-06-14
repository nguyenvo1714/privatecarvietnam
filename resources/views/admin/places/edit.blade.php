@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Edit place</h3>
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

                    {!! Form::open(['url' => '/place/'.$place->id, 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'novalidate' => '']) !!}
                        {{ method_field('PUT') }}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name" class="form-control col-md-8 col-xs-12" name="name" value="{{ $place->name }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="transfer_name_id">
                                Transfer name <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="required form-control col-md-8 col-xs-12" name="transfer_name_id" id="transferName" required>
                                    <option value="">Choose option</option>
                                @foreach($transferNames as $transferName)
                                    <option value={{ $transferName->id }}>{{ $transferName->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="isHot">
                                Is hot <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="required form-control col-md-8 col-xs-12" name="isHot" >
                                    <option value="">Choose option</option>
                                    @if($place->isHot == 1)
                                        @php ($select = 'selected')
                                    @else
                                        @php ($select = '')
                                    @endif
                                    <option {{ $select }} value=1>1</option>
                                    @if($place->isHot == 0)
                                        @php ($select = 'selected')
                                    @else
                                        @php ($select = '')
                                    @endif
                                    <option {{ $select }} value=0>0</option>
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="isNew">
                                Is new <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="required form-control col-md-8 col-xs-12" name="isNew" >
                                    <option value="">Choose option</option>
                                    @if($place->isNew == 1)
                                        @php ($select = 'selected')
                                    @else
                                        @php ($select = '')
                                    @endif
                                    <option {{ $select }} value=1>1</option>
                                    @if($place->isNew == 0)
                                        @php ($select = 'selected')
                                    @else
                                        @php ($select = '')
                                    @endif
                                    <option {{ $select }} value=0>0</option>
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
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