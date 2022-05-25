<!--Event slider code-->
<?php

// Clean up old Events by setting meta key 'hide_on_events_page' to true
// This is to automatically remove old Events for the Yext crawler.
//$removeArgs = array(
//  'post_type' => array('events'),
//  'posts_per_page' => -1,
//  'post_status' => 'publish',
//  'suppress_filters' => false,
//  'meta_query' => array(
//    'end_date_clause' => array(
//      'key' => 'end_date', // Check the start date field
//      'value' => date("Y-m-d"), // Set today's date (note the similar format)
//      'compare' => '<', // Return the ones greater than today's date
//      'type' => 'DATE' // Let WordPress know we're working with date
//    ),
//  ),
//);
//
//$removePosts = get_posts($removeArgs);
//if($removePosts):
//    foreach($removePosts as $removePost):
//      //$tempPost = array( 'ID' => $removePost->ID, 'post_status' => 'draft' );
//      wp_update_post_meta($removePost->ID, 'hide_on_events_page', 1);
//    endforeach;
//endif;

//Display current featured event
$featuredPostId;
$args = array(
    'post_type' => array('events'),
    'posts_per_page' => 1,
    'offset' => $offset,
//    'meta_key' => 'start_date', // name of custom field
//    'orderby' => 'meta_value_num',
//    'order' => 'ASC',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'meta_query' => array(
        'relation' => 'AND',
        'featured_clause' => array(
            'key' => 'featured_event',
            'compare' => 'EXISTS',
        ),
        'start_date_clause' => array(
            'key' => 'end_date', // Check the start date field
            'value' => date("Y-m-d"), // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
        ),
      array(
        'key' => 'attendance_only',
        'compare' => '<', // Return the ones greater than today's date
        'value' => 1
      ),
    ),
    'orderby' => array(
        'featured_clause' => 'DESC',
        'start_date_clause' => 'ASC',
    ),
//    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
//        array(
//            'key' => 'start_date', // Check the start date field
//            'value' => date("Y-m-d"), // Set today's date (note the similar format)
//            'compare' => '>=', // Return the ones greater than today's date
//            'type' => 'DATE' // Let WordPress know we're working with date
//        )
//    ),
    'paged' => $paged,

);
$myposts = get_posts($args);
if($myposts): ?>
  <section class="featured-post event bg-light-gray">
    <div class="container wide">
<?php
  foreach($myposts as $post):
    $featuredPostId = $post->ID;
    $title = get_the_title($post->ID);
    $content = get_the_content($post->ID);
    $start_date = get_field('start_date', $post->ID);
    $end_date = get_field('end_date', $post->ID);
    $event_host = get_field('event_host', $post->ID);
    $event_location = get_field('event_location', $post->ID);
    $address = get_field('address', $post->ID);
    $register = get_field('register', $post->ID);
    $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
    $terms = get_the_terms($post->ID, 'event_type');
    $featured_event = get_field('featured_event', $post->ID);
    $link_to_register = get_field('link_to_register_url_from_tile', $post->ID);
    $moreLink = 'LEARN MORE';
    $linkURL = get_permalink($post->ID);
    $featured_img_url = get_the_post_thumbnail_url($post->ID);

      $cat = array();
      foreach ($terms as $term) {
          array_push($cat, $term->name);
      }
      $cat = implode(", ", $cat);

      ?>
    <div class="row">
      <div class="col-sm-4 col-md-6 pb-4 pb-sm-0 img-wrapper">
        <?php if($post->post_type == "thirdpartyevents" || $link_to_register):
          $moreLink = "REGISTER NOW";
          $linkURL = $register;
        ?>
        <a href="<?php print $linkURL; ?>">
        <?php else: ?>
        <a href="<?php print get_permalink($post->ID); ?>">
        <?php endif;
          print we_image($post->ID);
        ?>
        </a>
      </div>
      <div class="col-sm-8 col-md-6 col-xl-5 pl-sm-4 pl-lg-5 pr-xl-4">
        <p class="pb-3"><small class="regular"><?php print $cat; ?></small></p>
        <h2 class="line-height-1"><a href="<?php print $linkURL;?>"><strong class="extra-bold"><?php print $title;?></strong></a></h2>
        <p class="event-date pb-3"><?php we_get_date($start_date, $end_date); if($event_location != ""):?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php print $event_location; endif;?></p>
        <p class="pt-2 pb-2">
          <?php
          if ($excerpt == "") :
            print wp_trim_words($content, 50);
          else:
            print $excerpt;
          endif;
          ?>
        </p>
        <p class="pt-3"><small><a href="<?php print $linkURL;?>"><strong><?php print $moreLink;?> ></strong></a></small></p>
      </div>
    </div>
      <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "<?php print get_the_title();?>",
        "startDate": "<?php print $start_date;?>",
        "endDate": "<?php print $end_date;?>",
        "eventStatus": "https://schema.org/EventScheduled",
        <?php
          if(strpos($terms, 'Virtual Event') !== false || strpos($terms, 'Virtual Roundtable') !== false):
              ?>
        "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
        "location": {
            "@type": "VirtualLocation",
        <?php if(strpos($terms, 'Kount-Hosted Event') !== false && $register != ""):?>
            "url": "<?php print $register;?>"
            <?php else: ?>
            "url": "<?php print get_the_permalink($post->ID);?>"
            <?php endif; ?>
        },
        <?php else: ?>
        "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
        "location": {
            "@type": "Place",
            "name": "<?php print $event_host;?>",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "<?php print $address['street_address'];?>",
              "addressLocality": "<?php print $address['address_locality'];?>",
              "postalCode": "<?php print $address['postal_code'];?>",
              "addressRegion": "<?php print $address['address_region_state'];?>",
              "addressCountry": "<?php print $address['address_country'];?>"
            }
        },
        <?php endif; ?>
        "image": [
            "<?php print $featured_img_url;?>"
        ],
        "description": "<?php print trim(preg_replace('#^<p>|</p>$#i', '', trim(apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID))))); ?>",
        "organizer": {
            "@type": "Organization",
        <?php if(strpos($terms, 'Kount-Hosted Event') !== false):?>
            "name": "Kount",
            "url": "https://kount.com"
        <?php else: ?>
            "name": "<?php print get_the_title();?>",
            "url": "<?php print get_the_permalink();?>"
        <?php endif; ?>
        }
    }
</script>
  <?php
        endforeach;
    wp_reset_query();
   ?>
    </div>
  </section>
<?php endif; ?>


<!--Event Grid Code-->
<section class="events-card-grid py-0">
<!--  <div class="bg-pattern">-->
<!--  </div>-->
  <div class="container">
    <div class="card-wrapper">

      <?php
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
      $offset = ($paged - 1) * 12;
      $args = array(
          'post_type' => array('events'),
          'posts_per_page' => 12,
          'offset' => $offset,
//          'meta_key' => 'start_date', // name of custom field
//          'orderby' => 'meta_value_num',
//          'order' => 'ASC',
          'post_status' => 'publish',
          'suppress_filters' => false,
          'post__not_in' => array($featuredPostId),
          'meta_query' => array(
              'relation' => 'AND',
              'featured_clause' => array(
                  'key' => 'featured_event',
                  'compare' => 'EXISTS',
              ),
            'start_date_clause' => array(
                  'key' => 'end_date', // Check the start date field
                  'value' => date("Y-m-d"), // Set today's date (note the similar format)
                  'compare' => '>=', // Return the ones greater than today's date
                  'type' => 'DATE' // Let WordPress know we're working with date
              ),
            array(
              'key' => 'attendance_only',
              'compare' => '<', // Return the ones greater than today's date
              'value' => 1
            ),
          ),
          'orderby' => array(
              'featured_clause' => 'DESC',
              'start_date_clause' => 'ASC',
          ),
          'paged' => $paged,

      );
      $custom_query = new WP_Query($args);
      ?>
      <?php if ($custom_query->have_posts()) : ?>
        <div class="filter-wrapper">
          <div class="box-wrapper">
<!--            <select>-->
<!--              <option value="all">All Events</option>-->
<!--              <option value="trade">Trade Event</option>-->
<!--              <option value="kount-hosted">Kount-Hosted Event</option>-->
<!--              <option value="partner-hosted">Partner-Hosted Event</option>-->
<!--              <option value="webinar">Webinar</option>-->
<!--            </select>-->
          </div>
        </div>
        <div class="row d-flex flex-wrap justify-content-center w-100 py-5 my-xl-4"
        <!-- the loop -->
        <?php
        while ($custom_query->have_posts()) : $custom_query->the_post();
          $title = get_the_title($post->ID);
          $start_date = get_field('start_date', $post->ID);
          $end_date = get_field('end_date', $post->ID);
          $event_host = get_field('event_host', $post->ID);
          $event_location = get_field('event_location', $post->ID);
          $address = get_field('address', $post->ID);
          $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
          $terms = get_the_terms($post->ID, 'event_type');
          $register = get_field('register', $post->ID);
          $featured_event = get_field('featured_event', $post->ID);
          $link_to_register = get_field('link_to_register_url_from_tile', $post->ID);
          $featured_img_url = get_the_post_thumbnail_url($post->ID);
