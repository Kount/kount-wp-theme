<?php
$department = get_field('department', $post->ID);
$location = get_field('location', $post->ID);
$content = apply_filters('the_content', $post->post_content);
$applied = get_field('applied_url', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
?>

<section class="banner-multiview banner-third single-blog">
  <div class="bg-img">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
        <h1 class="text-center light"><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="block-content">
  <div class="container">
    <div class="content-wrap wow fadeInUp">
      <h4>Job Summary</h4>
      <p><?php if($department) {?>Reports To: <?php } ?><em><?php print $department; ?></em></p>
      <p><?php if($department) {?>Location: <?php } ?><em><?php print $location; ?></em></p>
      <?php print $excerpt; ?>
      <?php print $content; ?>

      <div class="cta">
        <a href="<?php print $applied; ?>" class=" btn-orange" data-text="Apply Online"><span>Apply Online</span></a>
        <a href="/about/careers/" class=" btn-default" target="_self"
           data-text="Back to Careers"><span>Back to Careers</span></a>
      </div>
    </div>

  </div>
</section>