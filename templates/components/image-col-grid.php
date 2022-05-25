<?php
if ($items):?>
  <section class="image-col-grid">
<!--    <div class="pattern wow fadeInLeft pattern-left">-->
<!--      <img src="/wp-content/themes/kount/templates/dist/images/Pentagon_about.png" alt="" class="no-lazyload" role="presentation">-->
<!--    </div>-->
    <div class="container">
      <div class="row m-0">
        <?php foreach ($items as $item): ?>
          <div class="content-wrapper <?php echo($item['align']['value']); ?>" id="<?php echo $item['section_id']; ?>">
            <div
                class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow fadeIn">
              <div class="bg-img">
                <?php we_print_image($item['image']); ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeIn">
              <div class="text-wrap">
                  <?php foreach ($item['intro_block'] as $intro):?>
                <?php we_print_field($intro['title'], '<h2><strong>', '</strong></h2>'); ?>
                <?php we_print_field($intro['body'], '', ''); ?>
                <?php endforeach;?>
                <?php we_print_button($item['button']); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="image-col-grid">
    <div class="pattern wow fadeIn pattern-left">
      <img src="/wp-content/themes/kount/templates/dist/images/Pentagon_about.png" alt="" class="no-lazyload" role="presentation">
    </div>
    <div class="container">
      <div class="row m-0">
        <div class="content-wrapper" id="1">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow fadeIn">
            <div class="bg-img">
              <img src="/wp-content/themes/kount/templates/dist/images/planning.png" alt="planning">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeInUp">
            <div class="text-wrap">
              <h2>Leadership Team</h2>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                est.</p>
              <a href="#" class="link-arrow">Learn More</a>
            </div>
          </div>
        </div>

        <div class="content-wrapper Right" id="2">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow fadeIn">
            <div class="bg-img">
              <img src="/wp-content/themes/kount/templates/dist/images/presentation.png" alt="planning">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeInUp">
            <div class="text-wrap">
              <h2>The Board</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non mauris et purus semper
                scelerisque. Ut laoreet sit amet sem eu egestas. Duis condimentum nec justo in accumsan.
                Praesent nec libero sit amet ipsum lobortis elementum. Integer consequat interdum hendrerit.
                Duis ac urna lacus.</p>
              <a href="#" class="link-arrow">Learn More</a>
            </div>
          </div>
        </div>

        <div class="content-wrapper" id="3">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow fadeIn">
            <div class="bg-img">
              <img src="/wp-content/themes/kount/templates/dist/images/noticeboard.png" alt="planning">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeInUp">
            <div class="text-wrap">
              <h2>History and Culture</h2>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                est.</p>
              <a href="#" class="link-arrow">Learn More</a>
            </div>
          </div>
        </div>

        <div class="content-wrapper Right" id="4">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-wrap wow fadeIn">
            <div class="bg-img">
              <img src="/wp-content/themes/kount/templates/dist/images/girl_with_ipad.png" alt="planning">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-wrap wow fadeInUp">
            <div class="text-wrap">
              <h2>Careers</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non mauris et purus semper
                scelerisque. Ut laoreet sit amet sem eu egestas. Duis condimentum nec justo in accumsan.
                Praesent nec libero sit amet ipsum lobortis elementum. Integer consequat interdum hendrerit.
                Duis ac urna lacus.</p>
              <a href="#" class="link-arrow">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>
