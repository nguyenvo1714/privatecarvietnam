@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                            <select class="form-control col-md-10 col-xs-12" name="transfer_name_id" required onchange="chooseTransferName(this);">
                                <option value="">Choose option</option>
                            @foreach($transferNames as $transferName)
                                <option value={{ $transferName->id }}>{{ $transferName->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pick_up_id">
                            From <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control col-md-10 col-xs-12" name="pick_up_id" required id="pickup-by-transfer-name">
                                <option value="">Choose option</option>
                                @foreach($pickups as $pickup)
                                    <option value={{ $pickup->id }}>{{ $pickup->name }}</option>
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
                            <input id="input-2" name="image_thumb" type="file" class="box_upload image_thumb" data-multiple-caption="{name} files selected">
                            <label for="image_thumb" class="file-dummy label_thumb"><strong>Choose file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_head">
                            Image header<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="file" name="image_head[]" click-type="type2" class="box_upload image_head" multiple data-multiple-caption="{count} files selected">
                            <label for="image_head" class="file-dummy label_head"><strong>Choose file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
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
                                <option value=1>Yes</option>
                                <option value=0>No</option>
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
                                <option value=1>Yes</option>
                                <option value=0>No</option>
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
                                    <th>Price</th>
                                    <th>Baggage</th>
                                    <!-- <th>Driver</th> -->
                                    <th>Active?</th>
                                </tr>
                            </thead>
                            <tbody class="dynamic">
                                <tr>
                                    <td>
                                        <input type="text" name="fleet[]" id="fleet" class="form-control" required="required">
                                    </td>
                                    <td>
                                        {{ Html::image(' ', 'image present', ['id' => 'present0', 'width' => 140, 'height' => 120]) }}
                                        <br>
                                        <input id="input-2" name="present[]" type="file" class="form-control" required onchange="document.getElementById('present0').src = window.URL.createObjectURL(this.files[0])">
                                    </td>
                                    <td>
                                        <input type="text" name="capability[]" id="capability" class="form-control" required="required">
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" id="price" class="form-control" required="required">
                                    </td>
                                    <td>
                                        <input type="text" name="baggage[]" id="baggage" class="form-control" required="required">
                                    </td>
                                    <!-- <td>
                                        <select class="form-control col-md-7 col-xs-12" name="driver_id[]">
                                            <option value="">Choose option</option>
                                        @foreach($drivers as $driver)
                                            <option value={{ $driver->id }}>{{ $driver->full_name }}</option>
                                        @endforeach
                                        </select>
                                    </td> -->
                                    <td>
                                        <select class="form-control col-md-7 col-xs-12" name="active[]">
                                            <option value="">Choose option</option>
                                            <option value=0>No</option>
                                            <option value=1>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" id="drivers" data-field-driver="{{ $drivers }}">
                    <div class="form-group" style="margin-top: 15px;">
                        <div class="col-md-1 col-md-offset-2">
                            <button id="add" class="naked-button"><i class="fa fa-plus-square"></i></button>
                            <button id="remove" class="naked-button" disabled style="float: right"><i class="fa fa-minus-square"></i></button>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ url('/transfers') }}" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection