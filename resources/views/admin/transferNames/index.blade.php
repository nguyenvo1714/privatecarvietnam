@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Transfer Name</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!-- <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                </div> -->
                <div class="x_content">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Transfer Name Type</th>
                                <th>Image thumb</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transferNames as $transferName)
                            <tr>
                                <td style="width: 13%;">{{ $transferName->name }}</td>
                                <td style="width: 12%;">{{ $transferName->type->where('types.id', $transferName->type_id)->first()->name }}</td>
                                <td style="width: 23%;">{{ Html::image('/storage/' . $transferName->thumb) }}</td>
                                <td style="width: 40%;">{{ $transferName->description }}</td>
                                <td style="font-size: 20px; width: 5%;">
                                    <a href="{{ url('/transferName/' . $transferName->id . '/edit') }}" id="{{ $transferName->id }}" class="call-edit-transferName"><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px; width: 5%;">
                                    {!! Form::open(['url' => '/transferName/'.$transferName->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="paginate">{{ $transferNames->links() }}</div>
        </div>
    </div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
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