<section class="vertical-accordion">
  <div class="bg-polygon-left wow fadeInLeft" data-wow-delay="0.4s">
    <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_light_blue.svg" alt="" role="presentation" />
  </div>
  <div class="container">
    <div class="content-wrapper">
      <h2><?php echo $title;?></h2>
      <p class="subtitle"><?php echo $subtitle;?></p>
    </div>
    <?php
    $accordion_content = get_sub_field('accordion_content');
    $button_text = get_sub_field('button_text');
    $button_link_url = get_sub_field('button_link_url');

    if($accordion_content) {
      $i = 0;
      ?>
    <div class="accordion-wrapper">
    <?php
    foreach ($accordion_content as $section):
    ?>
      <section id="<?php echo $section['section_id'];?>" class="accordion-container<?php if($i==0) { echo ' active'; }?> wow fadeInUp" data-wow-delay="0.<?php echo $i + 1;?>s">
        <header>
          <?php if ($section['section_header_text']): ?><a class="toggle-link" data-section-id="<?php echo $section['section_id'];?>" href="#"><span class="section-label"><?php echo $i + 1;?></span><h3><?php print $section['section_header_text']; ?><span class="accordion-toggle"></span></h3></a><?php endif; ?>
        </header>
        <div class="section-content" <?php if($i > 0) { echo 'style="height: 0; overflow: hidden;"';}?>>
        <?php if ($section['section_content_html']): ?><?php print $section['section_content_html']; ?><?php endif; ?>
          <p>
            <a class="collapse toggle-link" data-section-id="<?php echo $section['section_id'];?>" href="#"><span class="accordion-toggle"></span> collapse section</a>
          </p>
          <?php if($button_text != '' && $button_link_url != '') { ?>
          <p class="text-center">
            <a href="<?php echo $button_link_url;?>" data-text="<?php echo $button_text;?>" class="btn-default"><span><?php echo $button_text;?></span></a>
          </php>
          <?php } ?>
        </div>
      </section>
    <?php
      $i++;
    endforeach; ?>
    </div>
    <?php
    }
    ?>
  </div>
</section>