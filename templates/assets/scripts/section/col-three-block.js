// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//   function close_overlay() {
//     $('.col-three-block .inner-overlay').removeClass('active');
//
//     setTimeout(function () {
//       $('.col-three-block .inner-overlay').removeClass('green-overlay cyan-overlay blue-overlay orange-overlay light-green-overlay dark-blue-overlay ');
//       $('body .refresh19 .col-three-block .inner-overlay .overlay-wrap').empty();
//     }, 300);
//     $('.col-three-block').removeClass('inner-overlay-active');
//     $('.col-three-block .column-wrapper').css({"margin-bottom" : 0 + 'px'});
//   }
//
//   function slider_init() {
//     $('body .refresh19 .col-three-block .inner-overlay .slider-wrap .slider').slick({
//       arrows: true,
//       slidesToShow: 1,
//       speed: 800,
//       infinite: true,
//       draggable: false,
//       dots: false,
//     });
//   }
//
//   function set_Space() {
//     var overlayHeight = $('.col-three-block .inner-overlay').outerHeight();
//     var introHeight = $('.col-three-block .intro-block').outerHeight();
//     var columnHeight = $('.col-three-block .column-wrapper').outerHeight();
//     var total = introHeight + columnHeight;
//     var ratio =  overlayHeight - total;
//     $('.col-three-block .column-wrapper').css({"margin-bottom" : ratio + 'px'});
//   }
//
//   $(document).ready(function () {
//
//     // $('body .refresh19 .col-three-block .column-wrapper .col-three').sameHeight();
//     // $(window).on("resize", function () {
//     //   $('body .refresh19 .col-three-block .column-wrapper .col-three').sameHeight();
//     // });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-sky-blue').on("click", function (e) {
//       e.stopPropagation();
//
//       $('.col-three-block .inner-overlay').removeClass('green-overlay');
//       $('.col-three-block .inner-overlay').addClass('blue-overlay active');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-cyan').on("click", function (e) {
//       e.stopPropagation();
//
//       $('.col-three-block .inner-overlay').addClass('cyan-overlay active').removeClass('green-overlay');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-green').on("click", function (e) {
//       e.stopPropagation();
//       $('.col-three-block .inner-overlay').addClass('green-overlay active');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-orange').on("click", function (e) {
//       e.stopPropagation();
//       $('.col-three-block .inner-overlay').addClass('orange-overlay active');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-light-green').on("click", function (e) {
//       e.stopPropagation();
//       $('.col-three-block .inner-overlay').addClass('light-green-overlay active');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//     $('body .refresh19 .col-three-block .column-wrapper .col-three.text-dark-blue').on("click", function (e) {
//       e.stopPropagation();
//       $('.col-three-block .inner-overlay').addClass('dark-blue-overlay active');
//
//       $('.col-three-block').addClass('inner-overlay-active');
//       $(this).find('.content-wrap').clone().appendTo('body .refresh19 .col-three-block .inner-overlay .overlay-wrap');
//
//       slider_init();
//       set_Space();
//     });
//
//
//
//     $('.col-three-block .inner-overlay .close-overlay').on("click", function () {
//       close_overlay();
//     });
//
//     $('.col-three-block .inner-overlay').on("click", function (e) {
//       e.stopPropagation();
//     });
//
//   });
//   $(document).on("click", function () {
//     close_overlay();
//   });
//
// })(jQuery);