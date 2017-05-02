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
		var cost = $(this).val() * price;
		$('.cost').html(cost + 'VNĐ');
		$('.total').html(cost + 'VNĐ');
	});
	$('.back_to_register').click(function(e) {
		e.preventDefault();
		$('#back_to_register').submit();
	});
});
