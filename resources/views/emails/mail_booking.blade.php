@component('mail::message')
# Transfer Booking

Dear Private Car Vietnam,

Here are the information of my request:

<table class="table table-bordred">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr class="striped" style="background-color: #f9f9f9;font-size: 1.3em;">
			<td>My name:</td>
			<td>{{ $content['name'] }}</td>
		</tr>
		<tr>
			<td>My email: </td>
			<td>{{ $content['email'] }}</td>
		</tr>
		<tr>
			<td>My phone number: </td>
			<td>{{ $content['phone'] }}</td>
		</tr>
		<tr>
			<td>My request: </td>
			<td><?php echo nl2br($content['your_request']); ?></td>
		</tr>
		<tr>
			<td>Content: </td>
			<td><?php echo nl2br($content['booking_info']); ?></td>
		</tr>
	</tbody>
</table>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