//        $terms = get_the_term_list( $post->ID, 'event_type', '', ', ' );

            $cat = array();
          foreach ($terms as $term) {
            array_push($cat, $term->name);
          }
          $cat = implode(", ", $cat);
          ?>
          <a class="col-three wow fadeIn text-blue" data-wow-delay="0.2s"
          <?php if($post->post_type == "thirdpartyevents" || $link_to_register): ?>
            href="<?php print $register; ?>"
          <?php else: ?>
            href="<?php print the_permalink($post->ID); ?>"
          <?php endif; ?>
            >
          <?php if($featured_event): ?>
          <div class="featured-event-banner"><span>FEATURED EVENT</span></div>
          <?php endif; ?>
            <div class="img-wrapper">
              <?php print we_image($post->ID); ?>
            </div>
            <div class="content-wrapper">
              <div class="head-content pb-3">
                <span class="tag"><?php print $cat; ?></span>
                <h5 class="pb-2"><?php print $title; ?></h5>
                <p><?php we_get_date($start_date, $end_date); ?></p>
                <p><?php print $event_location; ?></p>
              </div>
              <div class="bottom-content">
                <?php print $excerpt; ?>
              </div>
              <div class="card-arrow">
                <?php if($post->post_type == "thirdpartyevents"): ?>
                  <div class=" link-arrow" data-text="Register now"><span>Register now</span></div>
                <?php else: ?>
                  <div class=" link-arrow" data-text="Learn more"><span>Learn more</span></div>
                <?php endif; ?>
              </div>
            </div>
          </a>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "<?php print get_the_title($post->ID);?>",
    "startDate": "<?php print $start_date;?>",
    "endDate": "<?php print $end_date;?>",
    "eventStatus": "https://schema.org/EventScheduled",
    <?php
            if(strpos($terms, 'Virtual Event') !== false || strpos($terms, 'Virtual Roundtable') !== false):
                ?>
    "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
    "location": {
        "@type": "VirtualLocation",
        <?php if(strpos($terms, 'Kount-Hosted Event') !== false && $register != ""):?>
        "url": "<?php print $register;?>"
        <?php else: ?>
        "url": "<?php print get_the_permalink($post->ID);?>"
        <?php endif; ?>
    },
    <?php else: ?>
    "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
    "location": {
        "@type": "Place",
        "name": "<?php print $event_host;?>",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php print $address['street_address'];?>",
          "addressLocality": "<?php print $address['address_locality'];?>",
          "postalCode": "<?php print $address['postal_code'];?>",
          "addressRegion": "<?php print $address['address_region_state'];?>",
          "addressCountry": "<?php print $address['address_country'];?>"
        }
    },
    <?php endif; ?>
    "image": [
        "<?php print $featured_img_url;?>"
    ],
    "description": "<?php print trim(preg_replace('#^<p>|</p>$#i', '', trim(apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID))))); ?>",
    "organizer": {
        "@type": "Organization",
    <?php if(strpos($terms, 'Kount-Hosted Event') !== false):?>
        "name": "Kount",
        "url": "https://kount.com"
    <?php else: ?>
        "name": "<?php print get_the_title($post->ID);?>",
        "url": "<?php print get_the_permalink($post->ID);?>"
    <?php endif; ?>
    }
}
</script>
  <?php
        endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
      </div>
        <div class="pagination-wrapper custom">
          <?php
          if (function_exists(custom_pagination)) {

            custom_pagination($custom_query->max_num_pages, "", $paged);
          }
          ?>
        </div>

      <?php else:
              if(!$featuredPostId) {
        ?>
        <h2 class="py-5">There are no events scheduled at this time.</h2>
      <?php   }
            endif;
            wp_reset_postdata(); ?>

    </div>

  </div>
