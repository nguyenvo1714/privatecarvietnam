$(function() {
	// $(".navigation").on("click", function(){
	//     $(".top-menu").slideToggle();
	// });

	//mouse hover will display dropdown menu
	// $('.dropdown').mouseover(function() {
	// 	$(this).addClass('open');
	// });
	// $('.dropdown').mouseout(function() {
	// 	$(this).removeClass('open');
	// });
	$('.dropdown').on('mouseenter mouseleave click tap', function() {
	  $(this).toggleClass("open");
	});
}); 