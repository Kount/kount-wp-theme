<?php
$video = get_field('video', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$items = get_field('items', $post->ID);
$transcript = get_field('transcript', $post->ID);
$content = apply_filters('the_content', $post->post_content);
$show_form = get_field('show_form', $post->ID);
?>

<?php
if(!$show_form) :
?>
<section class="banner-second p-0 detail-page">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="video detail featured image">
  </div>
  <div class="pattern"></div>

  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
          <h1><?php echo get_the_title(); ?></h1>
          <?php if ($excerpt): ?><p><?php print $excerpt; ?></p><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!--<section class="banner-multiview banner-third">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
        <h1><?php /*echo get_the_title(); */?></h1>
        <?php /*if ($excerpt): */?><p><?php /*print $excerpt; */?></p><?php /*endif; */?>
      </div>
    </div>
  </div>
</section>
-->
<!--
Video Col two Blade
-->

<section class="col-two-video video-col-video detail-page <?php if($show_form) :?>showcase-video<?php endif; ?>">
  <div class="container">
    <div class="content-wrapper">
      <div class="col-wrap">
        <div class="column line wow fadeInUp">
          <div class="content">
            <?php
            if($show_form) :
              ?>
              <h1 class="pb-3"><strong class="extra-bold"><?php echo get_the_title(); ?></strong></h1>
            <?php
            endif;
            print $content;
            ?>
          </div>
        </div>
        <div class="column wow <?php if(!$show_form) :?>fadeInLeft<?php endif;?>">
          <div class="video-wrap<?php if(!$show_form): ?> add-padding<?php endif; ?>">
            <?php
            if(!$show_form) :
              print $video;
            else :
              $video_id = get_field('wistia_video_id', $post->ID);
              $marketo_form_id = get_field('marketo_form', $post->ID);
              $form_title = get_field('form_title', $post->ID);
              $delay = (get_field('delay_in_seconds', $post->ID) != '') ? get_field('delay_in_seconds', $post->ID) : 0;
            ?>
<!--              <iframe src="//fast.wistia.net/embed/iframe/--><?php //print $video_id;?><!--" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>-->
              <script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
              <div class="wistia_embed wistia_async_<?php print $video_id;?>" style="width:640px;height:360px;"></div>
              <script>
                window._wq = window._wq || [];
                // _wq.push({ id: "_all",
                _wq.push({ id: '<?php print $video_id;?>',
                  options: {
                    endVideoBehavior: "reset"
                  },
                  onReady: function(video) {
                    video.bind("timechange", function(t) {
                      if (t >= <?php print $delay;?>) {
                        var formWrap = document.getElementById('form-wrap');
                        formWrap.style["opacity"] = "1";
                        formWrap.style["z-index"] = "10";
                        // return video.unbind("timechange");
                      }
                      // console.log(video.duration());
                      if(t >= video.duration()) {
                        document.getElementById('close-form').style.display = "block";
                      }
                    });
                  }});
              </script>
              <?php if($marketo_form_id == 1354): ?>
              <script src="https://js.chilipiper.com/marketing.js" type="text/javascript"></script>
              <script>// <![CDATA[
                ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })
                // ]]></script>
              <?php endif; ?>
              <div id="form-wrap" style="opacity: 0; z-index: -1;">
              <a id="close-form" style="display: none;" href="#"><img width="14" height="14" src="/wp-content/themes/kount/templates/dist/images/svg/close-icon.svg" alt="close form" /></a>
              <p class="h2 text-center pb-3"><strong class="extra-bold"><?php print $form_title;?></strong></p>
              <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
              <form id="mktoForm_<?php print $marketo_form_id;?>"></form>
              <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", <?php print $marketo_form_id;?>);</script>
                <?php if($marketo_form_id == 1370): ?>
                  <div id="confirmform" style="display: none;" class="pt-2 px-4">
                    <p><strong>Your live demo seat is reserved! You will receive a confirmation email shortly.</strong></p>
                  </div>
                  <script>
                    MktoForms2.whenReady(function (form){
                      //bind close button on form
                      var myForm = document.getElementById("mktoForm_<?php print $marketo_form_id;?>");
                      //Add an onSuccess handler
                      if(myForm){

                        var closeBtn = document.getElementById('close-form');
                        closeBtn.addEventListener('click', function() {
                          closeBtn.parentElement.style.opacity = "0";
                          closeBtn.parentElement.style.zIndex = "-1";

                          document.getElementById('close-form').style.display = "none";

                          //reload the video
                          //window._wq = window._wq || [];
                          //_wq.push({ id: "_all", onReady: function(video) {
                          //  console.log('replacing video');
                          //  video.replaceWith("<?php //print $video_id;?>//");
                          //  }});
                        });

                        form.onSuccess(function(values, followUpUrl){

                          //get the form's jQuery element and hide it
                          document.getElementById('confirmform').style.display = 'block';

                          //return false to prevent the submission handler from taking the lead to the follow up url.
                          return false;
                        });
                      }
                    });
                  </script>
                <?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--
Video Transcript
-->
<?php if ($transcript): ?>
  <section class="video-intro">
    <div class="container">
      <div class="content-wrap wow fadeInUp">
        <h2>Video Transcript</h2>
        <div class="content active truncate-ellipses"><?php print $transcript; ?>

        </div>
        <span class="see-more link-arrow" data-text-swap="Read Less" data-text="Read More">Read More </span>
      </div>
    </div>
  </section>
<?php endif; ?>

<!--
Video Quote
-->

<?php if (isset($items['blurb']) && $items['blurb'] != ''): ?>
  <section class="testimonial">
    <div class="container">
      <?php if ($items['image']['url']): ?>
        <div class="img-wrap wow fadeInUp">
          <img src="<?php print $items['image']['url']; ?>" alt="<?php print $items['image']['alt']; ?>">
        </div>
      <?php endif; ?>
      <div class="content-wrap wow fadeInUp">
        <p class="content-inner">
          <?php print $items['blurb']; ?>
        </p>
        <p class="title"><?php print $items['name']; ?>, <?php print $items['designation']; ?></p>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
//@include(THEME_DIR . "/templates/components/options/featured_resources.php");
?>

<!--Footer CTA-->
<section class="footer-cta">
  <div class="img-wrap">
    <div class="img-box wow fadeInLeft">
      <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon-white.svg" alt="white heaxagon">
    </div>
    <div class="inner-img wow fadeInRight">
      <img src="/wp-content/uploads/2019/06/iStock-1002439628.png" alt="">
    </div>
  </div>
  <div class="container">
    <div class="right wow fadeInUp undefined animate-complete" style="visibility: visible; animation-name: wefadeInUp;">
      <h2>Ready To Learn More About Kount?</h2>
      <p>Kount fraud prevention experts are happy to help. Contact us today.</p>
      <div class="btn-wrap">
        <a href="#" class="toggle-demo-form btn-white" data-event-action="Video Footer CTA"
           data-text="Get a demo">
          <span>Get a demo</span>
        </a>
        <a href="/about/contact" class=" btn-white" target="_self" data-text="Contact us"><span>Contact us</span></a>
      </div>
    </div>
  </div>
</section>
