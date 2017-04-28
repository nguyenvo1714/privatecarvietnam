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
                                <th>Driver</th>
                                <th>Car fleet</th>
                                <th>Capability</th>
                                <th>Price</th>
                                <th>Class</th>
                                <th>Baggage number</th>
                                <th>Active?</th>
                                <!-- <th></th> -->
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->driver->where('drivers.id', $car->driver_id)->first()->fullName }}</td>
                                <td>{{ $car->fleet }}</td>
                                <td>{{ $car->capability }}</td>
                                <td>{{ $car->price }}</td>
                                <td>{{ $car->class }}</td>
                                <td>{{ $car->baggage }}</td>
                                <td>{{ $car->isActive }}</td>
                                <!-- <td style="font-size: 20px;">
                                    <a href="" id="{{ $car->id }}" class="call-view-car" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td> -->
                                <td style="font-size: 20px;">
                                    <a href="{{ url('/car/' . $car->id . '/edit') }}" id="{{ $car->id }}" ><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px;">
                                    {!! Form::open(['url' => '/car/'. $car->id, 'method' => 'POST']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $cars->links() }}
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