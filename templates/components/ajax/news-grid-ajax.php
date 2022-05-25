<?php
define('WP_USE_THEMES', false);

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require_once(sprintf("%swp-load.php", $path));

$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
$isWebPEnabled = (isset($_GET['webp'])) ? $_GET['webp'] : 0;

$post_per_page = 9;
//$offset = ($paged - 1) * 9;
$html = '';
$args = array(
  'post_type' => 'news',
  'posts_per_page' => $post_per_page,
  'news_type' => 'news-articles',
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
    $link = (get_field('open_news_url_from_tile', $post->ID)) ? get_field('news_url', $post->ID) : get_the_permalink($post->ID);
//    $link = get_the_permalink($post->ID);
//    $news_url = get_field('news_url', $post->ID);
    $logo = get_field('news_logo', $post->ID);
    $color = get_field('color_override', $post->ID) != '' ? get_field('color_override', $post->ID) : get_field('color_selector', $post->ID);

    $html .= '<div class="col-sm-6 col-lg-4 my-3 wow fadeIn">' . "\n";
    $html .= '  <article class="bg-light mx-3 news-card h-100">' . "\n";
    $html .=  '   <a class="d-block py-3 px-4 h-100" href="' . $link . '" style="color: ' . $color . ';">' . "\n";
    $html .= '      <span class="triangle" style="background-color: ' . $color . '"></span>' . "\n";
    $html .= '      <span class="published-date d-block pb-4 mb-2"><strong class="extra-bold">' . strtoupper($post_date) . '</strong></span>' . "\n";
    if (isset($logo['url']) && $logo['url'] != ''):
      $logo_url = $logo['url'];
      if($isWebPEnabled) {
        $logo_url = convert_img_src_to_webp($logo_url, true);
      }
      $html .= '      <span class="img-wrap d-block pb-4 text-center mb-2"><img src="' . $logo_url . '" alt="" /></span>' . "\n";
    endif;
    $html .= '      <span class="d-block pb-5 mb-4 h5"><strong style="color: ' . $color . '" class="semi-bold">' . $title . '</strong></span>' . "\n";
    $html .= '      <span class="d-block text-right read-more"><small><strong>READ MORE</strong>&nbsp;&nbsp;></small></span>' . "\n";
    $html .= '    </a>' . "\n";
    $html .= '  </article>' . "\n";
    $html .='</div>' . "\n";

  endwhile;
endif;

print json_encode($html);
?>