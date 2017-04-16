@extends('admin.layout.app')
@section('content')
    <div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Transfer</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $transfer->transferName }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="no-border">Transfer type</td>
                            <td class="no-border">{{ $transfer->type }}</td>
                        </tr>
                        <tr>
                            <td>Transfer name</td>
                            <td>{{ $transfer->transferName }}</td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>{{ $transfer->target }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><h3>{{ $transfer->title }}</h3>{!! $transfer->content !!}<span class="pull-right">Author: {{ $transfer->author }}</span></td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $transfer->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $transfer->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection