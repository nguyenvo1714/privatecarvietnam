@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Driver</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $driver->fullName }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="no-border">Full name</td>
                            <td class="no-border">{{ $driver->fullName }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $driver->address }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $driver->phone }}</td>
                        </tr>
                        <tr>
                            <td>Date of birth</td>
                            <td>{{ $driver->birthday }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{ $driver->age }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $driver->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $driver->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection