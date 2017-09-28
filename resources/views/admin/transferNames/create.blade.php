@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">New Transfer Name</a>
                    <a class="back pull-right" href="{{ url('/transferNames') }}"><i class="fa fa-angle-left"></i> &nbsp; Back to list</a>
                </div>
                {!! Form::open(['url' => 'transferName', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'transferNameForm', 'files' => true]) !!}
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-1 col-xs-12" for="name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input id="name" class="form-control col-md-10 col-xs-12" name="name" placeholder="Hue Transfer, Da Nang Transfer,..." required="required" type="text">
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                            Type transfer Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control col-md-10 col-xs-12" name="type_id" required>
                                <option value="">Choose option</option>
                            @foreach($types as $type)
                                <option value={{ $type->id }}>{{ $type->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="thumb">
                            Image thumb<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input id="input-2" name="thumb" type="file" class="box_upload thumb" multiple data-show-upload="false" data-show-caption="true" required data-multiple-caption="{name} files selected">
                            <label for="thumb" class="file-dummy label_thumb"><strong>Choose file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-1 col-xs-12" for="description">
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea id="description" class="form-control col-md-7 col-xs-12" name="description" required="required" type="text" rows=4></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-xs-12 col-md-offset-2">
                            <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                            <button id="send" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection