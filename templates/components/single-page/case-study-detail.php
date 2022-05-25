<?php
$blurb = get_field('blurb', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$items = get_field('items', $post->ID);
$body = get_field('body', $post->ID);
$header_logo = get_field('header_logo', $post->ID);
$image = get_field('image', $post->ID);
$downloadUrl = '';
if($useExternalUrl):
  $downloadUrl = get_field('external_url', $post->ID);
else:
  $downloadUrl = get_field('file', $post->ID)['url'];
endif;
$subheader = get_field('subheader', $post->ID);
$challenges_list = get_field('challenges_list', $post->ID);
$results_list = get_field('results_list', $post->ID);
$sidebar_button_text = (get_field('sidebar_button_text', $post->ID) != "") ? get_field('sidebar_button_text', $post->ID) : "Download Case Study";
$sidebar_button_link = (get_field('sidebar_button_link', $post->ID) != "") ? get_field('sidebar_button_link', $post->ID) : $file['url'];
$useDemoSliderForm = get_field('use_demo_request_slider_form', $post->ID);
$extra_content = get_field('extra_page_content', $post->ID);
$footer_cta = get_field('footer_cta', $post->ID);
$cta_header = (isset($footer_cta['header']) && $footer_cta['header'] != '') ? $footer_cta['header'] : "Ready To Learn More About Kount?";
$cta_blurb = (isset($footer_cta['blurb']) && $footer_cta['blurb'] != '') ? $footer_cta['blurb'] : "Kount fraud prevention experts are happy to help. Contact us today.";
$cta_image_url = (isset($footer_cta['image']['url']) && $footer_cta['image']['url'] != '') ? $footer_cta['image']['url'] : "https://kount.com/wp-content/uploads/2020/09/case-study-default-footer-cta-image.png";
$cta_buttons = (isset($footer_cta['buttons'])) ? $footer_cta['buttons'] : 0;
//print_r($cta_buttons);
?>

<section class="banner-second p-0 case-study-detail">
  <div class="bg-img">
    <?php
    if(has_post_thumbnail($post->ID)):
      print we_image($post->ID);
    else: ?>
      <img src="/wp-content/themes/kount/templates/dist/images/case_study_header.jpg" alt="">-->
    <?php
    endif;?>
  </div>
<!--  <div class="bg-img">-->
<!--    <img src="/wp-content/themes/kount/templates/dist/images/case_study_header.jpg" alt="Case study generic banner image">-->
<!--  </div>-->
  <div class="pattern"></div>

  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper">
          <?php if($header_logo): ?>
            <div class="pb-5"><img src="<?php print $header_logo['url']; ?>" width="240" alt="<?php print $header_logo['alt']; ?>"></div>
            <h1 class="pb-5"><strong><?php if ($blurb): print $blurb; endif; ?></strong></h1>
          <?php else: ?>
          <h1<?php if(!$blurb): ?> class="pb-5"<?php endif;?>><?php echo get_the_title(); ?></strong></h1>
            <?php if($blurb): ?><p><?php print $blurb; ?></p><?php endif; ?>
          <?php endif; ?>
          <a href="<?php print $downloadUrl; ?>" class="btn-orange" data-text="Download Case Study">
            <span>Download Case Study</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if($subheader != "") : ?>
<section class="subheader pb-0 wow fadeIn" data-wow-delay="0.4s">
  <div class="container">
    <header class="border-bottom pb-5 row">
      <h2 class="h4 col-lg-11 mb-md-3"><strong class="semi-bold"><?php print $subheader; ?></strong></h2>
    </header>
  </div>
</section>
<?php endif; ?>

<!--
Col two Blade
-->

<section class="case-study-detail">
  <div class="container row">
    <div class="col-sm-6 col-md-7 wow fadeIn pr-md-3 pr-lg-4">
      <?php print $body; ?>
    </div>
    <aside class="col-sm-6 col-md-5 sidebar wow fadeIn pl-sm-3 pb-5 pb-sm-0">
      <div class="content mx-auto">
        <div class="logo-wrap text-center pb-4">
          <img src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>">
        </div>
        <?php if($challenges_list) : ?>
        <div class="list mb-3">
          <p class="h5"><strong>CHALLENGES</strong></p>
          <div class="list-wrap text-center">
          <?php foreach($challenges_list as $challenge): ?>
            <p class="line-height-1_25 regular"><span class="middot">•</span> <?php print $challenge['challenge_text'];?></p>
          <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
        <?php if($results_list) : ?>
          <div class="list mb-4">
            <p class="h5"><strong>RESULTS</strong></p>
            <div class="list-wrap text-center">
              <?php foreach($results_list as $result): ?>
                <p class="line-height-1_25 regular"><span class="middot">•</span> <?php print $result['result_text'];?></p>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="btn-wrap text-center">
          <?php
          $sliderForm = "";
          if($useDemoSliderForm):
              $sliderForm = ' slider="true"';
          endif;
          print do_shortcode('[button link="' . $sidebar_button_link . '" event-action="Case Study sidebar"' . $sliderForm . ']' . $sidebar_button_text . '[/button]'); ?>
<!--          <a href="--><?php //print $sidebar_button_link;?><!--" class="btn-orange--><?php //if($useDemoSliderForm): print ' toggle-demo-form'; endif;?><!--"-->
<!--           data-text="--><?php //print $sidebar_button_text;?><!-- --><?php //if($useDemoSliderForm): print 'data'?><!--"><span>--><?php //print $sidebar_button_text;?><!--</span></a>-->
        </div>
      </div>
    </aside>
  </div>
  <?php if($extra_content != ""): ?>
  <div class="container extra-content">
    <div class="content-wrap border-top pt-5">
      <?php print $extra_content; ?>
    </div>
  </div>
  <?php endif; ?>
</section>

<!--Footer CTA-->
<section class="footer-cta case-study-detail">
  <div class="img-wrap">
    <div class="img-box wow fadeInLeft">
      <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon-outline-white.svg" width="361" height="377" alt="">
    </div>
    <div class="inner-img wow fadeInRight">
      <img src="<?php print $cta_image_url;?>" alt="">
    </div>
  </div>
  <div class="container">
    <div class="wow fadeInUp">
      <h3 class="h2 pb-3"><?php print $cta_header;?></h3>
      <p class="pb-2"><?php print $cta_blurb;?></p>
      <div class="btn-wrap">
        <?php
        if($cta_buttons):
          foreach($cta_buttons as $button):
            $openDemoSlider = $button['use_demo_request_slider_form'] ?? false;
            $buttonUrl = !$openDemoSlider ? $button['button_url'] : "";
        ?>
        <a href="<?php if($buttonUrl != ""): print $button['button_url']; endif;?>" class="<?php if($openDemoSlider): print 'toggle-demo-form '; endif; ?>btn-white mr-3" data-text="<?php print $button['button_text'];?>" <?php if($openDemoSlider): print ' data-event-action="Case Study footer CTA"'; endif; ?>>
          <span><?php print $button['button_text'];?></span>
        </a>
        <?php
          endforeach;
        else: ?>
        <a href="#" data-event-action="Case Study Footer CTA" class="toggle-demo-form btn-white mr-3"
           data-text="Get a demo">
          <span>Get a demo</span>
        </a>
        <a href="/about/contact" class="btn-white" target="_self" data-text="Contact us"><span>Contact us</span></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
