<?php if ($align['value'] != 'right'): ?>
  <section class="img-with-text <?php print $class;?>" id="<?php echo $section_id; ?>">
    <div class="container">
      <div class="col-two">
        <div class="img-wrap">
          <div class="inner-img wow fadeInRight">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
          <div class="img-box wow fadeInLeft">
            <img src="/wp-content/themes/kount/templates/dist/images/svg/hexagon-gray.svg" class="no-lazyload" alt="" role="presentation">
          </div>
        </div>
      </div>
      <div class="col-two wow fadeInUp">
        <div class="content">
          <?php if ($title): ?><h2><?php print $title; ?> </h2><?php endif; ?>
          <?php if ($body) print $body; ?>
          <?php we_print_button($button); ?>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="text-with-img <?php print $class;?>" id="<?php echo $section_id; ?>">
    <div class="container">
      <div class="col-two wow fadeInUp undefined animate-complete">
        <div class="content">
          <?php if ($title): ?><h2><?php print $title; ?> </h2><?php endif; ?>
          <?php if ($body) print $body; ?>
          <?php we_print_button($button); ?>
        </div>
      </div>
      <div class="col-two">
        <div class="img-wrap">
          <div class="inner-img wow fadeInRight undefined animate-complete">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <div class="img-box wow fadeInLeft undefined animate-complete">
              <img src="/wp-content/themes/kount/templates/dist/images/svg/hexagon-gray.svg" class="no-lazyload" alt="" role="presentation">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
