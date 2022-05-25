<?php
define('WP_USE_THEMES', false);

global $post;

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require_once(sprintf("%swp-load.php", $path));

$exclude = (isset($_GET['exclude'])) ? $_GET['exclude'] : 0;
$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
$paging = (isset($_GET['paging'])) ? $_GET['paging'] : 0;
$resourceType = (isset($_GET['type'])) ? $_GET['type'] : "";
$searchTerm = (isset($_GET['search'])) ? $_GET['search'] : "";
$isWebPEnabled = (isset($_GET['webp'])) ? $_GET['webp'] : 0;

if($resourceType == 'downloads') {
    $postType = array('ebook', 'industryreport', 'whitepaper', 'kountreport', 'vendorreport');
}
else {
    $postType = ($resourceType != "") ? $resourceType : array('casestudy', 'ebook', 'industryreport', 'kountreport', 'vendorreport', 'webinar', 'whitepaper', 'video');
}
$postsPerPage = 12;
//$offset = ($paged - 1) * 9;
$html = '';
$args = array(
    'post_type' => $postType,
    'posts_per_page' => $postsPerPage,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'paged' => $paged,
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

if($exclude > 0) {
  $args['post__not_in'] = array($exclude);
}

if($searchTerm != "") {
  $args['s'] = $searchTerm;
}

//error_log('args = ' . print_r($args, true));
$custom_query = new WP_Query($args);

$i = 0;

$pagination = "";

if($paging) {
  $totalPosts = $custom_query->found_posts;
  $numPages = $totalPosts / $postsPerPage;
  if($totalPosts % $postsPerPage > 0) {
    $numPages++;
  }
  if($paged != 1) {
    $pagination .= '<a href="#" id="previous" data-page-num="' . ($paged - 1) . '" class="arrow page-num"><img alt="next arrow" src="/wp-content/themes/kount/templates/dist/images/svg/next-arrow.svg" width="25" height="25"></a>';
  }
  $pageCount = 0;
  for($x = 1; $x <= $numPages; $x++) {
    $pageCount++;
    $pagination .= '<a data-page-num="' . $x . '" href="#" class="page-num';
    if ($paged == $x) {
      $pagination .= ' current-page';
    }
    $pagination .= '">' . $x . '</a>';
  }
  if ($paged < $pageCount) {
    $pagination .= '<a href="#" id="next" data-page-num="' . ($paged + 1) . '" class="arrow page-num"><img alt="previous arrow" src="/wp-content/themes/kount/templates/dist/images/svg/prev-arrow.svg" width="25" height="25"></a>';
  }
}

if ($custom_query->have_posts()) :
  while ($custom_query->have_posts()) :
    $i++;
    $custom_query->the_post();
    $title = get_the_title($post->ID);
    $content = preg_replace("/\[[^)]+]/", "", $post->post_content);
    $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
    $postDate = get_the_date('m/d/Y', $post->ID);
    $postType = $post->post_type;
    $subheader = get_field('subheader', $post->ID);
    $eventDate = get_field('event_date', $post->ID);
    $registerForEvent = false;
    $ctaText = '';

    if(strtotime(date("m/d/Y")) <= strtotime($eventDate)) {
      $registerForEvent = true;
    }

    $postTypeCSS = $registerForEvent ? $postType . ' no-play-button' : $postType;

    $link = (get_field('gated_url', $post->ID) != "") ? get_field('gated_url', $post->ID) : get_the_permalink($post->ID);
    $altTileImageId = isset(get_field('alt_tile_image', $post->ID)['ID']) ? get_field('alt_tile_image', $post->ID)['ID'] : 0;
//    if($isWebPEnabled && $altTileImageUrl != ''):
//      $altTileImageUrl .= '.webp';
//    endif;

    $html .= '<article class="resource-card wow fadeIn ' . $postTypeCSS . '" data-wow-delay="0.2s">' . "\n";
    $html .= '  <div class="img-wrapper">' . "\n";
    $html .= '    <a href="' . $link . '">';

    if($altTileImageId):
      $imageHtml = we_get_image(get_field('alt_tile_image', $post->ID)['ID'], '', 'medium' );
      if($isWebPEnabled) {
        $imageHtml = convert_img_src_to_webp($imageHtml, true);
      }
      $html .= $imageHtml;
    elseif(has_post_thumbnail($post->ID)):
//      error_log(we_get_image(get_post_thumbnail_id($post->ID), '', 'medium' ));
      $imageHtml = we_get_image(get_post_thumbnail_id($post->ID), '', 'medium' );
//      $imageHtml = we_get_image(get_post_thumbnail_id($post->ID), '', 'medium' );
      if($isWebPEnabled) {
        $imageHtml = convert_img_src_to_webp($imageHtml, true);
      }
      $html .= $imageHtml;
    else:
      $fallbackImageUrl = '/wp-content/themes/kount/templates/dist/images/generic-img.jpg';
      if($isWebPEnabled):
        $fallbackImageUrl .= '.webp';
      endif;
      $html .= '<img class="lazyload" src="' . $fallbackImageUrl . '" width="324" height="134" alt="" />';
    endif;
    $html .= '    </a>' . "\n";
    $html .= '  </div>' . "\n";
    $html .= '  <div class="content-wrapper">' . "\n";
    $html .= '    <div class="head-content border-bottom pb-3 mb-3">' . "\n";
    $html .= '      <h5><a href="' . $link . '">';
    $html .= '<strong>' . $title . '  </strong></a></h5>' . "\n";
    $html .= '     </div>' . "\n";
    $html .= '  <div class="bottom-content">' . "\n";
    $html .= '    <div class="info-wrapper pb-2">' . "\n";
    switch($postType) {
      case 'casestudy':
        $html .= '<span class="type cs">Case study</span>';
        break;
      case 'ebook':
        $html .= '<span class="type eb">eBook</span>';
        break;
      case 'vendorreport':
        $html .= '<span class="type cs">Vendor report</span>';
        break;
      case 'video':
        $html .= '<span class="type video">Video</span>';
        break;
      case 'webinar':
        $html .= '<span class="type webinar">Webinar</span>';
        if($eventDate != ""):
          $html .= '<span class="detail">' . $eventDate . '</span>';
        endif;
        break;
      case 'kountreport':
        $html .= '<span class="type wp">Kount report</span>';
        break;
      default:
        break;
    }
    $html .= '    </div>';
    $html .= '    <p class="pb-2">' . "\n";
    if($excerpt == "") :
      $html .= wp_trim_words($content, 20, '...');
    else:
      $html .= wp_trim_words($excerpt, 20, '...');
    endif;
      $html .= '    </p>' . "\n";
//    endif;
    $html .= '  </div>' . "\n";
    $html .= '  <div class="card-arrow">' . "\n";
    $html .= '    <div class="link-arrow" data-text="Learn More">' . "\n";
    $html .= '      <a href="' . $link . '" class="read-more"><span>';

    switch($postType) {
      case 'casestudy':
        $ctaText = 'Download';
        break;
      case 'ebook':
        $ctaText = 'Read ebook';
        break;
      case 'industryreport':
      case 'kountreport':
      case 'vendorreport':
        $ctaText = 'Read report';
        break;
      case 'video':
        $ctaText = 'Watch video';
        break;
      case 'webinar':
        if($registerForEvent):
          $ctaText = 'Register now';
        else:
          $ctaText = 'Watch now';
        endif;
        break;
      case 'whitepaper':
        $ctaText = 'Read white paper';
        break;
      default:
        break;
    }
    $html .= $ctaText . '</span></a>' . "\n";

    $html .= '    </div>' . "\n";
    $html .= '  </div>' . "\n";
    $html .= ' </div>' . "\n";
    $html .= '</article>' . "\n";

    $entityId = $post->post_type . '-' . $post->post_name;
    $html .= '<section id="yext-crawler-' . ($i+1) . '" class="d-none">';
    $html .= '    <div class="entity-type">Resource</div>';
    $html .= '    <div class="entity-id">' . $entityId . '</div>';
    $html .= '    <div class="name">' . $post->post_title . '</div>';
    $html .= '    <div class="description">' . get_the_excerpt($post->ID) . '</div>';
    $html .= '    <div class="resource-type">' . $resourceType . '</div>';
    $html .= '    <div class="photo-gallery"><img alt="" height="0" width="0" src="' . get_the_post_thumbnail_url($post->ID, 'large') . '"/></div>';
    $html .= '    <div class="desired-cta-text-1">' . $ctaText . '</div>';
    $html .= '    <div class="desired-cta-link-1">' . $link . '</div>';
    $html .= '</section>';

  endwhile;
endif;
wp_reset_postdata();
//$moreResultsStatus = ($i < $postsPerPage) ? 0 : 1;
if($paging) {
  print json_encode(array($html, $pagination));
}
else {
  print json_encode(array($html));
}
?>