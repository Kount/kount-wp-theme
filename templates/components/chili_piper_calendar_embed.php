<?php include 'common/variables.php';
$chiliPiperIntro = get_sub_field('chili_piper_intro');
$chiliPiperRouterUrl = get_sub_field('chili_piper_router_url');

if($chiliPiperRouterUrl != ''): ?>
<section id="anchor" class="chili-piper-section pt-4">
  <div class="container">
   <?php if($chiliPiperIntro != ""):
   print $chiliPiperIntro;
   endif; ?>
  <div class="calendar-wrap mx-auto col-lg-10 col-xl-8">
    <iframe id="calendar" src="" height="680" width="100%" marginwidth="0" marginheight="0" frameborder="0" style="margin: 0; padding: 0; border: 0;"></iframe>
  </div>
  <!-- Hack for passing UTM params into SFDC on Calendar first pages -->
  <script>
      function getQueryVariable(variable) {
          var query = window.location.search.substring(1);
          var vars = query.split("&");
          for (var i = 0; i < vars.length; i++) {
              var pair = vars[i].split("=");
              if (pair[0] == variable) {
                  return pair[1];
              }
          }
      }
      // console.log(${ChiliPiperURL});
      // var params = "?utm_campaign__c=" + getQueryVariable("utm_campaign") + "&utm_content__c=" + getQueryVariable("utm_content") + "&utm_medium__c=" + getQueryVariable("utm_medium") + "&utm_source__c=" + getQueryVariable("utm_source");
      var params = "";
      if(typeof getQueryVariable("utm_campaign") != "undefined") {
          params = "?utm_campaign__c=" + getQueryVariable("utm_campaign");
      }
      if(typeof getQueryVariable("utm_content") != "undefined") {
          params += "&utm_content__c=" + getQueryVariable("utm_content");
      }
      if(typeof getQueryVariable("utm_medium") != "undefined") {
          params += "&utm_medium__c=" + getQueryVariable("utm_medium");
      }
      if(typeof getQueryVariable("utm_source") != "undefined") {
          params += "&utm_source__c=" + getQueryVariable("utm_source");
      }

      // var link = "https://kount.chilipiper.com/book/test" + params;
      var link = "<?php print $chiliPiperRouterUrl;?>" + params;
      console.log('link = ' + link);
      document.getElementById('calendar').src = link;
  </script>
  <!-- End hack for passing UTM params into SFDC on Calendar first pages -->
  </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
            document.querySelectorAll('a[href="#calendar-section"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    console.log("CLICK");
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</section>
<?php
endif; ?>
