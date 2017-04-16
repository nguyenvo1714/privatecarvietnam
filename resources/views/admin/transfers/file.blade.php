@extends('admin.layout.app')
@section('content')

	{!! Form::open(['url' => '/transfer/file', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<input type="file" name="image"/>
		<input type="submit" name="Upload">
	{!! Form::close() !!}
@endsection