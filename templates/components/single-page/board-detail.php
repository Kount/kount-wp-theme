<?php
$content = apply_filters('the_content', $post->post_content);
$position = get_field('position', $post->ID);
?>

<section class="banner-multiview banner-third">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/04/kount-leadership-team.jpg"" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
<!--        <h1>--><?php //echo get_the_title(); ?><!--</h1>-->
        <h1>Kount Board of Directors</h1>
      </div>
    </div>
  </div>
</section>

<section class="content-with-image" id="leadership-detail">
  <div class="pattern wow fadeInRight animated animate-complete"
       style="visibility: visible; animation-name: wefadeInRight;">
    <img src="/wp-content/themes/kount/templates/assets/images/svg/pentagon_new.svg" alt="blue hexagon">
  </div>
  <div class="container">
    <div class="triangle-wrap" style="width: 406px; height: 0px; top: 276.672px;">
      <div class="triangle">
        <img class="wow fadeIn undefined animate-complete" data-wow-delay=".7s"
             src="/wp-content/themes/kount/templates/dist/images/Triangle.png" alt="Triangle"
             style="visibility: visible; animation-delay: 0.7s; animation-name: wefadeIn;">
      </div>
    </div>
    <div class="content-wrapper  none">
      <div class="col-two image-wrap wow fadeInUp undefined animate-complete"
           style="visibility: visible; animation-name: wefadeInUp;">
        <div class="image">
          <div class="img-box">
            <?php print we_image($post->ID); ?>
          </div>
        </div>
      </div>
      <div class="col-two content-outer wow fadeInUp undefined animate-complete">
        <div class="content">
          <h3><?php echo get_the_title(); ?></h3>
          <p><?php print $position; ?></p>
          <div class="truncate-ellipses">
            <?php print $content; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <a href="/about/board" class=" btn-default" data-text="Back to Board"><span>Back to Board</span></a>
    </div>
  </div>
</section>

