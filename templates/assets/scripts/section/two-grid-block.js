// // // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//     $(document).ready(function () {
//
//          var SectionHeight = $("body .refresh19 .banner-multiview").height();
//          var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
//          var height =  SectionHeight - TotalHeight;
//          $("body .refresh19 .two-grid-block .content-wrapper").css('marginTop', - height + 'px'); // <-- set here
//
//         $(window).resize(function() {
//             var SectionHeight = $("body .refresh19 .banner-multiview").height();
//             var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
//             var height =  SectionHeight - TotalHeight;
//             $("body .refresh19 .two-grid-block .content-wrapper").css('marginTop', - height + 'px'); // <-- set here
//         });
//
//         $('.two-grid-block .big-block').addClass('two-grid-height');
//         $('.two-grid-block .small-block').addClass('two-grid-height');
//         $('.two-grid-block .small-block .block').addClass('primary3');
//         $('body .refresh19 .two-grid-block .two-grid-height').matchHeight();
//         $('body .refresh19 .two-grid-block .small-block .block').matchHeight();
//
//         limit_lines("body .refresh19 .two-grid-block .big-block .content p",2);
//
//     });
//
//     $(window).on("load resize", function () {
//         limit_lines("body .refresh19 .two-grid-block .big-block .content p",2);
//
//         $('body .refresh19 .two-grid-block .two-grid-height').matchHeight();
//         $('body .refresh19 .two-grid-block .small-block .block').matchHeight();
//
//         var SectionHeight = $("body .refresh19 .banner-multiview").height();
//         var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
//         var height =  SectionHeight - TotalHeight;
//         $("body .refresh19 .two-grid-block .content-wrapper").css('marginTop', - height + 'px'); // <-- set here
//     });
//
//
// })(jQuery);
