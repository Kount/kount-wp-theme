<?php
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_url');
$is_blog = false;

if(isset($_GET['type']) && $_GET['type'] == 'blog') {
  $is_blog = true;
}
?>
<section class="banner-multiview <?php print $class;?><?php if($is_blog): print ' single-blog mb-5'; endif; ?>">
  <div class="bg-img">
    <?php we_print_image($image); ?>
  </div>
  <div class="container">
    <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
      <?php if(!$is_blog) : we_print_field($title, '<h1><strong>', '</strong></h1>'); else: we_print_field('Kount&rsquo;s Blog', '<h1 class="text-center">', '</h1>'); endif; ?>
      <?php we_print_field($blurb, '<p>', '</p>'); ?>
    </div>
    <?php if($button_text != "" && $button_url != "") { ?>
    <div class="button-container wow fadeIn text-lg-right" data-wow-delay="0.1s">
      <a class="btn-white" href="<?php print $button_url;?>" data-text="<?php print $button_text;?>"><span><?php print $button_text;?></span></a>
    </div>
    <?php } ?>
  </div>
</section>