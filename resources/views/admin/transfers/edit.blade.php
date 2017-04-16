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

                    {!! Form::open(['url' => 'transfer/' . $transfer->id, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left', 'files' => true]) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                                Type transfer <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select class="required form-control col-md-7 col-xs-12" name="type_id" id="type">
                                    <option value="">Choose option</option>
                                @foreach($types as $type)
                                    <option value={{ $type->id }}>{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="transferName_id">
                                Transfer name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <select class="required form-control col-md-7 col-xs-12" name="transferName_id" id="transferName">
                                    <option value="">Choose option</option>
                                @foreach($transferNames as $transferName)
                                    <option value={{ $transferName->id }}>{{ $transferName->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
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
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">
                                Title <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="title" class="form-control col-md-7 col-xs-12" name="title" value="{{ $transfer->title }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="duration">
                                Duration <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="duration" class="form-control col-md-7 col-xs-12" name="duration" value="{{ $transfer->duration }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">
                                Description
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input id="description" class="form-control col-md-7 col-xs-12" name="description" value="{{ $transfer->description }}" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_thumb">
                                Image thumbnail<span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                {{ Html::image('/storage/' . $transfer->image_thumb, 'image thumbnail', ['class' => 'transfer-image']) }}
                                <br>&nbsp;
                                <input id="input-2" name="image_thumb" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                                <!-- <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                          <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image_thumb">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;"> -->
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_head">
                                Image header<span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                {{ Html::image('/storage/' . $transfer->image_head, 'image header', ['class' => 'transfer-image']) }}
                                <br>&nbsp;
                                <input id="input-2" name="image_head" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                            </div>
                            <div class="alert">please put something here</div>
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
                        <div class="field item form-group">
                            <table class="table table-bordered table-striped table-highlight">
                                <thead>
                                    <tr>
                                        <th>Car fleet</th>
                                        <th>Capability</th>
                                        <th>Class</th>
                                        <th>Price</th>
                                        <th>Baggage</th>
                                        <th>Driver</th>
                                        <th>Active?</th>
                                    </tr>
                                </thead>
                                <tbody class="dynamic">
                                @php ($i = 0)
                                @foreach($cars as $car)
                                    <tr>
                                        <input id="id" name="id[]" class="form-control col-md-7 col-xs-12" type="hidden" value="{{ $car->id }}">
                                        <td>
                                            <input type="text" name="fleet[]" id="fleet" class="form-control" required="required" value="{{ $car->fleet }}">
                                        </td>
                                        <td>
                                            <input type="text" name="capability[]" id="capability" class="form-control" required="required" value="{{ $car->capability }}">
                                        </td>
                                        <td>
                                            <input type="text" name="class[]" id="class" class="form-control" required="required" value="{{ $car->class }}">
                                        </td>
                                        <td>
                                            <input type="text" name="price[]" id="price" class="form-control" required="required" value="{{ $car->price }}">
                                        </td>
                                        <td>
                                            <input type="text" name="baggage[]" id="baggage" class="form-control" required="required" value="{{ $car->baggage }}">
                                        </td>
                                        <td>
                                            <select class="required form-control col-md-7 col-xs-12" name="driver_id[]" id="driver{{ $i }}">
                                                <option value="">Choose option</option>
                                            @foreach($drivers as $driver)
                                                <option value={{ $driver->id }}>{{ $driver->fullName }}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="required form-control col-md-7 col-xs-12" name="isActive[]" id="active{{ $i }}">
                                                <option value="">Choose option</option>
                                                <option value=0>0</option>
                                                <option value=1>1</option>
                                            </select>
                                        </td>
                                        @php ($i++)
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" id="drivers" data-field-driver="{{ $drivers }}">
                        <div class="form-group" style="margin-top: 15px;">
                            <div class="col-md-1 col-md-offset-2">
                                <button id="add" class="naked-button"><i class="fa fa-plus-square" style="font-size: 20px;"></i></button>
                                <button id="remove" class="naked-button" disabled style="float: right"><i class="fa fa-minus-square" style="font-size: 20px;"></i></button>
                            </div>
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