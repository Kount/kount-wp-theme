document.addEventListener('DOMContentLoaded', function(event) {

  //Smooth scroll for home hero subnav, generic anchor links, and smooth scroll subnav
  var links = document.querySelectorAll(".jobs-nav a[href^=\"#\"]");

  for (i = 0; i < links.length; ++i) {
    // for (var link of links) {
    links[i].addEventListener("click", clickHandler);
  }

  function clickHandler(e) {
    e.preventDefault();
    var href = this.getAttribute("href");
    // alert(href);
    // const id = 'profilePhoto';
    var yOffset = -80;
    var element = document.getElementById(href.substr(1));
    var y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({top: y, behavior: 'smooth'});

    // document.querySelector(href).scrollIntoView({
    //   behavior: "smooth"
    // });
  }


});
// (function ($) {

  //Do smooth scroll on home-hero-subnav anchor links
  // $('.jobs-nav a[href^="#"]').click(function(event) {
  //   event.preventDefault();
  //   // alert($(this.hash).offset().top);
  //   // alert($('header.k-19').height());
  //   var scrollTopVal = $(this.hash).offset().top - ($('header.k-19').height() + 10);
  //   $('html, body').animate(
  //       {
  //         scrollTop: scrollTopVal,
  //       },
  //       400,
  //       'linear'
  //   );
  //
  // });

// })(jQuery);})(jQuery);