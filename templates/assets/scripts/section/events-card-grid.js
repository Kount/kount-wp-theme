// (function ($) {
//     // $(".events-card-grid select").selectBoxIt();
//     // $(".resource-card-grid select").selectBoxIt();
//
//     $(document).ready(function () {
//         video();
//         animat();
//         animat2();
//         animat3();
//     });
//     $(window).resize(function () {
//         video();
//     });
//
//     // $( ".resource-card-grid .card-wrapper .col-three.video .img-wrapper .play" ).click(function() {
//     //     $(this).next(".wistia_embed").trigger( "click" );
//     //     // $(this).addClass("check");
//     //     console.log("check1");
//     // });
//
//     function animat() {
//         var count = 0.1;
//         $('.resource-card-grid .card-wrapper .col-three').each(function (i) {
//             $(this).attr('data-wow-delay', count + 's');
//             count = count + 0.1;
//         });
//     }
//     function animat2() {
//         var count = 0.1;
//         $('.events-card-grid .card-wrapper .col-three').each(function (i) {
//             $(this).attr('data-wow-delay', count + 's');
//             count = count + 0.1;
//         });
//     }
//     function animat3() {
//         var count = 0.1;
//         $('.news-card-grid .card-wrapper .col-three').each(function (i) {
//             $(this).attr('data-wow-delay', count + 's');
//             count = count + 0.1;
//         });
//     }
//
//
//     function video(){
//         var parent = $(".resource-card-grid .card-wrapper .col-three.video .img-wrapper");
//         var child = $(".resource-card-grid .card-wrapper .col-three.video .img-wrapper .wistia_embed");
//         child.height(parent.height());
//         child.width(parent.width());
//     }
//
//
// })(jQuery);


