document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('assess-slider') !== null) {
    document.querySelector(".assess-slider .slider-for").style.opacity = 1;

    var navLinks = document.querySelectorAll(".assess-slider .slider-nav .item a");

    for (i = 0; i < navLinks.length; ++i) {
      // for (var link of links) {
      navLinks[i].addEventListener("click", function(event) {
        event.preventDefault();
      });
    }

    // Create and mount the thumbnails slider.
    var secondarySlider = new Splide('#assess-slider .slider-outer', {
      rewind: true,
      // fixedWidth: 100,
      // fixedHeight: 64,
      isNavigation: true,
      // gap: 20,
      perPage: 2,
      focus: 'right',
      pagination: false,
      cover: true,
      arrows: false,
      rewind: true,
      // arrowPath: 'M.82.79a2.67,2.67,0,0,0,0,3.78h0L11.23,15,.82,25.4a2.68,2.68,0,1,0,3.72,3.85l.06-.07L16.92,16.87a2.68,2.68,0,0,0,0-3.78h0L4.6.76A2.7,2.7,0,0,0,.82.79Z',
      breakpoints: {
        768: {
          perPage: 2,
          focus: 'right',
        },
        595: {
          perPage: 1,
          focus: 'right',
        },
        // 480: {
        //   perPage: 1,
        //   focus: 'right',
        // },
      }
      // breakpoints: {
      //   '600': {
      //     fixedWidth: 66,
      //     fixedHeight: 40,
      //   }
      // }
    }).mount();

    // Create the main slider.
    var primarySlider = new Splide( '#assess-slider .slider-for', {
      type       : 'fade',
      heightRatio: 0.5,
      arrows     : false,
      cover      : true,
      rewind     : true,
      pagination : false,
      breakpoints: {
        1149: {
          pagination : false,
        }
      }
    } );


    function mountSlider() {
      primarySlider.sync( secondarySlider ).mount();
    }

    mountSlider();

    secondarySlider.on('active', function(slide) {
      var activeSlide = document.getElementById(slide['slide'].id);
    });

    secondarySlider.on('inactive', function(slide) {
      var activeSlide = document.getElementById(slide['slide'].id);
    });

    var doit;
    window.onresize = function() {
      clearTimeout(doit);
      doit = setTimeout(mountSlider, 100);
    };
  }

});