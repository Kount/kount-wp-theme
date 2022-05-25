<?php
  $form_id = get_sub_field('marketo_form_id');
  $activate_page_redirect = get_sub_field('activate_page_redirect');
  $css_class = get_sub_field('css_class');

$inline_message = "";
  $page_redirect = "";
  if($activate_page_redirect) {
    $page_redirect = get_sub_field('page_redirect');
  }
  else {
    $inline_message = get_sub_field('inline_message');
  }
?>

<section id="anchor" class="marketo-form-embed wow fadeIn<?php if($css_class != ''): print ' ' . $css_class; endif; ?>">
  <div class="container">
    <?php if($title != ""): ?>
    <p class="header wow fadeIn"><?php echo $title;?></p>
    <?php endif; ?>
    <div id="form-wrapper" class="wow fadeIn" data-wow-delay="0.4s">
      <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
      <form id="mktoForm_<?php echo $form_id;?>"></form>
      <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", <?php echo $form_id;?>, function (form) {
          MktoForms2.whenReady(function (form) {
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

            form.onSuccess(function (values, followUpUrl) {
              var message = '<p class="text-center py-5"><?php echo $inline_message;?></p>';
              jQuery("#form-wrapper").html(message);
              return false;
            });
          });
        });</script>
    </div>
  </div>
</section>