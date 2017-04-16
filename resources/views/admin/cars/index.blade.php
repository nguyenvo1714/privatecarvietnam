@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Transfers</h3>
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
                                <th>ID</th>
                                <th>Transfer Type</th>
                                <th>Transfer Name</th>
                                <th>To</th>
                                <th>Blog</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->id }}</td>
                                <td>{{ $transfer->type }}</td>
                                <td>{{ $transfer->transferName }}</td>
                                <td>{{ $transfer->target }}</td>
                                <td>{{ $transfer->title }}</td>
                                <td style="font-size: 20px;">
                                    <a href="" id="{{ $transfer->id }}" class="call-view-transfer" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ url('/transfer/' . $transfer->id . '/edit') }}" id="{{ $transfer->id }}" ><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px;">
                                    {!! Form::open(['url' => '/transfer/'. $transfer->id, 'method' => 'POST']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $transfers->links() }}
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