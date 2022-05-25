<?php

/**
 * Template Name: Ebook
 */


print '<div class="refresh19">';
get_header();
@include(THEME_DIR . "/templates/components/tbd/banner-ebook.php");
@include(THEME_DIR . "/templates/components/tbd/featuring-ebook.php");
@include(THEME_DIR . "/templates/components/tbd/footer-bottom.php");
get_footer();
print '</div>';

?>