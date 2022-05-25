<?php
$slider = get_field('assess_feature_slider', 'option');
?>

<section class="assess-slider" id="assess-slider">
  <div class="slider-container">
    <div class="container wide">
      <div class="d-flex flex-lg-nowrap inner pt-3 pt-lg-0 assess-slider-wrap">
        <div class="splide slider-wrap slider-outer">
              <div class="splide__track">
                  <div class="splide__list slider-nav wow fadeIn" data-wow-delay="0.2s">
                    <?php
                    if ($slider):
                      $i = 0;
                      foreach ($slider as $content):
                        $i++;
                        $feature_name = $content['feature_name'];
                        $color = $content['active_color_hex_value'];
                        ?>
                          <div class="splide__slide navigation item <?php print $color;?>">
                              <a href="#">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="299.875" height="79" viewBox="0 0 299.875 79">
                                      <path class="path-fill" d="M0,0H262.352l37.523,39.67L262.352,79H0Z" fill="#dbdbdb"/>
                                  </svg>
                                <strong><?php print $feature_name; ?></strong>
                              </a>
                          </div>
                      <?php
                      endforeach;
                    endif;?>
                  </div>
              </div>
          </div>
        <div class="splide slider-wrap slider-for">
          <div class="splide__track">
            <div class="splide__list">
              <?php
              if ($slider):
                foreach ($slider as $content):
                  $color = $content['active_color_hex_value'];
                  ?>
                  <div class="splide__slide item <?php print $color;?>">
                    <div class="row column-wrapper column-wrapper d-flex flex-column-reverse flex-column flex-md-row">
                      <div class="content-wrap py-4 pr-xl-5">
                        <div class="content pr-xl-5 wow fadeIn">
                          <?php
                          if($content['content']):
                            print $content['content'];
                          endif;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                endforeach;
            endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>