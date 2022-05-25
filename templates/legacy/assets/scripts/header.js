// // Use $ instead of jQuery without replacing global $
(function ($) {
  //Scroll animation
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 90) {
      $('header.k-19').addClass('fixed-header');
    }
    else {
      $('header.k-19').removeClass('fixed-header');
    }
  });


  $(window).on("load", function () {
    // Mobile Navigation animation
    toggle_Effect();
    show_menu();

  });

  $(window).on("resize", function () {
    var window_width = $(window).width();
    if (window_width > 991) {
      $('body').removeClass('overflow-stop');
    }
  });

  $(document).click(function () {
    remove_Effect();
  });

  function iPad() {
    $('.ua-mobile header .inner-nav > a, .ua-mobile header .inner-nav > span ').click(function (e) {
      e.preventDefault();
    });
  }

  $(document).ready(function () {
    iPad();
  });

  /*
   * jQuery FOR Remove Effect
   */
  function remove_Effect() {
    var window_width = $(window).width();
    if (window_width <= 991) {
      $('header .hamburger').removeClass('active');
      $('header .nav-wrap .sub-menu').slideUp();
      $('header .nav-wrap').slideUp();
      $('header .nav-wrap').removeClass('menutoogle');
      $('header .nav-wrap .inner-nav').removeClass('menu-active');
      $('header .hamburger').removeClass('active');
      $('body').removeClass('overflow-stop');
    }
  }


  /*
* jQuery FOR NAVIGATION TOGGLE
*/
  function toggle_Effect() {
    $('header .hamburger').click(function (e) {
      e.stopPropagation();
      $('header .hamburger').toggleClass('active');
      $('header .nav-wrap').toggleClass('menutoogle');
      $("header .nav-wrap").stop(true, true).slideToggle();
      $('header .sub-menu').slideUp();
      $('header .nav-wrap .inner-nav').removeClass('menu-active');
      $('body').toggleClass('overflow-stop');
    });
  }


  function show_menu() {
    $('header .inner-nav > a, header .inner-nav > span ').click(function (e) {
      var window_width = $(window).width();
      if (window_width <= 991) {
        e.stopPropagation();
        e.preventDefault();
        $('header .sub-menu').not($(this).siblings('.sub-menu')).slideUp();
        $(this).siblings('.sub-menu').stop(true, true).slideToggle();
        $(this).parent().toggleClass('menu-active');
        $(this).parent().siblings('.inner-nav').removeClass('menu-active');
      }
    });
  }


})(jQuery);