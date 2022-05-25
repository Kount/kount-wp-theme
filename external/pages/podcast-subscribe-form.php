<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../style/css/style.css">
    <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
  </head>
  <body class="subscribe">
    <div class="thank-you" id="podcast-confirm-form" style="display: none;">
      <p>Thank you for subscribing.</p>
    </div>
    <form id="mktoForm_1378"></form>
    <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1378);</script>
    <script type="text/javascript">
      MktoForms2.whenReady(function (form) {
        if(form.getId()	== 1378) {
          form.onValidate(function (builtInValid) {
            if (!builtInValid) return;
            form.submittable(true);
            var vals = form.vals();
            var invalidDomains = ["yahoo.com", "gmail.com", "mailinater.com", "live.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "earthlink.net", "aol.com"],
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

          form.onSuccess(function (values, followUpUrl) {

            form.getFormElem().css("display", "none");
            // $('.form-wrapper #blog-sidebar-form-wrapper form').css("visibility", 'hidden');
            document.getElementById('podcast-confirm-form').style.display = "flex";
            return false;
          });
        }
      });

    </script>
  </body>
</html>
