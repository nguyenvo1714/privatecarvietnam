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
                    <h2>{{ $transfer->transfer_name->name }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="no-border">Transfer type</td>
                            <td class="no-border">{{ $transfer->type->name }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $transfer->title }}</td>
                        </tr>
                        <tr>
                            <td>Transfer name</td>
                            <td>{{ $transfer->transfer_name->name }}</td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>{{ $transfer->place->name }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $transfer->description }}</td>
                        </tr>
                        <tr>
                            <td>Thumbnail</td>
                            <td>{{ Html::image('/storage/' . $transfer->image_thumb) }}</td>
                        </tr>
                        <tr>
                            <td>Image header</td>
                            <td>{{ Html::image('/storage/' . $transfer->image_head) }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ $transfer->duration }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{!! $transfer->blog !!}</td>
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