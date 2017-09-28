@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">New Type</a>
                    <a class="back pull-right" href="{{ url('/types') }}"><i class="fa fa-angle-left"></i> &nbsp; Back to list</a>
                </div>
                @include('admin.errors.error')
                {!! Form::open(['url' => 'type', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'typeForm']) !!}
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input id="name" class="form-control col-md-10 col-xs-12" name="name" placeholder="Deluxe tour, Airport transfer,..." required="required" type="text">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <a href="{{ url('/types') }}" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection