document.addEventListener('DOMContentLoaded', function(event) {

  // if($('.scroll-nav').length > 0 ) {
  //     var nav_top = $('body .refresh19 .scroll-nav').offset().top;
  // }
  var links = document.querySelectorAll('.newsy-nav a[href^=\"#\"]');
  // console.log(links);

  for (i = 0; i < links.length; ++i) {
    // console.log(links[i]);
    // for (var link of links) {
    links[i].addEventListener("click", clickHandler);
  }

  function clickHandler(e) {
    e.preventDefault();

    if (this.hash !== "") {
      //event.preventDefault();
      // Store hash
      var hash = this.hash.substring(1);
      // console.log('hash = ' + hash);
      // console.log('hash offset = ' + (document.getElementById(hash).getBoundingClientRect().top) + window.scrollY);
      // console.log('client height = ' + document.querySelector('header.k-19').clientHeight);

      var scrollTopVal = (document.getElementById(hash).getBoundingClientRect().top + window.scrollY) - document.querySelector('header.k-19').clientHeight;
      // console.log('scrollTopVal = ' + scrollTopVal);

      window.scrollTo({top: scrollTopVal, behavior: 'smooth'});
    }
  }

  // var complyToggleLinks = document.querySelectorAll('#comply-features a.chevron');
  // for (j = 0; j < complyToggleLinks.length; ++j) {
  //   // console.log(links[i]);
  //   // for (var link of links) {
  //   complyToggleLinks[j].addEventListener("click", complyClickHandler);
  // }
  //
  // function complyClickHandler(e) {
  //   e.preventDefault();
  //   // if(getWindow().width > 1200) {
  //   this.nextElementSibling.nextElementSibling.classList.toggle('active');
  //   // }
  // }

});

// (function ($) {
//   $(document).ready(function () {
//     //Animate scroll to newsy nav anchors+
//     $('.newsy-nav a[href^="#"]').on('click tap', function(event) {
//       if (this.hash !== "") {
//         event.preventDefault();
//         // Store hash
//         var hash = this.hash;
//         console.log('hash offset = ' + $(hash).offset().top);
//
//         var scrollTopVal = $(hash).offset().top - $('header.k-19').height();
//         console.log('scrollTopVal = ' + scrollTopVal);
//
//         $('html, body').animate( {
//             scrollTop: scrollTopVal,
//           },
//           400,
//           'linear'
//         )
//        }
//     });
//   });
// })(jQuery);
