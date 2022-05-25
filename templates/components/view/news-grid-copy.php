<section class="news-card-grid">
  <div class="bg-pattern">
  </div>
  <div class="container">

    <div class="card-wrapper">
      <div class="filter-wrapper">
        <div class="box-wrapper">

          <select>
            <option value="all">All Categories</option>
            <option value="press">Press Releases</option>
            <option value="article">News Articles</option>
          </select>
        </div>
        <div class="box-wrapper">

          <select>
            <option value="all">All Years</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>


          </select>
        </div>
      </div>

      <?php
      global $news;
      $characters = json_decode($news); // decode the JSON feed

      echo $characters[0]->title;

      ?>
      <?php
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
      $post_per_page = intval(get_query_var('posts_per_page'));
      $offset = ($paged - 1) * 12;
      $args = array(
          'post_type' => 'news',
          'posts_per_page' => 1,
          'orderby' => 'date',
          'offset' => $offset,
          'order' => 'DESC',
          'post_status' => 'publish',
          'suppress_filters' => false,
          'paged' => $paged
      );
      $custom_query = new WP_Query($args);
      ?>
      <?php if ($custom_query->have_posts()) : ?>
      <!-- the loop -->
      <?php
      while ($custom_query->have_posts()) :
      $custom_query->the_post();
      $title = get_the_title($post->ID);
      $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
      $post_object = get_post($post->ID);
      $content = preg_replace("/\[[^)]+\]/", "", $post_object->post_content);
      $terms = get_the_terms($post->ID, 'news_type');
      $cat = array();
      foreach ($terms as $term) {
        array_push($cat, $term->name);
      }
      $cat = implode(" ", $cat);
      $term_id = $term->term_id;
      ?>
      <?php if (we_get_image_src($post->ID, '')): ?>
      <a class="col-three wow fadeInUp" data-wow-delay="" href="<?php print the_permalink($post->ID); ?>">
        <?php else: ?>
        <a class="col-three wow fadeInUp no-image" data-wow-delay="" href="<?php print the_permalink($post->ID); ?>">
          <?php endif; ?>
          <div class="img-wrapper"><?php print we_image($post->ID); ?>
          </div>
          <div class="content-wrapper">
            <div class="head-content">
              <span class="tag webinar"><?php print $cat; ?></span>
              <?php if ($term_id == 10): ?>
                <h5 class="text-orange"><?php print $title; ?></h5>
              <?php else: ?>
                <h5 class="text-light-blue"><?php print $title; ?></h5>
              <?php endif; ?>
              <p><?php print the_time('F j, Y'); ?></p>

            </div>
            <div class="bottom-content">
              <?php if ($excerpt): ?>
                <p><?php print $excerpt; ?></p>
              <?php else: ?>
                <p><?php print wp_trim_words($content, 50, '...'); ?></p>
              <?php endif; ?>
            </div>
            <div class="card-arrow">
              <div class=" link-arrow" data-text="Learn More"><span>Read More </span></div>
            </div>
          </div>
        </a>

        <?php endwhile; ?>
        <!-- end of the loop -->
        <!-- pagination here -->
        <div class="pagination-wrapper custom">
          <?php
          if (function_exists(custom_pagination)) {

            custom_pagination($custom_query->max_num_pages, "", $paged);
          }
          ?>
        </div>

        <?php else: ?>
          <p><?php ('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

    </div>
  </div>
</section>
