@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">List Transfer Name</a>
                    <a href="{{ url('/transferName/create') }}" class="new pull-right"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;New Transfer Name</a>
                </div>
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Alert</p>
                </div>
                <table class="display" id="transferName" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <!-- <th>Image thumb</th> -->
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Transfer Name Type</th>
                            <!-- <th>Image thumb</th> -->
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($transferNames as $transferName)
                            <tr>
                                <td>{{ $transferName->name }}</td>
                                <td>{{ $transferName->type->where('types.id', $transferName->type_id)->first()->name }}</td>
                                <!-- <td>{{ Html::image('/storage/' . $transferName->thumb, 'image_thumb') }}</td> -->
                                <td>{{ $transferName->description }}</td>
                                <td>
                                    <a href="{{ url('/transferName/' . $transferName->id . '/edit') }}" id="{{ $transferName->id }}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o"></i></a>
                                    &nbsp;&nbsp;
                                    <a href="javascript:void(0)" data-url="{{ url('/transferName/' . $transferName->id) }}" class="btn btn-danger delete" id="{{ $transferName->id }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                                <!-- <td>
                                    {!! Form::open(['url' => '/transferName/'.$transferName->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="naked-button"> <i class="fa fa-trash-o"></i></a>
                                    {!! Form::close() !!}
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
