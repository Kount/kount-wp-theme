<?php
/**
 * Template Name: Yext Search Page
 */

global $post;
get_header();
?>
<div class="site-search-overlay pt-3 pt-lg-5">
    <div class="container pb-5 wide">
        <div class="logo">
            <a href="/">
              <?php if(!is_front_page()):?><span class="sr-only">Home</span><?php endif; ?>
                <img class="no-lazyload" src="/wp-content/themes/kount/templates/dist/images/logo.svg" width="160" height="52" alt="eCommerce Fraud Protection">
            </a>
        </div>
        <div class="close-search"><a href="javascript:history.back();"><img src="/wp-content/themes/kount/templates/dist/images/svg/close-icon.svg" width="30" height="30" alt="close search" /></a></div>
    </div>
  <div class="container my-5 pb-5 pt-3 pt-lg-5 h-100 w-100 justify-content-center align-items-center">
    <p class="h3 pb-3"><strong>Search Kount's products, blog and educational resources.</strong></p>
    <?php

    print do_shortcode('[yext_searchbar]');
//    $content = apply_filters('the_content', $post->post_content);
//    print $content;
    ?>
  </div>
</div>
<?php get_footer(); ?>

