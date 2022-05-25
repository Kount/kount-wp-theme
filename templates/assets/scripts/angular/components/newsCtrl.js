//
// app.controller("blogpost", ['$http', '$scope', '$filter', '$timeout', function ($http, $scope, $filter, $timeout) {
//   $scope.query = {};
//   $scope.filteron = true;
//   $scope.loadcount = 12;
//   $scope.language = jQuery('html').attr('lang');
//   $scope.itemPerPage = 12; // set per page item number (predefine, change also in directive)
//   $scope.items = [];
//   $scope.count = '';
//   $scope.selectCategory = '';
//   $scope.selectAuthor = '';
//   $scope.number = '';
//   $scope.last_page = '';
//   $scope.first = false;
//   $scope.last = true;
//   $scope.searchString = '';
//   $scope.page_value = '';
//   $scope.currentPage = 0;
//   $scope.currentValue = 1;
//   $scope.paginationSize = 10;
//   var min = 0;
//   var max = $scope.itemPerPage;
//   /* Called to get blog contents */
//   /* Load Blog post on click  */
//   $scope.loadpost = function (countPost) {
//     var pageNumber = countPost / 12;
//     $scope.loadcount = 12 * (1 + pageNumber);
//   }
//   /* Get hash value from url */
//   $scope.getHash = function (author) {
//     $scope.currentValue = 1;
//     $scope.selectAuthor = author;
//     $scope.number = 1;
//   }
//   $http.get('/wp-content/themes/kount/templates/components/view/post-json/news-json.php').then(function (response) {
//     $scope.tempitems = response.data;
//     if ($scope.tempitems) {
//       $scope.pagination($scope.tempitems);
//     }
//     if ($scope.tempitems.length <= $scope.itemPerPage) {
//       max = $scope.tempitems.length;
//       $scope.itemPerPage = $scope.tempitems.length;
//     }
//     for (var i = min; i < max; i++) {
//       $scope.items.push($scope.tempitems[i]);
//     }
//     setTimeout(function () {
//       jQuery('.news-card-grid .filter-wrapper select').selectBoxIt().data("selectBox-selectBoxIt").refresh();
//     }, 300);
//   });
//   $scope.blogCategory = function (str) {
//     $scope.currentValue = 1;
//     $scope.selectCategory = str;
//     $scope.number = 1;
//   }
//   /*
//    * Call function on load time before apply any filter
//    */
//   $scope.pagination = function (str) {
//     $scope.count = str.length;
//     var str1 = parseInt($scope.count / $scope.itemPerPage);
//     var str2 = $scope.count % $scope.itemPerPage;
//     if (str2) {
//       str2 = 1;
//     }
//     $scope.pagination_number = str1 + str2;
//     $scope.page_no = [];
//     for (var i = 1; i <= $scope.pagination_number; i++) {
//       $scope.last_page = $scope.pagination_number;
//       $scope.page_no.push(i);
//     }
//   }
//   $scope.paginationOffset = function () {
//     var range = (Math.floor($scope.paginationSize / 2)) + 1;
//     if (($scope.currentValue - range) < 0) {
//       return 0;
//     } else if (($scope.currentValue + range) >= $scope.pagination_number) {
//       return ($scope.pagination_number - $scope.paginationSize < 0) ? 0 : $scope.pagination_number - $scope.paginationSize;
//     } else {
//       return $scope.currentValue - range;
//     }
//   };
//
//   $scope.reinit = function (str) {
//     $scope.number = 1;
//     $scope.currentValue = 1;
//     if (!str) {
//       $scope.searchString = '';
//     }
//   }
//   /*
//    * Get current active page on click
//    */
//   $scope.current_page = function (str, event) {
//     $scope.number = str;
//     $scope.currentValue = $scope.number;
//     jQuery('li').removeClass('active');
//     jQuery("html, body").animate({scrollTop: jQuery('.news-card-grid .filter-wrapper').offset().top - 150}, "slow");
//     if (($scope.selectCategory == '')) {
//       max = $scope.itemPerPage * str;
//       min = max - $scope.itemPerPage;
//       if (max > $scope.count) {
//         max = $scope.count;
//       }
//       $scope.items = [];
//       for (var i = min; i < max; i++) {
//         $scope.items.push($scope.tempitems[i]);
//       }
//       if (str == $scope.last_page) {
//         $scope.last = false;
//         $scope.first = true;
//       } else if (str == 1) {
//         $scope.last = true;
//         $scope.first = false;
//       } else {
//         $scope.first = true;
//         $scope.last = true;
//       }
//     } else {
//       if (str == $scope.last_page) {
//         $scope.last = false;
//         $scope.first = true;
//       } else if (str == 1) {
//         $scope.last = true;
//         $scope.first = false;
//       } else {
//         $scope.first = true;
//         $scope.last = true;
//       }
//     }
//   }
//   /*
//    * Call when click on next  button
//    */
//   $scope.page_next = function () {
//     $scope.first = true;
//     jQuery("html, body").animate({scrollTop: jQuery('.news-card-grid .filter-wrapper').offset().top - 150}, "slow");
//     var str = parseInt(jQuery('.pagination li.active span').text());
//     if (str != $scope.pagination_number) {
//       var next_active = str + 1;
//       $scope.currentValue = next_active;
//       jQuery('.pagination li').removeClass('active');
//       $scope.current_page(next_active);
//       if (next_active == $scope.last_page) {
//         $scope.last = false;
//       }
//     }
//   }
//   /*
//    * Call when click on previous  button
//    */
//   $scope.page_prev = function () {
//     $scope.last = true;
//     jQuery("html, body").animate({scrollTop: jQuery('.news-card-grid .filter-wrapper').offset().top - 150}, "slow");
//     var str = parseInt(jQuery('.pagination li.active span').text());
//     if (str != 1) {
//       var prev_active = str - 1;
//       $scope.currentValue = prev_active;
//       jQuery('.pagination li').removeClass('active');
//       $scope.current_page(prev_active);
//       if (prev_active == $scope.last_page) {
//         $scope.last = false;
//       }
//       if (prev_active == 1) {
//         $scope.first = false;
//       }
//     }
//   }
//
//   /*
//    * Call function after filter apply
//    */
//   $scope.filter_temp = '';
//   $filter.pagination = function (str) {
//     $scope.count = str.length;
//     var str1 = parseInt($scope.count / $scope.itemPerPage);
//     var str2 = $scope.count % $scope.itemPerPage;
//     if (str2) {
//       str2 = 1;
//     }
//     $scope.pagination_number = str1 + str2;
//     $scope.page_no = [];
//     for (var i = 1; i <= $scope.pagination_number; i++) {
//       $scope.last_page = $scope.pagination_number;
//       $scope.page_no.push(i);
//     }
//     $scope.filter_temp = str;
//   }
//
// }]);