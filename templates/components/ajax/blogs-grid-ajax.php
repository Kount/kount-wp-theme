<?php
define('WP_USE_THEMES', false);

global $post;

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require_once(sprintf("%swp-load.php", $path));

$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
$exclude = (isset($_GET['exclude'])) ? $_GET['exclude'] : 0;
$categoryId = (isset($_GET['category'])) ? $_GET['category'] : 0;
$searchTerm = (isset($_GET['search'])) ? preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['search']) : "";
$isWebPEnabled = (isset($_GET['webp'])) ? $_GET['webp'] : 0;

$podcastsCat = get_category_by_slug('podcasts');
$podcastsCatId = '-' . $podcastsCat->term_id;
$isPodcastCatPage = ($categoryId == $podcastsCat->term_id) ? true : false;

$posts_per_page = 12;
//$offset = ($paged - 1) * 9;
$html = '';
$args = array(
  'post_type' => 'post',
  'posts_per_page' => $posts_per_page,
  'orderby' => 'publish_date',
  'order' => 'DESC',
  'post_status' => 'publish',
  'suppress_filters' => false,
  'paged' => $paged
);

if($exclude > 0) {
  $args['post__not_in'] = array($exclude);
}

if($categoryId > 0) {
  $args['cat'] = array($categoryId);
}
//else {
//  $args['cat'] = $podcastsCatId;
//}

if($searchTerm != "") {
  $args['s'] = $searchTerm;
}

$custom_query = new WP_Query($args);

$i = 0;

if ($custom_query->have_posts()) :
  while ($custom_query->have_posts()) :
    $i++;
    $custom_query->the_post();
    $title = get_the_title($post->ID);
    $content = preg_replace("/\[[^)]+]/", "", $post->post_content);
    $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
    $post_date = get_the_date('m/d/Y', $post->ID);
    $subheader = get_field('subheader', $post->ID);
    $hideExcerpt = get_field('hide_excerpt', $post->ID);
    $isBlogDigest = get_field('is_blog_digest', $post->ID);
    $isPodcast = in_category('podcasts', $post->ID);
    $link = get_the_permalink($post->ID);
//    $altTileImageUrl = '';
    $altTileImageUrl = isset(get_field('alt_tile_image', $post->ID)['sizes']['medium']) ? get_field('alt_tile_image', $post->ID)['sizes']['medium'] : '';

    if($isPodcastCatPage && $isWebPEnabled && $altTileImageUrl != ''):
      $altTileImageUrl .= '.webp';
    endif;

    $html .= '<article class="grid-item wow fadeIn">' . "\n";
    if($isPodcastCatPage && $altTileImageUrl != ''):
      $html .= '  <div class="content-wrapper">' . "\n";
      $html .= '    <div class="podcast-content-wrap pb-3">' . "\n";
      $html .= '      <a href="' . $link . '"><span class="sr-only">' . $title . '</span></a><div class="circle-img" style="background-image: url(\'' . $altTileImageUrl . '\');"></div><h5><strong>' . $title . '</strong></h5>' . "\n";
      $html .= '    </div>' . "\n";
    else:
      if(has_post_thumbnail($post->ID)):
        $imageHtml = we_get_image(get_post_thumbnail_id($post->ID), '', 'medium' );
        if($isWebPEnabled):
          $imageHtml = convert_img_src_to_webp($imageHtml, true);
        endif;

        $html .= '  <div class="img-wrapper">' . "\n";
        $html .= '    <a href="' . $link . '">' . $imageHtml . '</a>' . "\n";
        $html .= '  </div>' . "\n";
      endif;
      $html .= '  <div class="card-body content-wrapper">' . "\n";
      $html .= '    <div class="head-content border-bottom pb-3 mb-3">' . "\n";
      $html .= '      <h5><a href="' . $link . '">';
      $html .= '<strong>' . $title;
      if($isBlogDigest && $subheader != ''):
        $html .= ' &ndash; ' . $subheader;
      endif;
      $html .= '  </strong></a></h5>' . "\n";
      $html .= '     </div>' . "\n";
    endif;
    $html .= '  <div class="bottom-content">' . "\n";
    $html .= '    <div class="info-wrapper pb-3">' . "\n";
    $html .= '      <p><small>' . get_the_category_list(', ') . '</small></p>' . "\n";
    $html .= '    </div>' . "\n";
    if(!$hideExcerpt && !$isBlogDigest):
    $html .= '    <p class="pb-3">' . "\n";
      if($excerpt == "") :
        $html .= wp_trim_words($content, 20, '...');
      else:
        $html .= wp_trim_words($excerpt, 20, '...');
      endif;
    $html .= '    </p>' . "\n";
    endif;
    $html .= '  </div>' . "\n";
    $html .= '  <div class="card-arrow">' . "\n";
    $html .= '    <div class="link-arrow" data-text="Learn More">' . "\n";
    $html .= '      <a href="' . $link . '" class="read-more"><strong><span>READ MORE</span></strong></a>' . "\n";
    $html .= '    </div>' . "\n";
    $html .= '  </div>' . "\n";
    $html .= ' </div>' . "\n";
    $html .= '</article>' . "\n";

  endwhile;
endif;
wp_reset_postdata();
//error_log($html);
$moreResultsStatus = ($i < $posts_per_page) ? 0 : 1;
print json_encode(array($moreResultsStatus, $html));
?>