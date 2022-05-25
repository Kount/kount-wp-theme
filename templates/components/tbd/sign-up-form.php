<section class= "sign-up-form">
  <div class="bg-pattern"></div>
  <div class= "container">
    <div class= "intro-left-align wow fadeInUp" data-wow-delay="0.3s">
      <h2>Event: Mobile Payments Conference</h2>
      <p>
        The Mobile Payments Conference is more than mobile payments, it is an invitation into a growing elite group of professionals
        who are holding a conversation that never ends. The conference is the pivotal intersection between end users, operations, marketing,
        finance and technology where we will discuss and answer all of your questions. We will do more than just talk and present products but walk
        through the experience that helps you personalize the mobile solutions.
      </p>
    </div>
    <div class= "form-wrap wow fadeInUp" data-wow-delay="0.4s">
      <div class= "detail-tab block">
        <h3>Event Details</h3>
        <div class="content">
          <span>When</span>
          <h6 class="bottom-space">Monday, August 25, 2019</h6>
          <h6>9:15 AM - 12:00 PM</h6>
        </div>
        <div class="content">
          <span>Where</span>
          <a href="#"><h6 class="underline bottom-space">Swissotel Chicago</h6></a>
          <p>323 Wacker Dr.
            Chicago, IL 60601
          </p>
          <a href="#" class="link-arrow arrow-white">Map</a>
        </div>
        <div class="content">
          <span>Who</span>
          <h6>Merchants Only</h6>
        </div>
      </div>
      <div class= "form-tab block">
        <p>Fill out this quick form to sign up</p>
         <span>All required fields are marked with a *</span>
        <div class= "col-wrap">
          <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
          <form id="mktoForm_1154"></form>
          <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1154,function (form) {
                  form.onSuccess(function (values, followUpUrl) {
                      var message = "<div class='thank-msg'><p>Thank you for showing interest in the Events by Kount!</p></div>";
                      jQuery(".form-tab").html(message);
                      setTimeout(function () {
                          jQuery(".form-tab").addClass('active');
                          $('.form-wrapper #confirmform').removeAttr('style'); //footer form untriggered
                      }, 100);

                      return false;
                  });
              });</script>
      </div>

    </div>
<!--   <div class="btn-center">-->
<!--     <a href="#" class=" btn-default" data-text="Back to Events"><span>Back to Events</span></a>-->
<!--   </div>-->
  </div>
</section>