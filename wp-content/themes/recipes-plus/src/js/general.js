jQuery(document).ready(function ($) {
 console.log('GENERAL JS READY');
 
 $('.slider-posts-slider').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  dots: true,
  prevArrow: false,
  nextArrow: false
});
});