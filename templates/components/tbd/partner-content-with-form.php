<section class= "partner-content-with-form">
  <div class= "container">
    <div class="content-wrap">
      <div class="col-form wow fadeIn">
         <script src="https://js.chilipiper.com/marketing.js" type="text/javascript"></script>
         <script>ChiliPiper.scheduling("kount", "partner-channel-router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })</script>
         <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
         <div id="form-wrap" class="form-wrap">
            <form id="mktoForm_1098"></form>
            <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1098, function (form) {
              form.onSuccess(function (values, followUpUrl) {
                  var message = "<div class='thank-msg'><p>Thank you for your interest in partnering with Kount.  A Kount representative will contact you soon.</p></div>";
                  document.getElementById("form-wrap").innerHTML = message;
                  setTimeout(function () {
                      document.getElementById("form-wrap").classList.add('active');
                      document.getElementById('confirmform').removeAttribute('style'); //footer form untriggered
                  }, 100);

                  return false;
              });
            });</script>
          </div>
        </div>
      <div class="col-wrap wow fadeIn">
        <img src="/wp-content/themes/kount/templates/dist/images/BlueSnap.png" alt="BlueSnap">
        <img src="/wp-content/themes/kount/templates/dist/images/braintree.png" alt="Braintree">
        <img src="/wp-content/themes/kount/templates/dist/images/cayan.png" alt="Cayan">
        <img src="/wp-content/uploads/2019/02/Pulse@2x.png" alt="Chase">
        <img src="/wp-content/themes/kount/templates/dist/images/conekta.png" alt="Conekta">
        <img src="/wp-content/themes/kount/templates/dist/images/etisalat.png" alt="Etisalat">
        <img src="/wp-content/themes/kount/templates/dist/images/eway.png" alt="Eway">
        <img src="/wp-content/themes/kount/templates/dist/images/first_atlantic_commerce.png" alt="First atlantics">
        <img src="/wp-content/themes/kount/templates/dist/images/gpg.png" alt="Gpg">
        <img src="/wp-content/themes/kount/templates/dist/images/jpmorgan.png" alt="Jp morgan">
        <img src="/wp-content/themes/kount/templates/dist/images/l.png" alt="L">
        <img src="/wp-content/themes/kount/templates/dist/images/maxi_pago.png" alt="max- pago">
        <img src="/wp-content/themes/kount/templates/dist/images/moneris.png" alt="moneris">
        <img src="/wp-content/themes/kount/templates/dist/images/openpay.png" alt="openpay">
        <img src="/wp-content/themes/kount/templates/dist/images/pay_certify.png" alt="paycertify">
        <img src="/wp-content/themes/kount/templates/assets/images/pinpoint_intelligence.png" alt="pinpoint">
        <img src="/wp-content/themes/kount/templates/dist/images/recurly.png" alt="recurly">
        <img src="/wp-content/themes/kount/templates/dist/images/sage.png" alt="sage">

      </div>
    </div>
  </div>
</section>