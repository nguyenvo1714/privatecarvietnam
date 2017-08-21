@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <table class="table table-hover .table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transfer Type</th>
                            <th>Transfer Name</th>
                            <th>To</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>is hot</th>
                            <th>is discount</th>
                            <th>discount value</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->id }}</td>
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
                                    <a href="{{ url('/transfer/' . $transfer->id) }}" id="{{ $transfer->id }}" class="call-view-transfer">
                                        Detail
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('/transfer/' . $transfer->id . '/edit') }}" id="{{ $transfer->id }}" >Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['url' => '/transfer/'. $transfer->id, 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" name="delete" value="Delete" class="delete">
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="text-center">
        {{ $transfers->links() }}
    </div>
@endsection