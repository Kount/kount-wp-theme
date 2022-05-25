document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('press-release-results') !== null) {
    var currentPageInput = document.getElementById('current-page');
    function getPressReleases() {
      var div = this;
      // console.log('scrolled');
      // console.log(div);

      // console.log('div.scrollHeight = ' + div.scrollHeight);
      // console.log('div.scrollTop = ' + div.scrollTop);
      // console.log('div.clientHeight = ' + div.clientHeight);

      if ((div.scrollHeight - div.scrollTop) == div.clientHeight) {
        // do the lazy loading here
        // currentPageInput.value = parseInt(currentPageInput.value) + 1;
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/press-grid-ajax.php?paged=" + currentPageInput.value, true);
        xhttp.onload = function () {
          var jsonData = xhttp.response;

          document.getElementById('press-release-results').appendChild(jsonData.toDOM());
          currentPageInput.value = parseInt(currentPageInput.value) + 1;
          // console.log('currentPageInput = ' + currentPageInput.value);
          if (jsonData == "") {
            document.getElementById('load-more-label').innerHTML = '<p><em>No more press releases to load</em></p>';
            document.getElementById('press-release-results').removeEventListener('scroll', getPressReleases);
          }
        };
        xhttp.send(null);
      }
    }

    // getPressReleases(true);
    // currentPageInput.value = parseInt(currentPageInput.value) + 1;
    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/press-grid-ajax.php?paged=" + currentPageInput.value, true);
    xhttp.onload = function () {
      var jsonData = xhttp.response;

      document.getElementById('press-release-results').appendChild(jsonData.toDOM());
      currentPageInput.value = parseInt(currentPageInput.value) + 1;
      // console.log('currentPageInput = ' + currentPageInput.value);

      if (jsonData == "") {
        // currentPageInput.value = parseInt(currentPageInput.value) + 1;
        document.getElementById('load-more-label').innerHTML = '<p><em>No more press releases to load</em></p>';
        document.getElementById('press-release-results').removeEventListener('scroll', getPressReleases);
      }
    };
    xhttp.send(null);


    document.getElementById('press-release-results').addEventListener('scroll', getPressReleases);
  }

});

// // Use $ instead of $ without replacing global $
// (function ($) {

  // if($('#press-release-results').length) {
  //
  //   var currentPageInput = $('#current-page');
  //   // $('#load-more-label').html('<p><em class="wow fadeIn">Loading...</em></p>');
  //
  //   $.ajax({
  //     type: "GET",
  //     url: "/wp-content/themes/kount/templates/components/ajax/press-grid-ajax.php?paged=" + currentPageInput.val(),
  //     success: function(response)
  //     {
  //       // console.log(response);
  //       var jsonData = JSON.parse(response);
  //
  //       $('#press-release-results').append(jsonData);
  //       // $('#load-more-label').html('<p></p>');
  //
  //     }
  //   });
  //
  //   $('#press-release-results').on('scroll', function() {
  //     var div = $(this).get(0);
  //     if(div.scrollTop + div.clientHeight >= div.scrollHeight) {
  //       // do the lazy loading here
  //       currentPageInput.val( parseInt(currentPageInput.val()) + 1 );
  //
  //       // $('#load-more-label').html('<p><em class="wow fadeIn">Loading...</em></p>');
  //
  //       $.ajax({
  //         type: "GET",
  //         url: "/wp-content/themes/kount/templates/components/ajax/press-grid-ajax.php?paged=" + currentPageInput.val(),
  //         success: function(response)
  //         {
  //           // console.log(response);
  //           var jsonData = JSON.parse(response);
  //
  //           $('#press-release-results').append(jsonData);
  //           if(jsonData == "") {
  //             $('#load-more-label').html('<p><em>No more press releases to load</em></p>');
  //             $('#press-release-results').unbind('scroll');
  //           }
  //
  //         }
  //       });
  //     }
  //   });
  // }

// })(jQuery);
