<?php
$searchTerm = (isset($_GET['search'])) ? preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['search']) : '';
?>

<section class="blog-category-links">
  <div class="container wide d-lg-flex align-items-lg-center">
    <div class="category-wrapper text-center float-lg-left wow fadeIn">
      <strong><a href="/blog" class="home-link">Blog Home</a></strong>
      <?php
//      $podcastsCat = get_category_by_slug('podcasts');
//      $podcastsCatId = $podcastsCat->term_id;

      $categories = get_categories();
      foreach($categories as $category):
        if($category->term_id != get_queried_object()->term_id):
          print '<strong><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></strong>';
        endif;
      endforeach;
      ?>
    </div>
    <div class="blog-search-wrapper float-lg-right py-5 py-lg-0 wow fadeIn">
      <form action="/blog/" method="get">
        <div class="input-wrap">
          <label for="search">Search All Blogs</label>
          <input id="search" type="text" name="search" value="<?php print $searchTerm;?>" placeholder="Search All Blogs" />
        </div>
        <input type="submit" value="" style="background:url('/wp-content/themes/kount/templates/dist/images/svg/magnify-blue.svg');">
      </form>
    </div>
  </div>
</section>
