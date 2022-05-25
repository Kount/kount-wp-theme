<?php
define('WP_USE_THEMES', false);

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require_once(sprintf("%swp-load.php", $path));

//$args = array();
//try {
if(isset($_GET['search']) && $_GET['search'] != '') {
  $results = "";
  $search = isset($_GET['search']) ? strtolower(sanitize_text_field($_GET['search'])) : 'a';
  $args = array(
  'post_type' => 'glossary',
  'posts_per_page' => -1,
  'order_by' => 'post_title',
  'order' => 'asc',
  's' => $search);

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    $results .= '<dl>' . "\n";
    while ($query->have_posts()): $query->the_post();
      $results .= sprintf('<dt><a href="%s">%s</a></dt><dd>%s</dd>', get_the_permalink(), get_the_title(), get_the_content());
    endwhile;
    wp_reset_postdata();
    $results .= '</dl>' . "\n";
  else :
    $results .= '<p class="text-center"><strong>No glossary terms found</strong></p>';
  endif;
//}
//catch (exception $e) {
////code to handle the exception
//  print '<p class="text-center">Error getting glossary results: ' . $e.getMessage() . '</p>';
//}
//die();
  print json_encode($results);

}
else if(isset($_GET['index']) && $_GET['index'] != '') {
  $results = "";
  $letter = isset($_GET['index']) ? strtolower(sanitize_text_field( $_GET['index'] )) : 'a';
  $args = array(
      'post_type'       => 'glossary',
      'posts_per_page'  => -1,
      'order_by'        => 'post_title',
      'order'           => 'asc',
      'starts_with'     => $letter
  );

  $query = new WP_Query( $args );

  if( $query->have_posts() ) :
    $results .= '<dl>' . "\n";
    while( $query->have_posts() ): $query->the_post();
      $results .= sprintf('<dt><a href="%s">%s</a></dt><dd>%s</dd>', get_the_permalink(), get_the_title(), get_the_content());
    endwhile;
    wp_reset_postdata();
    $results .= '</dl>' . "\n";
  else :
    $results .= '<p class="text-center"><strong>No glossary terms found</strong></p>';
  endif;

  print json_encode($results);

}
//);

