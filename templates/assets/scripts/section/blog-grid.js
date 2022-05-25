document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('load-more-blogs-results') !== null) {
    var currentPageInput = document.getElementById('current-page');
    var excludeId = document.getElementById('exclude');
    var category = document.getElementById('category-id');
    var searchTerm = document.getElementById('search-term');
    var isWebPEnabled = document.getElementById('webp-enabled');
    var container = document.getElementById('load-more-blogs-results');

    var msnry;
    var urlParams = "";
    if(excludeId !== null) {
      urlParams += "&exclude=" + excludeId.value;
    }
    if(category !== null) {
      urlParams += "&category=" + category.value;
    }
    if(searchTerm !== null) {
      urlParams += "&search=" + searchTerm.value;
    }
    if(isWebPEnabled !== null) {
      urlParams += "&webp=" + isWebPEnabled.value;
    }

    document.getElementById('load-more-blogs-btn').innerHTML = 'Loading...';

    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/blogs-grid-ajax.php?paged=" + currentPageInput.value + urlParams, true);
    // xhttp.send();
    xhttp.onload  = function() {
      // var jsonResponse = xhttp.response;
      var jsonData = xhttp.response;
      // console.log(jsonData[1].toDOM());
      // var wrapper = document.createElement('wrapper');
      container.appendChild(jsonData[1].toDOM());
      // container.insertAdjacentHTML('beforeEnd', jsonData[1].toDOM());

      // container.insertAdjacentHTML('beforeEnd', jsonData[1].toDOM());

//        preg_match_all("/https?:\/\/[^\/\s]+\/\S+\.(jpg|jpeg|png)/", $html, $output_array);

      msnry = new Masonry( container, {
        columnWidth: '.grid-sizer',
        itemSelector: '.grid-item',
        gutter: 25,
        percentPosition: true
      });

      if(searchTerm.value != undefined && jsonData[1] == "") {
        document.getElementById('no-results-found').style.display = "block";
      }
      // $('#load-more-blogs-results').colcade('append', jsonData);
      if(jsonData[0]) {
        document.getElementById('load-more-blogs-btn').innerHTML = 'Load more';
      }
      else {
        document.getElementById('load-more-blogs-btn').style.display = "none";
      }

      // do something with jsonResponse
    };
    xhttp.send(null);


    document.getElementById('load-more-blogs-btn').addEventListener('click', function (e) {

      e.preventDefault();
      // alert("MORE!");
      currentPageInput.value = parseInt(currentPageInput.value) + 1;

      // loadMoreScrollPos = document.querySelector('#load-more-blogs-btn').offsetTop;
      // console.log('loadMoreScrollPos = ' + loadMoreScrollPos);
      // console.log('loadMoreScrollPos = ' + loadMoreScrollPos);

      document.getElementById('load-more-blogs-btn').innerHTML = 'Loading...';

      var xhttp = new XMLHttpRequest();
      xhttp.responseType = 'json';
      xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/blogs-grid-ajax.php?paged=" + currentPageInput.value + urlParams, true);
      // xhttp.send();
      xhttp.onload = function () {
        // var jsonResponse = xhttp.response;
        var jsonData = xhttp.response;

        //container.insertAdjacentHTML('beforeEnd', jsonData[1].toDOM());
        msnry = new Masonry( container, {
          columnWidth: '.grid-sizer',
          itemSelector: '.grid-item',
          gutter: 25,
          percentPosition: true
        });

        container.appendChild(jsonData[1].toDOM());

//        preg_match_all("/https?:\/\/[^\/\s]+\/\S+\.(jpg|jpeg|png)/", $html, $output_array);
        msnry.appended(jsonData[1].toDOM());
        msnry.reloadItems();
        msnry.layout();
        // $grid.masonry()
        //     .append( jsonData )
        //     .masonry( 'appended', jsonData )
        //     // layout
        //     .masonry();

        // $grid.masonry('layout');
        // $('#load-more-blogs-results').colcade('append', jsonData);
        if (jsonData[0]) {
          document.getElementById('load-more-blogs-btn').innerHTML = 'Load more';
        } else {
          document.getElementById('load-more-blogs-btn').style.display = "none";
        }

        //Scroll to where the last scroll position was before appending results
        // document.querySelector('html').scrollTop = loadMoreScrollPos;
        document.querySelector('html').scrollTo({top: document.getElementById('load-more-blogs-btn').offsetTop, behavior: "smooth"});
      };
      xhttp.send(null);
    });
  }
});

