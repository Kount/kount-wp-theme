<?php
$i = 1;
$t = 1;
?>
<section class="feature-tabs" <?php if ($section_id) {echo " id='$section_id'";} ?>>
  <div class="container">
    <div class="tabs-intro wow fadeInUp">
      <?php
      foreach ($intro_block as $intro):
        ?>
        <?php we_print_field($intro['title'], '<h2>', '</h2>'); ?>
        <?php we_print_field($intro['body'], '', ''); ?>
      <?php endforeach; ?>
    </div>

    <div class="tabs-wrap row no-gutters wow fadeIn">
      <div class="tab-list">
        <div class="tab-panel-outer">
          <button class="private-toggle">
            <span class="text">Select...</span>
            <span class="caret">
              <img src="/wp-content/themes/kount/templates/dist/images/svg/arrow-right.svg" alt="Down arrow"></span>
          </button>

          <ul class="responsive-tab nav nav-tabs flex-column nav-pills" id="v-pills-tab" role="tablist"
              aria-orientation="vertical">
            <?php we_print_field($subtitle, '<li> <p>', '</p></li>'); ?>
            <?php foreach ($items as $item): ?>
              <li class="<?php if ($i === 1) print 'active' ?>">
                <a href="#" data-toggle="tab" data-tab="Featuretab<?php print $i; ?>"
                   class="<?php if ($i === 1) print 'active show' ?>"><?php print $item['title']; ?>
                  <span class="arrow"></span>
                </a>
              </li>
              <?php $i++; endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="tab-content-outer">
        <div class="tab-content">
          <?php foreach ($items as $item): ?>
            <div id="Featuretab<?php print $t; ?>" class="tab-pane fade <?php if ($t === 1) print 'active show' ?>">
              <div class="content">
                <?php if ($item['image']): ?>
                  <div class="img-wrapper">
                    <?php we_print_image($item['image']); ?>
                  </div>
                <?php endif; ?>
                <?php we_print_field($item['title'], '<h5>', '</h5>'); ?>
                <?php we_print_field($item['blurb'], '<p>', '</p>'); ?>
                <?php we_get_links($item['links'], 'link-arrow'); ?>
              </div>
            </div>
            <?php $t++; endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="blue-pentagon">
    <img class="wow fadeInRight" src="/wp-content/themes/kount/templates/images/svg/Pentagon_lightblue.svg"
         alt="Tab pattern">
  </div>

</section>