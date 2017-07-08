@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Edit blog</h3>
        </div>
        <!-- <div class="col-md-6 right-title">right title</div> -->
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Make sure you input (*) required information </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @include('admin.errors.error')

                    {!! Form::open(['url' => '/admin/blog/' . $blog->id, 'method' => 'POST', 'class' => 'form-horizontal form-label-left', 'id' => 'blogForm']) !!}
                        <!-- <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="type_id">
                                Blog type <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="required form-control col-md-10 col-xs-12" name="type_id" id="type" >
                                    <option value="">Choose option</option>
                                @foreach($types as $type)
                                    <option value={{ $type->id }}>{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="alert">Please select an option</div>
                        </div> -->
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">
                                Title <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="name" class="form-control col-md-10 col-xs-12" name="title" value="{{ $blog->title }}" required="required" type="text">
                            </div>
                            <div class="alert">please put something here</div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tag">
                                Tag <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="tags" class="" name="tags" type="text" value="{{ implode(', ', $tagNames) }}">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="content">
                                Content <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea id="my-editor" required="required" name="content" class="form-control col-md-10 col-xs-12 my-editor">
                                    {!! $blog->content !!}
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'my-editor', {
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
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="author">
                                Author <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="author" name="author" required="required" class="form-control col-md-10 col-xs-12" type="text" value="{{ $blog->author }}">
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
        </div>
    </div>
@endsection