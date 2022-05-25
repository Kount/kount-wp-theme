document.addEventListener('DOMContentLoaded', function(event) {
  if(document.querySelector('.toggle-demo-form') !== null) {
    document.querySelector('.toggle-demo-form').addEventListener('click', function (event) {
      event.preventDefault();

      var xhttp = new XMLHttpRequest();
      xhttp.responseType = 'json';
      xhttp.open("POST", demo_slideout_form_params.ajax_url + "?action=demo_slideout_form", true);
      xhttp.onload = function () {
        var jsonData = xhttp.response;

        document.querySelector('html').appendChild(jsonData);
        document.querySelector('.demo-form-slideout').classList.toggle('active');


      };
      xhttp.send(null);
    });

  }
});

// document.addEventListener('click', function () {
//   document.getElementById('demo-form-slideout').classList.remove('active');
// });

  // jQuery(function () {
  //
  //   jQuery('.toggle-demo-form').on('click tap', function(event) {
  //     event.preventDefault();
  //     // alert("HERE");
  //   //      $('.demo-form-slideout').toggleClass('active');
  //     let $ajaxURL = demo_slideout_form_params.ajax_url;
  //
  //     jQuery.ajax({
  //       type : "post",
  //       dataType : "json",
  //       url : $ajaxURL,
  //       data : {action: "demo_slideout_form"},
  //       success: function(response) {
  //         console.log(response);
  //         jQuery('html').append(response);
  //         jQuery('.demo-form-slideout').toggleClass('active');
  //       }
  //     });
  //   });
  // });
// });

