// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//   $(window).on("resize", function () {
//     limit_lines('body .refresh19 .latest-news-slider .slider-wrap .slider .item .content p', 4);
//   }).resize();
//
//   $(window).on("load", function () {
//     $('.latest-news-slider .slider-wrap').css({"opacity": 1});
//     // $('.latest-news-slider .slider-wrap .slider .item').matchHeight();
//     // $('.latest-news-slider .slider-wrap .slider .item .content').matchHeight({byRow: 0});
//     // $('.latest-news-slider .slider-wrap .slider .item .content h5').matchHeight({byRow: 0});
//
//     $('.latest-news-slider .slider-wrap .slider').slick({
//       arrows: true,
//       slidesToShow: 3,
//       slidesToScroll: 1,
//       speed: 800,
//       focusOnSelect: false,
//       fade: false,
//       infinite: true,
//       draggable: false,
//       dots: false,
//       prevArrow: $('.latest-news-slider .slide-nav .slide-prev'),
//       nextArrow: $('.latest-news-slider .slide-nav .slide-next'),
//       responsive: [
//         {
//           breakpoint: 992,
//           settings: {
//             infinite: true,
//             slidesToShow: 2,
//             slidesToScroll: 1
//           }
//         },
//         {
//           breakpoint: 768,
//           settings: {
//             slidesToShow: 2,
//             slidesToScroll: 1
//           }
//         },
//         {
//           breakpoint: 596,
//           settings: {
//             // adaptiveHeight: true,
//             slidesToShow: 1,
//             slidesToScroll: 1
//           }
//         },
//         {
//           breakpoint: 480,
//           settings: {
//             // adaptiveHeight: true,
//             slidesToShow: 1,
//             slidesToScroll: 1,
//             dots: true
//           }
//         }
//       ]
//     });
//   });
//
// })(jQuery);