$(function() {
	$('#bookForm').validate({
		rules: {
			email: true
		},
		messages: {
			passenger: "Please input the number of passenger",
			pickupAddress: "Please input a pick-up address",
			// departureDate: "",
			departureTime: "Please input departure date and time",
			dropoffAddress: "Please input a drop-off address",
			// name: "",
			surname: "Please input name and surname",
			email: "Please input a valid email"
		}
	});

	$('#contactForm').validate({
		rules: {
			email: true
		},
		messages: {
			name: "Please input your name",
			email: "Please input your email",
			subject: "Please input subject",
			message: "Please input the content"
		}
	});
});