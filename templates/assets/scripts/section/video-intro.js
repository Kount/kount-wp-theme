// (function ($) {
//     $(document).ready(function () {
//       truncate_lines('.video-intro .truncate-ellipses', 3, '.video-intro .see-more');
//
//       // Code for changing state for Read less and Read more
//
//         $(".transcript .content-wrap .link-arrow").on("click", function() {
//             var el = $(this);
//             el.text() == el.data("text-swap")
//                 ? el.text(el.data("text"))
//                 : el.text(el.data("text-swap"));
//             $('.transcript .content-wrap .link-arrow').toggleClass('active');
//         });
//        //for spacing between p
//         $(".video-intro .content-wrap .link-arrow").on("click", function() {
//            if($('.video-intro .content-wrap .link-arrow').hasClass('close-it')){
//               $('.video-intro .content-wrap .content').addClass('space');
//            }
//            else{
//               $('.video-intro .content-wrap .content').removeClass('space');
//            }
//         });
//
//         //code for transcript blade on video page
//         //don;t delete until client review html to-do ******IMPORTANT*******
//         $(".transcript .content-wrap .link-arrow").on("click", function() {
//             $('.transcript .content-wrap .content').toggleClass('active');
//
//         });
//
//     });
//
// })(jQuery);