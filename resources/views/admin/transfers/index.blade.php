@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">List Transfer</a>
                    <a href="{{ url('/transfer/create') }}" class="new pull-right"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;New Transfer</a>
                </div>
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Alert</p>
                </div>
                <table class="display" id="transfer" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Transfer Type</th>
                            <th>Transfer Name</th>
                            <th>To</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>is hot</th>
                            <th>is discount</th>
                            <th>discount value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Transfer Type</th>
                            <th>Transfer Name</th>
                            <th>To</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>is hot</th>
                            <th>is discount</th>
                            <th>discount value</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->type->name }}</td>
                                <td>
                                    {{ $transfer->transfer_name->name }}
                                </td>
                                <td>
                                    {{ $transfer->place->name }}
                                </td>
                                <td>{{ $transfer->title }}</td>
                                <td>{{ $transfer->duration }}</td>
                                <td>{{ $transfer->is_hot }}</td>
                                <td>{{ $transfer->is_discount }}</td>
                                <td>{{ $transfer->discount_value }}</td>
                                <td>
                                    <a href="{{ url('/transfer/' . $transfer->id . '/edit') }}" id="{{ $transfer->id }}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="javascript:void(0)" data-url="{{ url('/transfer/' . $transfer->id) }}" class="btn btn-danger delete" id="{{ $transfer->id }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                                    <!-- {!! Form::open(['url' => '/transfer/'. $transfer->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" name="delete" value="Delete" class="delete">
                                    {!! Form::close() !!} -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection