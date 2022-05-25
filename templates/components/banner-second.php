<?php include "common/variables.php";
$css_class = get_sub_field('css_class');
?>
<section class="banner-second p-0<?php if($css_class != ''): print ' ' . $css_class; endif;?>">
  <div class="bg-img">
    <img class="ie-responsive wow fadeIn" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
  </div>
  <div class="pattern"></div>
  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
            <?php if ($subtitle): ?><h6><?php print $subtitle; ?> </h6><?php endif; ?>
          <?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
          <?php if ($blurb): ?><p><?php print $blurb; ?></p><?php endif; ?>
          <?php we_print_button($button); ?>
        </div>
      </div>
    </div>
  </div>
</section>
