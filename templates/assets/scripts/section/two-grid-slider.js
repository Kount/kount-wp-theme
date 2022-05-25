// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//     $(document).ready(function () {
//         $(".two-grid-slider .slider-wrapper .slider").slick({
//             arrows: true,
//             slidesToShow: 1,
//             slidesToScroll: 1,
//             infinite: true,
//             speed: 800,
//             draggable: false,
//             dots: true,
//             adaptiveHeight: true,
//             prevArrow: $('.two-grid-slider .slider-wrapper .slide-nav .slide-prev'),
//             nextArrow: $('.two-grid-slider .slider-wrapper .slide-nav .slide-next'),
//             responsive: [
//                 {
//                     breakpoint: 991,
//                     settings: {
//                         adaptiveHeight: true,
//                         draggable: true
//                     }
//                 },
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         adaptiveHeight: true,
//                         draggable: true
//                     }
//                 },
//                 {
//                     breakpoint: 595,
//                     settings: {
//                         adaptiveHeight: true,
//                         draggable: true
//                     }
//                 },
//                 {
//                     breakpoint: 480,
//                     settings: {
//                         adaptiveHeight: true,
//                         draggable: true
//                     }
//                 }
//             ]
//         });
//
//         limit_lines("body .refresh19 .two-grid-slider .slider-wrapper .slider .content-wrapper .content .text p",2);
//
//         var SectionHeight = $("body .refresh19 .banner-multiview").height();
//         var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
//         var height = SectionHeight - TotalHeight;
//         $("body .refresh19 .two-grid-slider .slider-wrapper").css('marginTop', -height + 'px');
//         // $('body .refresh19 .two-grid-slider .slider-wrapper .slider .content-wrapper .same-height').matchHeight();
//     });
//     //resize function
//     $(window).resize(function () {
//         // $('body .refresh19 .two-grid-slider .slider-wrapper .slider .content-wrapper .same-height').matchHeight();
//         var SectionHeight = $("body .refresh19 .banner-multiview").height();
//         var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
//         var height = SectionHeight - TotalHeight;
//         $("body .refresh19 .two-grid-slider .slider-wrapper").css('marginTop', -height + 'px');
//     });
//
//
// })(jQuery);