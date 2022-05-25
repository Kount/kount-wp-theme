<?php
$override_page_title = get_field('override_page_title', $post->ID);
$blurb = get_field('blurb', $post->ID);
$file = get_field('file', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$items = get_field('items', $post->ID);
$gated_url = get_field('gated_url', $post->ID);
$content = apply_filters('the_content', $post->post_content);

$subtitle = get_field('intro_subtitle', $post->ID);
$intro_title = get_field('intro_title', $post->ID);
$intro_body = get_field('intro_body', $post->ID);
$button_style = get_field('button_style', $post->ID);
$target = get_field('target', $post->ID);
$intro_button_link = get_field('intro_button_link', $post->ID);
$intro_button_text = get_field('intro_button_text', $post->ID);

?>

<section class="banner-second p-0 detail-page">
  <div class="bg-img">
      <?php print we_image($post->ID); ?>
  </div>
  <div class="pattern"></div>

  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
          <h1><?php if($override_page_title != "") { print $override_page_title; } else { print get_the_title(); } ?></h1>
          <?php if ($blurb): ?>
          <p><?php print $blurb; ?></p>
          <?php else: ?>
          <p>Thank you for your interest. Enjoy the white paper.</p>
          <?php endif; ?>
          <a href="<?php print $file['url']; ?>" class=" btn-white" data-text="Download Kount report">
            <span>Download Kount report</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--
intro block
-->

<section class="no-padding-bottom">
  <div class="intro-block">
      <?php if ($subtitle): ?><span class="title"><?php echo $subtitle; ?></span><?php endif; ?>
      <?php if ($intro_title): ?><h2><?php echo $intro_title; ?> </h2><?php endif; ?>
      <?php if ($intro_body): ?><p><?php echo $intro_body; ?> </p><?php endif; ?>
      <?php if ($intro_button_link): ?>
      <div class="btn-wrap">
        <a href="<?php echo $intro_button_link; ?>" class="<?php echo $button_style; ?>" data-text="<?php echo $intro_button_text; ?>">
          <span><?php echo $intro_button_text; ?></span>
        </a>
      </div>
      <?php endif; ?>
  </div>
</section>




<!--
Video Col two Blade
-->
<?php if ($items):
    foreach ($items as $item)
        $title = get_the_title($item->ID);
    $video = get_field('video', $item->ID);
    $blurb = get_field('blurb', $item->ID);
    ?>
  <section class="col-two-video video-col-video detail-page">
    <div class="container">
      <div class="content-wrapper">
        <div class="col-wrap">
          <div class="column wow fadeInUp">
            <div class="content">
              <h2><?php print $title; ?></h2>
              <?php if ($blurb): ?><p><?php print $blurb; ?></p><?php endif; ?>
            </div>
          </div>
          <div class="column wow fadeInLeft">
            <div class="video-wrap">
              <?php print $video; ?>
            </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
@include(THEME_DIR . "/templates/components/options/featured_resources.php");
?>

