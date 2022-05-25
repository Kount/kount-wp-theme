<?php
define('WP_USE_THEMES', false);
require_once('../../../../../../../wp-load.php');
$args = array(
    'posts_per_page' => -1,
    'offset' => 0,
    'orderby' => 'date',
    'order' => 'desc',
    'post_type' => array('news'),
    'post_status' => 'publish',
    'suppress_filters' => true
);
$myposts = get_posts($args);
foreach ($myposts as $p) {
  $post_cat = [];
  $attachment_id = get_post_thumbnail_id($p->ID);
  $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
  $image = wp_get_attachment_image_src($attachment_id, '350X302');
  $cat_items = get_the_terms($p->ID, 'news_type');
  if ($image[0]) {
    $feature_image = $image[0];
  }else {
    $feature_image = '';
  }

  if (!$image_alt) {
    $image_alt = 'Kount News Image';
  }

  // For News
  if ($cat_items) {
    foreach ($cat_items as $category) {
      array_push($post_cat, array('id' => $category->term_id, 'name' => $category->name, 'slug' => $category->slug));
    }
  }
  $excerpt_string = strip_tags($p->post_excerpt);
  $post_content =  wp_trim_words( get_post_field('post_content', $p->ID), 30, '...' );
  if($excerpt_string) {
    $post_content = $excerpt_string;
  } else {
    $post_content = $post_content;
  }

  $result[] = array(
      'id' => $p->ID,
      'image' => $feature_image,
      'alt' => $image_alt,
      'title' => $p->post_title,
      'link' => get_the_permalink($p->ID),
      'content' => $post_content,
      'date' => date('F j, Y', strtotime($p->post_date)),
      'year' => date('Y', strtotime($p->post_date)),
      'news' => $post_cat,
  );
}
$news = json_encode($result);
print_r($news);

?>