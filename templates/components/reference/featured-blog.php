<?php
$featured_post_id = 0;
$offset = ($paged - 1) * 12;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'meta_key' => 'featured_post',
    'meta_value' => 1
);
$featured_query = new WP_Query($args);
if ($featured_query->have_posts()) :
?>
<section class="featured-post bg-light-gray">
  <div class="container wide">
    <?php
    while ($featured_query->have_posts()) : $featured_query->the_post();
      $featured_excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
      $featured_content = apply_filters('the_content', $post->post_content);

      $featured_post_id = $post->ID;
      ?>
      <div class="row">
        <div class="col-sm-4 col-md-6 pb-4 pb-sm-0 img-wrapper">
          <a href="<?php print get_permalink($post->ID);?>"><?php print convert_img_src_to_webp(we_get_image(get_post_thumbnail_id($post->ID)));?></a>
        </div>
        <div class="col-sm-8 col-md-6 col-xl-5 pl-sm-4 pl-lg-5 pr-xl-4">
          <h2 class="h4 line-height-1"><a href="<?php print get_permalink($post->ID);?>"><strong class="extra-bold"><?php print get_the_title($post->ID);?></strong></a></h2>
          <p class="py-3 meta"><small><?php the_category(', '); ?></small></p>
          <p class="pb-2">
            <?php
            if ($featured_excerpt == "") :
              print wp_trim_words($featured_content, 50);
            else:
              print wp_trim_words($featured_excerpt, 50);
            endif;
            ?>
          </p>
          <p><small><a href="<?php print get_permalink($post->ID);?>"><strong>READ MORE ></strong></a></small></p>
        </div>
      </div>
    <?php
    endwhile;
    ?>
  </div>
</section>
<?php
  endif;
  wp_reset_postdata();
?>