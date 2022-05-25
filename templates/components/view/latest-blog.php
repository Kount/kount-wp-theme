<!-- Newest case studies -->
<div class="full-width newest-case-studies">
  <?php
  $args = array(
    'posts_per_page' => 4,
    'offset' => 0,
    'post_type' => 'case_study',
    'orderby' => 'date',
    'order' => 'DESC'
  );
  $posts = get_posts($args);
  ?>
  <?php
  foreach ($posts as $post):
    $bannerimg = get_field('banner_image' ,$post->ID);
    $subtitle = get_field('sub_title', $post->ID);
    $logoimage = get_field('logo',$post->ID);
    $url = get_the_permalink($post->ID);
    ?>
    <div class="item">
      <div class="case-study-riverbed-rebrand-top" style="background-image: url(<?php print $bannerimg['url']; ?>);">
        <div class="case-top-wrapper">
          <div class="case-banner-left-box">
            <div class="case-logo-each">
              <img src="<?php print $logoimage['url'] ?>" class="hide" alt="<?php print $logoimage['alt'] ?>" class="case-logo-smaller">
            </div>
            <h3 class="white-font"><?php print $subtitle; ?></h3>
            <a class="request-services work" href="<?php print $url; ?>">View Case Study</a>
          </div>
        </div>
      </div>
    </div>

    <?php
  endforeach;
  wp_reset_postdata();
  ?>
</div>