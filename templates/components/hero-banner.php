<?php include "common/variables.php";
$i = 0;
$parent_post = get_post(wp_get_post_parent_id(get_the_ID()));
$parent_post_slug = $parent_post ? $parent_post->post_name : '';
?>
<section class="hero-banner p-0<?php if(is_front_page() || $parent_post_slug == 'home') { echo " homepage-hero"; }?>">
  <div class="bg-img">
    <img class="ie-responsive wow fadeIn" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
  </div>
  <div class="pattern wow fadeIn"></div>
  <div class="container">
    <div class="slider-wrap">
      <div class="slider">
        <?php $sliders = get_sub_field("slider");
        if ($sliders)
          $first = true;
        foreach ($sliders as $slider):
          if ($first):?>
            <div class="item">
              <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
                <?php
                if ($slider['title']): ?>
                    <h1><?php echo $slider['title']; ?></h1>
                <?php
                endif;
                if ($slider['body']) {
                  print $slider['body'];
                }
                we_print_field($slider['blurb'],'<span class="bottom-text">','</span>');
                we_print_button($slider['button']) ?>
              </div>
            </div>
            <?php $first = false;
              else:
              endif;
            $i++;
          endforeach;
          ?>
      </div>
    </div>
  </div>
  <div class="slider-tab">
    <div class="slider">
      <?php $sliders = get_sub_field("slider");
      if ($sliders)
        foreach ((array_slice($sliders, 1)) as $slider)
          foreach ($slider['button'] as $slide):
            ?>
            <div class="item">
              <?php if ($slider['slide_title']): ?>
                <?php ?>
              <a href="<?php print $slide['url']; ?>">
                <span><?php print $slider['slide_title']; ?></span></a><?php endif; ?>
            </div>
          <?php endforeach; ?>
    </div>
  </div>
</section>
