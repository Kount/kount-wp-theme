document.addEventListener('DOMContentLoaded', function(event) {
    var lineItems = document.querySelectorAll(".channel-partner ul li");
    if(lineItems !== null) {
        var count = 0.1;
        for (i = 0; i < lineItems.length; ++i) {
            lineItems[i].dataset.wowDelay = String(count) + 's';
            count = count + 0.1;
        }
    }
});

// // Use $ instead of jQuery without replacing global $
// (function ($) {
//
//     $(document).ready(function () {
//
//         var count = 0.1;
//         $('.channel-partner ul li').each(function (i) {
//             $(this).attr('data-wow-delay', count + 's');
//             count = count + 0.2;
//
//         });
//     });
// })(jQuery);