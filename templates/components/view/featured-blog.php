<div class="container padding">
  <h2 class="centered bottom-margin">Latest news, thoughts, and insights.</h2>
  <div class="recent-blogs">
    <?php
    $args = array(
      'posts_per_page' => 3,
      'offset' => 0,
      'post_type' => 'post',
      'tax_query' => array(
        array(
          'taxonomy' => 'featured',
          'field' => 'term_id',
          'terms' => 5,
        )),
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $posts = get_posts($args);
    ?>
    <?php
    foreach ($posts as $post) : setup_postdata($post);
      $title = get_the_title($post->ID);
      $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
      ?>
      <div class="box">
        <a class="blg-link-box" href="<?php print get_the_permalink($post->ID); ?>">
          <div class="inner-box">
            <?php print we_get_image($post->ID, '372X212'); ?> 
            <span class="anim-btn">
              <span>Read Blog Post</span>
              <span class="arrow"></span>
            </span>
          </div>
          <h3><?php print $title; ?></h3>
        </a>
        <p><?php print $excerpt; ?></p>
      </div>
      <?php
    endforeach;
    wp_reset_postdata();
    ?>
  </div>
  <div class="centered">
    <a class="request-services work" href="/blog">Visit Our Blog</a>
  </div>
</div>