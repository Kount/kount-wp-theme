document.addEventListener('DOMContentLoaded', function(event) {
  function bindPagination() {
    //Page number clicked. Do pagination.
    if(document.getElementById('resource-pagination')) {
      var gridOffset = document.getElementById('resource-grid').offsetTop;
      // console.log('gridOffset = ' + gridOffset);
      var pageNums = document.querySelectorAll('#resource-pagination .page-num');
      // console.log(pageNums);
      for (i = 0; i < pageNums.length; ++i) {
        // pageNums[i].classList.remove('current-page');
        pageNums[i].addEventListener('click', function (e) {
          // console.log('do pagination 0');
          // console.log(this);
          e.preventDefault();

          this.classList.add('current-page');
          // document.querySelector('#resource-pagination .page-num').classList.remove('current-page');

          var excludeId = document.getElementById('exclude');
          var resourceType = document.getElementById('resource-type');
          var searchTerm = document.getElementById('content-search');
          var isWebPEnabled = document.getElementById('webp-enabled');

          var pagingParams = "";
          if (excludeId !== null) {
            pagingParams += "&exclude=" + excludeId.value;
          }
          if (resourceType !== null) {
            pagingParams += "&type=" + resourceType.value;
          }
          if (searchTerm !== null) {
            pagingParams += "&search=" + searchTerm.value;
          }
          if (isWebPEnabled !== null) {
            pagingParams += "&webp=" + isWebPEnabled.value;
          }

          // console.log("pagingParams = " + pagingParams);

          var pageNum = this.dataset.pageNum;
          // console.log("pageNum = " + pageNum);
          document.getElementById('current-page').value = pageNum;

          var xhttp = new XMLHttpRequest();
          xhttp.responseType = 'json';
          xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/resources-grid-ajax.php?paging=1&paged=" + pageNum + pagingParams, true);
          // xhttp.send();
          xhttp.onload = function () {
            document.getElementById('resources-status').innerHTML = "";

            // var jsonResponse = xhttp.response;
            // var jsonData = xhttp.response;
            // container.appendChild(jsonData[1].toDOM());

            var jsonData = xhttp.response[0];
            var pagination = xhttp.response[1];

            document.getElementById('load-more-resources-results').innerHTML = '';
            document.getElementById('load-more-resources-results').appendChild(jsonData.toDOM());

            document.getElementById('resource-pagination').innerHTML = '';
            document.getElementById('resource-pagination').appendChild(pagination.toDOM());

            //Scroll to where the last scroll position was before appending results
            // $('html, body').animate({scrollTop: gridOffset}, 800);
            document.querySelector('html').scrollTo({top: gridOffset, behavior: "smooth"});

            //Bind pagination again since we repainted
            bindPagination();
          };
          xhttp.send(null);
        });
      }
    }
  }

  function bindSearch() {
    if(document.getElementById('content-search') !== null) {
      document.getElementById('content-search').addEventListener('keyup', function (e) {
        var searchTerm = this;
        var resourceType = document.getElementById('resource-type');
        var excludeId = document.getElementById('exclude');
        var isWebPEnabled = document.getElementById('webp-enabled');

        var searchParams = "";
        if (excludeId !== null) {
          searchParams += "&exclude=" + excludeId.value;
        }
        if (resourceType !== null) {
          searchParams += "&type=" + resourceType.value;
        }
        if (searchTerm !== null) {
          searchParams += "&search=" + searchTerm.value;
        }
        if (isWebPEnabled !== null) {
          urlParams += "&webp=" + isWebPEnabled.value;
        }

        // alert(searchTerm);
        if (searchTerm.value.length == 0 || searchTerm.value.length > 2) {
          var xhttp = new XMLHttpRequest();
          xhttp.responseType = 'json';
          xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/resources-grid-ajax.php?paging=1&paged=1" + searchParams, true);
          // xhttp.send();
          xhttp.onload = function () {
            document.getElementById('resources-status').innerHTML = "";

            // var jsonResponse = xhttp.response;
            var jsonData = xhttp.response;
            // container.appendChild(jsonData[1].toDOM());

            var jsonData = xhttp.response[0];
            var pagination = xhttp.response[1];

            document.getElementById('load-more-resources-results').innerHTML = '';
            document.getElementById('load-more-resources-results').appendChild(jsonData.toDOM());

            document.getElementById('resource-pagination').innerHTML = '';
            document.getElementById('resource-pagination').appendChild(pagination.toDOM());

            if (jsonData.length < 1) {
              document.getElementById('resources-status').innerHTML = 'No Resources Found';
            }
            else {
              //Bind pagination.
              bindPagination();
            }

            // do something with jsonResponse
          };
          xhttp.send(null);
        }
      });
    }
  }

  if(document.getElementById('resource-grid') !== null) {
    var currentPageInput = document.getElementById('current-page');
    var excludeId = document.getElementById('exclude');
    var resourceType = document.getElementById('resource-type');
    var isWebPEnabled = document.getElementById('webp-enabled');

    // alert(resourceType.val());
    var urlParams = "";
    if (excludeId !== null) {
      urlParams += "&exclude=" + excludeId.value;
    }
    if (resourceType !== null) {
      urlParams += "&type=" + resourceType.value;
    }
    if (isWebPEnabled !== null) {
      urlParams += "&webp=" + isWebPEnabled.value;
    }

    document.getElementById('resources-status').innerHTML = 'Loading...';

    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/resources-grid-ajax.php?paging=1&paged=" + currentPageInput.value + urlParams, true);
    // xhttp.send();
    xhttp.onload = function () {
      document.getElementById('resources-status').innerHTML = "";

      // var jsonResponse = xhttp.response;
      // var jsonData = xhttp.response;
      // container.appendChild(jsonData[1].toDOM());

      var jsonData = xhttp.response[0];
      var pagination = xhttp.response[1];

      // document.getElementById('load-more-resources-results').innerHTML = '';
      document.getElementById('load-more-resources-results').appendChild(jsonData.toDOM());

      // document.getElementById('resource-pagination').innerHTML = '';
      document.getElementById('resource-pagination').appendChild(pagination.toDOM());

      //Search
      bindSearch();

      //Bind pagination.
      bindPagination();


    };
    xhttp.send(null);
  }
});