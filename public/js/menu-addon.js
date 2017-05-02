$(function() {
  	/* Mobile */
	// $('.desktop-menu').prepend('<div class="menu-trigger">Menu</div>');       
	$(".navigation").on("click", function(){
	    $(".top-menu").slideToggle();
	});

	// iPad
	// var isiPad = navigator.userAgent.match(/iPad/i) != null;
	// if (isiPad) $('.top-menu ul').addClass('no-transition');
}); 