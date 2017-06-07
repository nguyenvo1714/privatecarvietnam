@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Drivers</h3>
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
                                <th>Full name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Date of birth</th>
                                <th>Age</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr>
                                <td>{{ $driver->id }}</td>
                                <td>{{ $driver->fullName }}</td>
                                <td>{{ $driver->address }}</td>
                                <td>{{ $driver->phone }}</td>
                                <td>{{ $driver->birthday }}</td>
                                <td>{{ $driver->age }}</td>
                                <td style="font-size: 20px;">
                                    <a href="" id="{{ $driver->id }}" class="call-view-driver" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ url('driver/' . $driver->id . '/edit') }}" id="{{ $driver->id }}" ><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px;">
                                    {!! Form::open(['url' => '/driver/'. $driver->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $drivers->links() }}
            </div>
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