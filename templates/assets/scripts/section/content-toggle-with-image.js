document.addEventListener('DOMContentLoaded', function(event) {
  var toggleLinks = document.querySelectorAll('.content-toggle-with-image .toggle-link');
  if(toggleLinks !== null) {
    for (i = 0; i < toggleLinks.length; ++i) {
      toggleLinks[i].addEventListener('click', function(event) {
        event.preventDefault();
        // console.log(this.parentElement.nextElementSibling);
        this.parentElement.nextElementSibling.classList.toggle('active');
        if(this.parentElement.nextElementSibling.classList.contains('active')) {
          this.textContent = "Read less...";
        }
        else {
          this.textContent = "Read more...";
        }
      });
    }
  }
});

// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//   $('.content-toggle-with-image .toggle-link').on('click tap', function(event) {
//     event.preventDefault();
//     $(this).parent().next().toggleClass('active');
//     if($(this).parent().next().hasClass('active')) {
//       $(this).text("Read less...");
//     }
//     else {
//       $(this).text("Read more...");
//     }
//   });
//
// })(jQuery);
