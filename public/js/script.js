$(function() {
	$('#nav').affix({
	    offset: {
	        top: $('head').height()
	    }
	});	

	$('#sidebar').affix({
	    offset: {
	        top: 200
	    }
	});

	// $(window).scroll(function () {
	// 	$('.desktop-menu').attr('data-offset-top', 0);
	// });

	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	$('.back-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	$('.back').click(function() {
		parent.history.back();
		return false;
	});
	$('#passenger').keyup(function() {
		cost(price);
	});
	$(window).on('load', function() {
		cost(price);
	})

	$('.back_to_register').click(function(e) {
		e.preventDefault();
		$('#back_to_register').submit();
	});

	$('#complete').on('submit', function(e) {
		e.preventDefault();
		var trip =$('#trip').val();
		var duration = $('#duration').val();
		var class1 = $('#class').val();
		var price = $('#price').val();
		var passenger = $('#passenger').val();
		var pickupAddress = $('#pickupAddress').val();
		var departureDate = $('#departureDate').val();
		var departureTime = $('#departureTime').val();
		var dropoffAddress = $('#dropoffAddress').val();
		var name = $('#name').val();
		var surname = $('#surname').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var note = $('#note').val();
		var token = $('input[name="_token"]').attr('value');
		var host = $(this).prop('action');
		$.ajax({
			type: "POST",
			url:  host,
			data: {
				_token: token,
				trip: trip,
				duration: duration,
				class: class1,
				price: price,
				passenger: passenger,
				pickupAddress: pickupAddress,
				departureDate: departureDate,
				departureTime: departureTime,
				dropoffAddress: dropoffAddress,
				name: name,
				surname: surname,
				email: email,
				phone: phone,
				note: note
			},
			success: function(data) {
				console.log(data.success);
				alert(data.message);
			}
		})
	})
});

function cost(price) {
	var cost = $('#passenger').val() * price;
	$('.cost').html(cost + 'VNĐ');
	$('.total').html(cost + 'VNĐ');
}
