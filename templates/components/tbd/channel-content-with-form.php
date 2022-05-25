<section class= "channel-content-with-form">
  <div class= "container">
    <div class="content-wrap">
      <div class="col-wrap wow fadeInUp">
        <img src="/wp-content/themes/kount/templates/dist/images/two-colleague-penta.jpg" alt="pentagon">
      </div>
       <div class="col-form wow fadeInRight">
          <div id="form-wrap" class="form-wrap">
            <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
            <form id="mktoForm_1102"></form>
            <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1102, function (form) {
                    document.querySelector('body .refresh19 .channel-content-with-form .content-wrap .col-form .mktoButtonRow .mktoButtonWrap .mktoButton').click(function(e) {
                        var error = "<div class='error-msg'><p></p></div>";
                        if (document.getElementById('RP_Accepted_T_C__c').checked) {
                            document.getElementById("RP_Accepted_T_C__c").nextElementSibling.innerHTML = error;
                        }
                        else if (document.getElementById('RP_Accepted_T_C__c').checked == false) {
                            var error = "<div class='error-msg'><p>*Please tick the checkbox</p></div>";
                            document.getElementById("RP_Accepted_T_C__c").nextElementSibling.innerHTML = error;
                            document.getElementById("RP_Accepted_T_C__c").querySelector('.mktoCheckboxList').classList.add('error');
                            e.preventDefault();
                        }
                    });
                    form.onSuccess(function (values, followUpUrl) {
                        var message = "<div class='thank-msg'><p>Thank you for your interest in, and applying to, our Referral Partner Program. " +
                            "Your application is being reviewed. If your application passes initial review, we will be in contact within one week. " +
                            "Please note: passing initial review does not guarantee acceptance into the Referral Partner Program.</p></div>";
                        document.getElementById("form-wrap").innerHTML = message;
                        setTimeout(function () {
                            document.getElementById("form-wrap").classList.add('active');
                            document.getElementById("confirmform").removeAttribute('style'); //footer form untriggered
                        }, 100);

                        return false;
                    });
                });</script>
          </div>
         <div class="btn-wrap">
           <button class="btn-default" type="submit" id= "term-btn" data-text="Terms and Condition"><span>Terms and Condition</span></button>
         </div>
        </div>
    </div>
  </div>
</section>