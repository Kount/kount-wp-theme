<?php include "common/variables.php" ?>
<section class="col-three-block ">
  <div class="pattern wow fadeInRightTop <?php print $pattern_alignment; ?>">
    <img src="<?php print REFRESH_DIR ?>/templates/dist/images/svg/pentagon_outline_yellow.svg" alt="pentagon_outline_yellow">
  </div>
  <div class="container">
    <?php
    $intro = get_sub_field('intro_block');
    foreach ($intro as $intro):
      ?>
      <div class="intro-block wow fadeInUp">
        <?php if ($intro['title']): ?><h2><?php print $intro['title']; ?></h2><?php endif; ?>
        <?php if ($intro['body']): ?><?php print $intro['body']; ?><?php endif; ?>
      </div>
    <?php endforeach; ?>
    <div class="column-wrapper">
      <?php
      $content = get_sub_field('content');
      if($content)
        foreach ($content as $content):
          ?>
          <div class="col-three <?php print $content['title_color'] ?> wow fadeInUp">
            <?php if ($content['title']): ?><h6><?php print $content['title']; ?></h6><?php endif; ?>
            <div class="content-wrap">
              <?php if ($content['title']): ?><h5><?php print $content['title']; ?></h5><?php endif; ?>
              <?php if ($content['body']): ?><?php print $content['body']; ?><?php endif; ?>

              <div class="slider-wrap">
                <div class="slider">
                  <?php
                  $slider = $content['slider'];
                  if($slider)
                    foreach ($slider as $slider):
                      ?>
                      <div class="item">
                        <div class="icon">
                          <img src="<?php echo $slider['image']['url']; ?>" alt="<?php echo $slider['image']['alt']; ?>">
                        </div>
                        <div class="content">
                          <?php if ($slider['body']) print $slider['body']; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>

    <div class="inner-overlay green-overlay">
      <div class="close-overlay"></div>
      <div class="overlay-wrap">
      </div>
    </div>

  </div>
</section>