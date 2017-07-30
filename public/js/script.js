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

	//wow effect
	wow = new WOW({
		boxClass:     'wow',      // default
		animateClass: 'animated', // default
		offset:       0,          // default
		mobile:       true,       // default
		live:         true        // default
	});
    wow.init();

	// $('.parallax-container').parallax({imageSrc: '../img/Cau-Trang-Tien.jpg'});

	$('.modal-trigger').on('click', function(e) {
		e.preventDefault();
		$('.cover').slideDown('slow');
		$('#modal1').css('display', 'block');
		$('.cover').on('click', function() {
			$('#modal1').hide();
			$(this).slideUp('slow');
		});
	});
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

	var price = $('select[name=price]').val();
	var vehicle = $('select[name=price] option:selected').text();
	$('select[name=price]').on('change', function(e) {
		price = this.value;
		vehicle = $(this).find('option:selected').text();
		cost(price);
		car_type(vehicle);
	});
	cost(price);
	car_type(vehicle);

	$('.back_to_register').click(function(e) {
		e.preventDefault();
		$('#back_to_register').submit();
	});

	$('#complete').on('submit', function(e) {
		e.preventDefault();
		$('.modal').show();
		var transfer_id     = $('#transfer_id').val();
		var trip            = $('#trip').val();
		var duration        = $('#duration').val();
		var vehicle         = $('#vehicle').val();
		var cost            = $('#cost').val();
		var passenger       = $('#passenger').val();
		var pickup_address  = $('#pickupAddress').val();
		var departure_date  = $('#departureDate').val();
		var departure_time  = $('#departureTime').val();
		var dropoff_address = $('#dropoffAddress').val();
		var name            = $('#name').val();
		var surname         = $('#surname').val();
		var email           = $('#email').val();
		var phone           = $('#phone').val();
		var note            = $('#note').val();
		var token           = $('input[name="_token"]').attr('value');
		var host            = $(this).prop('action');
		$.ajax({
			type: "POST",
			url:  host,
			data: {
				_token: token,
				transfer_id: transfer_id,
				trip: trip,
				duration: duration,
				vehicle: vehicle,
				cost: cost,
				passenger: passenger,
				pickup_address: pickup_address,
				departure_date: departure_date,
				departure_time: departure_time,
				dropoff_address: dropoff_address,
				name: name,
				surname: surname,
				email: email,
				phone: phone,
				note: note
			},
			success: function(data) {
				$('.modal').hide();
				alert(data.message);
				window.location.href = baseUrl;
			}
		})
	});

	$('#searchForm').on('submit', function(e) {
		e.preventDefault();
		$('.modal').show();
		var pickup  = $('#pick-value').val();
		var dropoff = $('#drop-value').val();
		var token   = $('input[name="_token"]').attr('value');
		var host    = $(this).prop('action');
		$.ajax({
			type: 'POST',
			url: host,
			data: {
				_token: token,
				pickup: pickup,
				dropoff: dropoff
			},
			success: function(data) {
				if(data.success == true) {
					window.location.href = baseUrl + '/' + data.type + '/' + data.slug;
					$('.modal').hide();
				} else {
					$('.modal').hide();
					alert('Transfer not found');
				}
			}

		});
	});

		$('#tagCloud').awesomeCloud({
			"size" : {
				"grid" : 9,
				"normalize": false
			},
			"options" : {
				"color" : "random-dark",
				"rotationRatio" : 0.35
			},
			"shape" : "circle"
		});

	//disable right click
	// $('body').on('contextmenu', function(e) {
	// 	return false;
	// });
});

function cost(price)
{
	$('.cost').html(price + '&#36;');
	$('.total').html(price + '&#36;');
}

function car_type(vehicle)
{
	$('#vehicle').val(vehicle);
	$('#vehicle-left').html(vehicle);
}