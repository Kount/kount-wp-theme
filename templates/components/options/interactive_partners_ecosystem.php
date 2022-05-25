<?php
$slider = get_field('partner_type_slider', 'option');
?>

<section class="partner-slider" id="partner-slider">
  <div class="slider-container">
    <div class="container">
      <div class="d-flex flex-lg-nowrap inner pt-3 pt-xl-0 partner-slider-wrap">
          <div class="splide slider-wrap slider-outer">
              <div class="splide__track">
                  <div class="splide__list slider-nav wow fadeIn" data-wow-delay="0.2s">
                    <?php
                    if ($slider):
                      $i = 0;
                      foreach ($slider as $content):
                        $i++;
                        $partner_type = $content['partner_type'];
                        ?>
                          <div class="splide__slide item">
                              <a href="#">
                                <strong><?php print $partner_type; ?></strong>
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
                  ?>
                  <div class="splide__slide item">
                    <div class="row column-wrapper column-wrapper d-flex flex-column-reverse flex-column flex-md-row">
                      <div class="content-wrap">
                        <div class="content wow fadeIn">
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