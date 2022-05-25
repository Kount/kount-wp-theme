<?php
if(!is_page_template('template-podcast.php')) :
  if (is_page_template('digital-summit.php')) {
    include(THEME_DIR . "/templates/common/footer-digital-summit.php");
  //    else if (is_page_template('default'))
  }
  else if(!is_page_template('template-search-overlay.php')) {
      @include(THEME_DIR . "/templates/common/footer-content.php");
  }
endif;

@include(THEME_DIR . "/templates/common/footer-tracking.php");


//if(get_post_field( 'post_name') == 'pricing') {
?>
<!--<script src="https://js.chilipiper.com/marketing.js" type="text/javascript"></script>-->
<!--<script>ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })</script>-->
<?php
//}
?>
<!--<script defer src="--><?php //print REFRESH_DIR ?><!--/scripts/js/jquery-3.6.0.min.js"></script>-->
<script defer src="<?php print REFRESH_DIR ?>/templates/dist/scripts/plugins.js?v=<?php print WE_ASSETS_VERSION; ?>"></script>
<script>
  // jQuery('img:not(.lazyload)').addClass('lazyload');
  //Add lazyload class to all images? Not sure if this is needed
  // var elements = document.querySelectorAll('img:not(.lazyload)');
  // elements.classList.add('lazyload');
</script>
<!--<script defer src="--><?php //print REFRESH_DIR ?><!--/templates/assets/scripts/jquery-ui.min.js?v=--><?php //print WE_ASSETS_VERSION; ?><!--"></script>-->
<!--<script defer src="--><?php //print REFRESH_DIR ?><!--/templates/assets/scripts/jquery.selectBoxIt.min.js?v=--><?php //print WE_ASSETS_VERSION; ?><!--"></script>-->
<?php
if(is_page('blog') || is_page('podcast') || is_category()):
?>
<script defer src="<?php print REFRESH_DIR ?>/scripts/js/masonry.pkgd.min.js?v=<?php print WE_ASSETS_VERSION;?>"></script>
<?php
endif;
?>
<script defer src="<?php print REFRESH_DIR ?>/templates/dist/scripts/main.js?v=<?php print WE_ASSETS_VERSION; ?>"></script>
<script defer src="<?php print REFRESH_DIR ?>/templates/dist/scripts/global.js?v=<?php print WE_ASSETS_VERSION; ?>"></script>
<!--<script defer src="--><?php //print REFRESH_DIR ?><!--/templates/dist/scripts/app.js?v=--><?php //print WE_ASSETS_VERSION; ?><!--"></script>-->
<?php if(!is_front_page()): ?>
<!--<script defer src="--><?php //print REFRESH_DIR ?><!--/templates/assets/styles/bootstrap/dist/js/bootstrap.min.js"></script>-->
<?php endif; ?>
<!-- Link is blocked on the site -->
<!-- <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> -->
<?php
wp_footer();
?>
    </div>
  </body>
</html>

<iframe id="search-overlay-container" style="border: 0;background-color: transparent;"></iframe>

<div class="demo-form-slideout" id="demo-form-slideout">
    <script>
        function closeDemoFormSlideout(event) {
            // console.log('close button clicked!');
            event.preventDefault();
            // var scrollPosition = document.body.getBoundingClientRect().top;
            document.getElementById('demo-form-slideout').classList.remove('active');

            gtag('event','Demo Slideout Form - Close Button Clicked', {
                'event_category': 'Demo Slideout Form',
                'event_label': 'IP: <?php print $_SERVER['REMOTE_ADDR']?> | Page: ' + window.document.location
            });

        }
    </script>
    <div class="text-right">
        <a class="close-btn py-3" href="#" onclick="closeDemoFormSlideout(event)"><span class="sr-only">close</span><img src="/wp-content/themes/kount/templates/dist/images/svg/close-icon.svg" width="26" height="26" alt="" /></a>
    </div>
    <div class="form-wrapper">
        <h3 class="text-center pt-1 pb-3">
          <strong class="extra-bold">Schedule a Demo</strong>
        </h3>
        <p class="text-center pb-2 px-md-5 mx-sm-5">Conveniently schedule a call with sales to discuss your fraud protection strategy.</p>
        <iframe id="slideout-form-iframe" width="100%" height="800" src="" style="border: 0; overflow: hidden;"></iframe>
    </div>
</div>


