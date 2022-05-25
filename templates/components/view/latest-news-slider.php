<section class="latest-news-widget" id="news">
  <div class="container">
<!--    <div class="blue-pentagon">-->
<!--      <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_blue.svg" alt="Tab pattern">-->
<!--    </div>-->
    <div class="intro-block pb-4 pb-md-5">
      <h3><strong class="extra-bold">Kount&rsquo;s making headlines</strong></h3>
    </div>

    <div class="latest-news-widget d-flex row justify-content-center">
      <?php
//$args = array(
//    'posts_per_page' => 3,
//    'offset' => 0,
//    'post_type' => array('news'),
//    'orderby' => 'date',
//    'order' => 'DESC',
//    'post_status' => array('publish'),
//
//);
//$posts = get_posts($args);
$args = array(
    'post_type' => 'news',
    'posts_per_page' => 3,
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
?>
    <div class="col-sm-6 col-lg-4 my-3 wow fadeIn">
      <article class="bg-light mx-3 news-card h-100">
        <a class="d-block py-3 px-4 h-100" href="<?php print $link;?>" style="color: <?php print $color;?>>;">
          <span class="triangle" style="background-color: <?php print $color;?>"></span>
          <span class="published-date d-block pb-4 mb-2"><strong class="extra-bold"><?php print strtoupper($post_date);?></strong></span>
    <?php
    if (isset($logo['url']) && $logo['url'] != ''):
      $logo_url = $logo['url'];
      if($isWebPEnabled) {
        $logo_url = convert_img_src_to_webp($logo_url, true);
      }
      ?>
          <span class="img-wrap d-block pb-4 text-center mb-2"><img src="<?php print $logo_url;?>" alt="" /></span>
    <?php
    endif;
    ?>
          <span class="d-block pb-5 mb-4 h5"><strong style="color: <?php print $color;?>" class="semi-bold"><?php print $title;?></strong></span>
          <span class="d-block text-right read-more"><small><strong>READ MORE</strong>&nbsp;&nbsp;></small></span>
        </a>
      </article>
    </div>

<?php ////if ($posts): ?>
<!--  <section class="latest-news-slider" id="news">-->
<!--    <div class="container">-->
<!--      <div class="blue-pentagon">-->
<!--        <img src="/wp-content/themes/kount/templates/dist/images/svg/pentagon_blue.svg" alt="Tab pattern">-->
<!--      </div>-->
<!--      <div class="intro-block">-->
<!--        <h2>Latest News</h2>-->
<!--      </div>-->
<!---->
<!--      <div class="slider-wrap">-->
<!--        <div class="slider d-flex justify-content-center">-->
<!--          --><?php //foreach ($posts as $post) : setup_postdata($post);
//
//            $html .= '<div class="col-sm-6 col-lg-4 my-3 wow fadeIn">' . "\n";
//            $html .= '  <article class="bg-light mx-3 news-card h-100">' . "\n";
//            $html .=  '   <a class="d-block py-3 px-4 h-100" href="' . $link . '" style="color: ' . $color . ';">' . "\n";
//            $html .= '      <span class="triangle" style="background-color: ' . $color . '"></span>' . "\n";
//            $html .= '      <span class="published-date d-block pb-4 mb-2"><strong class="extra-bold">' . strtoupper($post_date) . '</strong></span>' . "\n";
//            if (isset($logo['url']) && $logo['url'] != ''):
//              $logo_url = $logo['url'];
//              if($isWebPEnabled) {
//                $logo_url = convert_img_src_to_webp($logo_url, true);
//              }
//              $html .= '      <span class="img-wrap d-block pb-4 text-center mb-2"><img src="' . $logo_url . '" alt="" /></span>' . "\n";
//            endif;
//            $html .= '      <span class="d-block pb-5 mb-4 h5"><strong style="color: ' . $color . '" class="semi-bold">' . $title . '</strong></span>' . "\n";
//            $html .= '      <span class="d-block text-right read-more"><small><strong>READ MORE</strong>&nbsp;&nbsp;></small></span>' . "\n";
//            $html .= '    </a>' . "\n";
//            $html .= '  </article>' . "\n";
//            $html .='</div>' . "\n";
//
//
//            $title = get_the_title($post->ID);
//            $color = get_field('title_color', $post->ID);
//            $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
//            $attachment_id = get_post_thumbnail_id($post->ID);
//            $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
//            $image = wp_get_attachment_image_src($attachment_id, '');
//            $feature_image = $image[0];
//            $terms = get_the_terms($post->ID, 'news_type');
//            $cat = array();
//            foreach ($terms as $term) {
//              array_push($cat, $term->name);
//            }
//            $cat = implode(" ", $cat);
////            var_dump($cat);
//            ?>
<!---->
<!--            <div class="item">-->
<!--              <a href="--><?php //the_permalink($post->ID); ?><!--"><span class="sr-only">--><?php //print $title; ?><!--</span></a>-->
<!--              <div class="bg-img">-->
<!--                --><?php //if ($feature_image): ?>
<!--                  <img class="ie-responsive" src="--><?php //print $feature_image ?><!--" alt="--><?php //print $image_alt ?><!--">-->
<!--                --><?php //else: ?>
<!--                  <img class="ie-responsive"-->
<!--                       src="/wp-content/themes/kount/templates/dist/images/bigstock-Diverse-Office-People-Working.jpg"-->
<!--                       alt="news default images">-->
<!--                --><?php //endif; ?>
<!--              </div>-->
<!--              <div class="content">-->
<!--                <div class="inner-content">-->
<!--                  <span>--><?php //print the_time('F j, Y'); ?><!-- | --><?php //print $cat; ?><!--</span>-->
<!--                  <h5 class="text---><?php //echo $color; ?><!--">--><?php //print $title; ?><!--</h5>-->
<!--                  --><?php //print $excerpt; ?>
<!--                </div>-->
<!--                <a href="#" class="link-arrow">Read More</a>-->
<!--              </div>-->
<!--            </div>-->
<!--          --><?php //endforeach;
//          wp_reset_postdata(); ?>
<!---->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="learn-more">-->
<!--        <a href="/about/news-room" class=" btn-default" data-text="View All News"><span>View All News</span></a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->
<?php
    endwhile;
  endif;
  wp_reset_postdata();
?>
    </div>
    <div class="learn-more text-center pt-5">
      <a href="/about/news-room" class=" btn-default" data-text="View All News"><span>View all news</span></a>
    </div>
  </div>
</section>
