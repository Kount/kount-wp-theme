<?php include 'common/variables.php';
if ($items):?>
  <?php foreach ($items as $item): ?>
    <section class="channel-partner" id="<?php echo $item['section_id'] ?>">
      <div class="pattern wow fadeInLeft pattern-left undefined animate-complete">
        <img src="/wp-content/themes/kount/templates/dist/images/Pentagon_partner.png" alt="" role="presentation">
      </div>
      <div class="container">
        <div class="row m-0">
          <div class="intro-block">
            <?php foreach ($item['intro_block'] as $intro): ?>
              <?php we_print_field($intro['title'], '<h2>', '</h2>'); ?>
              <?php we_print_field($intro['body'], '', ''); ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12">
            <ul>
              <?php foreach ($item['image'] as $image): ?>
                <li class="wow fadeInUp" data-wow-delay="0.2s"><?php we_print_image($image['image']); ?> </li>
              <?php endforeach; ?>
            </ul>
            <div class="learn-more wow fadeInUp undefined animate-complete">
              <?php we_print_button($item['button']) ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
<?php endif; ?>
