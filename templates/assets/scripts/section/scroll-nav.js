document.addEventListener('DOMContentLoaded', function(event) {

    // if($('.scroll-nav').length > 0 ) {
    //     var nav_top = $('body .refresh19 .scroll-nav').offset().top;
    // }
    var links = document.querySelectorAll(".scroll-nav .scroll-wrap a[href^=\"#\"]");
    // console.log(links);

    for (i = 0; i < links.length; ++i) {
        // for (var link of links) {
        links[i].addEventListener("click", clickHandler);
    }

    function clickHandler(e) {
        e.preventDefault();
        var href = this.getAttribute("href");
        // alert(href);
        // const id = 'profilePhoto';
        var yOffset = -80;
        var element = document.getElementById(href.substr(1));
        var y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

        window.scrollTo({top: y, behavior: 'smooth'});

        // document.querySelector(href).scrollIntoView({
        //   behavior: "smooth"
        // });
    }
});


// (function ($) {
    // if($('.scroll-nav').length > 0 ) {
    //     var nav_top = $('body .refresh19 .scroll-nav').offset().top;
    // }
    // $(document).ready(function () {
    //     mobile();
    //     sectionUrl();
    //     var window_width = $(window).width();
    //     if (window_width <= 767) {
    //         if($('body .refresh19 .scroll-nav .navigation.mobile .scroll-wrap').hasClass('hide')){
    //             $('body .refresh19 .scroll-nav .navigation.mobile .scroll-wrap').removeClass('hide');
    //         }
    //     }
    //     $('[data-scroll]').on('click', scrollToSection);
    // });
    // $(window).resize(function () {
    //     mobile();
    // });
    // function mobile() {
    //     var window_width = $(window).width();
    //     if (window_width <= 767) {
    //         $(document).on("click", function (e) {
    //             var target = $(e.target);
    //             if (!target.is('body .refresh19 .scroll-nav .navigation.mobile button span')) {
    //                 var $thisClass = $('body .refresh19 .scroll-nav .navigation.mobile .scroll-wrap').hasClass('hide');
    //                 if ($thisClass) {
    //                     $('body .refresh19 .scroll-nav .navigation.mobile button').removeClass('rotate');
    //                     $('body .refresh19 .scroll-nav .navigation.mobile .scroll-wrap').removeClass('hide');
    //                 }
    //             }
    //         });
    //         $('body .refresh19 .scroll-nav .navigation button span').show();
    //         $('body .refresh19 .scroll-nav .navigation').addClass('mobile');
    //         $('body .refresh19 .scroll-nav .navigation.mobile button span').unbind().click(function () {
    //             $('body .refresh19 .scroll-nav .navigation.mobile .scroll-wrap').toggleClass('hide');
    //             $('body .refresh19 .scroll-nav .navigation.mobile button').toggleClass('rotate');
    //         });
    //     }
    //     else {
    //         $('body .refresh19 .scroll-nav .navigation button span').hide();
    //         $('body .refresh19 .scroll-nav .navigation').removeClass('mobile');
    //     }
    // }
    // function scrollToSection(event) {
    //     event.preventDefault();
    //     var $section = $($(this).attr('href'));
    //     var Total_height = $('header').outerHeight();
    //     var value = $(this).html();
    //     $('body .refresh19 .scroll-nav .outer-wrap .navigation.mobile button span').html(value);
    //     $('html, body').animate({
    //         scrollTop: $section.offset().top - Total_height
    //     }, 500);
    // }
    // function sectionUrl(){
    //         var hash = window.location.hash;
    //         var target = $(hash);
    //         var Total_height = $('header').outerHeight();
    //         target = target.length ? target : $("[name=' + hash.substr(1) + ']");
    //         if (target.length > 0) {
    //             $('html').animate({
    //                 scrollTop: target.offset().top - Total_height
    //             }, 500);
    //         }
    // }
// }(jQuery));