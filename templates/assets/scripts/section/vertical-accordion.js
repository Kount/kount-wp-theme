document.addEventListener('DOMContentLoaded', function(event) {
  var toggleLinks = document.querySelectorAll('.accordion-container a.toggle-link');
  if(toggleLinks !== null) {
    for (i = 0; i < toggleLinks.length; ++i) {
      toggleLinks[i].addEventListener('click', function(event) {
        event.preventDefault();
        var sectionId = this.dataset.sectionId;
        console.log('sectionId = ' + sectionId);

        if(document.querySelector('.accordion-wrapper #' + sectionId).classList.contains('active')) {
          $('.accordion-wrapper #' + sectionId).classList.remove('active');
        }
        else {
          document.querySelector('.accordion-container').classList.remove('active');
          document.querySelector('.accordion-wrapper #' + sectionId).classList.add('active');
        }
        // $(this).attr('section-id').addClass('active');
        var scrollTopVal = document.getElementById(sectionId).offsetTop - document.querySelector('header.fixed-header').clientHeight;
        console.log('scrollTopVal = ' + scrollTopVal);

        window.scrollTo({top: scrollTopVal, behavior: 'smooth'});

      });
    }
  }
});

// (function ($) {
//
//   $('.accordion-container a.toggle-link').click(function(event) {
//     event.preventDefault();
//     var sectionId = $(this).data('section-id');
//     console.log('sectionId = ' + sectionId);
//
//     if($('.accordion-wrapper #' + sectionId).hasClass('active')) {
//       $('.accordion-wrapper #' + sectionId).removeClass('active');
//     }
//     else {
//       $('.accordion-container').removeClass('active');
//       $('.accordion-wrapper #' + sectionId).addClass('active');
//
//       // var headerHeight = $('header.fixed-header').height();
//       // console.log('headerHeight = ' + headerHeight);
//     }
//     // $(this).attr('section-id').addClass('active');
//     var scrollTopVal = $('#' + sectionId).offset().top - $('header.fixed-header').height();
//     console.log('scrollTopVal = ' + scrollTopVal);
//
//     $('html, body').animate(
//         {
//           scrollTop: scrollTopVal,
//         },
//         400,
//         'linear'
//     )
//
//   });
//
// })(jQuery);