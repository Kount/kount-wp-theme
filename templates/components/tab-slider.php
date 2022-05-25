<?php include "common/variables.php" ?>
<section class="tab-slider<?php if(!is_front_page()): ?> is-sub-page<?php endif;?>" id="tab-slider">
<!--  <div class="pattern wow fadeInRight">-->
<!--    <img src="--><?php //print REFRESH_DIR ?><!--/templates/dist/images/svg/pentagon_blue.svg" alt="Tab pattern">-->
<!--  </div>-->
  <div class="slider-container">
    <div class="container wide">
      <?php
      $intro = get_sub_field('intro_block');
      foreach ($intro as $intro):
        ?>
        <div class="intro-block">
          <?php if ($intro['title']): ?><h4 class="h2"><strong class="extra-bold"><?php print $intro['title']; ?></strong></h4><?php endif; ?>
          <?php if ($intro['body']): ?><?php print $intro['body']; ?><?php endif; ?>
        </div>
      <?php endforeach; ?>
      <div class="splide slider-wrap slider-outer">
        <div class="splide__track">
          <div class="splide__list slider-nav">
            <?php
            $sliders = get_sub_field('slider');
            if ($sliders):
              foreach ($sliders as $slider):?>
                <div class="splide__slide item">
                  <a href="#"><strong><?php print $slider['nav_label']; ?></strong></a>
<!--                  <div class="bg-img">-->
<!--                    <img src="" data-src="--><?php //echo $slider['logo']['url']; ?><!--" alt="--><?php //echo $slider['logo']['alt']; ?><!--">-->
<!--                  </div>-->
                </div>
              <?php
              endforeach;
            endif;?>
          </div>
        </div>
      </div>
      <div class="splide slider-wrap slider-for pt-lg-4">
        <div class="splide__track">
          <div class="splide__list">
        <?php
        $sliders = get_sub_field('slider');
        if ($sliders)
          foreach ($sliders as $slider):
            ?>
            <div class="splide__slide item">
              <div class="row column-wrapper column-wrapper d-flex flex-column-reverse flex-column flex-md-row pt-xl-3">
                <div class="img-wrap wow-tab-slider fadeIn">
                  <div class="bg-img">
                    <img src="" data-src="<?php echo $slider['image']['url']; ?>" alt="<?php echo $slider['image']['alt']; ?>">
                  </div>
                </div>
                <div class="pl-md-5 content-wrap">
                  <div class="content wow-tab-slider fadeIn">
                    <?php if ($slider['body']): print $slider['body']; endif; ?>
                    <p class="cta-link pt-3"><a href="<?php print $slider['link_url'];?>">>> <?php print $slider['link_text'];?></a></p>
                  </div>
                </div>
              </div>
            </div>
          <?php
          endforeach;
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>