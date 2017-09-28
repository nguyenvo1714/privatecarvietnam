@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">New Place</a>
                    <a class="back pull-right" href="{{ url('/places') }}"><i class="fa fa-angle-left"></i> &nbsp; Back to list</a>
                </div>
                @include('admin.errors.error')
                {!! Form::open(['url' => 'place', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'placeForm']) !!}
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input id="name" class="form-control col-md-8 col-xs-12" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                        <div class="alert">please put something here</div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                            Transfer name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <select class="required form-control col-md-8 col-xs-12" name="type_id">
                                <option value="">Choose option</option>
                                @foreach($transferNames as $transferName)
                                    <option value={{ $transferName->id }}>{{ $transferName->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <a href="{{ url('/places') }}" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection