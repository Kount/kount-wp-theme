<?php
    $countdown_shortcode = get_sub_field('countdown_shortcode');
    $slides = get_sub_field('slides');
    $css_class = get_sub_field('custom_css_class');
?>

<section class="text-slider-blade wow fadeIn <?php print $css_class;?>" data-wow-delay="1s">
  <div class="container">
    <div class="content-wrapper">
<!--      <div class="rotating-text-with-links">-->
      <div class="slider-wrap">
        <div class="slider">
        <?php // echo $body;
        foreach($slides as $slide):
          ?>
            <p class="item">
              <a href="<?php print $slide['link'];?>"><span><?php print $slide['type'];?></span> <?php print $slide['text'];?></a>
            </p>
          <?php
        endforeach;
        ?>
        </div>
      </div>
    </div>
  </div>
</section>