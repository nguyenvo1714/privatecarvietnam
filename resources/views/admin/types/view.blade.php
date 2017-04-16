@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Type</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $type->name }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="no-border">Name</td>
                            <td class="no-border">{{ $type->name }}</td>
                            <td class="no-border">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Create at</td>
                            <td>{{ $type->created_at }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Update at</td>
                            <td>{{ $type->updated_at }}</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection