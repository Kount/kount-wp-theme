<?php
$slider_text = get_field('slider_text', 'option');

?>
<section class="logo-slider<?php if(!is_front_page()): echo ' sub-page'; endif; ?>" id="stories">
  <div class="container wow fadeIn">
    <?php
    if($slider_text != "") : ?>
    <div class="intro-block">
      <p><?php print $slider_text; ?></p>
    </div>
    <?php
    endif;
    ?>
    <div class="splide slider-wrap">
      <div class="splide__track">
        <ul class="splide__list">
        <?php
        $slider = get_field('slider', 'option');
//        print_r($slider);
        if($slider):
          foreach ($slider as $slide):
        ?>
          <li class="splide__slide">
            <div class="item">
              <div class="logo">
                <img class="lazyload" data-src="<?php print $slide['image']['sizes']['medium']; ?>" alt="<?php print $slide['image']['alt']; ?>" width="<?php print $slide['image']['sizes']['medium-width']?>" height="<?php print $slide['image']['sizes']['medium-height']?>" />
              </div>
            </div>
          </li>
        <?php
          endforeach;
        endif;
        ?>
        </ul>
      </div>
    </div>
  </div>
</section>