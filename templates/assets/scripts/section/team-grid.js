// (function($) {
//   var gridCols = $(".team-grid .grid-wrapper");
//   function gridColsMargin() {
//     gridCols.each(function(index, value) {
//       if (window.matchMedia("(min-width: 768px)").matches)
//       {
//           if ($(value).find(".col-wrap").length > 3)
//          {
//            $(value)
//             .find(".col-wrap")
//             .css({
//               marginBottom: "120px"
//             });
//          }
//            else
//           {
//           $(value)
//             .find(".col-wrap")
//             .css({
//               marginBottom: 0
//             });
//           }
//       }
//       else if (window.matchMedia("(min-width:568px) and (max-width: 767px)").matches )
//       {
//         if ($(value).find(".col-wrap").length > 2) {
//           $(value)
//             .find(".col-wrap")
//             .css({
//               marginBottom: "120px"
//             });
//         }
//       }
//       else
//         {
//         if ($(value).find(".col-wrap").length > 1)
//         {
//           $(value)
//             .find(".col-wrap")
//             .css({
//               marginBottom: "110px"
//             });
//         }
//       }
//     });
//   }
//
//   $(document).ready(function() {
//     gridColsMargin();
//     // gridCols.find(".col-wrap .grid-box").matchHeight();
//   });
//   $(window).on("resize", function() {
//     gridColsMargin();
//     // gridCols.find(".col-wrap .grid-box").matchHeight();
//   });
// })(jQuery);
