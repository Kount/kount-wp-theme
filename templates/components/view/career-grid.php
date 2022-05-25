<section class="career-grid">
  <div class="container">
    <?php
    $jobs_nav = '';
    $open_jobs = '';
    $categories = get_terms('job_type', array(
      'orderby' => 'name',
      'order' => 'ASC',
    ));

    $open_jobs .= '<div class="jobs-by-type">' . "\n";

    foreach($categories as $category):
      $jobs_nav .= sprintf('<a href="#cat-id-%d">%s (%d)</a>', $category->term_id, esc_html( $category->name ), $category->count);
      $open_jobs .= sprintf('<h3 id="cat-id-%d" class="pt-3 pb-2"><strong>%s</strong></h3>', $category->term_id, esc_html( $category->name ));
      $posts_array = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'career',
        'orderby' => 'title',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'job_type',
            'field' => 'term_id',
            'terms' => $category->term_id,
          )
        )
      ));

      $i = 0;
      if($posts_array):
        $open_jobs .= "<div class='ml-lg-5 job-posts-wrapper'>";
        foreach ( $posts_array as $job ):
          $open_jobs .= sprintf('<div class="job-posting py-3"><p class="h5 light"><a href="%s" class="default-link">%s</a></p></div>', esc_url( get_permalink( $job->ID ) ), $job->post_title);
        endforeach;
        $open_jobs .= "</div>";
      else:
        $open_jobs .= '<p>No jobs found</p>';
      endif;
    endforeach;
    $open_jobs .= '</div>';

    print '<div class="jobs-nav pb-4">' . $jobs_nav . '</div>';
    print $open_jobs
    ?>
  </div>
</section>
