document.addEventListener( 'DOMContentLoaded', function () {
  if(document.querySelector('.feature-tabs') !== null) {
    var navLinks = document.querySelectorAll('.feature-tabs .nav-pills li a');
    for (i = 0; i < navLinks.length; ++i) {
      navLinks[i].addEventListener('click', function (e) {
        e.preventDefault();
        // navLinks[i].classList.remove('active');
        var tab_id = this.dataset.tab;
        console.log('tab_id = ' + tab_id);
        // var navLinks = document.querySelectorAll('.tab-content-outer .tab-content .tab-pane');
        for (y = 0; y < navLinks.length; ++y) {
          navLinks[y].parentElement.classList.remove('active');
        }

        var tabPanes = document.querySelectorAll('.tab-content-outer .tab-content .tab-pane');
        for (z = 0; z < tabPanes.length; ++z) {
          tabPanes[z].classList.remove('active', 'show');
        }

        this.parentElement.classList.add('active');

        // var tabPanes = document.querySelectorAll('.tab-content-outer .tab-content .tab-pane');
        // for (y = 0; y < tabPanes.length; ++y) {
        //   tabPanes[y].classList.remove('active', 'show');
        // }

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


    document.querySelector('.feature-tabs .tab-list .tab-panel-outer .private-toggle').addEventListener('click', function (event) {
      event.stopPropagation();
      var linkList = document.querySelector('.feature-tabs .tab-list .tab-panel-outer ul');
      linkList.classList.toggle('show-menu');

      var caret = document.querySelector(".feature-tabs .tab-list .tab-panel-outer .caret");
      caret.classList.toggle('closeup');
    });

    var outerLinks = document.querySelectorAll('.tab-panel-outer > ul > li > a');
    for (k = 0; k < outerLinks.length; ++k) {

      outerLinks[k].addEventListener('click', function (event) {
        event.preventDefault();
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
        var responsiveTabs = document.querySelectorAll('.feature-tabs .responsive-tab li a');
        for (z = 0; z < responsiveTabs.length; ++z) {
          responsiveTabs[z].classList.remove('active');
        }


        // $('.tab-content-grid .responsive-tab li a').removeClass('active');
        this.classList.add('active');
        // $('.tab-content-outer .feature-content .tab-pane').removeClass('active show');
        document.getElementById(tab_id).classList.add('active', 'show');
        // document.querySelector('.tab-content-outer .feature-content .tab-pane:eq(' + index + ')').classList.add('active');

        //change text of filter
        document.querySelector(".feature-tabs .tab-list .tab-panel-outer .text").textContent = thisText;

        if (getBrowserWidth() <= 767) {
          // $('.tab-content-grid .tab-list .tab-panel-outer ul').stop(true, true).slideUp();
          document.querySelector('.feature-tabs .tab-list .tab-panel-outer ul').classList.remove('show-menu');
          document.querySelector(".feature-tabs .tab-list .tab-panel-outer .caret").classList.remove("closeup");
        }

      });

      var tabList = document.querySelectorAll('.feature-tabs .tab-list .tab-panel-outer > ul > li > a');
      for (a = 0; a < tabList.length; ++a) {
        tabList[a].addEventListener('click', function (event) {
          event.preventDefault();
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

          var responsiveTabs = document.querySelectorAll('.feature-tabs .responsive-tab li a');
          for (z = 0; z < responsiveTabs.length; ++z) {
            responsiveTabs[z].classList.remove('active');
          }

          this.classList.add('active');
          // $('.tab-content-outer .feature-content .tab-pane').removeClass('active show');
          document.getElementById(tab_id).classList.add('active', 'show');
          // document.querySelector('.tab-content-outer .feature-content .tab-pane:eq(' + index + ')').classList.add('active');

          //change text of filter
          document.querySelector(".feature-tabs .tab-list .tab-panel-outer .text").textContent = thisText;

          // var windowWidth = $(window).width();
          if (getBrowserWidth() <= 767) {
            document.querySelector('.feature-tabs .tab-list .tab-panel-outer ul').classList.remove('show-menu');
            document.querySelector(".feature-tabs .tab-list .tab-panel-outer .caret").classList.remove("closeup");
          }
        });
      }
      // document.querySelector(".feature-tabs .tabs-wrap .tab-list .tab-panel-outer .responsive-title").innerHTML = document.querySelector(".feature-tabs .tabs-wrap .tab-list ul li p").textContent;

      document.addEventListener('click', function (event) {
          event.stopPropagation();
          if (getBrowserWidth() <= 767) {
            document.querySelector('.feature-tabs .tab-list .tab-panel-outer ul').classList.remove('show-menu');
            document.querySelector(".feature-tabs .tab-list .tab-panel-outer .caret").classList.remove("closeup");
          }
      });

    }
    function setStyles() {
      if (getBrowserWidth() > 767) {
        // $(".feature-tabs .tab-list .tab-panel-outer ul").removeAttr("style");
        document.querySelector(".feature-tabs .tab-list .tab-panel-outer .caret").classList.remove("closeup");
      }

      var tabHeight = document.querySelector('.feature-tabs .tabs-wrap .tab-content-outer .tab-content .tab-pane.show').clientHeight;

      if (getBrowserWidth() <= 767) {
        document.querySelector('.feature-tabs .tabs-wrap .tab-content-outer').style.height = tabHeight;
      }
      else {
        document.querySelector('.feature-tabs .tabs-wrap .tab-content-outer').style.height = "";
      }

    }
    setStyles();
    var doit;
    window.onresize = function () {
      clearTimeout(doit);
      doit = setTimeout(setStyles, 100);
    };

  }
});

// // Use $ instead of $ without replacing global $
// (function ($) {
//
//     // tabs function
//
//
//     $(document).ready(function () {
//
//         $('.feature-tabs .nav-pills li a').on('click', function (e) {
//             e.preventDefault();
//             var tab_id = $(this).attr('data-tab');
//
//             $('.feature-tabs .nav-pills li a').removeClass('active');
//             $('.feature-tabs .tab-content-outer .tab-content .tab-pane').removeClass('active show');
//
//             $(this).addClass('active');
//             $("#" + tab_id).addClass('active show');
//
//             if ($(this).hasClass('active')) {
//                 $('.feature-tabs .nav-pills li').removeClass('active');
//                 $(this).parent('li').addClass('active')
//             }
//         });
//
//         $(document).on('click', '.feature-tabs .tab-list .tab-panel-outer .private-toggle', function (event) {
//             event.stopPropagation();
//             $('.feature-tabs .tabs-wrap .tab-list .tab-panel-outer ul').slideToggle();
//             $(".feature-tabs .tabs-wrap .tab-list .tab-panel-outer button span.caret").toggleClass("closeup");
//         });
//
//
//         $(document).on('click', '.feature-tabs .tab-list .tab-panel-outer > ul > li > a', function (e) {
//             e.preventDefault();
//             var index = $(this).index();
//             var $thisText = $(this).text();
//             var tab_id = $(this).attr('data-tab');
//
//             $(this).parents('ul').find('li > a').removeClass('active');
//             $(this).parents('.tabs-wrap').find('.tab-content-outer .tab-content .tab-pane').removeClass('active');
//
//             $('.feature-tabs .responsive-tab li a').removeClass('active');
//             $(this).addClass('active');
//             $('.feature-tabs .tab-content-outer .tab-content .tab-pane').removeClass('active show');
//             $("#" + tab_id).addClass('active show');
//             $(this).parents('.tabs-wrap').find('.feature-tabs .tab-content-outer .tab-content .tab-pane:eq(' + index + ')').addClass('active');
//
//             //change text of filter
//             $(".feature-tabs .tab-list .tab-panel-outer .text").text($thisText);
//
//
//             var windowWidth = $(window).width();
//             if (windowWidth <= 767) {
//                 $('.feature-tabs .tab-list .tab-panel-outer ul').stop(true, true).slideUp();
//                 $(".feature-tabs .tab-list .tab-panel-outer .caret").removeClass("closeup");
//
//             }
//
//         });
//
//         // $(".feature-tabs .tabs-wrap").matchHeight();
//         $(".feature-tabs .tabs-wrap .tab-list .tab-panel-outer .responsive-title").html($(".feature-tabs .tabs-wrap .tab-list ul li p").text());
//
//         $(document).click(function (event) {
//             event.stopPropagation();
//             var windowWidth = $(window).width();
//             if (windowWidth <= 767) {
//                 $(".feature-tabs .tab-list .tab-panel-outer .caret").removeClass("closeup");
//                 $('.feature-tabs .tab-list .tab-panel-outer ul').slideUp();
//
//             }
//         });
//
//         var winWidth = $(window).width();
//         if (winWidth <= 767) {
//             $(document).on('click', '.feature-tabs .tab-list .tab-panel-outer > ul > li > a', function (e) {
//                 e.preventDefault();
//                 var tabHeight = $('.feature-tabs .tabs-wrap .tab-content-outer .tab-content .tab-pane.show').outerHeight();
//                 $('.feature-tabs .tabs-wrap .tab-content-outer').css({'height': tabHeight});
//             });
//         } else {
//             $('.feature-tabs .tabs-wrap .tab-content-outer').removeAttr('style');
//         }
//     });
//
//
//     $(window).on("load resize", function () {
//         var winWidth = $(window).width();
//         var tabHeight = $('.feature-tabs .tabs-wrap .tab-content-outer .tab-content .tab-pane.show').outerHeight();
//
//         if (winWidth <= 767) {
//             $('.feature-tabs .tabs-wrap .tab-content-outer').css({'height': tabHeight});
//         } else {
//             $('.feature-tabs .tabs-wrap .tab-content-outer').removeAttr('style');
//         }
//
//         // $('.feature-tabs .tab-list .tab-panel-outer .responsive-tab li ').on('click', function (e) {
//         //     e.stopPropagation();
//         //     var tabHeight = $('.feature-tabs .tabs-wrap .tab-content-outer .tab-content .tab-pane').outerHeight();
//         //     $('.feature-tabs .tabs-wrap .tab-content-outer').css({'height': tabHeight});
//         // });
//     });
//
//     //On load function
//     $(window).on("load resize", function () {
//         var windowWidth;
//         windowWidth = jQuery(window).width();
//         if (windowWidth > 767) {
//             $(".feature-tabs .tab-list .tab-panel-outer ul").removeAttr("style");
//             $(".feature-tabs .tab-list .tab-panel-outer .caret").removeClass("closeup");
//         }
//     });
//
// })(jQuery);