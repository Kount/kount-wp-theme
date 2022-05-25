<section class="video-col-grid">
  <div class="pattern wow fadeInLeft pattern-left">
    <img src="/wp-content/themes/kount/templates/dist/images/Pentagon_about.png" alt="" class="no-lazyload" role="presentation">
  </div>
  <div class="container">
    <div class="row m-0">
      <?php foreach ($items as $item): ?>
        <div class="content-wrapper <?php echo($item['align']); ?>" id="<?php echo $item['section_id']; ?>">
          <div class="col-wrapper">
            <div
                class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow <?php if ($item['align'] == 'left'):echo 'fadeInRight'; else:echo 'fadeInLeft';endif; ?>">
              <div class="bg-img" data-src="<?php we_get_video($item['video']); ?>">
                <?php //we_print_image($item['image']); ?>
                <img class="no-lazyload" src="<?php print $item['image']['url'];?>" alt="<?php print $item['image']['alt'];?>" />
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeInUp">
              <div class="text-wrap">
                <?php foreach ($item['intro_block'] as $text): ?>
                  <?php we_print_field($text['title'], '<h2>', '</h2>'); ?>
                  <div><?php echo $text['body'] ?></div>
                <?php endforeach; ?>
                <?php wp_reset_query(); ?>
                <?php foreach ($item['button'] as $button): ?>
                  <a class="<?php echo $button['button_style']; ?> more-details"
                     data-text="Read More"><span><?php echo $button['title']; ?></span></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="detail-box">
            <div class="close"></div>
            <div class="col-four ">
              <div class="bg-img" data-src="<?php we_get_video($item['video']); ?>">
                <?php // we_print_image($item['image']); ?>
                <img class="no-lazyload" src="<?php print $item['image']['url'];?>" alt="<?php print $item['image']['alt'];?>" />
              </div>
            </div>
            <div class="col-eight content-wrap">
              <div class="text-wrap">
                <?php foreach ($item['detail_intro_block'] as $text): ?>
                  <?php we_print_field($text['title'], '<h2>', '</h2>'); ?>
                  <?php we_print_field($text['body'], '', ''); ?>
                <?php endforeach; ?>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


