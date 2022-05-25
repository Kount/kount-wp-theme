// (function($) {
//   // sticky banner functionality
//   var banner = $(".banner-webinar");
//   if (window.location.pathname === "/webinar") {
//     var bannerOffsetTop = $(".banner-webinar").offset().top + 200;
//   }
//   function stickyBanner() {
//     $(window).on("scroll", function() {
//       var winScroll = $(window).scrollTop();
//       if (window.matchMedia("(min-width: 1025px)").matches) {
//         if (winScroll > bannerOffsetTop) {
//           banner.addClass("sticky");
//           $(".featuring").css({
//             marginTop: "500px"
//           });
//         } else {
//           banner.removeClass("sticky");
//           $(".featuring").css({
//             marginTop: "0"
//           });
//         }
//       }
//     });
//   }
//
//   $(document).ready(function() {
//     stickyBanner();
//   });
//   $(window).on("resize", function() {
//     stickyBanner();
//   });
//
//   // for input val null on document ready on firefox
//   $(document).ready(function() {
//     $(".banner-webinar .content-wrap .form-wrap .input-wrap input").val("");
//   });
// })(jQuery);
