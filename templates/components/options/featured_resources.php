1<?php
$title = get_field('title', 'option');
$blurb = get_field('blurb', 'option');
?>
<section class="resources-slider" id="resources-slider">
  <div class="container">
    <div class="intro-block">
      <?php if ($title): ?><h2><strong class="extra-bold"><?php print $title; ?></strong></h2><?php endif; ?>
      <?php if ($blurb): ?><p><?php print $blurb; ?></p><?php endif; ?>
    </div>
    <div class="slider-wrap splide" id="resources-slider-wrap">
      <div class="splide__track">
        <ul class="splide__list">
        <?php
        $slides = get_field('slides', 'option');
        if ($slides){
          foreach ($slides as $slide){
            $type = $slide['resource_type'];
            ?>
<!--          <li class="splide__slide">-->
            <li class="item <?php echo $slide['color'];?> <?php if($slide['add_video']) { ?>play-video" data-src="<?php echo $slide['url'];?>"> <?php } else { ?>">
              <a href="<?php echo $slide['url']; ?>"><span class="sr-only"><?php print $slide['title']; ?></span></a><?php }?>
              <div class="bg-img">
                <?php print wp_get_attachment_image($slide['image']['ID'],'medium'); ?>
<!--                <img class="ie-responsive" src="--><?php //print $slide['image']['url']; ?><!--" alt="--><?php //print $slide['image']['alt']; ?><!--">-->
                <div class="icon"><img src="/wp-content/themes/kount/templates/dist/images/svg/<?php print $type;?>-icon.svg" /></div>
              </div>

              <div class="content">
                <div class="inner-content">
                  <?php if ($slide['title']){ ?><h5><?php print $slide['title']; ?></h5><?php } ?>
                  <?php if ($slide['subtitle']){ ?><p><?php print $slide['subtitle']; ?></p><?php } ?>
                </div>
                <?php
//                echo $slide['link']['text'];
                if (!($linkText = $slide['link']['text']))
                  continue;
                $btn_target = $slide['link']['target'];
                if ($btn_target) {
                  $target = '_blank';
                } else {
                  $target = '_self';
                }
                // If there is a post chosen and the link type is not custom
                $chosenPost = $slide['link']['link'];
                if ($chosenPost instanceof WP_Post && !$slide['link']['type']) {
                  $chosenID = $chosenPost->ID;
                  $url = get_permalink($chosenID);
                } else {
                  $url = $slide['link']['url'];
                }

                ?>
              </div>
              <div class="footer-link">
                <?php echo '<a href="' . $url . '" class="link-arrow">' . $linkText . '</a>'; ?>
              </div>
            </li>
<!--          </li>-->
          <?php } ?>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</section>