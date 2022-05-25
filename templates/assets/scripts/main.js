// Works like jQuery's $(document).ready.
// Supports IE8+. Courtesy of http://youmightnotneedjquery.com/
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

// ready(function() {

String.prototype.toDOM=function(){
  var d=document
      ,i
      ,a=d.createElement("div")
      ,b=d.createDocumentFragment();
  a.innerHTML=this;
  while(i=a.firstChild)b.appendChild(i);
  return b;
};

document.addEventListener('DOMContentLoaded', function(event) {

  function makeExternal(link) {
    var url      = link.getAttribute('href'),
        // host         = window.location.hostname.toLowerCase(),
        host         = "kount.com",
        // regex        = new RegExp('^(?:(?:f|ht)tp(?:s)?\:)?//(?:[^\@]+\@)?([^:/]+)', 'im'),
        // match        = url.match(regex),
        // domain       = ((match ? match[1].toString() : ((url.indexOf(':') < 0) ? host : ''))).toLowerCase(),
        // hasSubdomain    = url.split('.')[1] ? url.split('.')[0] : false,
        ext = (url != null) ? url.substring(url.lastIndexOf('.') + 1) : "";

    if(ext == "pdf") {
      link.setAttribute('target', '_blank');
    }
  }

  for (var l = 0, links = document.querySelectorAll('a'), ll = links.length; l < ll; ++l ){
    makeExternal(links[l]);
  }
  // $(window).on("load", function () {

  var urlHash = window.location.href.split("#")[1];

  if (urlHash && document.getElementById(urlHash) !== null) {

    var scrollLocation = document.getElementById(urlHash).offsetTop;
    // window.scrollTo({top: scrollLocation, behavior: 'smooth'});
    window.scrollTo(0, 0);
    // Scroll to a certain element
    setTimeout(function() {
      window.scrollTo({top: scrollLocation, behavior: 'smooth'});
    }, 100);
  }
  // });

  //WowJS init
  var wow = new WOW(
      {
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        // mobile: true, // trigger animations on mobile devices (default is true)
        // live: true, // act on asynchronously loaded content (default is true)
        callback: function (box) {
          box.classList.add("animate-complete");
          // $(box).addClass('animate-complete');
        },
      }
  );
  wow.init();

  // hero-slider slider init
  wow_tab_slider = new WOW(
      {
        boxClass: 'wow-tab-slider'
      }
  )
  wow_tab_slider.init();

  //Smooth scroll for home hero subnav, generic anchor links, and smooth scroll subnav
  var links = document.querySelectorAll(".home-hero-subnav a[href^=\"#\"], a[href^=\"#anchor\"], .smooth-scroll-subnav a[href^=\"#\"]");

  for (i = 0; i < links.length; ++i) {
  // for (var link of links) {
    links[i].addEventListener("click", clickHandler);
  }

  function clickHandler(e) {
    e.preventDefault();
    var href = this.getAttribute("href");
    // alert(href);
    // const id = 'profilePhoto';
    var yOffset = document.querySelector('header').clientHeight;
    var element = document.getElementById(href.substr(1));
    var y = element.getBoundingClientRect().top + window.pageYOffset - yOffset;

    window.scrollTo({top: y, behavior: 'smooth'});

    // document.querySelector(href).scrollIntoView({
    //   behavior: "smooth"
    // });
  }

  var solutionsPageToggles = document.querySelectorAll(".fraud-prevention-use-cases .toggle-content");
  for (var j = 0; j < solutionsPageToggles.length; ++j) {
    solutionsPageToggles[j].addEventListener('click', function(event) {
      event.preventDefault();
      // $('#solutions-content-toggle').find('.content-block').removeClass('active');
      //var $contentBlock = $(this).parent().parent();
      // $contentBlock.toggleClass('active');

      var $contentBlock = this.parentNode.parentNode;
      // alert($contentBlock);
      $contentBlock.classList.toggle("active");
      if($contentBlock.classList.contains("active")) {
        var toggleInds = $contentBlock.querySelectorAll('.toggle-ind');
        for (var z = 0; z < toggleInds.length; ++z) {
          toggleInds[z].innerHTML = "–";
        }
        //$contentBlock.querySelectorAll('.toggle-ind').forEach(function(el) {
        //   el.innerHTML = "–";
        // });
      }
      else {
        var toggleInds = $contentBlock.querySelectorAll('.toggle-ind');
        for (var y = 0; y < toggleInds.length; ++y) {
          toggleInds[z].innerHTML = "+";
        }
        // $contentBlock.querySelectorAll('.toggle-ind').forEach(function(el) {
        //   el.innerHTML = "+";
        // });
      }

      // if($contentBlock.hasClass('active')) {
      //   $contentBlock.find('.toggle-ind').text('–');
      // }
      // else {
      //   $contentBlock.find('.toggle-ind').text('+');
      // }
    });
  }

  var agendaAbstractToggle = document.querySelectorAll(".agenda-abstract-toggle");
  for (var k = 0; k < agendaAbstractToggle.length; ++k) {
    agendaAbstractToggle[k].addEventListener('click', function(event) {
      event.preventDefault();
      var $contentBlock = this;
      $contentBlock.parentNode.classList.toggle("active");
      if($contentBlock.parentNode.classList.contains("active")) {
          $contentBlock.innerHTML = "SEE LESS";
      }
      else {
          $contentBlock.innerHTML = "READ DESCRIPTION";
      }
    });
  }

  var toggleDemoForm = document.querySelectorAll(".toggle-demo-form");
  var $slideoutFormUrl = "/wp-content/themes/kount/external/pages/slideout-demo-request-form.php";
  var $formiFrame = document.getElementById('slideout-form-iframe');
  var $formSlideout = document.getElementById('demo-form-slideout');

  for (var l = 0; l < toggleDemoForm.length; ++l) {
    // console.log('l = ' + l);
    // console.log(toggleDemoForm[l]);
    var iframeUrl = "";
    toggleDemoForm[l].addEventListener('click', function(event) {
      event.preventDefault();

      $formSlideout.classList.toggle("active");

      if($formSlideout.classList.contains("active")) {
        if(event.target.hasAttribute('data-event-action')) {
          // console.log("hasAttribute('data-event-action')");
          // console.log(event.target.dataset.eventAction);

          iframeUrl = $slideoutFormUrl + '?eventAction=' + event.target.dataset.eventAction;
        }
        else {
          iframeUrl = $slideoutFormUrl;
        }
      }
      // if($formiFrame.getAttribute('src') == "") {
      $formiFrame.setAttribute("src", iframeUrl);
      // }

      //   gtag_report_conversion(window.location.href);
      // }
      // if($contentBlock.parentNode.classList.contains("active")) {
      //   $contentBlock.innerHTML = "SEE LESS";
      // }
      // else {
      //   $contentBlock.innerHTML = "READ DESCRIPTION";
      // }
    });

  }

  var lazyloadImages = document.querySelectorAll('img:not(.lazyload)');
  for(m = 0; m < lazyloadImages.length; ++m) {
    lazyloadImages[m].classList.add('lazyload');
  }

  var $IE_image = document.querySelectorAll('img.ie-responsive');
  objectFitImages($IE_image);

  //Close demo form
  // document.querySelector('#demo-form-slideout .close-btn').addEventListener('click', function (event) {
  //   // console.log('close button clicked!');
  //   document.getElementById('demo-form-slideout').classList.remove('active');
  // });
  // document.addEventListener('click', function () {
  //   document.getElementById('demo-form-slideout').classList.remove('active');
  // });


});

