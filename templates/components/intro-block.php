<?php include "common/variables.php" ?>
 <?php
 $parent_post = get_post(wp_get_post_parent_id(get_the_ID()));
 $parent_post_slug = $parent_post ? $parent_post->post_name : '';

 if(!is_front_page() && $parent_post_slug != 'home') { ?>
<div class="intro-block">
 <?php }
      else {?>
<div class="intro-block homepage">
  <?php } ?>
  <?php if ($subtitle): ?><span class="title"><?php print $subtitle; ?></span><?php endif; ?>
  <?php if ($title): ?><h2 class="wow fadeIn"><?php print $title; ?> </h2><?php endif; ?>
  <?php if ($body):
          if(!is_front_page()):
    ?>
    <p class="wow fadeIn">
  <?php   endif;
          print $body;
          if(!is_front_page()):?>
    </p>
  <?php   endif;
        endif; ?>
  <?php if($button): ?>
    <div class="btn-wrap" class="wow fadeIn">
      <?php we_print_button($button); ?>
    </div>
    <?php endif; ?>
<?php if(!is_front_page()) { ?>
  </div>
<?php }
      else {
    ?>
</div>
<?php } ?>
