@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>New blog</h3>
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

                    {!! Form::open(['url' => 'blog', 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'novalidate' => '']) !!}
                        <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="type_id">
                                To <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="required form-control col-md-8 col-xs-12" name="type_id" >
                                    <option value="">Choose option</option>
                                @foreach($types as $type)
                                    <option value={{ $type->id }}>{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="title">
                                Title <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name" class="form-control col-md-8 col-xs-12" name="title" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="content">
                                Content <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea id="my-editor" required="required" name="content" class="form-control col-md-8 col-xs-12 my-editor">
                                    {!! old('content', '') !!}
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'my-editor', 
                                    {
                                        extraPlugins: 'embed,autoembed,image2',
                                        height: 500,

                                        // Load the default contents.css file plus customizations for this sample.
                                        contentsCss: [ CKEDITOR.basePath + 'contents.css', 'http://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

                                        // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                                        // resizer (because image size is controlled by widget styles or the image takes maximum
                                        // 100% of the editor width).
                                        image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
                                        image2_disableResizer: true,
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
                                    });
                                </script>
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="author">
                                Author <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="author" name="author" required="required" class="form-control col-md-8 col-xs-12" type="text">
                            </div>
                            <div class="alert">please put something here</div>
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