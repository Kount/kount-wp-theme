<?php
$css_class = get_sub_field('section_css_class');
$section_id = get_sub_field('section_id');
$full_width = get_sub_field('full_width_container');
//echo $css_class;
?>
<section <?php if($css_class == 'form-fill') { echo 'id="anchor"'; }?> class="rich-text-editor<?php if($css_class != '') { echo ' ' . $css_class; } ?>" <?php if($section_id != '') { echo 'id="' . $section_id . '"'; }?>>
  <?php //if(strpos('product-page', $css_class) !== false):
  if(preg_match("/product-page/i", $css_class)):
  ?>
    <div class="bg-img wow fadeIn" data-wow-delay="0.4s">
      <img class="lazyload desktop-img" data-src="https://kount.com/wp-content/uploads/2021/03/product-page-bg-1400px-1.jpg" width="1400" height="952" alt="" style="display: none;" />
      <img class="lazyload mobile-img" data-src="https://kount.com/wp-content/uploads/2021/03/product-page-bg-700px.jpg" width="700" height="952" alt="" />
    </div>
  <?php endif; ?>
  <?php //if(str_contains('solutions-page', $css_class)):
  if(preg_match("/solutions-page/i", $css_class)):
  ?>
<div class="bg-img wow fadeIn" data-wow-delay="0.4s">
  <img class="lazyload desktop-img" data-src="https://kount.com/wp-content/uploads/2021/03/solutions-page-bg-1400px.jpg" width="1400" height="952" alt="" style="display: none;" />
  <img class="lazyload mobile-img" data-src="https://kount.com/wp-content/uploads/2021/03/solutions-page-bg-700px.jpg" width="700" height="952" alt="" />
</div>
<?php endif; ?>

  <?php if(strpos($css_class, 'poly-left') !== false) { ?>
    <div class="bg-polygon-left wow fadeInLeft" data-wow-delay="0.4s">
      <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_light_blue.svg" alt="" role="presentation" />
    </div>
<?php } ?>
<?php if(strpos($css_class, 'poly-right') !== false) { ?>
  <div class="bg-polygon-right wow fadeInRight" data-wow-delay="0.4s">
    <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_blue.svg" alt="" role="presentation" />
  </div>
<?php } ?>
  <div class="container<?php if($full_width): print ' wide'; endif;?>">
<?php print do_shortcode($body); ?>
  </div>
</section>