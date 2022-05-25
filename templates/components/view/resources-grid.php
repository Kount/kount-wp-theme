<?php
global $post;

$featuredKeyword = "_page_feature";
$featuredPostId = 0;
$metaKey    = "";
$pageNum = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
$postType   = "";
$resourceName = "";
$resourceType = "";
$featuredResourceType = "";
$searchTerm = (isset($_GET['search'])) ? $_GET['search'] : '';
//$exclude = (isset($_GET['exclude'])) ? $_GET['exclude'] : 0;
?>
<section class="resources-landing-header d-flex align-items-center justify-content-center bg-light-blue">
  <div class="container">
    <h1 class="text-center text-white"><strong class="extra-bold"><?php print $post->post_title;?></strong></h1>
  </div>
</section>

<?php //get_template_part('templates/components/reference/featured-resource'); ?>
<?php
switch($post->post_name) {
  case 'case-studies':
    $postType = "casestudy";
    $resourceName  = "Case studies";
    break;
  case 'downloads':
    $postType = array('kountreport', 'vendorreport');
    $resourceName  = "Downloads";
    break;
  case 'ebooks':
    $postType = "ebook";
    $resourceName  = "eBooks";
    break;
  case 'industry-reports':
    $postType = "industryreport";
    $resourceName  = "Industry reports";
    break;
  case 'kount-reports':
    $postType = "kountreport";
    $resourceName  = "Kount reports";
    break;
  case 'vendor-reports':
    $postType = "vendorreport";
    $resourceName  = "Vendor reports";
    break;
  case 'videos':
    $postType = "video";
    $resourceName  = "Videos";
    break;
  case 'webinars':
    $postType = "webinar";
    $resourceName  = "Webinars";
    break;
  case 'white-papers':
    $postType = "whitepaper";
    $resourceName  = "White papers";
    break;
  default:
    $postType = array('casestudy', 'ebook', 'industryreport', 'webinar', 'video', 'whitepaper', 'kountreport', 'vendorreport');;
//    $metaKey = $featuredKeyword . 'resource';
    $resourceName  = "All resources";
    break;
}

//if(is_array($postType)):
if($resourceName == "All resources"):
  $metaKey = 'resources_landing' . $featuredKeyword;
elseif($resourceName == "Downloads"):
    $metaKey = 'downloads' . $featuredKeyword;
    $resourceType = 'downloads';
else:
  $metaKey = $postType . $featuredKeyword;
  $resourceType = $postType;
endif;

$featuredResourceObj = get_field($metaKey, 'option');

//$args = array(
//  'post_type' => $postType,
//  'posts_per_page' => 1,
//  'orderby' => 'date',
//  'order' => 'DESC',
//  'post_status' => 'publish',
//  'meta_key' => $metaKey,
//  'meta_value' => 1
//);
//$featured_query = new WP_Query($args);
if (!$featuredResourceObj) :
  $args = array(
      'post_type' => $postType,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC',
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
      )
  );
  $featuredQuery = new WP_Query($args);
  if($featuredQuery->have_posts()) :
    $featuredResourceObj = $featuredQuery->posts[0];
//    error_log('$featuredResourceObj = ' . print_r($featuredResourceObj, true));
  endif;
endif;

if($featuredResourceObj):
  $featuredPostId = $featuredResourceObj->ID;
  ?>
  <section class="featured-post resource bg-light-gray">
    <div class="container wide">
      <?php
      $featured_excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $featuredResourceObj->ID));
      $featured_content = apply_filters('the_content', $featuredResourceObj->post_content);
      $eventDate = get_field('event_date', $featuredResourceObj->ID);
      $moreLink = 'READ MORE';
      $registerForEvent = false;
//      $resourceType = '';
      $link = (get_field('gated_url', $featuredResourceObj->ID) != "") ? get_field('gated_url', $featuredResourceObj->ID) : get_the_permalink($featuredResourceObj->ID);
