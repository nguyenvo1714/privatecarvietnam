$(function() {
	$('#bookForm').validate({
		rules: {
			email: true
		},
		messages: {
			passenger: "Please enter the number of passenger",
			pickupAddress: "Please enter a pick-up address",
			// departureDate: "",
			departureTime: "Please enter departure date and time",
			dropoffAddress: "Please enter a drop-off address",
			// name: "",
			surname: "Please enter name and surname",
			email: "Please enter a valid email"
		}
	});
});