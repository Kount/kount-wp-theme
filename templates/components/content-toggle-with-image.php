<section class="content-toggle-with-image" id="content-toggle-with-image">

  <div class="container">
    <?php
    $content = get_sub_field('content');
    if ($content) :
      $i = 0;
    foreach ($content as $content):
      $alignment = $content['skew_alignment'];
      $remove_image_margin = $content['remove_image_margin'];
      $image_link = $content['image_link'];
      $center_title = $content['center_title'];
      $remove_text_margin = $content['remove_text_margin'];
      ?>
      <article class="content-wrapper wow fadeIn">
        <?php if($alignment == 'full-width' || $center_title): ?>
        <header class="w-100">
          <h2 class="mb-3 mb-lg-5 w-100 text-center"><?php print $content['title']; ?></h2>
        </header>
        <?php endif; ?>
        <div class="content-container d-flex flex-wrap w-100<?php if($remove_image_margin):?> remove-image-margin<?php endif; if($remove_text_margin):?> remove-text-margin<?php endif; if ($alignment == 'right-skew' || ($i % 2 == 1 && $alignment != 'full-width' && $alignment != 'left-skew')) { echo ' flex-md-row-reverse'; } ?> <?php print $content['skew_alignment']; ?>">
          <?php if($alignment == 'full-width'): ?>
          <?php if($content['video_embed'] != ''):
                  print $content['video_embed'];
                else: ?>
            <?php if($content['image']['url'] != ''): ?>
            <p class="text-center pb-3 pb-lg-5 w-100 img-wrap">
              <?php if($image_link != ""): ?>
              <a href="<?php print $image_link;?>">
              <?php endif; ?>
              <img class="primary-image" src="<?php echo $content['image']['url']; ?>" width="<?php echo $content['image']['width'];?>" alt="<?php echo $content['image']['alt']; ?>" />
              <?php if($image_link != ""): ?>
              </a>
              <?php endif; ?>
            </p>
            <?php endif;
            endif;
            ?>
            <div class="row w-100">
              <?php print $content['body'];?>
            </div>
          <?php
            else: ?>
            <?php if($center_title): ?>
<!--              <header class="w-100">-->
<!--                <h2 class="mb-3 mb-lg-5 w-100 text-center">--><?php //print $content['title']; ?><!--</h2>-->
<!--              </header>-->
            <?php endif; ?>
            <div class="col-two content-outer">
            <div class="content">
              <?php if(!$center_title): ?>
              <?php if ($content['title']): ?><header><h2><?php print $content['title']; ?></h2></header><?php endif;
                    endif;
                    if ($content['body']) {?>
                <div class="body-content">
                  <?php print $content['body'];?>
                </div>
              <?php }  ?>
              <?php if ($content['body_toggle'] && !$content['body_toggle_full_width']) {?>
                <p class="mb-0"><a href="#" class="toggle-link">Read more<span class="sr-only"> about <?php print $content['title'];?></span>...</a></p>
                <div class="body-toggle-content">
                  <?php print $content['body_toggle'];?>
                </div>
              <?php }  ?>
            </div>
          </div>

          <div class="col-two image-wrap<?php if($center_title): print ' mt-2'; endif; ?>">
            <div class="image">
              <div class="img-box<?php if ($i % 2 == 1): ?> pad-right <?php endif; ?>">
                <?php if($image_link != ""): ?>
                <a href="<?php print $image_link;?>">
                  <?php endif; ?>
                  <img src="<?php echo $content['image']['url']; ?>" width="<?php echo $content['image']['width']; ?>" height="<?php echo $content['image']['height']; ?>" alt="<?php echo $content['image']['alt']; ?>">
                  <?php if($image_link != ""): ?>
                </a>
              <?php endif; ?>

                <?php
                if($content['cta_button_text'] != '' && $content['cta_button_url'] != '') {
                  ?>
                  <p class="text-center pt-5">
                    <a href="<?php print $content['cta_button_url'];?>" class="btn-orange " data-text="<?php print $content['cta_button_text'];?>"><span><?php print $content['cta_button_text'];?></span></a>
                  </p>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>

      <?php endif; ?>
        </div>
        <?php if ($content['body_toggle_full_width'] && $content['body_toggle']) {?>
        <div class="toggle-container">
          <p class="mb-0"><a href="#" class="toggle-link">Read more<span class="sr-only"> about <?php print $content['title'];?></span>...</a></p>

          <div class="body-toggle-content">
            <?php print $content['body_toggle'];?>
          </div>
        </div>
        <?php } ?>
      </article>
      <?php $i++; endforeach; endif; ?>
  </div>
</section>