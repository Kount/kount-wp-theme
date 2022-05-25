<?php

/**
 * Template Name: Webinar
 */


//print '<div class="refresh19">';
get_header();
@include(THEME_DIR . "/templates/components/tbd/banner-webinar.php");
@include(THEME_DIR . "/templates/components/tbd/featuring.php");
@include(THEME_DIR . "/templates/components/tbd/team-grid.php");
@include(THEME_DIR . "/templates/components/tbd/webinar-cta.php");
@include(THEME_DIR . "/templates/components/tbd/footer-bottom.php");
get_footer();
//print '</div>';

?>