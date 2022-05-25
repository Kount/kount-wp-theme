document.addEventListener('DOMContentLoaded', function(e) {

    if(document.querySelector('.tab-content-grid') !== null) {
        var SectionHeight = document.querySelector("body .refresh19 .banner-multiview").clientHeight;
        var TotalHeight = document.querySelector("body .refresh19 .banner-multiview .intro-block").clientHeight;
        var height = SectionHeight - TotalHeight;
        document.querySelector("body .refresh19 .tab-content-grid .tabs-wrap").style.marginTop = '-' + height + 'px';

        var doit;
        window.onresize = function () {
            clearTimeout(doit);
            doit = setTimeout(resizedWindow, 100);
        };

        function resizedWindow() {
            var SectionHeight = document.querySelector("body .refresh19 .banner-multiview").clientHeight;
            var TotalHeight = document.querySelector("body .refresh19 .banner-multiview .intro-block").clientHeight;
            var height = SectionHeight - TotalHeight;
            document.querySelector("body .refresh19 .tab-content-grid .tabs-wrap").style.marginTop = '-' + height + 'px';
        }

        // window.addEventListener('resize', function() {
        //     var SectionHeight = document.querySelector("body .refresh19 .banner-multiview").clientHeight;
        //     var TotalHeight = document.querySelector("body .refresh19 .banner-multiview .intro-block").clientHeight;
        //     var height = SectionHeight - TotalHeight;
        //     document.querySelector("body .refresh19 .tab-content-grid .tabs-wrap").style.marginTop = -height + 'px';
        // });

        if (getBrowserWidth() > 767) {
            var navLinks = document.querySelectorAll('.tab-content-grid .nav-pills li a');
            for (i = 0; i < navLinks.length; ++i) {
                navLinks[i].addEventListener('mouseover', function (e) {
                    // navLinks[i].classList.remove('active');
                    var tab_id = this.dataset.tab;

                    this.classList.remove('active');

                    var tabPanes = document.querySelectorAll('.tab-content-outer .feature-content .tab-pane');
                    for (y = 0; y < tabPanes.length; ++y) {
                        tabPanes[y].classList.remove('active', 'show');
                    }
                    //document.querySelector('.tab-content-grid .tab-content-outer .feature-content .tab-pane').classList.remove('active', 'show');

                    this.classList.add('active');
                    document.getElementById(tab_id).classList.add('active', 'show');

                    for (j = 0; j < navLinks.length; ++j) {
                        navLinks[j].parentElement.classList.remove('active');
                    }
                    if (this.classList.contains('active')) {
                        //this.parentElement.classList.remove('active');
                        this.parentElement.classList.add('active');
                    }
                });
            }
        }

        document.querySelector('.tab-content-grid .tab-list .tab-panel-outer .private-toggle').addEventListener('click', function (event) {
            event.stopPropagation();
            // alert('click');
            var linkList = document.querySelector('.tab-content-grid .tab-list .tab-panel-outer ul');
            linkList.classList.toggle('show-menu');

            var caret = document.querySelector(".tab-content-grid .tab-list .tab-panel-outer .caret");
            caret.classList.toggle('closeup');
        });

        var outerLinks = document.querySelectorAll('.tab-panel-outer > ul > li > a');
        for (k = 0; k < outerLinks.length; ++k) {

            outerLinks[k].addEventListener('click', function () {
                //index() equivalent
//                var index = Array.from(this.parentElement.children).indexOf(this);
                var index = Array.prototype.indexOf.call(this.parentNode.children, this);

                //var index = $(this).index();

                var thisText = this.textContent;
                var tab_id = this.dataset.tab;
                console.log('thisText = ' + thisText);
                // while ((element = element.parentElement)) {
                //     if (element.matches('.className')) {
                //         result.push(element)
                //     }
                // }

                for (x = 0; x < outerLinks.length; ++x) {
                    outerLinks[x].classList.remove('active');
                }

                var tabPanes = document.querySelectorAll('.tab-content-outer .feature-content .tab-pane');
                for (y = 0; y < tabPanes.length; ++y) {
                    tabPanes[y].classList.remove('active', 'show');
                }

                // $(this).parents('ul').find('li > a').removeClass('active');
                // $(this).parents('.tabs-wrap').find('.tab-content-outer .feature-content .tab-pane').removeClass('active');
                var responsiveTabs = document.querySelectorAll('.tab-content-grid .responsive-tab li a');
                for (z = 0; z < responsiveTabs.length; ++z) {
                    responsiveTabs[z].classList.remove('active');
                }


                // $('.tab-content-grid .responsive-tab li a').removeClass('active');
                this.classList.add('active');
                // $('.tab-content-outer .feature-content .tab-pane').removeClass('active show');
                document.getElementById(tab_id).classList.add('active', 'show');
                // document.querySelector('.tab-content-outer .feature-content .tab-pane:eq(' + index + ')').classList.add('active');

                //change text of filter
                document.querySelector(".tab-content-grid .tab-list .tab-panel-outer .text").textContent = thisText;

                if (getBrowserWidth() <= 767) {
                    // $('.tab-content-grid .tab-list .tab-panel-outer ul').stop(true, true).slideUp();
                    document.querySelector('.tab-content-grid .tab-list .tab-panel-outer ul').classList.remove('show-menu');
                    document.querySelector(".tab-content-grid .tab-list .tab-panel-outer .caret").classList.remove("closeup");
                }

            });

            var tabList = document.querySelectorAll('.tab-panel-outer > ul > li > a');
            for (a = 0; a < tabList.length; ++a) {
                tabList[a].addEventListener('click', function () {
                    // alert("HEY");
                    var index = Array.prototype.indexOf.call(this.parentNode.children, this);

                    //var index = Array.from(this.parentNode.children).indexOf(this);
                    var thisText = this.textContent;
                    var tab_id = this.dataset.tab;
                    //START HERE!!!!
                    for (b = 0; b < tabList.length; ++b) {
                        tabList[b].classList.remove('active');
                    }
                    // $(this).parents('ul').find('li > a').removeClass('active');
                    var tabPanes = document.querySelectorAll('.tab-content-outer .feature-content .tab-pane');
                    for (y = 0; y < tabPanes.length; ++y) {
                        tabPanes[y].classList.remove('active', 'show');
                    }

                    var responsiveTabs = document.querySelectorAll('.tab-content-grid .responsive-tab li a');
                    for (z = 0; z < responsiveTabs.length; ++z) {
                        responsiveTabs[z].classList.remove('active');
                    }

                    this.classList.add('active');
                    // $('.tab-content-outer .feature-content .tab-pane').removeClass('active show');
                    document.getElementById(tab_id).classList.add('active', 'show');
                    // document.querySelector('.tab-content-outer .feature-content .tab-pane:eq(' + index + ')').classList.add('active');

                    //change text of filter
                    document.querySelector(".tab-content-grid .tab-list .tab-panel-outer .text").textContent = thisText;

                    // var windowWidth = $(window).width();
                    if (getBrowserWidth() <= 767) {
                        document.querySelector('.tab-content-grid .tab-list .tab-panel-outer ul').classList.remove('show-menu');
                        document.querySelector(".tab-content-grid .tab-list .tab-panel-outer .caret").classList.remove("closeup");
                    }
                });
            }
        }
        // $(window).on("load resize", function () {
        //     var windowWidth;
        //     windowWidth = $(window).width();
        //     if (windowWidth > 767) {
        //         $(".tab-content-grid .tab-list .tab-panel-outer ul").removeAttr("style");
        //         $(".tab-content-grid .tab-list .tab-panel-outer .caret").removeClass("closeup");
        //     }
        // });

    }
});

