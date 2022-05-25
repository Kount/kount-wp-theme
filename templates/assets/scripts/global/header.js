document.addEventListener('DOMContentLoaded', function(event) {

  document.addEventListener('scroll', function(e) {
    if(window.scrollY >= 90) {
      document.querySelector('header.k-19').classList.add('fixed-header');
    }
    else {
      document.querySelector('header.k-19').classList.remove('fixed-header');
    }
  });

  function checkNavHeight() {
    if (getBrowserWidth() <= 991 && document.querySelector('.menutoggle') !== null) {

      var headerHeight = document.querySelector('header.k-19').clientHeight;
      var submenuHeight = document.querySelector('.menutoggle').clientHeight;
      console.log('headerHeight = ' + headerHeight);
      console.log('submenuHeight = ' + submenuHeight);
      document.querySelector('body').style.height = parseInt(headerHeight) + parseInt(submenuHeight) + 'px';
    }

  }

  // $(window).on("load", function () {
    // Mobile Navigation animation
  toggle_Effect();
  show_menu();

  // });

  // $(window).on("`resize", function () {
  //   var window_width = $(window).width();
  //   if (window_width > 991) {
  //     $('body').removeClass('overflow-stop');
  //   }
  // });

  var doit;
  window.onresize = function() {
    clearTimeout(doit);
    doit = setTimeout(resizedWindow, 100);
  };

  function resizedWindow() {
    if(getBrowserWidth() > 991) {
      document.querySelector('body').classList.remove('overflow-stop');
      // document.querySelector('body').classList.remove('overflow-stop');
    }
  }

  document.addEventListener('click', function () {
    remove_Effect();
  });


  function remove_Effect() {
    // var window_width = $(window).width();
    if (getBrowserWidth() <= 991) {
      document.querySelector('header .hamburger').classList.remove('active');
      document.querySelector('header .nav-wrap').classList.add('slide-up');
      // $('header .nav-wrap').slideUp(200);
      document.querySelector('header').classList.remove('sub-menu-slide-up');
      document.querySelector('header .nav-wrap').classList.remove('menutoggle');
      document.querySelector('header .nav-wrap .inner-nav').classList.remove('menu-active');
      document.querySelector('header .hamburger').classList.remove('active');
      document.querySelector('body').classList.remove('overflow-stop');
    }
  }

  function toggle_Effect() {
    document.querySelector('header .hamburger').addEventListener('click', function(event) {
      event.stopPropagation();
      document.querySelector('header .hamburger').classList.toggle('active');
      document.querySelector('header .nav-wrap').classList.toggle('menutoggle');
      // document.querySelector("header .nav-wrap").stop(true, true).slideToggle(200);
      //$('header .sub-menu').slideUp(200);
      document.querySelector('header').classList.toggle('sub-menu-slide-up');
      document.querySelector('header .nav-wrap .inner-nav').classList.remove('menu-active');
      document.querySelector('body').classList.toggle('overflow-stop');
    });
    //checkNavHeight();
  }

  function show_menu() {

    var menuOpeners = document.querySelectorAll('header .inner-nav > a, header .inner-nav > span');
    for (var j = 0; j < menuOpeners.length; ++j) {
      menuOpeners[j].addEventListener('click', function(event) {
        if (getBrowserWidth() <= 991) {
          event.stopPropagation();
          event.preventDefault();

          // $('header .sub-menu').not($(this).siblings('.sub-menu')).slideUp(200);
          // $(this).siblings('.sub-menu').stop(true, true).slideToggle(200);
          //$(this).parent().toggleClass('menu-active');
          this.parentElement.classList.toggle('menu-active');
          var siblings = getSiblings(this.parentElement);
          for (var j = 0; j < siblings.length; ++j) {
            if(siblings[j].classList.contains('inner-nav')) {
              siblings[j].classList.remove('menu-active');
            }
          }
          // if()
          // $(this).parent().siblings('.inner-nav').removeClass('menu-active');
        }
      });
    }
    // checkNavHeight();

    //   var window_width = $(window).width();
    //   if (window_width <= 991) {
    //     e.stopPropagation();
    //     e.preventDefault();
    //     $('header .sub-menu').not($(this).siblings('.sub-menu')).slideUp(200);
    //     $(this).siblings('.sub-menu').stop(true, true).slideToggle(200);
    //     $(this).parent().toggleClass('menu-active');
    //     $(this).parent().siblings('.inner-nav').removeClass('menu-active');
    //   }
    // });
  }

});

// // Use $ instead of jQuery without replacing global $
// (function ($) {
//Scroll animation
//   $(window).scroll(function () {
//     if ($(window).scrollTop() >= 90) {
//       $('header.k-19').addClass('fixed-header');
//     }
//     else {
//       $('header.k-19').removeClass('fixed-header');
//     }
//   });
//
//
//   $(window).on("load", function () {
//     // Mobile Navigation animation
//     toggle_Effect();
//     show_menu();
//
//   });
//
//   $(window).on("`resize", function () {
//     var window_width = $(window).width();
//     if (window_width > 991) {
//       $('body').removeClass('overflow-stop');
//     }
//   });
//
//   $(document).click(function () {
//     remove_Effect();
//   });
//
//   function iPad() {
//     $('.ua-mobile header .inner-nav > a, .ua-mobile header .inner-nav > span ').click(function (e) {
//       e.preventDefault();
//     });
//   }
//
//   $(document).ready(function () {
//     iPad();
//   });
//
//   /*
//    * jQuery FOR Remove Effect
//    */
//   function remove_Effect() {
//     var window_width = $(window).width();
//     if (window_width <= 991) {
//       $('header .hamburger').removeClass('active');
//       $('header .nav-wrap .sub-menu').slideUp(200);
//       $('header .nav-wrap').slideUp(200);
//       $('header .nav-wrap').removeClass('menutoogle');
//       $('header .nav-wrap .inner-nav').removeClass('menu-active');
//       $('header .hamburger').removeClass('active');
//       $('body').removeClass('overflow-stop');
//     }
//   }
//
//
//   /*
// * jQuery FOR NAVIGATION TOGGLE
// */
//   function toggle_Effect() {
//     $('header .hamburger').click(function (e) {
//       e.stopPropagation();
//       $('header .hamburger').toggleClass('active');
//       $('header .nav-wrap').toggleClass('menutoogle');
//       $("header .nav-wrap").stop(true, true).slideToggle(200);
//       $('header .sub-menu').slideUp(200);
//       $('header .nav-wrap .inner-nav').removeClass('menu-active');
//       $('body').toggleClass('overflow-stop');
//     });
//   }
//
//
//   function show_menu() {
//     $('header .inner-nav > a, header .inner-nav > span ').click(function (e) {
//       var window_width = $(window).width();
//       if (window_width <= 991) {
//         e.stopPropagation();
//         e.preventDefault();
//         $('header .sub-menu').not($(this).siblings('.sub-menu')).slideUp(200);
//         $(this).siblings('.sub-menu').stop(true, true).slideToggle(200);
//         $(this).parent().toggleClass('menu-active');
//         $(this).parent().siblings('.inner-nav').removeClass('menu-active');
//       }
//     });
//   }


// })(jQuery);