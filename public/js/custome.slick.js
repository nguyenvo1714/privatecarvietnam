$(document).ready(function() {
	var autoplaySpeedMain = 5000;
	var fadeAfterTimeout;
    var bannerSlider = $('.slick').slick({
        cssEase: 'ease',
        useTransform: true,
        dots: true,
        arrows: true,
        prevArrow: $('.home-banner .custom-arrows .prev'),
        nextArrow: $('.home-banner .custom-arrows .next'),
        infinite: true,
        autoplay: true,
		draggable: false,
        autoplaySpeed: autoplaySpeedMain,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1
    });
	bannerSlider.find('.slick-slide.slick-current').addClass('actived');
    bannerSlider.on('afterChange', function(event, slick, currentSlide, nextSlide){
      $("[data-slick-index='" +currentSlide+ "']").addClass('actived');
	  fadeAfterTimeout = setTimeout(function() {
	  	$("[data-slick-index='" +currentSlide+ "']").removeClass('actived');
	  }, autoplaySpeedMain - 800);
    });
	bannerSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
	  $("[data-slick-index='" +currentSlide+ "']").removeClass('actived');
	  window.clearTimeout(fadeAfterTimeout);
    });
    $(document).ready(function() {
        headerHome();
    });
    $(window).load(function() {
        headerHome();
		$('.main-slider-wrapper').addClass('actived');
    });
    $(window).resize(function() {
        headerHome();
    });
    function headerHome() {
        $('.slick .slick-slide .background').css('height', $(window).height() - 32);
        $('.slick .slick-slide .background').each(function() {
            $(this).children('.text-center').css('top', (($('.slick .slick-slide .background').height() - $(this).children('.text-center').height())/2)+30);
        });
    }

    lifestyleHover();
		$(window).resize(function() {
			lifestyleHover();
		});
		function lifestyleHover() {
			$('.lyfestyles-grid').find('.bottom').each(function() {
				$(this).css('bottom', $(this).outerHeight()*-1);
			});
			$('.lyfestyles-grid').find('.hover-overlay').on('mouseenter', function() {
				$(this).siblings('.top').css('bottom', $(this).siblings('.bottom').outerHeight());
				$(this).siblings('.top').find('span').css('padding-bottom', 40);
				$(this).siblings('.bottom').css('bottom', 0);
			});
			$('.lyfestyles-grid').find('.hover-overlay').on('mouseleave', function() {
				$(this).siblings('.top').css('bottom', 0);
				$(this).siblings('.top').find('span').removeAttr('style');
				$(this).siblings('.bottom').css('bottom', $(this).siblings('.bottom').outerHeight()*-1);
			});
		}

 //    var bannerSlider = $('.slick-testimonials').slick({
	// 	cssEase: 'ease',
	// 	useTransform: true,
	// 	dots: false,
	// 	arrows: true,
	// 	prevArrow: $('.happy-customers .custom-arrows .prev'),
	// 	nextArrow: $('.happy-customers .custom-arrows .next'),
	// 	infinite: true,
	// 	autoplay: true,
	// 	autoplaySpeed: 6500,
	// 	pauseOnHover: true,
	// 	pauseOnDotsHover: true,
	// 	speed: 800,
	// 	slidesToShow: 1,
	// 	slidesToScroll: 1
	// });	
	// $('.slick').not('.slick-initialized').slick({
	// 	autoplay: true,
 //    dots: true,
 //    responsive: [{ 
 //        breakpoint: 500,
 //        settings: {
 //            dots: false,
 //            arrows: false,
 //            infinite: false,
 //            slidesToShow: 2,
 //            slidesToScroll: 2
 //        } 
 //    }]
	// });
});