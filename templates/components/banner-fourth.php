<?php
  $content_html = get_sub_field('content_html');
  $bg_image = get_sub_field('background_image');
  $css_class = get_sub_field('css_class');
?>

<section class="banner-fourth dps <?php print $css_class;?>">
    <div class="bg-img">
      <img src="<?php print $bg_image['url'];?>" alt="">
    </div>
    <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <?php print $content_html;?>
      </div>
    </div>
</section>