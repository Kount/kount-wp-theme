document.addEventListener('DOMContentLoaded', function(event) {
    var videoGridDetails = document.querySelectorAll('.video-col-grid .content-wrapper .col-wrapper .content-wrap .text-wrap .more-details');
    if(videoGridDetails !== null) {
        for (i = 0; i < videoGridDetails.length; ++i) {
            videoGridDetails[i].addEventListener('click', function (e) {
                e.preventDefault();
                var contentWrappers = document.querySelectorAll('.video-col-grid .content-wrapper');
                for (j = 0; j < contentWrappers.length; ++j) {
                    contentWrappers[j].classList.remove('active');
                }
                var box = this.parentElement.offsetTop;
                var Total_height = document.querySelector('header').clientHeight;
                if (getBrowserWidth() < 767) {
                    var Total_height = Total_height + 24;
                }
                var window_top = window.scrollY + Total_height;
                if (window_top > box) {

                    if (getBrowserWidth() > 767) {
                        window.scrollTo({top: box - Total_height - 15, behavior: 'smooth'});
                        // $('html, body').animate({
                        //     scrollTop: box - Total_height - 15
                        // }, 500);
                    }

                    if (getBrowserWidth() <= 767) {
                        // $('html, body').animate({
                        //     scrollTop: box - Total_height
                        // }, 500);
                        window.scrollTo({top: box - Total_height, behavior: 'smooth'});
                    }
                }
                this.parentElement.addClass('active');
            });
        }
    }
    // $('.video-col-grid .content-wrapper .detail-box .close').on("click", function (e) {
    //     e.preventDefault();
    //     $(this).parents('.content-wrapper').removeClass('active');
    // });
    var videoGridDetails = document.querySelectorAll('.video-col-grid .content-wrapper .col-wrapper .content-wrap .text-wrap .more-details');
    if(videoGridDetails !== null) {
        for (j = 0; j < videoGridDetails.length; ++j) {
            videoGridDetails[j].addEventListener('click', function (e) {
                e.preventDefault();
                this.parentElement.classList.remove('active');
            });
        }
    }
});

// (function ($) {
//
// $('.video-col-grid .content-wrapper .col-wrapper .content-wrap .text-wrap .more-details').on("click", function (e) {
//     e.preventDefault();
//     $('.video-col-grid .content-wrapper').removeClass('active');
//     var box = $(this).parents('.content-wrapper').offset().top;
//     var Total_height = $('header').height();
//     if ($(window).width() < 767) {
//         var Total_height = Total_height +24;
//     }
//     var window_top = $(window).scrollTop()+ Total_height ;
//     if (window_top > box){
//
//         if ($(window).width() > 767) {
//             $('html, body').animate({
//                 scrollTop: box - Total_height - 15
//             }, 500);
//         }
//
//         if ($(window).width() < 767) {
//             $('html, body').animate({
//                 scrollTop: box - Total_height
//             }, 500);
//         }
// }
//     $(this).parents('.content-wrapper').addClass('active');
// });
//
// $('.video-col-grid .content-wrapper .detail-box .close').on("click", function (e) {
//     e.preventDefault();
//     $(this).parents('.content-wrapper').removeClass('active');
// });
//
// })(jQuery);
