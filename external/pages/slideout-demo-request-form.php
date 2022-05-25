<!DOCTYPE html>
<?php
    $eventAction = (isset($_GET['eventAction'])) ? ' - ' . $_GET['eventAction'] : "";
?>
<html>
  <head>
    <link rel="stylesheet" href="../style/css/style.css">
    <script src="https://js.chilipiper.com/marketing.js" type="text/javascript"></script>
    <!--    <script>ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })</script>-->
    <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6692130-5"></script>

    <script> window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-6692130-5');
      // gtag('config', 'AW-979027621');
      // gtag('config', 'G-2NLJ5ZF8JF');
        gtag('event','Demo Slideout Form - Button Clicked<?php print $eventAction; ?>', {
            'event_category': 'Demo Slideout Form',
            'event_label': 'Page: ' + parent.window.document.location + ' | IP: <?php print $_SERVER['REMOTE_ADDR']?>'
        });

    </script>

    <style>
      .demo-form {
        width: 315px;
        margin: 0 auto;
      }
      .chilipiper-popup {
        background: #ffffff !important;
      }
    </style>
  </head>
  <body class="demo-form">
  <!-- Google Tag Manager (noscript) -->
<!--  <noscript><iframe-->
<!--              height="0" width="0" style="display:none;visibility:hidden;" src="https://www.googletagmanager.com/ns.html?id=G-2NLJ5ZF8JF"></iframe>-->
<!--  </noscript>-->
  <div id="demo-request-success"></div>
    <script type="text/javascript">
      MktoForms2.whenReady(function (form) {
        //Hide loader icon
        document.getElementById('ajax-loader').style.display = "none";
        var formId = form.getId();
        if (formId == 1392) {

          // ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })
          form.onValidate(function (builtInValid) {
            if (!builtInValid) return;
            form.submittable(true);
            var vals = form.vals();
            var invalidDomains = ["yahoo.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "earthlink.net", "mailinator.com", "aol.com", "gmail.com"],
                emailExtendedValidationError = 'Please enter your business email address.',
                emailField = 'Email',
                emailFieldSelector = '#' + emailField;
            var invalidDomainRE = new RegExp('@(' + invalidDomains.join('|') + ')$', 'i');
            if (invalidDomainRE.test(form.vals()[emailField])) {
              form.showErrorMessage(emailExtendedValidationError,
                  form.getFormElem().find(emailFieldSelector)
              );
              form.submittable(false);
            }
            var emailRegExp = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;
            var validEmail = emailRegExp.test(vals.Email);
            if (!validEmail) {
              form.showErrorMessage(emailExtendedValidationError,
                  form.getFormElem().find(emailFieldSelector)
              );
              form.submittable(false);
            }
          });

          // form.onSubmit(function() {
            //Only track GA, Bing, and LinkedIn if no one is logged in

            // const htmlElement = document.querySelector('html');
            // if(htmlElement.classList.contains('logged-out')) {
            //   gtag_report_conversion(window.location.href);
            //   //   // alert("calling bing");
            //   bing_demo_request_conversion();
            //   //   // alert("calling linked in");
            //   linkedin_event_pixel('3268124');
            // } // true

            // if(jQuery('html').hasClass('logged-out')) {
            //   //   // alert("calling gtag");
            //   gtag_report_conversion(window.location.href);
            //   //   // alert("calling bing");
            //   bing_demo_request_conversion();
            //   //   // alert("calling linked in");
            //   linkedin_event_pixel('3268124');
            // }
          // });

          form.onSuccess(function (values, followUpUrl) {
            // alert("success");
            form.getFormElem().hide();

            ChiliPiper.submit("kount", "demo_slide_router", {
              title: "Thanks! What time works best for a quick call?",
              titleStyle: "Roboto 22px #2f3640",
              formId: "mktoForm_1392"
            });

            var message = '<p style="text-align: center; padding: 30px 0;"><strong>Thank you for scheduling a demo.</strong></p>';
            document.getElementById('demo-request-success').innerHTML = message;
            // jQuery("#demo-request-success").html(message);

              //Record successful form submission as event
              gtag('event','Demo Slideout Form - Form Submitted', {
                  'event_category': 'Demo Slideout Form',
                  'event_label': 'Page: ' + parent.window.document.location + ' | IP: <?php print $_SERVER['REMOTE_ADDR']?>'
              });

            return false;
          });
        }
      });
    </script>
    <form id="mktoForm_1392"></form>
    <div class="ajax-loader" id="ajax-loader" style="display: block; padding: 40px 0; text-align: center;">
      <img src="/wp-content/themes/kount/templates/dist/images/ajax-loader.gif" alt="Loading..." width="32" height="32" class="lazyload">
    </div>
    <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1392);</script>

      <!-- Bizible -->
      <script type="text/javascript" src="//cdn.bizible.com/scripts/bizible.js" async=""></script>

  </body>
</html>
