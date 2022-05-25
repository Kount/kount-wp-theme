<!-- Google Analytics -->
<?php
//Only load scripts if not logged into WordPress. For cleaner data.
if(!is_user_logged_in()):

  $ga_script = get_field('ga_embed_script', 'option');
  if($ga_script != ''):
    print $ga_script;
  endif;

  $activate_optimize = get_field('activate_google_optimize');
  if($activate_optimize):?>
  <!-- Google Optimize -->
  <script src="https://www.googleoptimize.com/optimize.js?id=OPT-M7FMM74" defer></script>
  <!-- End Google Optimize -->
  <?php
  endif; ?>

    <!-- CHEQ INVOCATION TAG -->
    <script async
            src='https://lady.thesmilingelbows.com/i/05e2ecd544a3d50fea405bd22a027e4c.js'
            data-ch='cheq4ppc' class='ct_clicktrue_23837' data-jsonp="onCheqResponse">
    </script>
    <!-- END CHEQ INVOCATION TAG -->

  <!--Start Bing Code-->
  <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"25035531"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
  <!--End Bing Code-->

  <!-Munchkin Code-->
  <script type="text/plain" data-cookiescript="accepted">

  (function() {

    var didInit = false;

    function initMunchkin() {

      if(didInit === false) {

        didInit = true;

        Munchkin.init('106-ANF-483');

      }

    }

    var s = document.createElement('script');

    s.type = 'text/javascript';

    s.async = true;

    s.src = '//munchkin.marketo.net/munchkin.js';

    s.onreadystatechange = function() {

      if (this.readyState == 'complete' || this.readyState == 'loaded') {

        initMunchkin();

      }

    };

    s.onload = initMunchkin;

    document.getElementsByTagName('head')[0].appendChild(s);

  })();

  </script>
  <!-- Start Bizible -->
  <script data-cookiescript="accepted" src="//cdn.bizible.com/scripts/bizible.js" async=""></script>
  <!--<script type="text/javascript" src="//cdn.bizible.com/scripts/bizible.js" async=""></script>-->
  <!-- End Bizible -->

  <!--Begin ZoomInfo tracking script-->
  <script>
    (function () {
      var zi = document.createElement('script');
      zi.type = 'text/javascript';
      zi.async = true;
      zi.src = 'https://ws.zoominfo.com/pixel/zqqEbtCkjbBppvBqUlTZ';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(zi, s);
    })();
  </script>
  <!--End ZoomInfo tracking script-->

  <?php
    $activate_hotjar = get_field('activate_hotjar');
    if($activate_hotjar): ?>
  <!-- Hotjar Tracking Code for kount.com -->
  <script>
    (function(h,o,t,j,a,r){
      h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
      h._hjSettings={hjid:1969478,hjsv:6};
      a=o.getElementsByTagName('head')[0];
      r=o.createElement('script');r.async=1;
      r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
      a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  <!-- End Hotjar Tracking Code for kount.com -->
<?php
    endif;//if($activate_hotjar):
endif;//if(!is_user_logged_in()):

//Only load Facebook pixel if not homepage AND not logged into Wordpress
if(!is_front_page() && !is_user_logged_in()): ?>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1715978978732215');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=1715978978732215&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
<?php endif; ?>