// // Use $ instead of $ without replacing global $
// (function ($) {
  // alert("!!");
  // $(document).ready(function () {

//   if($('#load-more-blogs-results').length) {
//     var currentPageInput = $('#current-page');
//     var excludeId = $('#exclude');
//     var category = $('#category-id');
//     var searchTerm = $('#search-term');
//     var isWebPEnabled = $('#webp-enabled');
//
//     var $grid;
//     var urlParams = "";
//     if(excludeId.val() != undefined) {
//       urlParams += "&exclude=" + excludeId.val();
//     }
//     if(category.val() != undefined) {
//       urlParams += "&category=" + category.val();
//     }
//     if(searchTerm.val() != undefined) {
//       urlParams += "&search=" + searchTerm.val();
//     }
//     if(isWebPEnabled.val() != undefined) {
//       urlParams += "&webp=" + isWebPEnabled.val();
//     }
//
//     // $('#load-more-blogs-btn').html('<span>LOADING...</span>').data('text', 'LOADING...');
//     $('#load-more-blogs-btn').html('Loading...');
//
//     $.ajax({
//       type: "GET",
//       url: "/wp-content/themes/kount/templates/components/ajax/blogs-grid-ajax.php?paged=" + currentPageInput.val() + urlParams,
//       success: function (response) {
//         // console.log(response);
//
//         var jsonData = JSON.parse(response);
//
//         $('#load-more-blogs-results').append(jsonData[1]);
// //        preg_match_all("/https?:\/\/[^\/\s]+\/\S+\.(jpg|jpeg|png)/", $html, $output_array);
//
//         $grid = $('#load-more-blogs-results').masonry({
//           columnWidth: '.grid-sizer',
//           itemSelector: '.grid-item',
//           gutter: 25,
//           percentPosition: true
//         });
//
//         if(searchTerm.val() != undefined && jsonData[1] == "") {
//           $('#no-results-found').show();
//         }
//           // $('#load-more-blogs-results').colcade('append', jsonData);
//         if(jsonData[0]) {
//           $('#load-more-blogs-btn').html('Load More');
//         }
//         else {
//           $('#load-more-blogs-btn').hide();
//         }
//       }
//     });
//
//     $('#load-more-blogs-btn').click(function (e) {
//       e.preventDefault();
//       currentPageInput.val(parseInt(currentPageInput.val()) + 1);
//
//       var loadMoreScrollPos = window.scrollY;
//       // console.log('loadMoreScrollPos = ' + loadMoreScrollPos);
//
//       $('#load-more-blogs-btn').html('Loading...');
//
//       $.ajax({
//         type: "GET",
//         url: "/wp-content/themes/kount/templates/components/ajax/blogs-grid-ajax.php?paged=" + currentPageInput.val() + urlParams,
//         success: function (response) {
//           // console.log(response);
//           var jsonData = $(JSON.parse(response)[1]);
//           // $('#load-more-blogs-results').append(jsonData);
//           $grid.masonry()
//               .append( jsonData )
//               .masonry( 'appended', jsonData )
//               // layout
//               .masonry();
//
//           // $grid.masonry('layout');
//           // $('#load-more-blogs-results').colcade('append', jsonData);
//           if (JSON.parse(response)[0]) {
//             $('#load-more-blogs-btn').html('Load More');
//           } else {
//             $('#load-more-blogs-btn').hide();
//           }
//
//           //Scroll to where the last scroll position was before appending results
//           $(window).scrollTop(loadMoreScrollPos);
//         }
//       });
//     });
//   }
// })(jQuery);
