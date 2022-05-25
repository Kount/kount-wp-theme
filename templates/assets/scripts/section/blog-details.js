document.addEventListener('DOMContentLoaded', function(event) {

    var div;
    var div_top;
    var scroll_height;

    // alert(document.getElementsByClassName('sticky-wrapper').length);
    if(document.getElementsByClassName('sticky-wrapper') !== null && document.getElementsByClassName('sticky-wrapper').length) {
        // alert(document.getElementsByClassName('sticky-wrapper')[0]);
        div = document.getElementsByClassName('sticky-wrapper')[0];
        if (getBrowserWidth() >= 768) {
            // var stickyWrapper = document.getElementsByClassName('.blog-detail-sidebar .sticky-wrapper');
            // if(div_top) {
            div_top = getOffset(div).top;
            if (document.getElementsByClassName('blog-detail')) {
                // scroll_height =  $('.blog-detail').height() + 65;
                var blogDetail = document.getElementsByClassName('blog-detail')[0];
                scroll_height = getOffset(blogDetail).top + blogDetail.offsetHeight + 65;
            }
            // else if (getElementsByClassName('.blog-grid')) {
            //     var blogGrid = document.getElementsByClassName('.blog-grid')[0];
            //     scroll_height = getOffset(blogGrid).top + blogGrid.offsetHeight + 65;
            // }
            // }
        }

        document.addEventListener('scroll', function (e) {
            // alert(getBrowserWidth());
            if (getBrowserWidth() >= 768) {
                // console.log('make_sticky() called');
                make_sticky();
            }
        });
    }
    function setSubnavPipes() {
        //Set responsive pipes on blog subnav
        // console.log('subSubnavPipes');
        var listItems = document.querySelectorAll('.blog-subnav ul > li');
        if (listItems !== null && listItems.length) {
            // var listItems = querySelectorAll('.blog-subnav ul > li');
            var lastElement = false;

            for (var i = 0; i < listItems.length; ++i) {
                // console.log(listItems[i]);

                listItems[i].classList.remove('remove');
                if (lastElement && lastElement.offsetTop != listItems[i].offsetTop) {
                    lastElement.classList.add("remove");
                }
                // else {
                //     lastElement.removeClass("remove");
                // }
                lastElement = listItems[i];
            }
            lastElement.classList.add("remove");
        }
    }

    function resizedBlogWindow() {
        // console.log("RESIZE()")
        setSubnavPipes();

        window_W = getBrowserWidth();

        if(div && window_W < 768) {

            if (div.classList.contains('sticky') || div.classList.contains('botm_sticky')) {
                div.classList.remove('botm_sticky');
                div.classList.remove('sticky');
            }
        }
        else {
            make_sticky();
        }
    }

    var doit;
    window.addEventListener("resize", function() {
        clearTimeout(doit);
        doit = setTimeout(resizedBlogWindow, 100);
    });

    //Blog subnav links
    var subnavLinks = document.querySelectorAll('.blog-subnav a[href^="#"]');
    if(subnavLinks !== null && subnavLinks.length) {
        // console.log(links);
        for (i = 0; i < subnavLinks.length; ++i) {
            // console.log(links[i]);
            // for (var link of links) {
            subnavLinks[i].addEventListener("click", subnavClickHandler);
        }
        setSubnavPipes();
    }

    function subnavClickHandler(e) {
        e.preventDefault();

        if (this.hash !== "") {
            var hash = this.hash.substring(1);

            var scrollTopVal = (document.getElementById(hash).getBoundingClientRect().top + window.scrollY) - document.querySelector('header.k-19').clientHeight;
            // console.log('scrollTopVal = ' + scrollTopVal);

            window.scrollTo({top: scrollTopVal, behavior: 'smooth'});
        }
    }

    function make_sticky() {
        if(document.getElementsByClassName('sticky-wrapper') !== null && document.getElementsByClassName('sticky-wrapper').length) {

            var window_top = window.scrollY + 168;
            // console.log('window_top = ' + window_top);
            // console.log('div_top = ' + div_top);

            if (window_top > div_top) {
                div.classList.add('sticky');
            }
            if (window_top < div_top) {
                div.classList.remove('sticky');
            }
            if (div.classList.contains('sticky')) {

                //Fixes bug with botm_sticky not firing on longer pages.
                //Just get the scroll height again after scrolling for awhile.
                var blogDetail = document.getElementsByClassName('blog-detail')[0];
                if (scroll_height > blogDetail.offsetHeight) {
                    scroll_height = getOffset(blogDetail).top + blogDetail.offsetHeight + 65;
                }

                var div_bottom = window_top + document.getElementsByClassName('sticky')[0].offsetHeight;

                if (div_bottom > scroll_height) {
                    div.classList.add('botm_sticky');
                }

                if (div_bottom < scroll_height) {
                    div.classList.remove('botm_sticky');
                }
            }
        }
    }
    function isValidEmailAddress(emailAddress) {
        var regex = /[^@]+@[^@]+\.[a-zA-Z]{2,6}/;
        return regex.test(emailAddress);
    }

});
// (function ($) {
//
//     var div = $('.blog-detail-sidebar .sticky-wrapper');
//     var div_top;
//     var scroll_height;
//
//     var window_W = $(window).width();
//
//     function resizedWindow() {
//         window_W = $(window).width();
//
//         if(window_W < 768) {
//
//             if (div.hasClass('sticky') || div.hasClass('botm_sticky')) {
//                 div.removeClass('botm_sticky');
//                 div.removeClass('sticky');
//             }
//         }
//
//         else {
//             make_sticky();
//         }
//
//         //Set responsive pipes on blog subnav
//         $(".blog-subnav ul > li").removeClass('remove');
//         var lastElement = false;
//         $(".blog-subnav ul > li").each(function() {
//             if (lastElement && lastElement.offset().top != $(this).offset().top) {
//                 lastElement.addClass("remove");
//             }
//             // else {
//             //     lastElement.removeClass("remove");
//             // }
//             lastElement = $(this);
//         }).last().addClass("remove");
//
//     }
//
//     var doit;
//     window.onresize = function() {
//         clearTimeout(doit);
//         doit = setTimeout(resizedWindow, 100);
//     };
//
//
//     // $(window).on("load", function () {
//     // var email_info = $("body .refresh19 footer.k-19 .content-wrapper .fourth-block form.mktoForm .mktoFormRow .mktoFormCol .mktoFieldWrap .mktoHtmlText span");
//     // var dummy_form = $(".blog-detail .col-lg-3 .sticky-wrapper .subscribe form .email-info");
//     //
//     // dummy_form.text(email_info.text());
//     //
//     // });
//
//
//     $(window).on("load", function () {
//         if (div.length > 0 && window_W >= 768) {
//             div_top = $('.blog-detail-sidebar .sticky-wrapper').offset().top;
//             if($('.blog-detail').length) {
//                 // scroll_height =  $('.blog-detail').height() + 65;
//                 scroll_height = $('.blog-detail').offset().top + $('.blog-detail').height() + 65;
//             }
//             else if($('.blog-grid').length) {
//                 scroll_height = $('.blog-grid').offset().top + $('.blog-grid').height() + 65;
//             }
//         }
//         // console.log('div_top = ' + div_top);
//         // console.log('scroll_height = ' + scroll_height);
//     });
//
//     $(window).scroll(function() {
//
//         if (div.length > 0 && window_W >= 768) {
//             make_sticky();
//         }
//
//     });
//
//
//     function make_sticky() {
//
//         var window_top = $(window).scrollTop() + 168;
//
//         if (window_top > div_top) {
//             div.addClass('sticky');
//
//         }
//         if (window_top < div_top) {
//             div.removeClass('sticky');
//         }
//
//         if (div.hasClass('sticky')) {
//
//             //Fixes bug with botm_sticky not firing on longer pages.
//             //Just get the scroll height again after scrolling for awhile.
//             if(scroll_height > $('.blog-detail').height()) {
//                 scroll_height = $('.blog-detail').offset().top + $('.blog-detail').height() + 65;
//             }
//
//             var div_bottom = window_top + $('.blog-detail-sidebar .sticky-wrapper.sticky').height() ;
//
//             if (div_bottom > scroll_height) {
//                 div.addClass('botm_sticky');
//             }
//
//             if (div_bottom < scroll_height) {
//                 div.removeClass('botm_sticky');
//             }
//         }
//
//     }
//
//
//     //Smooth Scroll blog subnav
//     $('.blog-subnav a[href^="#"]').click(function(event) {
//         event.preventDefault();
//         // alert($(this.hash).offset().top);
//         // alert($('header.k-19').height());
//         var scrollTopVal = $(this.hash).offset().top - $('header.k-19').height();
//         $('html, body').animate(
//             {
//                 scrollTop: scrollTopVal,
//             },
//             400,
//             'linear'
//         );
//     });
//
//
// })(jQuery);