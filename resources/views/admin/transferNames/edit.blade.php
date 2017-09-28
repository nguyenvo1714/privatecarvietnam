@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">Edit TransferName</a>
                    <a class="back pull-right" href="{{ url('/transferNames') }}"><i class="fa fa-angle-left"></i> &nbsp; Back to list</a>
                </div>
                @include('admin.errors.error')
                {!! Form::open(['url' => '/transferName/'.$transferName->id, 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'transferNameForm', 'files' => true]) !!}
                    <!-- {{ method_field('PUT') }} -->
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input id="name" class="form-control col-md-10 col-xs-12" name="name" value="{{ $transferName->name }}" required="required" type="text">
                        </div>
                        <div class="alert">please put something here</div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                            Type transfer <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="required form-control col-md-10 col-xs-12" name="type_id" id="type" id="type">
                                <option value="">Choose option</option>
                            @foreach($types as $type)
                                <option value={{ $type->id }} {{ $transferName->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="alert">Please select an option</div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="thumb">
                            Image thumb<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="edit-border">
                                <span>
                                    {{ Html::image('/storage/'. $transferName->thumb, 'image_thumb', ['class' => 'transferName_thumb']) }}
                                    <div class="post-thumb">
                                        <div class="inner-post-thumb">
                                            <a href="javascript:void(0);" data-id="{{ $transferName->thumb }}" class='remove-image'><i class="fa fa-times" aria-hidden="true"></i></a>
                                            <div></div>
                                        </div>
                                    </div>
                                    <input type="file" name="thumb" class="thumb">
                                </span>
                            </div>
                        </div>
                        <div class="alert">please put something here</div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-1 col-xs-12" for="description">
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea id="description" class="form-control col-md-10 col-xs-12" name="description" required="required" type="text" rows=4>{{ $transferName->description }}</textarea>
                        </div>
                        <div class="alert">please put something here</div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection