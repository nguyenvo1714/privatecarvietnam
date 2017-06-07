@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>New transfer</h3>
        </div>
        <!-- <div class="col-md-6 right-title">right title</div> -->
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
                    {!! Form::open(['url' => 'transfer', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'transferForm', 'files' => true]) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                                Type transfer <span class="required">*</span>
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
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="transfer_name_id">
                                Transfer name <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="form-control col-md-10 col-xs-12" name="transfer_name_id" required>
                                    <option value="">Choose option</option>
                                @foreach($transferNames as $transferName)
                                    <option value={{ $transferName->id }}>{{ $transferName->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="place_id">
                                To <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="form-control col-md-10 col-xs-12" name="place_id" required>
                                    <option value="">Choose option</option>
                                @foreach($places as $place)
                                    <option value={{ $place->id }}>{{ $place->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">
                                Title <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="title" class="form-control col-md-10 col-xs-12" name="title" placeholder="Tour mien trung..." required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="duration">
                                Duration <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="duration" class="form-control col-md-10 col-xs-12" name="duration" placeholder="2hour 30 minutes" required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">
                                Description <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="description" class="form-control col-md-10 col-xs-12" name="description" placeholder="Tour mien trung..." required="required" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_thumb">
                                Image thumbnail<span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="input-2" name="image_thumb" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_head">
                                Image header<span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="input-2" name="image_head" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="blog">
                                Blog <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea id="my-editor" required name="blog" class="form-control col-md-10 col-xs-12 my-editor">
                                    {!! old('content', '') !!}
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'my-editor',
                                    {
                                        extraPlugins: 'embed,autoembed',
                                        height: 500,
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_hot">
                                Is hot? <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="form-control col-md-10 col-xs-12" name="is_hot" required>
                                    <option value="">Choose option</option>
                                    <option value=1>1</option>
                                    <option value=0>0</option>
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_discount">
                                Is discount? <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="form-control col-md-10 col-xs-12" name="is_discount" required>
                                    <option value="">Choose option</option>
                                    <option value=1>1</option>
                                    <option value=0>0</option>
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="discount_value">
                                Discount value</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="title" class="form-control col-md-10 col-xs-12" name="discount_value" placeholder="15%" type="text">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <table class="table table-bordered table-striped table-highlight">
                                <thead>
                                    <tr>
                                        <th>Car fleet</th>
                                        <th>Image</th>
                                        <th>Capability</th>
                                        <th>Class</th>
                                        <th>Price</th>
                                        <th>Baggage</th>
                                        <th>Driver</th>
                                        <th>Active?</th>
                                    </tr>
                                </thead>
                                <tbody class="dynamic">
                                    <tr>
                                        <td>
                                            <input type="text" name="fleet[]" id="fleet" class="form-control" required="required">
                                        </td>
                                        <td>
                                            <input id="input-2" name="present[]" type="file" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="capability[]" id="capability" class="form-control" required="required">
                                        </td>
                                        <td>
                                            <input type="text" name="class[]" id="class" class="form-control" required="required">
                                        </td>
                                        <td>
                                            <input type="text" name="price[]" id="price" class="form-control" required="required">
                                        </td>
                                        <td>
                                            <input type="text" name="baggage[]" id="baggage" class="form-control" required="required">
                                        </td>
                                        <td>
                                            <select class="form-control col-md-7 col-xs-12" name="driver_id[]">
                                                <option value="">Choose option</option>
                                            @foreach($drivers as $driver)
                                                <option value={{ $driver->id }}>{{ $driver->full_name }}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control col-md-7 col-xs-12" name="is_active[]">
                                                <option value="">Choose option</option>
                                                <option value=0>0</option>
                                                <option value=1>1</option>
                                            </select>
                                        </td>
                                    </tr>
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