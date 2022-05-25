<section class="logo-slider<?php if(!is_front_page()): echo ' sub-page'; endif; ?>" id="stories">
  <div class="container wow fadeIn">
      <?php
      $intro = get_sub_field('intro_block');
      if($intro)
      foreach ($intro as $intro):
      ?>
      <div class="intro-block">
          <?php if ($intro['title']): ?><h2><?php print $intro['title']; ?></h2><?php endif; ?>
          <?php if ($intro['body']): ?><?php print $intro['body']; ?><?php endif; ?>
      </div>
      <?php endforeach; ?>
    <div class="splide slider-wrap">
      <div class="splide__track">
        <ul class="splide__list">
          <?php
          $slider = get_sub_field('slider');
          if($slider):
          foreach ($slider as $slider):
          //              print_r($slider['image']['sizes']);
          ?>

          <li class="splide__slide">
            <div class="item">
              <div class="logo">
                <img class="lazyload" data-src="<?php print $slider['image']['sizes']['medium']; ?>" alt="<?php print $slider['image']['alt']; ?>" width="<?php print $slider['image']['sizes']['medium-width']?>" height="<?php print $slider['image']['sizes']['medium-height']?>" />
              </div>
            </div>
          </li>
<!--          <li class="splide__slide">Slide 02</li>-->
<!--          <li class="splide__slide">Slide 03</li>-->
          <?php
          endforeach;
          endif;?>
        </ul>
      </div>
      <?php
      $info = get_sub_field('info');
      if($info)
        foreach ($info as $info):
          ?>
          <div class="info wow fadeInUp">
            <?php if ($info['blurb']): ?><p><?php print $info['blurb'] ?></p><?php endif; ?>
            <?php we_get_links($info['links'],'link-arrow'); ?>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
</section>
<!--    <div class="slider-wrap">-->
<!--      <div class="slider">-->
<!--          --><?php
//          $slider = get_sub_field('slider');
//          if($slider):
//            foreach ($slider as $slider):
////              print_r($slider['image']['sizes']);
//          ?>
<!--        <div class="item">-->
<!--          <div class="logo">-->
<!--              <img class="lazyload" data-src="--><?php //print $slider['image']['sizes']['medium']; ?><!--" alt="--><?php //print $slider['image']['alt']; ?><!--" width="--><?php //print $slider['image']['sizes']['medium-width']?><!--" height="--><?php //print $slider['image']['sizes']['medium-height']?><!--" />-->
<!--          </div>-->
<!--        </div>-->
<!--        --><?php
//            endforeach;
//          endif;?>
<!---->
<!--      </div>-->
<!--        --><?php
//        $info = get_sub_field('info');
//        if($info)
//         foreach ($info as $info):
//         ?>
<!--      <div class="info wow fadeInUp">-->
<!--      --><?php //if ($info['blurb']): ?><!--<p>--><?php //print $info['blurb'] ?><!--</p>--><?php //endif; ?>
<!--      --><?php //we_get_links($info['links'],'link-arrow'); ?>
<!--      </div>-->
<!--  --><?php //endforeach; ?>
<!--    </div>-->
<!--  </div>-->
<!--</section>-->