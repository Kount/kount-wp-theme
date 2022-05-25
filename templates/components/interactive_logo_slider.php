<?php
$headline = get_sub_field('headline');
$slider = get_sub_field('logo_content_slider');
?>

<section class="logo-content-slider" id="logo-content-slider">
  <!--  <div class="pattern wow fadeInRight">-->
  <!--    <img src="--><?php //print REFRESH_DIR ?><!--/templates/dist/images/svg/pentagon_blue.svg" alt="Tab pattern">-->
  <!--  </div>-->
  <div class="slider-container">
    <div class="container">
      <h3 class="h2 text-center text-white pb-4 pb-lg-5 pt-3"><strong class="extra-bold"><?php print $headline;?></strong></h3>
      <div class="d-flex flex-lg-nowrap inner pt-3 pt-xl-0">
        <div class="splide slider-wrap slider-for">
          <div class="splide__track">
            <div class="splide__list">
              <?php
              if ($slider)
                foreach ($slider as $content):
                  $content_type = $content['content_type'];
                  $link_position = $content['link_position'];
                  ?>
                  <div class="splide__slide item <?php print $content_type;?>">
                    <div class="row column-wrapper column-wrapper d-flex flex-column-reverse flex-column flex-md-row">
                      <div class="content-wrap">
                        <div class="content wow fadeIn">
                          <?php if($content_type == 'blockquote'): ?>
                          <blockquote>
                          <?php endif; ?>
                          <?php
                          if($content['content']):
                            print $content['content'];
                          endif;
                          if($content['link_text'] != '' && $content['link_url'] != ''):
                          ?>
                            <p class="cta-link pt-3 text-<?php print $link_position;?>"><a href="<?php print $content['link_url'];?>">>> <?php print $content['link_text'];?></a></p>
                          <?php
                          endif;
                          if($content_type == 'blockquote'): ?>
                          </blockquote>
                          <div class="logo-wrap">
                            <img src="" data-src="<?php print $content['logo_white']['url']; ?>" alt="" width="<?php print $content['logo_white']['width']; ?>" height="<?php print $content['logo_white']['height']; ?>" />
                          </div>
                          <?php endif; ?>
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
        <div class="splide slider-wrap slider-outer">
          <div class="splide__track">
            <div class="splide__list slider-nav wow fadeIn" data-wow-delay="0.2s">
              <?php
              if ($slider):
                $i = 0;
                foreach ($slider as $content):
                  $i++;
                  $company_name = $content['company_name'];
                  ?>
                  <div class="splide__slide item" data-logo-src="<?php print $content['logo']['url']; ?>" data-logo-white-src="<?php print $content['logo_white']['url']; ?>">
                    <a href="#">
                      <span class="sr-only"><?php print $company_name; ?></span>
                      <img src="" data-src="<?php if($i == 1): print $content['logo_white']['url']; else: print $content['logo']['url']; endif; ?>" alt="" width="<?php print $content['logo']['width']; ?>" height="<?php print $content['logo']['height']; ?>" />
                    </a>
                  </div>
                <?php
                endforeach;
              endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>