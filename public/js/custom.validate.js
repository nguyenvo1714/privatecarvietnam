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
			email: "Please input a valid email",
			phone: "Please input a phone number"
		}
	});

	$('#contactForm').validate({
		rules: {
			name: 'required',
			email: {
				required: true,
				email: true
			},
			subject: 'required',
			message: 'required'
		},
		messages: {
			name: "Please input your name",
			email: "Please input your email",
			subject: "Please input subject",
			message: "Please input the content"
		},
		submitHandler: function(form) {
			$('.modal').show();
			var name    = $('#name').val();
			var email   = $('#email').val();
			var country = $('#country').val();
			var phone   = $('#phone').val();
			var findus  = $('#findus').val();
			var subject = $('#subject').val();
			var person  = $('#person').val();
			var message = $('#message').val();
			var token   = $('input[name="_token"]').attr('value');
			var host    = $(form).prop('action');
			$.ajax({
				type: "POST",
				url: host,
				data: {
					_token: token,
					name: name,
					email: email,
					country: country,
					phone: phone,
					findus: findus,
					subject: subject,
					person: person,
					message: message
				},
				success: function(data) {
					if(data.success == true) {
						$('.modal').hide();
						alert(data.message);
						window.location.href = baseUrl;
					} else {
						$('.modal').hide();
						alert(data.message);
					}
				}
			});
			return false;
		}
	});

	$('#mailForm').validate({
		rules: {
			name: 'required',
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true,
				minlength: 6
			},
			your_request: 'required',
			booking_info: 'required'
		},
		messages: {
			name: 'You forgot to input your name',
			email: 'Please input correct your email',
			phone: 'You forgot to input your phone number',
			your_request: 'Please let know us your request',
			booking_info: 'You forgot to input time, pick-up address,...'
		},
		submitHandler: function(form) {
			$('.mail-booking #mailForm .submit-mail').hide();
			$('#mailForm .mail_form-animation').show();
			var token        = $('input[name="_token"]').attr('value');
			var name         = $('#name').val();
			var email        = $('#email').val();
			var phone        = $('#phone').val();
			var your_request = $('#your_request').val();
			var booking_info = $('#booking_info').val();
			var host         = $(form).prop('action');
			$.ajax({
				type: 'POST',
				'url': host,
				data: {
					_token: token,
					name: name,
					email: email,
					phone: phone,
					your_request: your_request,
					booking_info: booking_info
				},
				success: function(data) {
					if(data.success == true) {
						$('#name').val('');
						$('#email').val('');
						$('#phone').val('');
						$('#your_request').val('');
						$('#booking_info').val('');
						$('.modal').hide();
						$('.mail-booking #mailForm .submit-mail').show();
						$('#mailForm .mail_form-animation').hide();
						alert(data.message)
					} else {
						$('.mail-booking #mailForm .submit-mail').show();
						$('#mailForm .mail_form-animation').hide();
						alert(data.message);
					}
				}
			});
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

	$('#placeForm').validate({
		messages: {
			name: "Please input name",
			type_id: "Please select an option"
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
			transfer_name_id: "Please select an option",
			pick_up_id: "Please select an option",
			place_id: "Please select an option",
			title: "Please input the title",
			duration: "Please input duration",
			description: "Please input description",
			image_thumb: " ",
			image_head: " ",
			blog_id: "Please select an option",
			fleet: "Please input the car fleet",
			present: "Please upload an image",
			capability: "Please input car capability",
			class: "Please input car class",
			price: "Please input price",
			baggage: "Please input baggage",
			// driver_id: "Please select an option",
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