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
    $('.slick-testimonials').slick({
        cssEase: 'ease',
        useTransform: true,
        dots: false,
        arrows: true,
        prevArrow: $('.happy-customers .custom-arrows .prev'),
        nextArrow: $('.happy-customers .custom-arrows .next'),
        infinite: true,
        autoplay: true,
        autoplaySpeed: 6500,
        pauseOnHover: true,
        pauseOnDotsHover: true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.listings-strip').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
});