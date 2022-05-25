<?php
$content = apply_filters('the_content', $post->post_content);
$position = get_field('position', $post->ID);
?>
<section class="rich-text-editor bg-primary3">
    <div class="container">
        <h1 class="text-center text-white"><strong class="extra-bold">Kount Leadership Team</strong></h1>
    </div>
</section>

<section class="content-with-image" id="leadership-detail">
  <div class="pattern wow fadeIn" data-wow-delay="0.2s">
    <img src="/wp-content/themes/kount/templates/assets/images/svg/pentagon_new.svg" alt="blue hexagon">
  </div>
  <div class="container">
    <div class="content-wrapper  none">
      <div class="col-two image-wrap wow fadeIn" data-wow-delay="0.2s">
        <div class="image">
          <div class="img-box">
            <?php print we_image($post->ID); ?>
          </div>
        </div>
      </div>
      <div class="col-two content-outer wow fadeIn" data-wow-delay="0.2s">
        <div class="content">
          <h3><?php echo get_the_title(); ?></h3>
          <p><?php print $position; ?></p>
          <div class="truncate-ellipses">
            <?php print $content; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center pt-4">
      <a href="/about/management" class=" btn-default" data-text="Back to leadership"><span>Back to leadership</span></a>
    </div>
  </div>
</section>

