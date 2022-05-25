var resourceSlider = null;
function applyMobileResourceSlider() {
  // alert("resized");
  var options = {
    perPage: 2,
    rewind: true,
    // destroy: true,
    arrowPath: 'M27.12,20.14,13,34.23A2.29,2.29,0,0,1,9.79,31h0L22.25,18.52,9.79,6.05A2.29,2.29,0,0,1,13,2.81h0L27.13,16.9a2.3,2.3,0,0,1,0,3.24Z',
    breakpoints: {
      992: {
        perPage: 2,
      },
      // 768: {
      //   perPage: 3,
      // },
      // 595: {
      //   perPage: 2,
      // },
      480: {
        perPage: 1,
      },
    }
  };
  // alert(getBrowserWidth());
  // if(getBrowserWidth() <= 991) {
  //   resourceSlider = new Splide('#resources-slider-wrap.splide', options).mount();
  // }
  // else {
  //   if(resourceSlider && resourceSlider.State.is(resourceSlider.STATES.MOUNTED)) {
  //     resourceSlider.destroy(true);
  //   }
  // }
}

document.addEventListener( 'DOMContentLoaded', function () {
  // new Splide( '.splide' ).mount();
  if(document.getElementById('resources-slider-wrap')) {
    // document.getElementById('resources-slider-wrap').classList.add('splide');
    applyMobileResourceSlider();
  }
});

// Debounce
function debounce(func, time){
  var time = time || 100; // 100 by default if no param
  var timer;
  return function(event){
    if(timer) clearTimeout(timer);
    timer = setTimeout(func, time, event);
  };
}

// Function with stuff to execute
function resizeContent() {
  // Do loads of stuff once window has resized
  // console.log('resized');
  if(document.getElementById('resources-slider-wrap')) {
  //   document.getElementById('resources-slider-wrap').classList.add('splide');
    applyMobileResourceSlider();
  }
  // applyMobileResourceSlider();
}

// Eventlistener
window.addEventListener("resize", debounce( resizeContent, 150 ));


// // Use $ instead of jQuery without replacing global $
// (function ($) {
//     $(document).ready(function () {
//         limit_lines('body .refresh19 .resources-slider .slider-wrap .slider .item .content p', 5);
//     });
//   $(window).on("resize", function () {
//     limit_lines('body .refresh19 .resources-slider .slider-wrap .slider .item .content p', 4);
//   });
//
//   limit_lines('body .refresh19 .resources-slider .slider-wrap .slider .item .content p', 4);
//
//   $(window).on("load", function () {
    // $('.resources-slider .slider-wrap').css({"opacity": 1});
    // // $('.resources-slider .slider-wrap .slider .item').matchHeight();
    // // $('.resources-slider .slider-wrap .slider .item .content').matchHeight({byRow: 0});
    // // $('.resources-slider .slider-wrap .slider .item .content h5').matchHeight({byRow: 0});
    //
    // $('.resources-slider .slider-wrap .slider').slick({
    //   arrows: true,
    //   slidesToShow: 3,
    //   slidesToScroll: 1,
    //   speed: 800,
    //   focusOnSelect: false,
    //   fade: false,
    //   infinite: true,
    //   draggable: false,
    //   dots: false,
    //   prevArrow: $('.resources-slider .slide-nav .slide-prev'),
    //   nextArrow: $('.resources-slider .slide-nav .slide-next'),
    //   responsive: [
    //     {
    //       breakpoint: 992,
    //       settings: {
    //         infinite: true,
    //         slidesToShow: 2,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 768,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 596,
    //       settings: {
    //         // adaptiveHeight: true,
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         // adaptiveHeight: true,
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         dots: true
    //       }
    //     }
    //   ]
    // });
//   });
//
// })(jQuery);