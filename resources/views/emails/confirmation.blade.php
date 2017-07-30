@component('mail::message')
# Transfer booking informations
Dear {{ $infos['surname'] }},<br>
Thanks you for your booking, please confirm below information and let us know if any mismatch:

<table class="table table-bordred">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr class="striped" style="background-color: #f9f9f9;font-size: 1.3em;">
			<td colspan="2">Vehicle</td>
		</tr>
		<tr>
			<td>The number of passenger</td>
			<td>{{ $infos['passenger'] }}</td>
		</tr>
		<tr>
			<td>Vehicle</td>
			<td>{{ $infos['vehicle'] }}</td>
		</tr>
		<tr class="striped" style="background-color: #f9f9f9;font-size: 1.3em;">
			<td colspan="2">Route</td>
		</tr>
		<tr>
			<td>Pick-up address</td>
			<td>{{ $infos['pickup_address'] }}</td>
		</tr>
		<tr>
			<td>Drop-off address</td>
			<td>{{ $infos['dropoff_address'] }}</td>
		</tr>
		<tr>
			<td>Departure date and time</td>
			<td>{{ $infos['departure_date'] . ', ' . $infos['departure_time'] }}</td>
		</tr>
		<tr class="striped" style="background-color: #f9f9f9;font-size: 1.3em;">
			<td colspan="2">Contact</td>
		</tr>
		<tr>
			<td>Name and Surname</td>
			<td>{{ $infos['name'] . ' ' . $infos['surname'] }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $infos['email'] }}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{ $infos['phone'] }}</td>
		</tr>
		<tr>
			<td>Note</td>
			<td>{{ $infos['note'] }}</td>
		</tr>
		<tr class="striped" style="background-color: #f9f9f9;font-size: 1.3em;">
			<td colspan="2">Transfer cost</td>
		</tr>
		<tr>
			<td><strong>Total</strong></td>
			<td><strong>{{ number_format($infos['passenger'] * $infos['cost'], 2) }} &#36;</strong></td>
		</tr>
	</tbody>
</table>

For more information, please visit out website:
@component('mail::button', ['url' => 'http://privatecarvietnam.com'])
Private car VietNam
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
