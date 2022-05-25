<?php
define('WP_USE_THEMES', false);
require_once('../../../../../../../wp-load.php');
$args = array(
    'posts_per_page' => -1,
    'offset' => 0,
    'orderby' => 'date',
    'order' => 'desc',
    'post_type' => array('video', 'ebook', 'whitepaper', 'webinar', 'casestudy', 'industryreport'),
    'post_status' => 'publish',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'exclude_from_resources_page',
            'value' => '', //<--- not required but necessary in this case
            'compare' => 'NOT EXISTS',
        ),
        array(
            'key' => 'exclude_from_resources_page',
            'value' => 1,
            'compare' => '!=',
        )
    ),
    'suppress_filters' => true
);
$myposts = get_posts($args);
foreach ($myposts as $p) {
  $post_type = get_post_type($p->ID);
  $attachment_id = get_post_thumbnail_id($p->ID);
  $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
  $image = wp_get_attachment_image_src($attachment_id, '350X302');
  $gated = get_field('gated_url', $p->ID);
  $same_window = get_field('same_window', $p->ID);
  $subheader = get_field('subheader', $p->ID);
  $event_date = get_field('event_date', $p->ID);
  $isBlogDigest = get_field('is_blog_digest', $p->ID);
  $file = get_field('file', $p->ID);
  $filesizes = (($file['filesize'] / 1024) / 1024);
  $filesize = round($filesizes, 2);

  $title = ($isBlogDigest && $subheader != '') ? $p->post_title . ' – ' . $subheader : $p->post_title;
  $alt_tile_image_url = "";
  $registerForEvent = false;

  if(strtotime(date("m/d/Y")) <= strtotime($event_date)) {
    $registerForEvent = true;
  }

  if(get_field('alt_tile_image', $p->ID)) {
    $alt_tile_image = get_field('alt_tile_image', $p->ID);
    $alt_tile_image_url = $alt_tile_image['url'];
  }

  if ($image[0]) {
    $feature_image = $image[0];
  }else {
    $feature_image = '/wp-content/themes/kount/templates/dist/images/generic-img.jpg';
  }

  if (!$image_alt) {
    $image_alt = 'Kount Resource Image';
  }

  $excerpt_string = strip_tags($p->post_excerpt);
  $post_content =  wp_trim_words( get_post_field('post_content', $p->ID), 30, '...' );
  if($excerpt_string) {
    $post_content = $excerpt_string;
  } else {
    $post_content = $post_content;
  }

  $result[] = array(
      'id'              => $p->ID,
      'image'           => $feature_image,
      'alt'             => $image_alt,
      'alt_tile_image'  => $alt_tile_image_url,
      'title'           => $title,
      'link'            => get_the_permalink($p->ID),
      'gated_url'       => $gated,
      'same_window'     => $same_window,
      'is_blog_digest'  => $isBlogDigest,
      'subheader'       => $subheader,
      'event_date'      => $event_date,
      'post_type'       => $post_type,
      'content'         => $post_content,
      'file_size'       => $filesize,
      'date'            => date('m/d/Y', strtotime($p->post_date)),
      'register_for_event' => $registerForEvent,
      'exclude'         => $exclude
  );
}
$resource = json_encode($result);
print_r($resource);

?>