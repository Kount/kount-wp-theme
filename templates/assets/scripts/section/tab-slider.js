document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('tab-slider') !== null) {
    document.querySelector(".tab-slider .slider-for").style.opacity = 1;

    var navLinks = document.querySelectorAll(".slider-nav .item a");

    for (i = 0; i < navLinks.length; ++i) {
      // for (var link of links) {
      navLinks[i].addEventListener("click", function(event) {
        event.preventDefault();
      });
    }

    // Create and mount the thumbnails slider.
    var secondarySlider = new Splide('#tab-slider .slider-outer', {
      rewind: true,
      // fixedWidth: 100,
      // fixedHeight: 64,
      isNavigation: true,
      //gap: 10,
      perPage: 5,
      focus: 'center',
      pagination: false,
      cover: true,
      arrows: false,
      rewind: true,
      // arrowPath: 'M.82.79a2.67,2.67,0,0,0,0,3.78h0L11.23,15,.82,25.4a2.68,2.68,0,1,0,3.72,3.85l.06-.07L16.92,16.87a2.68,2.68,0,0,0,0-3.78h0L4.6.76A2.7,2.7,0,0,0,.82.79Z',
      breakpoints: {
      //   992: {
      //     perPage: 4,
      //   },
        768: {
          perPage: 4,
        },
        595: {
          perPage: 3,
        },
      }
      // breakpoints: {
      //   '600': {
      //     fixedWidth: 66,
      //     fixedHeight: 40,
      //   }
      // }
    }).mount();

    // Create the main slider.
    var primarySlider = new Splide( '#tab-slider .slider-for', {
      type       : 'fade',
      // heightRatio: 0.5,
      pagination : false,
      arrows     : false,
      cover      : true,
      rewind     : true,
      // breakpoints: {
      //   991: {
      //     type : 'slide',
      //   }
      // }
    } );


    function mountSlider() {
      primarySlider.sync( secondarySlider ).mount();
    }

    mountSlider();

    var doit;
    window.onresize = function() {
      clearTimeout(doit);
      doit = setTimeout(mountSlider, 100);
    };
  }


//
// // Set the thumbnails slider as a sync target and then call mount.

  // alert(getBrowserWidth());
  // if(getBrowserWidth() <= 991) {
  //   resourceSlider = new Splide('#resources-slider-wrap.splide', options).mount();
  // }
  // else {
  //   if(resourceSlider && resourceSlider.State.is(resourceSlider.STATES.MOUNTED)) {
  //     resourceSlider.destroy(true);
  //   }
  // }



});

// // Use $ instead of jQuery without replacing global $
// (function($) {
  // $(document).ready(function() {
  //   // $('body .refresh19 .tab-slider .slider-outer .slider-nav .item').sameHeight();
  //   $(window)
  //     .on("resize", function() {
  //       // $('body .refresh19 .tab-slider .slider-outer .slider-nav .item').sameHeight();
  //     })
  //     .resize();
  //
  //   $(".tab-slider .slider-for").css({ opacity: 1 });
  //
  //   $(".tab-slider .slider-for").slick({
  //     arrows: false,
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     fade: true,
  //     infinite: true,
  //     speed: 800,
  //     draggable: false,
  //     asNavFor: ".slider-nav",
  //     responsive: [
  //       {
  //         breakpoint: 767,
  //         settings: {
  //           adaptiveHeight: true
  //         }
  //       },
  //       {
  //         breakpoint: 595,
  //         settings: {
  //           adaptiveHeight: true
  //         }
  //       },
  //       {
  //         breakpoint: 480,
  //         settings: {
  //           adaptiveHeight: true
  //         }
  //       }
  //     ]
  //   });
  //
  //   $(".tab-slider .slider-nav").slick({
  //     arrows: false,
  //     slidesToShow: 5,
  //     slidesToScroll: 1,
  //     asNavFor: ".slider-for",
  //     infinite: true,
  //     draggable: false,
  //     speed: 800,
  //     dots: false,
  //     focusOnSelect: true,
  //     responsive: [
  //       {
  //         breakpoint: 1200,
  //         settings: {
  //           dots: true,
  //           slidesToShow: 4
  //         }
  //       },
  //       {
  //         breakpoint: 991,
  //         settings: {
  //           dots: true,
  //           slidesToShow: 4
  //         }
  //       },
  //       {
  //         breakpoint: 767,
  //         settings: {
  //           dots: true,
  //           slidesToShow: 3
  //         }
  //       },
  //       {
  //         breakpoint: 595,
  //         settings: {
  //           dots: true,
  //           slidesToShow: 2,
  //           draggable: true
  //         }
  //       },
  //       {
  //         breakpoint: 480,
  //         settings: {
  //           dots: true,
  //           slidesToShow: 2,
  //           draggable: true
  //         }
  //       }
  //     ]
  //   });
  //
  //   $(document).on("click", ".tab-slider .slider-nav .item", function() {
  //     wow = new WOW({ boxClass: "wow-tab-slider" });
  //     wow.init();
  //   });
  //
  //   if ($("#tab-slider").length > 0) {
  //     $(".tab-slider .slider-nav .item").click(function(e) {
  //       var nav = $("header"),
  //         nav_height = nav.outerHeight();
  //       e.preventDefault();
  //       $("html, body").animate(
  //         {
  //           scrollTop: $("#tab-slider").offset().top - nav_height + 20
  //         },
  //         "slow"
  //       );
  //       return false;
  //     });
  //   }
  // });
// })(jQuery);
