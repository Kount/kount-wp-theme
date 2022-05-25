<section class="intro-with-box">
  <div class="container">
<!--    <div class="intro-block">-->
<!--      <h2>Leadership</h2></div>-->
    <div class="column-wrapper">
      <?php
    $args = array(
      'post_type' => 'board',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $myposts = get_posts($args);
//    var_dump($myposts);
    ?>
      <?php
      foreach ($myposts as $post) :
        $title = get_the_title($post->ID);
        $position = get_field('position', $post->ID);
        ?>
        <div class="col-three text-blue">
          <div class="content">
            <div class="logo">
              <?php print we_image($post->ID); ?>
            </div>
            <h5><?php print $title; ?></h5>
            <p><?php print $position; ?></p>
            <div class="btn-wrap">
              <a href="<?php print the_permalink($post->ID); ?>" class=" btn-default"
                 data-text="Learn More"><span>Learn More</span></a></div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
