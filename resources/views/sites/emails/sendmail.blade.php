
<h2>Transfer Booking informations</h2>
<br>
<em>Dear {{ $infors['surname'] }},</em><br>

<p>Thank you for your booking, please confirm below information and let us know if any mismatch:</p>
<table class="table table-bordred">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr class="striped">
			<td colspan="2">Vehicle</td>
		</tr>
		<tr>
			<td>The number of passenger</td>
			<td>{{ $infors['passenger'] }}</td>
		</tr>
		<tr>
			<td>Vehicle</td>
			<td>{{ $infors['class'] }}</td>
		</tr>
		<tr class="striped">
			<td colspan="2">Route</td>
		</tr>
		<tr>
			<td>Pick-up address</td>
			<td>{{ $infors['pickupAddress'] }}</td>
		</tr>
		<tr>
			<td>Drop-off address</td>
			<td>{{ $infors['dropoffAddress'] }}</td>
		</tr>
		<tr>
			<td>Departure date and time</td>
			<td>{{ $infors['departureDate'] . ', ' . $infors['departureTime'] }}</td>
		</tr>
		<tr class="striped">
			<td colspan="2">Contact</td>
		</tr>
		<tr>
			<td>Name and Surname</td>
			<td>{{ $infors['name'] . ' ' . $infors['surname'] }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $infors['email'] }}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{ $infors['phone'] }}</td>
		</tr>
		<tr>
			<td>Note</td>
			<td>{{ $infors['note'] }}</td>
		</tr>
		<tr class="striped">
			<td colspan="2">Transfer cost</td>
		</tr>
		<tr>
			<td><strong>Total</strong></td>
			<td><strong>{{ number_format($infors['passenger'] * $infors['price'], 2) }} VNĐ</strong></td>
		</tr>
	</tbody>
</table>

