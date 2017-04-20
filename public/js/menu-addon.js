$(function() {
	//For IE6 only 
  	if ($.browser.msie && $.browser.version.substr(0,1)<7)
  	{
    	$('li').has('ul').mouseover(function(){
        $(this).children('ul').css('visibility','visible');
        }).mouseout(function(){
        $(this).children('ul').css('visibility','hidden');
        })
  	}

  	/* Mobile */
	// $('.desktop-menu').prepend('<div class="menu-trigger">Menu</div>');       
	$(".navigation").on("click", function(){
	    $(".top-menu").slideToggle();
	});

	// iPad
	// var isiPad = navigator.userAgent.match(/iPad/i) != null;
	// if (isiPad) $('.top-menu ul').addClass('no-transition');
}); 