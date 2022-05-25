<?php

/**
 * Template Name: Podcast Template
 */
print '<div class="refresh19">';
get_header();
//@include("templates/page-content.php");
?>
<header id="header">
  <div class="container px-0">
    <img width="1150" height="350" src="<?php print get_the_post_thumbnail_url();?>" alt="" class="wow fadeIn" />
    <div class="bg-light py-2 text-center">
      <ul>
        <li class="mx-3"><a href="/blog/category/podcasts" class="text-dark-blue">ARCHIVE</a></li>
      </ul>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <?php the_content(); ?>
  </div>
</section>
<footer id="footer" style="background-color: #325893; margin-bottom: 90px;" class="py-3">
  <div class="container">
    <p class="text-white"><small>&copy; 2020 Kount, Inc.</small></p>
  </div>
</footer>
<?php
get_footer();

?>
<div class="footer-podcast-player">
  <?php print do_shortcode('[powerpress url="https://media.blubrry.com/kount5in5/content.blubrry.com/kount5in5/000-Kount-Trailer-1.mp3"]');?>
</div>
<?php
print '</div>';
