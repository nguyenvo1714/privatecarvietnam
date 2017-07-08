@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops! Something went wrong!</strong>	
		<br>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if(session()->has('departure_date'))
	<br>
	<div class="alert alert-danger">
		<strong>Whoops! Something went wrong!</strong>	
		<br>
		{{ session()->get('departure_date') }}
	</div>
@endif