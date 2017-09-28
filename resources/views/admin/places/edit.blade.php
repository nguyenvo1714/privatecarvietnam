@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">Edit Place</a>
                    <a class="back pull-right" href="{{ url('/places') }}"><i class="fa fa-angle-left"></i> &nbsp; Back to list</a>
                </div>
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
                            <select class="required form-control col-md-8 col-xs-12" name="transfer_name_id" required>
                                <option value="">Choose option</option>
                            @foreach($transferNames as $transferName)
                                <option value={{ $transferName->id }} {{ $place->transfer_name_id == $transferName->id ? 'selected' : '' }}>{{ $transferName->name }}</option>
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