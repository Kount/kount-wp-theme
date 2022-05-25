document.addEventListener('DOMContentLoaded', function(event) {
  if(document.querySelector(".channel-content-with-form #term-btn") !== null) {

    document.querySelector(".channel-content-with-form #term-btn").addEventListener('click', function () {
      document.querySelector('.rich-text-editor').classList.add('open-overlay');

    });
    document.querySelector("body .refresh19 .rich-text-editor.open-overlay .Terms-overlay .content-wrap .close").addEventListener('click', function () {
      document.querySelector('.rich-text-editor').classList.remove('open-overlay');
    });
  }

});

// // Use $ instead of jQuery without replacing global $
// (function ($) {
//     $(".channel-content-with-form #term-btn").on('click' , function () {
//                $('.rich-text-editor').addClass('open-overlay');
//
//            });
//            $(document).on('click', "body .refresh19 .rich-text-editor.open-overlay .Terms-overlay .content-wrap .close", function () {
//                $('.rich-text-editor').removeClass('open-overlay');
//            });
//
// })(jQuery);
