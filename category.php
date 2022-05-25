<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kount
 */
$isPodcastPage = is_category('podcasts');
$latestPodcastId = 0;
$searchTerm = (isset($_GET['search'])) ? $_GET['search'] : '';

get_header();
?>
  <section class="blog-landing-header<?php if($isPodcastPage): print ' podcasts-page mb-5'; endif; ?>">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="wow fadeIn" data-wow-delay="0.1s">
          <?php if($isPodcastPage): ?>
          <h1 class="h2 text-center text-white"><strong class="extra-bold">5 Trends, 5 Minutes: Cyber & Fraud Podcasts</strong></h1>
          <?php else: ?>
          <div class="text-wrapper">
            <h1 class="h2"><strong class="extra-bold">The Kount Blog</strong></h1>
            <p class="text-white">Category: <strong><?php print single_cat_title(); ?></strong></p>
          </div>
          <div class="blog-form-wrapper pt-4 pt-md-2" id="blog-header-form-wrapper">
            <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
            <form id="mktoForm_1097"></form>
            <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1097);</script>
            <script type="text/javascript">

              MktoForms2.whenReady(function (form) {

                form.onValidate(function (builtInValid) {

                  if (!builtInValid) return;

                  form.submittable(true);

                  var vals = form.vals();

                  var invalidDomains = ["yahoo.com", "gmail.com", "mailinater.com", "live.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "earthlink.net", "aol.com"],

                      emailExtendedValidationError = 'Please enter your business email address.',

                      emailField = 'Email',

                      emailFieldSelector = '#' + emailField;

                  var invalidDomainRE = new RegExp('@(' + invalidDomains.join('|') + ')$', 'i');

                  if (invalidDomainRE.test(form.vals()[emailField])) {

                    form.showErrorMessage(emailExtendedValidationError,

                        form.getFormElem().find(emailFieldSelector)
                    );

                    form.submittable(false);

                  }

                  var emailRegExp = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;

                  var validEmail = emailRegExp.test(vals.Email);

                  if (!validEmail) {

                    form.showErrorMessage(emailExtendedValidationError,

                        form.getFormElem().find(emailFieldSelector)
                    );

                    form.submittable(false);

                  }

                });

                form.onSuccess(function (values, followUpUrl) {

                  // console.log("check!");

                  form.getFormElem().css("visibility", "hidden");

                  // setTimeout(function () {
                  //     $('.mkThankyou').fadeOut();
                  //     $('.mktoModalMask').fadeOut();
                  // }, 5000);

                  $('.blog-form-wrapper #blog-header-form-wrapper form').css("visibility", 'hidden');
                  $('.blog-form-wrapper #blogconfirmform').css("display", 'flex');
                  return false;
                });

              });

            </script>
            <div class="thank-you" id="blogconfirmform" style="display: none;">
              <p class="text-white"><strong>Thank You.</strong></p>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php
if(!$isPodcastPage):
  get_template_part('templates/components/reference/blog-sub-nav');
endif;
?>

<section class="blog-grid<?php if($isPodcastPage): print ' podcasts'; endif;?>">
  <div class="container wide">
    <!--    <div class="card-wrapper grid">-->
    <!--    <div class="card-wrapper grid" id="load-more-blogs-results" data-colcade="columns: .grid-col, items: .grid-item">-->
<?php if($isPodcastPage): ?>
    <div class="row">
        <div class="col-md-9 pr-md-5">
        <div class="latest-podcast-wrapper mb-5">
          <p class="pb-3"><small><strong>LATEST EPISODE</strong></small></p>
          <?php
  $podcastCatId = get_cat_ID('podcasts');
  $args = array(
      'post_type'       => 'post',
      'posts_per_page'  => 1,
      'orderby'         => 'date',
      'order'           => 'DESC',
      'post_status'     => 'publish',
      'cat'             => $podcastCatId
  );
  //$latestPodcast = get_posts($args);
  $latestPodcastQuery = new WP_Query($args);
  if($latestPodcastQuery->have_posts()) :
    while ($latestPodcastQuery->have_posts()) : $latestPodcastQuery->the_post();
      $latestPodcastId = $post->ID;
      $latestExcerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
      $latestContent = apply_filters('the_content', $post->post_content);
      $altTileImageUrl = isset(get_field('alt_tile_image', $post->ID)['sizes']['large']) ? get_field('alt_tile_image', $post->ID)['sizes']['large'] : '';

      ?>
    <div class="row">
      <div class="col-sm-4 pb-4 img-wrapper">
        <a href="<?php print get_permalink($post->ID);?>"><?php if($altTileImageUrl != ""):?><img src="<?php print $altTileImageUrl;?>" alt="" /><?php else: print we_image($post->ID); endif;?></a>
      </div>
      <div class="col-sm-8 pl-sm-4">
        <h2 class="h4 line-height-1 pb-3"><a href="<?php print get_permalink($post->ID);?>"><strong class="extra-bold"><?php print get_the_title($post->ID);?></strong></a></h2>
  <!--      <p class="py-3 meta"><small>--><?php //the_category(', '); ?><!-- <span class="mx-1">|</span> Published --><?php //print the_time('m/d/Y'); ?><!--</small></p>-->
        <p class="pb-2">
          <?php
          if ($latestExcerpt == "") :
            print wp_trim_words($latestContent, 50);
          else:
            print wp_trim_words($latestExcerpt, 50);
          endif;
          ?>
        </p>
        <?php print do_shortcode('[powerpress]'); ?>
      </div>
    </div>

<?php
  endwhile;
endif;
?>
        </div>
    <?php endif; ?>
    <div class="blog-card-wrapper" id="load-more-blogs-results">
      <div class="grid-sizer"></div>
    </div>
    <?php if($isPodcastPage && $latestPodcastId > 0): ?>
    <input type="hidden" id="exclude" value="<?php print $latestPodcastId;?>" />
    <?php endif; ?>
    <input type="hidden" id="current-page" value="1" />
    <input type="hidden" id="category-id" value="<?php print get_queried_object()->term_id;?>" />
<!--    <input type="hidden" id="exclude" value="--><?php //print $featured_post_id;?><!--" />-->
    <input type="hidden" id="search-term" value="<?php print $searchTerm;?>" />
    <input type="hidden" id="webp-enabled" value="<?php print isBrowserWebPEnabled();?>" />

    <div class="btn-wrap text-center pt-3 pb-5 wow fadeIn" data-wow-delay="0.4s"><strong><a id="load-more-blogs-btn" href="#" class="load-btn">Loading...</a></strong></div>
    <?php if($isPodcastPage): ?>
        </div>
      <?php get_template_part('templates/components/reference/podcast-sidebar');?>
      </div>
    <?php endif;?>

  </div>
</section>

<section class="promotional-cta wow fadeIn blue-bg" data-wow-delay="0.5s">
    <div class="container">
      <div class="column-wrapper wow fadeInUp" data-wow-delay="0.5s">
        <div class="content-wrap d-flex align-items-center">
          <div class="inner-wrap">
            <h2>Learn more about Kount</h2>
          </div>
          <a href="/demo" class="cta-btn btn-white" target="_self" data-text="Get a Demo"><span>Get a Demo</span></a>
        </div>
      </div>
    </div>
  </section>
<?php
get_footer();