// // Use $ instead of jQuery without replacing global $
// (function ($) {
    // $(document).ready(function () {
    //     // $('.tab-content-grid .tabs-wrap .grid').matchHeight();
    //
    //     // code for setting spacing from top for section
    //
    //     var SectionHeight = $("body .refresh19 .banner-multiview").height();
    //     var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
    //     var height = SectionHeight - TotalHeight;
    //     $("body .refresh19 .tab-content-grid .tabs-wrap").css('marginTop', - height + 'px'); // <-- set here
    //
    //     var doit;
    //     window.onresize = function() {
    //         clearTimeout(doit);
    //         doit = setTimeout(resizedWindow, 100);
    //     };
    //
    //     function resizedWindow() {
    //         var SectionHeight = $("body .refresh19 .banner-multiview").height();
    //         var TotalHeight = $("body .refresh19 .banner-multiview .intro-block").outerHeight();
    //         var height = SectionHeight - TotalHeight;
    //         $("body .refresh19 .tab-content-grid .tabs-wrap").css('marginTop', - height + 'px'); // <-- set here
    //     }
    //
    //     // code for tabs changing content on hover and mobile dropdown
    //
    //     var windowWidth = $(window).width();
    //     if (windowWidth > 767) {
    //         $('.tab-content-grid .nav-pills li a').mouseover(function (e) {
    //             var tab_id = $(this).attr('data-tab');
    //
    //             $('.tab-content-grid .nav-pills li a').removeClass('active');
    //             $('.tab-content-grid .tab-content-outer .feature-content .tab-pane').removeClass('active show');
    //
    //             $(this).addClass('active');
    //             $("#" + tab_id).addClass('active show');
    //
    //             if ($(this).hasClass('active')) {
    //                 $('.tab-content-grid .nav-pills li').removeClass('active');
    //                 $(this).parent('li').addClass('active')
    //             }
    //         });
    //     }
    //
    //
    //
    //     $(document).on('click', '.tab-content-grid .tab-list .tab-panel-outer .private-toggle', function (event) {
    //         event.stopPropagation();
    //         $('.tab-content-grid .tab-list .tab-panel-outer ul').stop(true, true).slideToggle();
    //         $(".tab-content-grid .tab-list .tab-panel-outer .caret").toggleClass("closeup");
    //     });
    //
    //     $('.tab-content-grid .tab-list').on('click touch', '.tab-panel-outer > ul > li > a', function () {
    //         var index = $(this).index();
    //         var $thisText = $(this).text();
    //         var tab_id = $(this).attr('data-tab');
    //
    //         $(this).parents('ul').find('li > a').removeClass('active');
    //         $(this).parents('.tabs-wrap').find('.tab-content-outer .feature-content .tab-pane').removeClass('active');
    //
    //         $('.tab-content-grid .responsive-tab li a').removeClass('active');
    //         $(this).addClass('active');
    //         $('.tab-content-outer .feature-content .tab-pane').removeClass('active show');
    //         $("#" + tab_id).addClass('active show');
    //         $(this).parents('.tabs-wrap').find('.tab-content-outer .feature-content .tab-pane:eq(' + index + ')').addClass('active');
    //
    //         //change text of filter
    //         $(".tab-content-grid .tab-list .tab-panel-outer .text").text($thisText);
    //
    //         var windowWidth = $(window).width();
    //         if (windowWidth <= 767) {
    //             $('.tab-content-grid .tab-list .tab-panel-outer ul').stop(true, true).slideUp();
    //             $(".tab-content-grid .tab-list .tab-panel-outer .caret").removeClass("closeup");
    //
    //         }
    //
    //     });
    //
    //
    //     $(document).click(function (event) {
    //         event.stopPropagation();
    //         var windowWidth = $(window).width();
    //         if (windowWidth <= 767) {
    //             $(".tab-content-grid .tab-list .tab-panel-outer .caret").removeClass("closeup");
    //             $('.tab-content-grid .tab-list .tab-panel-outer ul').slideUp();
    //
    //         }
    //     });
    //
    //     var winWidth = $(window).width();
    //     if (winWidth <= 767) {
    //         $('.tab-content-grid .tab-list .tab-panel-outer > ul > li > a').on('click',function () {
    //             var tabHeight = $('.tab-content-grid .tabs-wrap .tab-content-outer .feature-content .tab-pane.show').outerHeight();
    //             $('.tab-content-grid .tabs-wrap .tab-content-outer').css({'height': tabHeight});
    //         });
    //     } else {
    //         $('.tab-content-grid .tabs-wrap .tab-content-outer').removeAttr('style');
    //     }
    // });
    //
    // // $(window).on("load resize", function () {
    // //     var winWidth = $(window).width();
    // //     var tabHeight = $('.tab-content-grid .tabs-wrap .tab-content-outer .feature-content .tab-pane.show').outerHeight();
    // //
    // //     if (winWidth <= 767) {
    // //         $('.tab-content-grid .tabs-wrap .tab-content-outer').css({'height': tabHeight});
    // //     } else {
    // //         $('.tab-content-grid .tabs-wrap .tab-content-outer').removeAttr('style');
    // //     }
    // //
    // //     $('.tabs .tab-list .tab-panel-outer .responsive-tab li ').on('click', function (e) {
    // //         var tabHeight = $('.tabs .tabs-wrap .tab-content-outer .feature-content .tab-pane').outerHeight();
    // //         $('.tabs .tabs-wrap .tab-content-outer').css({'height': tabHeight});
    // //     });
    // // });
    //
    // //On load function
    // $(window).on("load resize", function () {
    //     var windowWidth;
    //     windowWidth = $(window).width();
    //     if (windowWidth > 767) {
    //         $(".tab-content-grid .tab-list .tab-panel-outer ul").removeAttr("style");
    //         $(".tab-content-grid .tab-list .tab-panel-outer .caret").removeClass("closeup");
    //     }
    // });

// })(jQuery);