//      print_r(get_field('alt_tile_image', $featuredResourceObj->ID));
//      $altTileImageMobileUrl = isset(get_field('alt_tile_image', $featuredResourceObj->ID)['sizes']['medium']) ? get_field('alt_tile_image', $featuredResourceObj->ID)['sizes']['medium'] : '';
//      $altTileImageDesktopUrl = isset(get_field('alt_tile_image', $featuredResourceObj->ID)['sizes']['large']) ? get_field('alt_tile_image', $featuredResourceObj->ID)['sizes']['large'] : '';

      if(strtotime(date("m/d/Y")) <= strtotime($eventDate)) {
        $registerForEvent = true;
      }
      //        $featured_resource_id = $post->ID;

      //Check if browser is WebPEnabled and then convert
      ?>
      <div class="row">
        <div class="col-sm-4 col-md-6 pb-4 pb-sm-0 img-wrapper">
          <a href="<?php print $link;?>"><?php
            $imgHtml = '';
            if(isset(get_field('alt_tile_image', $featuredResourceObj->ID)['ID'])):
              $imgHtml = we_get_image(get_field('alt_tile_image', $featuredResourceObj->ID)['ID']);
            else:
              $imgHtml = we_get_image(get_post_thumbnail_id($featuredResourceObj->ID));
              ?>
            <?php
            endif;
            print convert_img_src_to_webp($imgHtml);
            ?>
          </a>
        </div>
        <div class="col-sm-8 col-md-6 col-xl-5 pl-sm-4 pl-lg-5 pr-xl-4">
          <h2 class="h4 line-height-1"><a href="<?php print $link;?>"><strong class="extra-bold"><?php print $featuredResourceObj->post_title;?></strong></a></h2>
          <p class="py-3 meta"><small>
              <?php
              switch($featuredResourceObj->post_type) {
                case 'casestudy':
                  $featuredResourceType = 'Case study';
                  print $featuredResourceType;
                  $moreLink = 'DOWNLOAD';
                  break;
                case 'ebook':
                  $featuredResourceType = 'ebook';
                  print $featuredResourceType;
                  $moreLink = 'READ EBOOK';
                  break;
                case 'industryreport':
                  $featuredResourceType = 'Industry report';
                    print $featuredResourceType;
                  $moreLink = 'READ REPORT';
                  break;
                case 'kountreport':
                  $featuredResourceType = 'Kount report';
                  print $featuredResourceType;
                  $moreLink = 'READ REPORT';
                  break;
                case 'vendorreport':
                  $featuredResourceType = 'Vendor report';
                  print $featuredResourceType;
                  $moreLink = 'READ REPORT';
                  break;
                case 'video':
                  $featuredResourceType = 'Video';
                    print $featuredResourceType;
                  $moreLink = 'WATCH VIDEO';
                  break;
                case 'webinar':
                  $featuredResourceType = 'Webinar';
                    print $featuredResourceType;
                    if($eventDate != ""):
                    print '<span class="detail"> &ndash; ' . $eventDate . '</span>';
                  endif;

                  if($registerForEvent):
                    $moreLink = 'REGISTER NOW';
                  else:
                    $moreLink = 'WATCH NOW';
                  endif;

                  break;
                case 'whitepaper':
                  $featuredResourceType = 'White Paper';
                    print $featuredResourceType;
                  $moreLink = 'READ WHITE PAPER';
                  break;
                default:
                  break;
              }
              ?>
            </small></p>
          <p class="pb-2">
            <?php
            if ($featured_excerpt == "") :
              print wp_trim_words($featured_content, 25);
            else:
              print wp_trim_words($featured_excerpt, 25);
            endif;
            ?>
          </p>
          <p><small><a href="<?php print $link;?>"><strong><?php print $moreLink;?> ></strong></a></small></p>
        </div>
      </div>
    </div>
  </section>
<?php
$entityId = $featuredResourceObj->post_type . '-' . $featuredResourceObj->post_name;
?>
<section id="yext-crawler-1" class="d-none">
    <div class="entity-type">Resource</div>
    <div class="entity-id"><?php print $entityId;?></div>
    <div class="name"><?php print $featuredResourceObj->post_title;?></div>
    <div class="description"><?php print get_the_excerpt($featuredResourceObj->ID); ?></div>
    <div class="resource-type"><?php print $featuredResourceType;?></div>
    <div class="photo-gallery"><img alt="" height="0" width="0" src="<?php print get_the_post_thumbnail_url($featuredResourceObj->ID, 'large');?>" /></div>
    <div class="desired-cta-text-1"><?php print $moreLink;?></div>
    <div class="desired-cta-link-1"><?php print $link;?></div>
