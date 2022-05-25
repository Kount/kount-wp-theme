<?php foreach ($items as $item): ?>
  <section class="data-partner <?php echo $item['align'] ?> <?php echo $item['background'] ?>"
           id="<?php echo $item['section_id'] ?>">
    <?php if ($item['align'] == ''): ?>
      <div class="pattern wow fadeInRight undefined animate-complete" data-wow-delay="0.5s">
        <img src="/wp-content/themes/kount/templates/dist/images/svg/tab-pattern.svg" alt="Tab pattern">
      </div>
    <?php else:; ?>

    <?php endif; ?>
    <div class="container">
      <div class="row m-0">
        <div class="col-12 wrapper">
          <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 content wow fadeInUp">
            <div class="text-wrap">
              <?php foreach ($item['intro_block'] as $intro): ?>
                <?php we_print_field($intro['title'], '<h2>', '</h2>') ?>
                <?php we_print_field($intro['body'], '', ''); ?>
              <?php endforeach; ?>
              <?php foreach ($item['item'] as $select):
                if ($select['select'] == True):?>
                  <?php foreach ($select['link'] as $link): ?>
                    <a href="#" class=" link-arrow more-content" target="_self"
                       data-text="Learn More "><?php we_print_field($link['text'], '<span>', '</span>') ?></a>
                    <?php we_print_field($link['body'], '', ''); ?>

                  <?php endforeach; ?>
                <?php elseif ($select['select'] == False): ?>
                  <?php we_print_button($select['button']) ?>
                <?php endif; endforeach; ?>  </div>
          </div>
          <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 img-wrap">
            <div class="logo-img">
              <ul>
                <?php foreach ($item['image'] as $image): ?>
                  <li class="wow fadeInUp" data-wow-delay="0.2s"><?php if ($image['url']): ?><a
                      href="<?php echo $image['url'] ?>"><?php we_print_image($image['image']) ?></a>
                    <?php else: ?><?php we_print_image($image['image']) ?><?php endif; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
<?php endforeach; ?>
