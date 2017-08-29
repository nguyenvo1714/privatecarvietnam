@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br>
                        @include('admin.errors.error')
                        {!! Form::open(['url' => 'transfer/' . $transfer->id, 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'files' => true, 'id' => 'transferForm']) !!}
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                                    Type transfer <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select class="form-control col-md-10 col-xs-12" name="type_id" id="type" required>
                                        <option value="">Choose option</option>
                                    @foreach($types as $type)
                                        <option value={{ $type->id }} {{ $transfer->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="transfer_name_id">
                                    Transfer name <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select class="form-control col-md-10 col-xs-12" name="transfer_name_id" id="transferName" required">
                                        <option value="">Choose option</option>
                                    @foreach($transferNames as $transferName)
                                        <option value={{ $transferName->id }} {{ $transfer->transfer_name_id == $transferName->id ? 'selected' : '' }}>{{ $transferName->name }}</option>
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
                                        @foreach($pick_ups as $pick_up)
                                        <option value={{ $pick_up->id }} {{ $transfer->pick_up_id == $pick_up->id ? 'selected' : '' }}>{{ $pick_up->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="place_id">
                                    To <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select class="form-control col-md-10 col-xs-12" name="place_id" id="place" required>
                                        <option value="">Choose option</option>
                                    @foreach($places as $place)
                                        <option value={{ $place->id }} {{ $transfer->place_id == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">
                                    Title <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input id="title" class="form-control col-md-10 col-xs-12" name="title" value="{{ $transfer->title }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="duration">
                                    Duration <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input id="duration" class="form-control col-md-10 col-xs-12" name="duration" value="{{ $transfer->duration }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">
                                    Description
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <textarea id="description" class="form-control col-md-10 col-xs-12" name="description" rows="3">{{ $transfer->description }}</textarea>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_thumb">
                                    Image thumbnail<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    {{ Html::image('/storage/' . $transfer->image_thumb, 'image_thumb', ['width' => 140, 'height' => 120, 'id' => 'image_thumb']) }}
                                    <br>&nbsp;
                                    <input id="image_thumb" name="image_thumb" type="file" onchange="document.getElementById('image_thumb').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image_head">
                                    Image header<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <ul id="media-list" class="clearfix">
                                        <li class="myupload">
                                            <span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" name="image[]" multiple click-type="type2" id="picupload" class="picupload"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="blog_id">
                                    Blog <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <textarea id="my-editor" required name="blog" class="form-control col-md-10 col-xs-12 my-editor">
                                        {!! $transfer->blog !!}
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'my-editor',
                                        {
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
                                    <select class="form-control col-md-10 col-xs-12" name="is_hot" id="hot">
                                        <option value="">Choose option</option>
                                        <option value=1 {{ $transfer->is_hot == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value=0 {{ $transfer->is_hot == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_discount">
                                    Is discount? <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select class="form-control col-md-10 col-xs-12" name="is_discount" id="discount">
                                        <option value="">Choose option</option>
                                        <option value=1 {{ $transfer->is_hot == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value=0 {{ $transfer->is_hot == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="discount_value">
                                    Discount value</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input id="title" class="form-control col-md-10 col-xs-12" name="discount_value" value="{{ $transfer->discount_value }}" type="text">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <table class="table table-bordered table-striped table-highlight">
                                    <thead>
                                        <tr>
                                            <th>Car fleet</th>
                                            <th>Image</th>
                                            <th>Capability</th>
                                            <th>Price(&#36;)</th>
                                            <th>Baggage</th>
                                            <th>Active?</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dynamic">
                                    @php ($i = 0)
                                    @foreach($cars as $car)
                                        <tr>
                                            <input id="id" name="id[]" class="form-control col-md-10 col-xs-12" type="hidden" value="{{ $car->id }}">
                                            <td>
                                                <input type="text" name="fleet[]" id="fleet" class="form-control" required="required" value="{{ $car->fleet }}">
                                            </td>
                                            <td>
                                                {{ Html::image('/storage/' . $car->present, 'present', ['width' => 140, 'height' => 120, 'id' => 'present' . $i]) }}
                                                <br>&nbsp;
                                                <input type="file" name="present[]" id="present" class="form-control" onchange="document.getElementById('present{{ $i }}').src = window.URL.createObjectURL(this.files[0])">
                                            </td>
                                            <td>
                                                <input type="text" name="capability[]" id="capability" class="form-control" required="required" value="{{ $car->capability }}">
                                            </td>
                                            <td>
                                                <input type="text" name="price[]" id="price" class="form-control" required="required" value="{{ $car->price }}">
                                            </td>
                                            <td>
                                                <input type="text" name="baggage[]" id="baggage" class="form-control" required="required" value="{{ $car->baggage }}">
                                            </td>
                                            <td>
                                                <select class="form-control col-md-10 col-xs-12" name="active[]" id="active{{ $i }}">
                                                    <option value="">Choose option</option>
                                                    <option value=0 {{ $car->active == 0 ? 'selected' : '' }}>No</option>
                                                    <option value=1 {{ $car->active == 1 ? 'selected' : '' }}>Yes</option>
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
            </div>
        </div>
    </section>
@endsection