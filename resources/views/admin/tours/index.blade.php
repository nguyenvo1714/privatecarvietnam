@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Tours</h3>
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
                                <th>Tour Type</th>
                                <th>Name</th>
                                <th>Interval</th>
                                <th>StartDate</th>
                                <th>EndDate</th>
                                <th>Price</th>
                                <th>Description</th>
                                <!-- <th>Program</th> -->
                                <th>Blog name</th>
                                <th>Is Discount ?</th>
                                <th>Discount value</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                            <tr>
                                <td>{{ $tour->id }}</td>
                                <td>{{ $tour->type_id->name }}</td>
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->interval }}</td>
                                <td>{{ $tour->startDate }}</td>
                                <td>{{ $tour->endDate }}</td>
                                <td>{{ $tour->price }}</td>
                                <td>{{ $tour->description }}</td>
                                <!-- <td>{!! $tour->program !!}</td> -->
                                <td>{{ $tour->blog_id->title }}</td>
                                <td>{{ $tour->isDiscount }}</td>
                                <td>{{ $tour->discountValue }}</td>
                                <td style="font-size: 20px;">
                                    <a href="" id="{{ $tour->id }}" class="call-view-tour" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ url('/tour/' . $tour->id . '/edit') }}" id="{{ $tour->id }}" ><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td style="font-size: 20px;">
                                    {!! Form::open(['url' => '/tour/'. $tour->id, 'method' => 'POST']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $tours->links() }}
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