<?php
$i = 3;
?>
<section class="col-four-with-icons">
  <div class="pattern wow fadeInRight">
    <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_blue.svg" class="no-lazyload" alt="" role="presentation">
  </div>
  <div class="container">
    <div class="title wow fadeIn">
      <?php we_print_field($title, '<h2>', '</h2>'); ?>
    </div>
    <div class="content-wrapper">
    <?php foreach ($items as $item): ?>
      <div class="col-four block wow fadeInUp " data-wow-delay="0.<?php print $i; ?>s">
        <div class="icon-wrap">
          <?php we_print_image($item['image']); ?>
        </div>
        <div class="content-wrap">
          <?php we_print_field($item['title'], '<h6>', '</h6>'); ?>
          <?php we_print_field($item['blurb'], '<p>', '</p>'); ?>
        </div>
      </div>
      <?php $i++; endforeach; ?>
  </div>
  </div>
</section>