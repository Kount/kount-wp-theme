document.addEventListener('DOMContentLoaded', function(event) {
  function videoOverlay() {
    if(document.querySelector('.play-video') !== null) {
      document.querySelector('.play-video').addEventListener('click', function (e) {
        e.preventDefault();
        // $('body').addClass('overlay-active');
        document.querySelector('.we-video-overlay').classList.add('overlay-active');
        var url = this.dataset.src;
        document.querySelector('.video-overlay iframe').src = url + '?autoplay=1';
        //$('.video-overlay').find('iframe').attr('src', url + '?autoplay=1');
      });

      document.addEventListener("click", function (event) {
        var videoContainer = document.querySelector(".video-container");
        var targetElement = event.target; // clicked element

        do {
          if (targetElement != videoContainer) {
            closeVideoOverlay();
            return;
          }
          // Go up the DOM
          targetElement = targetElement.parentNode;
        } while (targetElement);
      });
    }
    // closeVideoOverlay();
  }

  // Close video overlay on outside/close-btn click
  function closeVideoOverlay() {
    // Close video overlay on close button & outside click
    if(document.querySelector('.video-overlay') !== null) {

      document.querySelector('.video-overlay').addEventListener('click', function (e) {
        // e.stopPropagation();
        document.querySelector('.video-overlay iframe').src = '';
        document.querySelector('.video-overlay').classList.remove('overlay-active');
      });
      document.querySelector('.video-overlay iframe').addEventListener('click', function (e) {
        e.stopPropagation();
      });
    }
  }


    // $(document).ready(function () {
  videoOverlay();
  video_height();
  // });

  if(document.querySelector('.video-overlay iframe') !== null) {
    document.addEventListener("load", function () {
      video_height();
    });
    document.addEventListener("scroll", function () {
      video_height();
    }, {passive: true});
    document.addEventListener("resize", function () {
      video_height();
    });
  }

  function video_height() {
      var windowheight = getBrowserHeight() / 1.9,
        windowWidth = getBrowserWidth() / 1.2;
    document.querySelector('.video-overlay iframe').dataset.width = windowWidth + 'px';
    document.querySelector('.video-overlay iframe').dataset.height = windowheight + 'px';
  }

});

// Use $ instead of $ without replacing global $
// (function ($) {

  // // Video overlay
  // function videoOverlay() {
  //   $(document).on('click', '.play-video', function (e) {
  //     e.preventDefault();
  //     // $('body').addClass('overlay-active');
  //     $('.we-video-overlay').addClass('overlay-active');
  //     var url = $(this).attr('data-src');
  //     $('.video-overlay').find('iframe').attr('src', url + '?autoplay=1');
  //   });
  //   closeVideoOverlay();
  // }
  //
  // // Close video overlay on outside/close-btn click
  // function closeVideoOverlay() {
  //   // Close video overlay on close button & outside click
  //   $('.video-overlay').on('click', function () {
  //     $('.video-overlay').find('iframe').attr('src', '');
  //     // $('body').removeClass('overlay-active');
  //     $('.we-video-overlay').removeClass('overlay-active');
  //   });
  //
  //   // Prevent closing on video's click
  //   $('.video-overlay  iframe').on('click', function (e) {
  //     e.stopPropagation();
  //   });
  // }
  //
  // $(document).ready(function () {
  //   videoOverlay();
  //   video_height();
  // });
  //
  // $(window).on("load scroll resize", function () {
  //   video_height();
  // });
  //
  // function video_height() {
  //   var windowheight = $(window).height() / 1.9,
  //     windowWidth = $(window).width() / 1.2
  //   $('.video-overlay iframe').attr('width', windowWidth + 'px');
  //   $('.video-overlay iframe').attr('height', windowheight + 'px');
  // }

// })(jQuery);