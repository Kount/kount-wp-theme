<?php
$i = 1;
$t = 1;
?>
<section class="tab-content-grid">
  <div class="container">
    <div class="tabs-wrap row no-gutters wow fadeIn d-md-flex" data-wow-delay="0.5s">
      <div class="tab-list grid">
        <div class="tab-panel-outer">
          <button class="private-toggle">
            <span class="text careers-mobile-text">Featured Benefits:</span>
            <span class="caret">
              <img src="/wp-content/themes/kount/templates/dist/images/svg/arrow-right.svg" alt="Down arrow"></span>
          </button>
          <ul class="responsive-tab nav nav-tabs flex-column nav-pills" id="v-pills-tab" role="tablist"
              aria-orientation="vertical">
            <?php we_print_field($subtitle, '<h3><strong>', '</strong></h3>'); ?>
            <?php foreach ($items as $item): ?>
              <li class="">
                <a href="#" data-toggle="tab" data-tab="tab<?php print $i; ?>"
                   class="active show"><?php print $item['subtitle']; ?></a>
              </li>
              <?php $i++; endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="tab-content-outer grid">
        <div class="feature-content">
          <?php foreach ($items as $item): ?>
            <div id="tab<?php print $t; ?>" class="tab-pane <?php if ($t === 1) print 'active show' ?>">
              <div class="content">
                <?php we_print_field($item['title'], '<h3><strong>', '</strong></h3>'); ?>
                <?php we_print_field($item['blurb'], '<p>', '</p>'); ?>
                <div class="link-bottom"><?php we_get_links($item['links'], 'link-arrow'); ?></div>
              </div>
            </div>
            <?php $t++; endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</section>