</section>
<?php
    $args2 = array(
    'post_type' => array('events'),
    'posts_per_page' => 12,
    'offset' => $offset,
    //          'meta_key' => 'start_date', // name of custom field
    //          'orderby' => 'meta_value_num',
    //          'order' => 'ASC',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'post__not_in' => array($featuredPostId),
    'meta_query' => array(
    'relation' => 'AND',
    'featured_clause' => array(
    'key' => 'featured_event',
    'compare' => 'EXISTS',
    ),
    'start_date_clause' => array(
    'key' => 'end_date', // Check the start date field
    'value' => date("Y-m-d"), // Set today's date (note the similar format)
    'compare' => '>=', // Return the ones greater than today's date
    'type' => 'DATE' // Let WordPress know we're working with date
    ),
    array(
        'key' => 'attendance_only',
        'compare' => '=', // Return the ones greater than today's date
        'value' => 1
    ),
    ),
    'orderby' => array(
    'featured_clause' => 'DESC',
    'start_date_clause' => 'ASC',
    ),

    );
    $custom_query2 = new WP_Query($args2);
    if ($custom_query2->have_posts()) :
    ?>
    <section class="events-no-attendance bg-light-gray full-width">
        <div class="container">
          <p class="h2 pb-5 text-center"><strong class="extra-bold">Come find us at:</strong></p>
          <div class="d-flex flex-wrap">
            <?php
            while ($custom_query2->have_posts()) : $custom_query2->the_post();
              $title = get_the_title($post->ID);
              $start_date = get_field('start_date', $post->ID);
              $end_date = get_field('end_date', $post->ID);
              $event_host = get_field('event_host', $post->ID);
              $event_location = get_field('event_location', $post->ID);
              $address = get_field('address', $post->ID);
              $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
              $terms = get_the_terms($post->ID, 'event_type');
              $register = get_field('register', $post->ID);
              $featured_event = get_field('featured_event', $post->ID);
              $link_to_register = get_field('link_to_register_url_from_tile', $post->ID);
              $featured_img_url = get_the_post_thumbnail_url($post->ID);
//        $terms = get_the_term_list( $post->ID, 'event_type', '', ', ' );

              $cat = array();
              foreach ($terms as $term) {
                array_push($cat, $term->name);
              }
              $cat = implode(", ", $cat);
              ?>
                <div class="col-sm-6 col-lg-4 py-3 mx-auto d-flex wow fadeIn text-blue" data-wow-delay="0.2s"
                  <?php if($post->post_type == "thirdpartyevents" || $link_to_register): ?>
                      href="<?php print $register; ?>"
                  <?php else: ?>
                      href="<?php print the_permalink($post->ID); ?>"
                  <?php endif; ?>
                >
                    <div class="col-5 img-wrapper">
                      <?php print we_image($post->ID); ?>
                    </div>
                    <div class="px-3 col-7 content-wrapper">
                        <div class="head-content pb-2">
<!--                            <span class="tag">--><?php //print $cat; ?><!--</span>-->
                            <p class="h5 pb-2"><strong><?php print $title; ?></strong></p>
                            <p><?php we_get_date($start_date, $end_date); ?></p>
                            <p><?php print $event_location; ?></p>
                        </div>
                        <div class="card-arrow">
                          <?php if($post->post_type == "thirdpartyevents" || $link_to_register): ?>
                              <a href="<?php print $register; ?> class=" link-arrow" data-text="Register now"><span>Register now</span></a>
                          <?php else: ?>
                              <a href="<?php print the_permalink($post->ID); ?>" class="link-arrow" data-text="Book a meeting"><span>Book a meeting</span></a>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
                <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "<?php print get_the_title($post->ID);?>",
    "startDate": "<?php print $start_date;?>",
    "endDate": "<?php print $end_date;?>",
    "eventStatus": "https://schema.org/EventScheduled",
    <?php
                  if(strpos($terms, 'Virtual Event') !== false || strpos($terms, 'Virtual Roundtable') !== false):
                    ?>
    "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
    "location": {
        "@type": "VirtualLocation",
        <?php if(strpos($terms, 'Kount-Hosted Event') !== false && $register != ""):?>
        "url": "<?php print $register;?>"
        <?php else: ?>
        "url": "<?php print get_the_permalink($post->ID);?>"
        <?php endif; ?>
    },
    <?php else: ?>
    "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
    "location": {
        "@type": "Place",
        "name": "<?php print $event_host;?>",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php print $address['street_address'];?>",
          "addressLocality": "<?php print $address['address_locality'];?>",
          "postalCode": "<?php print $address['postal_code'];?>",
          "addressRegion": "<?php print $address['address_region_state'];?>",
          "addressCountry": "<?php print $address['address_country'];?>"
        }
    },
    <?php endif; ?>
    "image": [
        "<?php print $featured_img_url;?>"
    ],
    "description": "<?php print trim(preg_replace('#^<p>|</p>$#i', '', trim(apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID))))); ?>",
    "organizer": {
        "@type": "Organization",
    <?php if(strpos($terms, 'Kount-Hosted Event') !== false):?>
        "name": "Kount",
        "url": "https://kount.com"
    <?php else: ?>
        "name": "<?php print get_the_title($post->ID);?>",
        "url": "<?php print get_the_permalink($post->ID);?>"
    <?php endif; ?>
    }
}
</script>
            <?php
            endwhile; ?>
          </div>
        </div>
    </section>
    <?php
    endif;
    wp_reset_postdata();
?>
