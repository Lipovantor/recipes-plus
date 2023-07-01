jQuery(document).ready(function ($) {
    console.log($('.slider-posts-slider'));






    $('.slider-posts-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        prevArrow: false,
        nextArrow: false
    });
});