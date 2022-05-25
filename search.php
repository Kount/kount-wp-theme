<?php get_header(); ?>
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kount
 */

@include(THEME_DIR . "/templates/common/header-menu.php");
?>


<?php
$search_query = get_search_query();
$total_results = $wp_query->found_posts;
?>
<section class="banner-multiview banner-third">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn undefined animate-complete">
        <h1>Search</h1>
      </div>
    </div>
  </div>
</section>

<section class="search-results">
  <div class="container">
    <div class="row wrapper-block">

      <!-- Main Search Results -->
      <div class="col-lg-12 col-xs-12">
        <form class="form-wrapper col-lg-12" action="/">
          <?php if ((!empty($search_query))): ?>
            <input type="search" class="email-text" name="s" value="<?php print $search_query; ?>" autocomplete="off">
          <?php else : ?>
            <input type="search" class="email-text" name="s">
          <?php endif; ?>
          <button type="submit" class="btn-default">Search</button>
        </form>

        <!-- Show Total Results -->
        <?php if (have_posts() && (!empty($search_query))) : ?>
          <h6 class="count-result"><?php print_r($total_results); ?> RESULTS</h6>
        <?php endif; ?>

        <!-- Render Search Results -->
        <?php
        if (have_posts()) :
          if (!empty($search_query)):

            while (have_posts()) : the_post();
              $gated = get_field('gated_url', $post);
              if ($gated) {
                $cta = $gated;
              } else {
                $cta = get_permalink();
              }
              echo '<div class="card card-box">';
              echo '<a href="' . $cta . '" rel="bookmark">';
              echo '<div class="card-body">';
              the_title('<p class="card-subtitle">', '</p>');
              echo '<small>' . $cta . '</small>';
              $excerpt = strip_tags(get_the_excerpt());
              echo '<h6 class="card-title">';
              echo $excerpt;
              echo '</h6>';
              echo '</div>';
              echo '</a>';
              echo '</div>';
            endwhile;

          endif;
        else :
          ?>
          <h5><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'agari'); ?></h5>
        <?php
        endif;
        ?>

        <!-- Show Pagination -->
        <?php
        $big = 999999999; // need an unlikely integer
        echo '<div class="pagination-count">' .
            paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 1
                )
            )
            . '</div>';
        ?>
      </div>

    </div>
  </div>
</section>
<?php
@include(THEME_DIR . "/templates/common/footer-content.php");
?>
<?php
get_footer();
?>

