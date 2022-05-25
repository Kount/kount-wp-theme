<?php
include "common/variables.php";

$random_images_flag = get_sub_field('randomize_background_image');
$bg_image = null;
$bg_color = '#1c3f74';
if(!$random_images_flag):
  $bg_image = get_sub_field('transparent_png_image');
else:
  $bg_images = get_sub_field('random_background_images');
  $number_of_images = sizeof($bg_images);
  $randomIndex = rand(0, ($number_of_images - 1));
  $bg_image = $bg_images[$randomIndex]['random_image'];
  $bg_color = $bg_images[$randomIndex]['background_color'];
endif;
$css_class = get_sub_field('css_class');
$button_text = get_sub_field('button_text');
$open_demo_slider = get_sub_field('open_slider_demo_request_form');
$button_url = get_sub_field('button_url');
$button_color = get_sub_field('button_color') != '' ? get_sub_field('button_color') : 'orange';
$cta_box = get_sub_field('cta_box') != '' ? get_sub_field('cta_box') : '';
?>

<section style="background:<?php print $bg_color;?>" class="hero-banner-no-image<?php if($css_class != '') { print ' ' . $css_class; }?>">
  <div class="container">
    <div class="content-wrapper">
      <h1><?php print $title;?></h1>
      <?php print $blurb;?>
      <?php if($button_text != "" && ($button_url != "" || $open_demo_slider)): ?>
      <a class="btn-<?php print $button_color; if($open_demo_slider): print ' toggle-demo-form'; endif;?>"<?php if($open_demo_slider): print ' data-event-action="' . get_the_title() . ' Hero CTA"'; endif;?> data-text="<?php print $button_text;?>" href="<?php if($open_demo_slider): print '#'; else: print $button_url; endif;?>"><span><?php print $button_text;?></span></a>
      <?php endif; ?>
    </div>
    <?php if($cta_box != "") : ?>
    <div class="cta-box text-center">
      <?php print $cta_box;?>
    </div>
    <?php endif; ?>
  </div>
  <?php
    if(isset($bg_image['url'])): ?>
  <div class="inner-img wow fadeIn" data-wow-delay="0.5s">
    <img src="" data-src="<?php print $bg_image['url'];?>" alt="<?php print $bg_image['title'];?>">
  </div>
  <?php
    endif; ?>
</section>
<script>
// //Open chat window
// function showChat() {
// alert(1);
// // Open proactive chat if the user has recently
// // closed a proactive invite
// var forced = true;
//
// // Do not open the offline box if the widget is not online
// var offlineFallback = false;
//
// var message = 'Hi there! Need help with a chargeback problem?"';
//
// // Regular chat box
// var minimizedView = false;
//
// // Call the API with the above parameters
// SnapEngage.openProactiveChat(forced, offlineFallback, message, minimizedView);
// }
</script>