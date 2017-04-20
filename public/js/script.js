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
});