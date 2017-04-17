$(document).ready(function() {
	$('.slick').slick({
		cssEase: 'ease',
        useTransform: true,
        dots: true,
        arrows: true,
        prevArrow: $('.home-banner .custom-arrows .prev'),
        nextArrow: $('.home-banner .custom-arrows .next'),
        infinite: true,
        autoplay: true,
		draggable: false,
        pauseOnHover: true,
        pauseOnDotsHover: false,
	});
});