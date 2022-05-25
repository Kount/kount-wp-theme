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
<section class="banner-multiview banner-third">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn undefined animate-complete">
        <h1>404</h1>
      </div>
    </div>
  </div>
</section>

<section id="primary" class="content-area">
  <main id="main" class="site-main ">

    <section class="error-404 not-found">
      <div class="container">
        <header class="page-header">
          <h2 class="page-title"><?php esc_html_e('Oops. Something went wrong.', 'kount'); ?></h2>
          <p>We are working diligently to fix old links as we transition to our new website. In the meantime, you might
            find what you're looking for using the following information.</p>
        </header><!-- .page-header -->

        <div class="page-content">
          <p><?php esc_html_e('Use our site search above to find what you are looking for.', 'kount'); ?></p>

          <?php
          get_search_form();
          ?>

        </div><!-- .page-content -->
      </div>
    </section><!-- .error-404 -->

  </main><!-- #main -->
</section><!-- #primary -->
<?php
//@include(THEME_DIR . "/templates/common/footer-content.php");
?>
<?php
get_footer();
?>

