<?php
define('WP_USE_THEMES', false);

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require_once(sprintf("%swp-load.php", $path));

$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;

$post_per_page = 10;
$html = '';
$args = array(
    'post_type' => 'news',
    'posts_per_page' => $post_per_page,
    'news_type' => 'press-releases',
    'orderby' => 'date',
  //'offset' => $offset,
    'order' => 'DESC',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'paged' => $paged
);
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
  while ($custom_query->have_posts()) :
    $custom_query->the_post();
    $title = get_the_title($post->ID);
    $post_date = get_the_date('F j, Y', $post->ID);
    $link = get_the_permalink($post->ID);

    $html .= '<article class="row py-4">' . "\n";
    $html .= '  <div class="col-md-3">' . "\n";
    $html .= '    <strong>' . $post_date . '</strong>' . "\n";
    $html .= '  </div>' . "\n";
    $html .= '  <div class="col-md-9">' . "\n";
    $html .= '    <p><a class="light" href="' . $link . '">' . $title . '</a></p>' . "\n";
    $html .= '  </div>' . "\n";
    $html .= '</article>' . "\n";

  endwhile;
endif;

print json_encode($html);
?>