function getBrowserWidth() {
  return Math.round(Math.max(
      document.body.scrollWidth,
      document.documentElement.scrollWidth,
      document.body.offsetWidth,
      document.documentElement.offsetWidth,
      document.documentElement.clientWidth
  ));
}

function getBrowserHeight() {
  return Math.round(Math.max(
      document.body.scrollHeight,
      document.documentElement.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.offsetHeight,
      document.documentElement.clientHeight
  ));
}

// (function ($) {
  // On DOM ready

  // $(function () {

    // Force external links to open in new tab / window
    // (function($){
    //   $(function(){
    //     var siteName = window.location.host.replace('www.', '');
    //     setTimeout(function() {
    //       $('a[href^="htt"]:not([target]):not([href*="www.' + siteName + '"]):not([href*="//' + siteName + '"]):not([class*="fancybox"])').attr('target', '_blank');
    //       $('a[href^="/demo"]').attr('target', '_blank');
    //     }, 200);
    //   });
    // })(jQuery);

    // var wow = new WOW(
    //     {
    //       boxClass: 'wow', // animated element css class (default is wow)
    //       animateClass: 'animated', // animation css class (default is animated)
    //       offset: 0, // distance to the element when triggering the animation (default is 0)
    //       // mobile: true, // trigger animations on mobile devices (default is true)
    //       // live: true, // act on asynchronously loaded content (default is true)
    //       callback: function (box) {
    //         box.classList.add("animate-complete");
    //         // $(box).addClass('animate-complete');
    //       },
    //     }
    // );
    // wow.init();
    //
    // // hero-slider slider init
    // wow_tab_slider = new WOW(
    //     {
    //       boxClass: 'wow-tab-slider'
    //     }
    // )
    // wow_tab_slider.init();

    //Do smooth scroll on generic anchor links
    // $('a[href^="#anchor"]').click(function(event) {
    //   event.preventDefault();
    //   var scrollTopVal = $('#anchor').offset().top - $('header.k-19').height();
    //   $('html, body').animate(
    //       {
    //         scrollTop: scrollTopVal,
    //       },
    //       400,
    //       'linear'
    //   )
    // });

    //Smooth Scroll subnavs
    // $('.smooth-scroll-subnav a[href^="#"]').click(function(event) {
    //   event.preventDefault();
    //   // alert($(this.hash).offset().top);
    //   // alert($('header.k-19').height());
    //   var scrollTopVal = $(this.hash).offset().top - $('header.k-19').height();
    //   $('html, body').animate(
    //       {
    //         scrollTop: scrollTopVal,
    //       },
    //       400,
    //       'linear'
    //   );
    // });

    //Do smooth scroll on home-hero-subnav anchor links
    // $('.home-hero-subnav a[href^="#"]').click(function(event) {
    //   event.preventDefault();
    //   // alert($(this.hash).offset().top);
    //   // alert($('header.k-19').height());
    //   var scrollTopVal = $(this.hash).offset().top - $('header.k-19').height();
    //   $('html, body').animate(
    //       {
    //         scrollTop: scrollTopVal,
    //       },
    //       400,
    //       'linear'
    //   );
    //
    // });

    //Do smooth scroll on generic anchor links
    // $('a.wistia-toggle').click(function(event) {
    //   event.preventDefault();
    //   $(this).parent().next().toggleClass('active');
    //   if($(this).parent().next().hasClass('active')) {
    //     $(this).text('See Less');
    //   }
    //   else {
    //     $(this).text('Read Description');
    //   }
    // });

    //agenda description toggle
    // $('.agenda-abstract-toggle').on('click tap', function(event) {
    //   event.preventDefault();
    //   $(this).parent().toggleClass('active');
    //   if($(this).parent().hasClass('active')) {
    //     $(this).text('SEE LESS');
    //   }
    //   else {
    //     $(this).text('READ DESCRIPTION');
    //   }
    // });

    //content toggles on Solutions page
    // $('#solutions-content-toggle .toggle-content').on('click tap', function(event) {
    //   event.preventDefault();
    //   // $('#solutions-content-toggle').find('.content-block').removeClass('active');
    //   var $contentBlock = $(this).parent().parent();
    //   $contentBlock.toggleClass('active');
    //   if($contentBlock.hasClass('active')) {
    //     $contentBlock.find('.toggle-ind').text('–');
    //   }
    //   else {
    //     $contentBlock.find('.toggle-ind').text('+');
    //   }
    // });

    // $('.toggle-demo-form').on('click tap', function(event) {
    //   event.preventDefault();
    //  $('.demo-form-slideout').toggleClass('active');
    //  $('#slideout-form-iframe').attr('src', '/wp-content/themes/kount/external/pages/slideout-demo-request-form.php');
    // });
    //
    // $('.demo-form-slideout .close-btn').on('click tap', function(event) {
    //   event.preventDefault();
    //   // $('#solutions-content-toggle').find('.content-block').removeClass('active');
    //   // var scrollPos = $('html').scrollTop();
    //   // $('body').css('top', scrollPos);
    //
    //   $('.demo-form-slideout').removeClass('active');
    //
    // });


  // });

  // $(document).ready(function () {
  //   var $IE_image = $('img.ie-responsive');
  //   objectFitImages($IE_image);

      // $(".search-btn").on("click", function (e) {
      //     var str = $(this).parent().find('.search-input').val();
      //     window.location.href = "https://www.kount.com/search?term=" + str;
      //     return false;
      // });
    // $('img:not(.lazyload)').addClass('lazyload');


    // $.fn.sameHeight = function () {
    //   var maxHeight = 0;
    //   return this.each(function (index, elem) {
    //     jQuery(elem).height('auto');
    //     var boxHeight = jQuery(elem).height();
    //     maxHeight = Math.max(maxHeight, boxHeight);
    //   }).height(maxHeight);
    // };
  // });

