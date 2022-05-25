// /* Called after ng-repeat is finished */
// app.directive('onFinishRender', function ($timeout) {
//   return {
//     restrict: 'A',
//     link: function (scope, element, attr) {
//       if (scope.$last === true) {
//         $timeout(function () {
//           scope.$emit(attr.onFinishRender);
//         });
//       }
//     }
//   }
// });
// app.directive('itemCategoryDirective', function () {
//   return function (scope, element, attrs) {
//     if (scope.$last) {
//       setTimeout(function () {
//         jQuery('.news-card-grid .filter-wrapper select').selectBoxIt().data("selectBox-selectBoxIt").refresh();
//       }, 300);
//     }
//   };
// });
// app.directive('paginationRepeatDirective', function () {
//   return function (scope, element, attrs) {
//     if (scope.$last) {
//       setTimeout(function () {
//         jQuery('.pagination').css({'display': 'block'});
//       }, 400);
//     }
//   }
// });
//
//
// app.filter('customFilter', ['$filter', function ($filter) {
//   return function (items, category, author, tempitems, number) {
//     var itemPerPage = 12; // set per page item number (predefine)
//     var min, max;
//     var result = [];
//     var temp_result = [];
//     var temp_result1 = [];
//     if ((category == '') && (author == '') && (number == '')) {
//       if (tempitems) {
//         for (var i = 0; i < itemPerPage; i++) {
//           result.push(tempitems[i]);
//         }
//         $filter.pagination(tempitems);
//       }
//     } else if ((category == '') && (author == '') && (number !== '')) {
//       if (tempitems) {
//         max = itemPerPage * number;
//         min = max - itemPerPage;
//         if (max > tempitems.length) {
//           max = tempitems.length;
//         }
//         $filter.pagination(tempitems);
//         for (var i = min; i < max; i++) {
//           result.push(tempitems[i]);
//         }
//       }
//
//     }
//
//     if (number == '') {
//       number = 1;
//     }
//
//     if ((category != '') && (author == '')) {
//       if (tempitems) {
//         for (var i = 0; i < tempitems.length; i++) {
//           if (tempitems[i].news[0] !== undefined) {
//             for (var j = 0; j < tempitems[i].news[0].slug.length; j++) {
//               if (tempitems[i].news[0].slug) {
//                 var $str1 = (tempitems[i].news[0].slug).replace(/\s+/g, '-').toLowerCase();
//               }
//               if (category) {
//                 var $str2 = category.replace(/\s+/g, '-').toLowerCase();
//               }
//               if (String($str1) == $str2) {
//                 var found = jQuery.inArray(tempitems[i], temp_result);
//                 if (found < 0) {
//                   temp_result.push(tempitems[i]);
//                 }
//               }
//             }
//
//           }
//         }
//       }
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//
//     if ((category == '') && (author != '')) {
//       if (tempitems) {
//         for (var i = 0; i < tempitems.length; i++) {
//           if (tempitems[i]["year"].length > 0) {
//             for (var j = 0; j < tempitems[i]["year"].length; j++) {
//               if (tempitems[i]["year"]) {
//                 var $str1 = (tempitems[i]["year"]).replace(/\s+/g, '-').toLowerCase();
//               }
//               if (author) {
//                 var $str2 = author;
//               }
//               if (String($str1) == $str2) {
//                 var found = jQuery.inArray(tempitems[i], temp_result);
//                 if (found < 0) {
//                   temp_result.push(tempitems[i]);
//                 }
//               }
//             }
//
//           }
//         }
//       }
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//
//     if ((category != '') && (author != '')) {
//       if (tempitems) {
//         for (var i = 0; i < tempitems.length; i++) {
//           if (tempitems[i]["year"].length > 0) {
//             for (var j = 0; j < tempitems[i]["year"].length; j++) {
//               if (tempitems[i]["year"]) {
//                 var $str1 = (tempitems[i]["year"]).replace(/\s+/g, '-').toLowerCase();
//               }
//               if (author) {
//                 var $str2 = author;
//               }
//               if (String($str1) == $str2) {
//                 var found = jQuery.inArray(tempitems[i], temp_result1);
//                 if (found < 0) {
//                   temp_result1.push(tempitems[i]);
//                 }
//               }
//             }
//
//           }
//         }
//
//         for (var i = 0; i < temp_result1.length; i++) {
//           if (temp_result1[i].news[0].slug.length > 0) {
//             for (var j = 0; j < temp_result1[i].news[0].slug.length; j++) {
//               if (temp_result1[i].news[0].slug) {
//                 var $str1 = (temp_result1[i].news[0].slug).replace(/\s+/g, '-').toLowerCase();
//               }
//               if (category) {
//                 var $str2 = category.replace(/\s+/g, '-').toLowerCase();
//               }
//               if (String($str1) == $str2) {
//                 var found = jQuery.inArray(temp_result1[i], temp_result);
//                 if (found < 0) {
//                   temp_result.push(temp_result1[i]);
//                 }
//               }
//             }
//
//           }
//         }
//
//
//
//       }
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//
//     return result;
//   }
// }]);
//
//
// app.filter('resourcesFilter', ['$filter', function ($filter) {
//   return function (items, category, searchString, tempitems, number) {
//     var itemPerPage = 12; // set per page item number (predefine)
//     var min, max;
//     var result = [];
//     var temp_result = [];
//     var temp_result1 = [];
//     if ((category == '') && (searchString == '') && (number == '')) {
//       if (tempitems) {
//         for (var i = 0; i < itemPerPage; i++) {
//           result.push(tempitems[i]);
//         }
//         $filter.pagination(tempitems);
//       }
//     } else if ((category == '') && (searchString == '') && (number !== '')) {
//       if (tempitems) {
//         max = itemPerPage * number;
//         min = max - itemPerPage;
//         if (max > tempitems.length) {
//           max = tempitems.length;
//         }
//         $filter.pagination(tempitems);
//         for (var i = min; i < max; i++) {
//           result.push(tempitems[i]);
//         }
//       }
//
//     }
//
//     if (number == '') {
//       number = 1;
//     }
//
//     if ((category != '') && (searchString == '')) {
//       if (tempitems) {
//         for (var i = 0; i < tempitems.length; i++) {
//           if (tempitems[i].post_type !== undefined) {
//               if (tempitems[i].post_type == category) {
//                 var found = jQuery.inArray(tempitems[i], temp_result);
//                 if (found < 0) {
//                   temp_result.push(tempitems[i]);
//                 }
//               }
//           }
//         }
//       }
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//
//     if ((category == '') && (searchString != '')) {
//       if (searchString) {
//         searchString = searchString.toLowerCase();
//       }
//       angular.forEach(tempitems, function (item) {
//         if ((item.title.toLowerCase().indexOf(searchString) !== -1) || (item.content.toLowerCase().indexOf(searchString) !== -1)) {
//           temp_result.push(item);
//         }
//       });
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//
//     if ((category != '') && (searchString != '')) {
//       if (tempitems) {
//         for (var i = 0; i < tempitems.length; i++) {
//           if (tempitems[i].post_type !== undefined) {
//             if (tempitems[i].post_type == category) {
//               var found = jQuery.inArray(tempitems[i], temp_result1);
//               if (found < 0) {
//                 temp_result1.push(tempitems[i]);
//               }
//             }
//           }
//         }
//         if (searchString) {
//           searchString = searchString.toLowerCase();
//         }
//         angular.forEach(temp_result1, function (item) {
//           if ((item.title.toLowerCase().indexOf(searchString) !== -1)) {
//             temp_result.push(item);
//           }
//
//         });
//       }
//
//       max = itemPerPage * number;
//       min = max - itemPerPage;
//       if (max > temp_result.length) {
//         max = temp_result.length;
//       }
//       $filter.pagination(temp_result);
//       for (var i = min; i < max; i++) {
//         result.push(temp_result[i]);
//       }
//     }
//     return result;
//   }
// }]);