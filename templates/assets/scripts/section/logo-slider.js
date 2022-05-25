// function ready(fn) {
//   if (document.readyState != 'loading') {
//     fn();
//   } else if (document.addEventListener) {
//     document.addEventListener('DOMContentLoaded', fn);
//   } else {
//     document.attachEvent('onreadystatechange', function() {
//       if (document.readyState != 'loading')
//         fn();
//     });
//   }
// }
//
// ready(function() {
//     // $('.logo-slider .slider-wrap').css({"opacity": 1});
// });
//
document.addEventListener( 'DOMContentLoaded', function () {
  // new Splide( '.splide' ).mount();
  if(document.querySelector('.logo-slider.sub-page .splide') !== null) {
    // console.log('splide 1 found!');
    if (document.querySelector('.logo-slider.sub-page .splide')) {
      var options = {
        perPage: 6,
        rewind: true,
        focus: 'left',
        arrows: true,
        arrowPath: 'M.82.79a2.67,2.67,0,0,0,0,3.78h0L11.23,15,.82,25.4a2.68,2.68,0,1,0,3.72,3.85l.06-.07L16.92,16.87a2.68,2.68,0,0,0,0-3.78h0L4.6.76A2.7,2.7,0,0,0,.82.79Z',
        breakpoints: {
          992: {
            perPage: 4,
            arrows: true,
          },
          768: {
            perPage: 3,
          },
          595: {
            perPage: 2,
          },
          480: {
            perPage: 1,
          },
        }
      };
      new Splide('.logo-slider.sub-page .splide', options).mount();
    }
  }
  else if(document.querySelector('.logo-slider .splide') !== null) {
    // console.log('splide 2 found!');
    if (document.querySelector('.logo-slider .splide')) {
      var options = {
        perPage: 6,
        rewind: true,
        focus: 'left',
        arrowPath: 'M.82.79a2.67,2.67,0,0,0,0,3.78h0L11.23,15,.82,25.4a2.68,2.68,0,1,0,3.72,3.85l.06-.07L16.92,16.87a2.68,2.68,0,0,0,0-3.78h0L4.6.76A2.7,2.7,0,0,0,.82.79Z',
        breakpoints: {
          992: {
            perPage: 4,
          },
          768: {
            perPage: 3,
          },
          595: {
            perPage: 2,
          },
          480: {
            perPage: 1,
          },
        }
      };
      new Splide('.logo-slider .splide', options).mount();
    }
  }
});


// // Use $ instead of jQuery without replacing global $
// (function ($) {

  // $(window).on("load", function () {
  //   $('.logo-slider .slider-wrap').css({"opacity": 1});
  //   var $length = $('.logo-slider .slider-wrap .slider .item').length;
  //   // console.log($length);
  //   var $total;
  //   if ($length === 5) {
  //     $total = 5;
  //   } else {
  //     $total = 6;
  //   }
  //
  //   $('.logo-slider .slider-wrap .slider').slick({
  //     arrows: true,
  //     slidesToShow: $total,
  //     slidesToScroll: 1,
  //     speed: 800,
  //     focusOnSelect: false,
  //     fade: false,
  //     infinite: true,
  //     draggable: false,
  //     dots: false,
  //     responsive: [
  //       {
  //         breakpoint: 992,
  //         settings: {
  //           slidesToShow: 4,
  //         }
  //       },
  //       {
  //         breakpoint: 768,
  //         settings: {
  //           slidesToShow: 3,
  //         }
  //       },
  //       {
  //         breakpoint: 595,
  //         settings: {
  //           slidesToShow: 2
  //         }
  //       },
  //       {
  //         breakpoint: 480,
  //         settings: {
  //           slidesToShow: 1
  //         }
  //       }
  //     ]
  //   });
  //
  // });

// })(jQuery);