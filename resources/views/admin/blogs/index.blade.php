@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Blogs</h3>
        </div>
        <!-- <div class="col-md-6 right-title">right title</div> -->
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->author }}</td>
                                <td style="font-size: 20px;">
                                    <a href="" id="{{ $blog->id }}" class="call-view-blog" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ url('/admin/blog/' . $blog->id . '/edit') }}" id="{{ $blog->id }}" class="call-edit-blog"><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px;">
                                    {!! Form::open(['url' => '/admin/blog/'.$blog->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection