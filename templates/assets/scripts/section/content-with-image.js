// document.addEventListener('DOMContentLoaded', function(event) {
//
// });

// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//   function setTriangle() {
//
//     var weHeight = $('body .refresh19 .content-with-image .content-wrapper:last-child').outerHeight();
//
//     var imgWidth = $('body .refresh19 .content-with-image .content-wrapper .col-two .image .img-box img').width();
//     var imgHeight = $('body .refresh19 .content-with-image .content-wrapper .col-two .image .img-box img').height();
//     var $height = $('body .refresh19 .content-with-image .container').height();
//     var total = imgWidth - 40;
//     var totalHeight = $height - weHeight;
//     $('body .refresh19 .content-with-image .triangle-wrap').css({
//       "width": total + "px",
//       "height": totalHeight + "px",
//       "top": imgHeight + "px"
//     });
//   }
//
//   $(document).ready(function () {
//     // truncate_lines('body .refresh19 .content-with-image .content-wrapper .col-two .content .truncate-ellipses', 3, '.content-with-image .see-more');
//
//     $('body .refresh19 .content-with-image .content-wrapper .col-two .content .link').on("click", function (event) {
//       event.preventDefault();
//     });
//
//     setTriangle();
//   });
//
//   $(window).on("load scroll", function () {
//     setTriangle();
//   }).resize();
// })(jQuery);
