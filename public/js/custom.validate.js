function testEmailChars(el){
    var email = $(el).val();
    if ( /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)==true ){
        $("#email-error").html("valid");
    } else {
        $("#email-error").html("not valid");
    }
}

$(function() {
	$('#bookForm').validate({
		rules: {
			email: {
				email: true,
			},
			passenger: {
				number: true
			},
			departureTime: {
				time: true
			}
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

	$('#blogForm').validate({
		messages: {
			type_id: "Please select an option",
			title: "Please input the titlle",
			content: "Please input content",
			author: "Please input author"
		}
	});

	$('#typeForm').validate({
		messages: {
			name: "Please input name"
		}
	});

	$('#transferNameForm').validate({
		messages: {
			name: 'Please input name',
			type_id: "Please input transfer name type",
			thumb: " ",
			description: "Please input description"
		}
	});

	$('#transferForm').validate({
		messages: {
			type_id: "Please select an option",
			transferName_id: "Please select an option",
			place_id: "Please select an option",
			title: "Please input the title",
			duration: "Please input duration",
			description: "Please input description",
			image_thumb: " ",
			image_head: " ",
			blog_id: "Please select an option",
			fleet: "Please input the car fleet",
			capability: "Please input car capability",
			class: "Please input car class",
			price: "Please input price",
			baggage: "Please input baggage",
			driver_id: "Please select an option",
			isActive: "Please select an option"
		}
	});

	$('#driverForm').validate({
		messages: {
			fullName: "Please input full name",
			address: "Please input address",
			phone: "Please in phone number",
			birthday: "Please input date of birth"
		}
	});
});