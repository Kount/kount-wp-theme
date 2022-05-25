<?php
//global $post;
//
//$post_slug  = $post->post_name;
//$postType   = "";
//$metaKey    = "";
//$featuredKeyword = "featured_";
//
//switch($post_slug) {
//  case 'case-studies':
//    $postType = "casestudy";
//    break;
//  case 'ebooks':
//    $postType = "ebook";
//    break;
//  case 'industry-reports':
//    $postType = "industryreport";
//    break;
//  case 'videos':
//    $postType = "video";
//    break;
//  case 'webinars':
//    $postType = "webinar";
//    break;
//  case 'white-papers':
//    $postType = "whitepaper";
//    break;
//  default:
//    $postType = array('casestudy', 'ebook', 'industryreport', 'webinar', 'video', 'whitepaper');;
//    $metaKey = $featuredKeyword . 'resource';
//    break;
//}
//
//if(is_array($postType)):
//  $metaKey = $featuredKeyword . 'resource';
//else:
//  $metaKey = $featuredKeyword . $postType;
//endif;
//
//$featuredResourceObj = get_field($metaKey, $post->ID);
//
////$args = array(
////  'post_type' => $postType,
////  'posts_per_page' => 1,
////  'orderby' => 'date',
////  'order' => 'DESC',
////  'post_status' => 'publish',
////  'meta_key' => $metaKey,
////  'meta_value' => 1
////);
////$featured_query = new WP_Query($args);
//if (!$featuredResourceObj) :
//  $args = array(
//      'post_type' => $postType,
//      'posts_per_page' => 1,
//      'orderby' => 'date',
//      'order' => 'DESC',
//      'post_status' => 'publish',
//  );
//  $featuredQuery = new WP_Query($new_args);
//  if($featuredQuery->have_posts()) :
//    $featuredResourceObj = $featuredQuery[0];
//  endif;
//endif;
//
//
//
//if($featuredResourceObj):
//?>
<!--  <section class="featured-post bg-light-gray">-->
<!--    <div class="container wide">-->
<!--      --><?php
//        $featured_excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $featuredResourceObj->ID));
//        $featured_content = apply_filters('the_content', $featuredResourceObj->post_content);
//        $eventDate = get_field('event_date', $featuredResourceObj->ID);
////        $featured_resource_id = $post->ID;
//        ?>
<!--        <div class="row">-->
<!--          <div class="col-sm-4 col-md-6 pb-4 pb-sm-0 img-wrapper">-->
<!--            <a href="--><?php //print get_permalink($featuredResourceObj->ID);?><!--">--><?php //print we_image($featuredResourceObj->ID);?><!--</a>-->
<!--          </div>-->
<!--          <div class="col-sm-8 col-md-6 col-xl-5 pl-sm-4 pl-lg-5 pr-xl-4">-->
<!--            <h2 class="h4 line-height-1"><a href="--><?php //print get_permalink($featuredResourceObj->ID);?><!--"><strong class="extra-bold">--><?php //print get_the_title($featuredResourceObj->ID);?><!--</strong></a></h2>-->
<!--            <p class="py-3 meta"><small>-->
<!--            --><?php
//              switch($featuredResourceObj->post_type) {
//                case 'casestudy':
//                  print 'Case Study';
//                  break;
//                case 'ebook':
//                  print 'eBook';
//                  break;
//                case 'industryreport':
//                  print 'Industry Report';
//                  break;
//                case 'video':
//                  print 'Video';
//                  break;
//                case 'webinar':
//                  print 'Webinar';
//                  if($eventDate != ""):
//                    print '<span class="detail"> &ndash; ' . $eventDate . '</span>';
//                  endif;
//                  break;
//                case 'whitepaper':
//                  print 'White Paper';
//                  break;
//                default:
//                  break;
//              }
//            ?>
<!--              </small></p>-->
<!--            <p class="pb-2">-->
<!--              --><?php
//              if ($featured_excerpt == "") :
//                print wp_trim_words($featured_content, 25);
//              else:
//                print wp_trim_words($featured_excerpt, 25);
//              endif;
//              ?>
<!--            </p>-->
<!--            <p><small><a href="--><?php //print get_permalink($featuredResourceObj->ID);?><!--"><strong>READ MORE ></strong></a></small></p>-->
<!--          </div>-->
<!--        </div>-->
<!--    </div>-->
<!--  </section>-->
<?php
//endif;
//wp_reset_postdata();
//?>