// })(jQuery);

//Javascript helper function to get offset()
function getOffset(element)
{
  if (!element.getClientRects().length) {
    return { top: 0, left: 0 };
  }

  var rect = element.getBoundingClientRect();
  var win = element.ownerDocument.defaultView;
  return ({
    top: rect.top + win.pageYOffset,
    left: rect.left + win.pageXOffset
  });
}

//getSiblings in DOM
function getSiblings(element) {
  // for collecting siblings
  var siblings = [];
  // if no parent, return no sibling
  if(!element.parentNode) {
    return siblings;
  }
  // first child of the parent node
  var sibling  = element.parentNode.firstChild;
  // collecting siblings
  while (sibling) {
    if (sibling.nodeType === 1 && sibling !== element) {
      siblings.push(sibling);
    }
    sibling = sibling.nextSibling;
  }
  return siblings;
};


//Google Analytics demo request tracker
//Note: Add paramaters to make more flexible
function gtag_report_conversion(url) {
  var callback = function () {
    console.log(url);
    // if (typeof(url) != 'undefined') {
    //   window.location = url;
    // }
  };
  gtag('event', 'conversion', {
    'send_to': 'AW-979027621/Lp1sCLrI-OoBEKWN69ID',
    'event_callback': callback
  });
  return false;
}

//Bing event tracker
function bing_demo_request_conversion() {
  window.uetq = window.uetq || [];
  window.uetq.push('event', 'Submit', {'event_category': 'Conversion', 'event_label': 'demo', 'event_value': '0'});
  // return false;
}

//Linked in pixel event tracker
function linkedin_event_pixel(conversionId) {
  var img = new Image(1,1);
  img.style.display = "none";
  img.src = "https://px.ads.linkedin.com/collect/?pid=222305&conversionId=" + conversionId + "&fmt=gif";
}
