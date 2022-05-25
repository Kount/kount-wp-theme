<?php
$video = get_field('video', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$blurb = get_field('blurb', $post->ID);
?>

<section class="banner-second p-0 detail-page">
  <div class="bg-img">
<!--    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="banner third"-->
    <?php print we_image($post->ID); ?>
  </div>
  <div class="pattern"></div>

  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
          <h1><?php echo get_the_title(); ?></h1>
          <?php if ($blurb): ?>
            <p><?php print $blurb; ?></p>
          <?php else: ?>
            <p>Thank you for your interest. Enjoy the webinar below.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!--
Video webinar Blade
-->

<section class="col-two-video webinar">
  <div class="container">
    <div class="content-wrapper">
      <div class="column wow fadeIn">
        <?php print $video; ?>
      </div>
    </div>
  </div>
</section>

<?php
@include(THEME_DIR . "/templates/components/options/featured_resources.php");
?>
