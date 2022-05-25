document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('search-glossary') !== null) {
    document.getElementById('search-glossary').addEventListener('keyup', function () {
      var search = this.value;
      if (search.length > 2) {
        document.getElementById('definition-list').innerHTML = '';
        var letters = document.querySelectorAll('#letters li');
        for (i = 0; i < letters.length; ++i) {
          letters[i].classList.remove('active');
        }
        // jQuery('#letters li').removeClass('active');
        this.parentElement.classList.add('active');
        document.getElementById('ajax-loader').classList.add('loading'); // insert data
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/glossary-ajax.php?search=" + search, true);
        xhttp.onload = function () {
          var jsonData = xhttp.response;

          document.getElementById('ajax-loader').classList.remove('loading');
          document.getElementById('definition-list').innerHTML = jsonData; // insert data
        };
        xhttp.send(null);
      }
      //jQuery.ajax({
      //  url: '<?php //print admin_url('admin-ajax.php');?>//',
      //  type: 'POST',
      //  data: {
      //    action: 'glossary_search',
      //    search: search,
      //    nonce: '<?php //print wp_create_nonce('glossary_nonce'); ?>//'
      //  },
      //  success: function (data) {
      //    // console.log(data); // the HTML result of that URL after submit the data
      //    jQuery('#ajax-loader').removeClass('loading'); // insert data
      //    jQuery('#definition-list').html(data); // insert data
      //  },
      //  error: function (errorThrown) {
      //    console.log(errorThrown); // error
      //  }
      //});
      // }
    });
  // }
  // window.onload = function () {

  // if (document.getElementById('search-glossary') !== null) {
    document.getElementById("search-glossary").addEventListener('keyup', function () {
      var search = this.value;

      if (search.length > 2) {
        document.getElementById('definition-list').innerHTML = '';
        var letters = document.querySelectorAll('#letters li');
        for (i = 0; i < letters.length; ++i) {
          letters[i].classList.remove('active');
        }
        this.parentElement.classList.add('active');
        document.getElementById('ajax-loader').classList.add('loading'); // insert data
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/glossary-ajax.php?search=" + search, true);
        xhttp.onload = function () {
          var jsonData = xhttp.response;

          document.getElementById('ajax-loader').classList.remove('loading');
          document.getElementById('definition-list').innerHTML = jsonData; // insert data
        };
        xhttp.send(null);
      }

    });

    var letterLinks = document.querySelectorAll('#letters .letter-link');
    for (j=0; j<letterLinks.length; ++j) {
      letterLinks[j].addEventListener('click', function (event) {
        event.preventDefault();
        var letterIndex = this.dataset.letter;
        document.getElementById('definition-list').innerHTML = '';
        var letters = document.querySelectorAll('#letters li');
        for (i = 0; i < letters.length; ++i) {
          letters[i].classList.remove('active');
        }
        this.parentElement.classList.add('active');
        document.getElementById('ajax-loader').classList.add('loading'); // insert data
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/glossary-ajax.php?index=" + letterIndex, true);
        xhttp.onload = function () {
          var jsonData = xhttp.response;

          document.getElementById('ajax-loader').classList.remove('loading');
          document.getElementById('definition-list').innerHTML = jsonData; // insert data
        };
        xhttp.send(null);
      });
    }
    // document.querySelectorAll('#letters .letter-link').on('click', function (event) {
    //   event.preventDefault();
    //   var letterIndex = this.dataset.letter;
    //   document.getElementById('definition-list').innerHTML = '';
    //   var letters = document.querySelectorAll('#letters li');
    //   for (i = 0; i < letters.length; ++i) {
    //     letters[i].classList.remove('active');
    //   }
    //   this.parentElement.classList.add('active');
    //   document.getElementById('ajax-loader').classList.add('loading'); // insert data
    //   var xhttp = new XMLHttpRequest();
    //   xhttp.responseType = 'json';
    //   xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/glossary-ajax.php?index=" + letterIndex, true);
    //   xhttp.onload = function () {
    //     var jsonData = xhttp.response;
    //
    //     document.getElementById('ajax-loader').classList.remove('loading');
    //     document.getElementById('definition-list').innerHTML = jsonData; // insert data
    //   };
    //   xhttp.send(null);
    // });

    //jQuery('#definition-list').html('');
    //  jQuery('#letters li').removeClass('active');
    //  jQuery(this).parent().addClass('active');
    //  jQuery('#ajax-loader').addClass('loading'); // insert data
    //  jQuery.ajax({
    //    url: '<?php //print admin_url('admin-ajax.php');?>//',
    //    type: 'POST',
    //    data: {
    //      action: 'glossary_filter',
    //      index: jQuery(this).data('letter'),
    //      nonce: '<?php //print wp_create_nonce('glossary_nonce'); ?>//'
    //    },
    //    success: function (data) {
    //      // console.log(data); // the HTML result of that URL after submit the data
    //      jQuery('#ajax-loader').removeClass('loading'); // insert data
    //      jQuery('#definition-list').html(data); // insert data
    //    },
    //    error: function (errorThrown) {
    //      console.log(errorThrown); // error
    //    }
    //  });
    //});

    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    xhttp.open("GET", "/wp-content/themes/kount/templates/components/ajax/glossary-ajax.php?index=a", true);
    xhttp.onload = function () {
      var jsonData = xhttp.response;
      document.getElementById('ajax-loader').classList.remove('loading');
      document.getElementById('definition-list').innerHTML = jsonData; // insert data
    };
    xhttp.send(null);

    //jQuery.ajax({
    //url: '<?php //print admin_url('admin-ajax.php');?>//',
    //type: 'POST',
    //data: {
    //  action: 'glossary_filter',
    //  index: 'a',
    //  nonce: '<?php //print wp_create_nonce('glossary_nonce'); ?>//'
    //},
    //success: function (data) {
    //  // console.log(data); // the HTML result of that URL after submit the data
    //  jQuery('#definition-list').html(data); // insert data
    //},
    //error: function (errorThrown) {
    //  console.log(errorThrown); // error
    //}
  // });
  }
});
