<?php include 'common/variables.php';
$feature_args = array(
    'post_type' => array('events', 'third party events'),
    'posts_per_page' => 3,
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
            'key' => 'start_date', // Check the start date field
            'value' => date("Y-m-d"), // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATE' // Let WordPress know we're working with date
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

);
$featureposts = get_posts($feature_args);
?>

  <section class="event-cards" id="events">
  <div class="container">
  <div class="intro-block">
    <h3><strong class="extra-bold">Let&rsquo;s get together sometime</strong></h3>
    </div>
  <div class="column-wrapper d-flex justify-content-center row">
<?php
if ($featureposts):

  foreach ($featureposts as $post) : setup_postdata($post);
    $title = get_the_title($post->ID);
    $start_date = get_field('start_date', $post->ID);
    $end_date = get_field('end_date', $post->ID);
    $event_location = get_field('event_location', $post->ID);
    $address = get_field('address', $post->ID);
    $register = get_field('register', $post->ID);
    $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
    $attachment_id = get_post_thumbnail_id($post->ID);
    $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
    $image = wp_get_attachment_image_src($attachment_id, '');
    $feature_image = $image[0];
    $featured_event = get_field('featured_event', $post->ID);
    $link_to_register = get_field('link_to_register_url_from_tile', $post->ID);
    $featured_img_url = get_the_post_thumbnail_url($post->ID);
?>

    <?php if($post->post_type == "thirdpartyevents" || $link_to_register): ?>
      <a class="col-three <?php echo $color; ?>" href="<?php print $register; ?>">
    <?php else: ?>
      <a class="col-three <?php echo $color; ?>" href="<?php print the_permalink($post->ID); ?>">
    <?php endif; ?>
    <?php if($featured_event): ?>
      <div class="featured-event-banner"><span>FEATURED EVENT</span></div>
    <?php endif; ?>
        <div class="img-wrapper">
        <img src="<?php print $feature_image ?>" alt="<?php print $image_alt ?>"></div>
      <div class="content-wrapper">
        <div class="head-content pb-3">
          <h5><?php print $title; ?></h5>
          <p><?php we_get_date($start_date, $end_date); ?></p>
          <p><?php print $event_location; ?></p>
        </div>
        <div class="bottom-content">
          <p><?php print $excerpt; ?></p>
        </div>
        <div class="card-arrow">
          <?php if($post->post_type == "thirdpartyevents"): ?>
            <div class=" link-arrow" data-text="Learn More"><span>Register Now</span></div>
          <?php else: ?>
            <div class=" link-arrow" data-text="Learn More"><span>Learn More</span></div>
          <?php endif; ?>
        </div>
      </div>
    </a>
  <?php
if($link_to_register && $register != ""):
    $locationType = "VirtualLocation";
    ?>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "<?php print get_the_title();?>",
        "startDate": "<?php print $start_date;?>",
        "endDate": "<?php print $end_date;?>",
        "eventStatus": "https://schema.org/EventScheduled",
        "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
        "location": {
            "@type": "<?php print $locationType;?>",
            "url": "<?php print $register;?>"
        },
        "image": [
            "<?php print $featured_img_url;?>"
        ],
        "description": "<?php print trim(preg_replace('#^<p>|</p>$#i', '', trim(apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID))))); ?>",
        "organizer": {
            "@type": "Organization",
            "name": "Kount",
            "url": "https://kount.com"
        }
    }
</script>
<?php
endif;
  endforeach;
  wp_reset_postdata();
  ?>

  </div>
  <a href="/events" class="btn-default" data-text="View all Events"><span>View all events</span></a>
      <?php else: ?>
      <p class="h3 text-center">No events scheduled at this time.</p>
      <?php endif; ?>

  </div>
  </section>
