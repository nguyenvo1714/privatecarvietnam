@extends('admin.layout.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="title-top">
                    <a class="action-title">List Type</a>
                    <a href="{{ url('/type/create') }}" class="new pull-right"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;New Type</a>
                </div>
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Alert</p>
                </div>
                <table class="display" cellspacing="0" width="100%" id="type">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>
                                <a href="{{ url('/type/' . $type->id . '/edit') }}" id="{{ $type->id }}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o"></i></a>
                                    &nbsp;&nbsp;
                                <a href="javascript:void(0)" data-url="{{ url('/type/' . $type->id) }}" class="btn btn-danger delete" id="{{ $type->id }}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection