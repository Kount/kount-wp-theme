// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//   var myColors = [
//     'text-dark-blue', 'text-light-blue', 'text-orange', 'text-green', 'text-light-green',
//   ];
//   var i = 0;
//   $('.career-grid .col-three, .blog-grid .col-three, .events-card-grid .col-three').each(function () {
//     $(this).find('h5').addClass(myColors[i]);
//     i = (i + 1) % myColors.length;
//   });
//
//
//   $(document).ready(function () {
//       limit_lines("body .refresh19 .three-col-grid .card-wrapper .col-three .content-wrapper .bottom-content p",10);
//
//     var count = 0.5;
//     $('.three-col-grid .card-wrapper .col-three').each(function (i) {
//       $(this).attr('data-wow-delay', count + 's');
//       count = count + 0.1;
//
//     });
//
//   });
//     $(window).on("load resize", function () {
//         limit_lines("body .refresh19 .three-col-grid .card-wrapper .col-three .content-wrapper .bottom-content p",10);
//         // $(".three-col-grid .card-wrapper .col-three").matchHeight();
//     });
//
// })(jQuery);
