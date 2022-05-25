document.addEventListener('DOMContentLoaded', function(event) {

  if(document.getElementById('load-more-news-results') !== null) {
    var loadMoreBtn = document.getElementById('load-more-news-btn');
    var currentPageInput = document.getElementById('current-page');
    var isWebPEnabled = document.getElementById('webp-enabled');

    // $('#load-more-news-btn').html('<span>LOADING...</span>').data('text', 'LOADING...');
    loadMoreBtn.innerHTML = '<span>LOADING...</span>';
    loadMoreBtn.dataset.text = 'LOADING...';

    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.value + '&webp=' + isWebPEnabled.value, true);
    xhttp.onload = function () {
      var jsonData = xhttp.response;

      document.getElementById('load-more-news-results').appendChild(jsonData.toDOM());
      loadMoreBtn.innerHTML = '<span>LOAD MORE</span>';
      loadMoreBtn.dataset.text = 'LOAD MORE';
    };
    xhttp.send(null);

    document.getElementById('load-more-news-btn').addEventListener('click', function (e) {
      e.preventDefault();
      currentPageInput.value = parseInt(currentPageInput.value) + 1;

      loadMoreBtn.innerHTML = '<span>LOADING...</span>';
      loadMoreBtn.dataset.text = 'LOADING...';

      var xhttp = new XMLHttpRequest();
      xhttp.responseType = 'json';
      xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.value + '&webp=' + isWebPEnabled.value, true);
      xhttp.onload = function () {
        var jsonData = xhttp.response;
          // console.log(response);
        // var jsonData = JSON.parse(response);

        document.getElementById('load-more-news-results').appendChild(jsonData.toDOM());
        // document.getElementById('load-more-news-btn').innerHTML = '<span>LOAD MORE</span>';
        if (jsonData == "") {
          loadMoreBtn.style.display = "none";
        }
        else {
          loadMoreBtn.innerHTML = '<span>LOAD MORE</span>';
          loadMoreBtn.dataset.text = 'LOAD MORE';
        }
      };
      xhttp.send(null);
    });


      // $.ajax({
    //   type: "GET",
    //   url: "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.val() + '&webp=' + isWebPEnabled,
    //   success: function (response) {
    //     // console.log(response);
    //     var jsonData = JSON.parse(response);
    //
    //     $('#load-more-news-results').append(jsonData);
    //     $('#load-more-news-btn').html('<span>LOAD MORE</span>').attr('data-text', 'LOAD MORE');
    //
    //   }
    // });

    // $('#load-more-news-btn').click(function (e) {
    //   e.preventDefault();
    //   currentPageInput.val(parseInt(currentPageInput.val()) + 1);
    //
    //   $('#load-more-news-btn').html('<span>LOADING...</span>').attr('data-text', 'LOADING...');
    //
    //   $.ajax({
    //     type: "GET",
    //     url: "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.val() + '&webp=' + isWebPEnabled,
    //     success: function (response) {
    //       // console.log(response);
    //       var jsonData = JSON.parse(response);
    //
    //       $('#load-more-news-results').append(jsonData);
    //       if (jsonData == "") {
    //         $('#load-more-news-btn').hide();
    //       } else {
    //         $('#load-more-news-btn').html('<span>LOAD MORE</span>').attr('data-text', 'LOAD MORE');
    //       }
    //     }
    //   });
    // });

  }

});

// // Use $ instead of $ without replacing global $
// (function ($) {
  // alert("!!");
  // $(document).ready(function () {
  // if($('#load-more-news-results').length) {
  //   var currentPageInput = $('#current-page');
  //   var isWebPEnabled = $('#webp-enabled');
  //
  //   // $('#load-more-news-btn').html('<span>LOADING...</span>').data('text', 'LOADING...');
  //   $('#load-more-news-btn').html('<span>LOADING...</span>').attr('data-text', 'LOADING...');
  //
  //   $.ajax({
  //     type: "GET",
  //     url: "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.val() + '&webp=' + isWebPEnabled,
  //     success: function (response) {
  //       // console.log(response);
  //       var jsonData = JSON.parse(response);
  //
  //       $('#load-more-news-results').append(jsonData);
  //       $('#load-more-news-btn').html('<span>LOAD MORE</span>').attr('data-text', 'LOAD MORE');
  //
  //     }
  //   });
  //
  //   $('#load-more-news-btn').click(function (e) {
  //     e.preventDefault();
  //     currentPageInput.val(parseInt(currentPageInput.val()) + 1);
  //
  //     $('#load-more-news-btn').html('<span>LOADING...</span>').attr('data-text', 'LOADING...');
  //
  //     $.ajax({
  //       type: "GET",
  //       url: "/wp-content/themes/kount/templates/components/ajax/news-grid-ajax.php?paged=" + currentPageInput.val() + '&webp=' + isWebPEnabled,
  //       success: function (response) {
  //         // console.log(response);
  //         var jsonData = JSON.parse(response);
  //
  //         $('#load-more-news-results').append(jsonData);
  //         if (jsonData == "") {
  //           $('#load-more-news-btn').hide();
  //         } else {
  //           $('#load-more-news-btn').html('<span>LOAD MORE</span>').attr('data-text', 'LOAD MORE');
  //         }
  //       }
  //     });
  //   });
  //   // });
  // }
// })(jQuery);