</section>
<?php
endif;
wp_reset_postdata();
?>

<section class="resource-card-grid mt-3 mt-lg-5" id="resource-grid">
  <div class="container wide">
    <div class="card-wrapper">
      <div class="filter-wrapper">
        <ul class="resource-type-nav float-lg-left wow fadeIn py-3">
          <li><?php if($resourceName != 'All resources') : ?><a href="/resources/" class="home-link"><?php endif; ?>All resources<?php if($resourceName != 'All resources') : ?></a><?php endif; ?></li>
          <li><?php if($postType != 'casestudy') : ?><a href="/resources/case-studies/"><?php endif; ?>Case studies<?php if($postType != 'casestudy') : ?></a><?php endif; ?></li>
<!--          <li>--><?php //if($postType != 'ebook') : ?><!--<a href="/resources/ebooks/">--><?php //endif; ?><!--eBooks--><?php //if($postType != 'ebook') : ?><!--</a>--><?php //endif; ?><!--</li>-->
          <li><a href="/events/">Events</a></li>
            <li><?php if($postType != 'kountreport') : ?><a href="/resources/kount-reports/"><?php endif; ?>Kount reports<?php if($postType != 'kountreport') : ?></a><?php endif; ?></li>
            <li><?php if($postType != 'vendorreport') : ?><a href="/resources/vendor-reports/"><?php endif; ?>Vendor reports<?php if($postType != 'vendorreport') : ?></a><?php endif; ?></li>
            <li><?php if($postType != 'video') : ?><a href="/resources/videos/"><?php endif; ?>Videos<?php if($postType != 'video') : ?></a><?php endif; ?></li>
          <li><?php if($postType != 'webinar') : ?><a href="/resources/webinars/"><?php endif; ?>Webinars<?php if($postType != 'webinar') : ?></a><?php endif; ?></li>
        </ul>

        <!--        <div class="box-wrapper">-->
<!--          <label for="select-category" class="sr-only">Filter by Category:</label>-->
<!--          <select id="select-category">-->
<!--            <option selected="selected" value="">All resources</option>-->
<!--            <option value="casestudy">Case studies</option>-->
<!--            <option value="ebook">eBooks</option>-->
<!--            <option value="industryreport">Vendor reports</option>-->
<!--            <option value="video">Videos</option>-->
<!--            <option value="webinar">Webinars</option>-->
<!--            <option value="whitepaper">White Papers</option>-->
<!--          </select>-->
<!--        </div>-->
        <div class="resource-search-wrapper float-lg-right py-0 wow fadeIn">
          <form method="get">
            <div class="input-wrap">
              <label for="search">Search all blogs</label>
              <input id="content-search" type="text" name="search" value="<?php print preg_replace("/[^a-zA-Z0-9\s]/", "", $searchTerm);?>" placeholder="Search <?php print strtolower($resourceName);?>" />
            </div>
            <input type="submit" value="" style="background:url('/wp-content/themes/kount/templates/dist/images/svg/magnify-blue.svg');">
          </form>
        </div>
<!--        <div class="box-wrapper search">-->
<!--          <label for="content-search" class="sr-only">Search Content:</label>-->
<!--          <input type="text" id="content-search" placeholder="Search by content type or topic">-->
<!--        </div>-->
      </div>
    </div>
  </div>
  <div class="resource-grid">
    <div class="container wide">
      <div class="card-wrapper row d-flex" id="load-more-resources-results">
      </div>
      <input type="hidden" id="current-page" value="<?php print $pageNum;?>" />
      <input type="hidden" id="exclude" value="<?php print $featuredPostId;?>" />
      <input type="hidden" id="resource-type" value="<?php print $resourceType;?>" />
      <input type="hidden" id="webp-enabled" value="<?php print isBrowserWebPEnabled();?>" />
      <div class="btn-wrap text-center pt-3 pb-5 h3 wow fadeIn" data-wow-delay="0.4s"><strong><span id="resources-status">Loading...</span></strong></div>
    </div>
  </div>
  <div class="pagination-wrapper">
    <div id="resource-pagination" class="pt-5 container text-center">
    </div>
  </div>
</section>