<?php
global $post;
$subheader = get_field('subheader', get_the_ID());
$isBlogDigest = get_field('is_blog_digest', get_the_ID());
$showAuthor = get_field('show_author', get_the_ID());
$isPodcast = in_category('podcasts') ? true : false;
$publishedDate = get_the_date('', get_the_ID());

//For promotional CTA
$title = get_field('title');
$blurb = get_field('blurb');
$button = get_field('button');
$display_form = get_field('display_blog_notification_form');
$bg_image = get_field('background_image');
?>

<?php if($isBlogDigest) : ?>
    <section class="banner-multiview banner-third single-blog is-digest">
        <div class="bg-img">
            <img src="/wp-content/uploads/2020/09/digest-header-bg.jpg" alt="">
        </div>
        <div class="v-middle-inner container wide">
            <div class="v-middle">
                <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
                    <h1><?php echo get_the_title(); ?>
                      <?php if($subheader != ""): ?>
                          <span class="h3 text-white ml-3"><strong><?php print $subheader;?></strong></span>
                      <?php endif; ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="blog-detail<?php if($isBlogDigest) { print ' is-digest'; } ?>">
    <div class="container<?php if($isBlogDigest || $isPodcast): ?> wide<?php endif;?>">
        <div class="<?php if(!$isBlogDigest && $isPodcast): print 'mx-auto col-md-9 '; endif; ?>text-content wow fadeIn">
            <div class="content-wrapper">
              <?php if(!$isBlogDigest) : ?>
                  <h1 class="pb-5 pr-lg-5 text-center text-md-left"><strong class="extra-bold"><?php print get_the_title(); ?></strong></h1>
                <?php if($showAuthor):
                  $profilePhotoUrl = isset(get_field('profile_photo', 'user_' . $post->post_author)['sizes']['medium']) ? get_field('profile_photo', 'user_' . $post->post_author)['sizes']['medium'] : "";
                  ?>
                      <div class="author-info d-flex align-items-center pb-4 justify-content-center justify-content-md-start">
                        <?php if($profilePhotoUrl != ''): ?><div class="avatar-wrap mr-3"><?php print '<img src="' . $profilePhotoUrl . '" width="150" height="150" alt="" />';?></div><?php endif; ?>
                          <p class="mb-0 "><strong><?php print get_the_author_meta( 'display_name', $post->post_author );?></strong><?php if(get_the_author_meta( 'description', $post->post_author ) != ""):?>, <?php print get_the_author_meta( 'description', $post->post_author ); endif;?></p>
                      </div>
                <?php
                endif;
              endif;
              $content = apply_filters('the_content', $post->post_content);
              print $content;

              if($isBlogDigest) :
              $podcastSection = get_field('podcast_section', get_the_ID());
              $columns = get_field('content_columns', get_the_ID());
              if(have_rows('content_columns')) :
              ?>
                <div class="row">
                  <?php
                  $i = 0;
                  while(have_rows('content_columns')) : the_row();
                  $i++;
                  $column_title = get_sub_field('column_title');
                  $column_img_url = isset(get_sub_field('column_header_background_image')['url']) ? get_sub_field('column_header_background_image')['url'] : '';
                  if($i == 1): ?>
                    <div class="col-md-8">
                        <div class="row">
                          <?php
                          elseif($i == 3):?>
                            <div class="col-md-4">
                                <div class="row">
                                  <?php
                                  endif;
                                  ?>
                                    <div class="col-md-<?php if($i == 1) : print '5 column-1 pr-md-3 border-md-right'; elseif($i == 2): print '7 column-2 px-md-3'; else: print '12 column-3 pl-md-3 border-md-left'; endif;?>">
                                      <?php if($column_img_url != ''): ?>
                                          <div class="digest-column-header mb-3 mt-3 mt-md-0">
                                              <img src="<?php print $column_img_url;?>" alt="" />
                                              <div class="content-wrapper">
                                                  <h2 class="h4 extra-bold text-center py-3 wow fadeIn"><?php print $column_title?></h2>
                                              </div>
                                          </div>
                                      <?php
                                      endif;
                                      if(have_rows('articles')) :
                                        while(have_rows('articles')) : the_row();
                                          $header = get_sub_field('header_text');
                                          $header_image_url = isset(get_sub_field('header_image')['url']) ? get_sub_field('header_image')['url'] : '';

                                          $link_url = get_sub_field('link_url');
                                          $nofollow = get_sub_field('add_nofollow') ? ' rel="nofollow"' : '';
                                          $description = get_sub_field('description');
                                          $show_button = get_sub_field('show_button');
                                          $button_text = ($show_button) ? get_sub_field('button_text') : '';
                                          ?>
                                            <article class="digest-article wow fadeIn mb-3 pb-2">
                                              <?php if($header_image_url != '') :?><div class="header-image text-center pt-1 pb-2"><a<?php print $nofollow;?> href="<?php print $link_url;?>"><img alt="" src="<?php print $header_image_url;?>" /></a></div><?php endif;?>
                                                <p class="title"><?php if(!$show_button && $link_url != '') : ?><a<?php print $nofollow;?> href="<?php print $link_url;?>"><?php endif; ?><?php print $header;?><?php if(!$show_button && $link_url != '') : ?></a><?php endif ?></p>
                                              <?php print $description;?>
                                              <?php if($show_button) : ?>
                                                  <a<?php print $nofollow;?> href="<?php print $link_url;?>" class="btn-orange mb-2" data-text="<?php print $button_text;?>"><span><?php print $button_text;?></span></a>
                                              <?php endif; ?>
                                            </article>
                                        <?php
                                          //endforeach;
                                        endwhile;
                                      endif;
                                      ?>
                                    </div>
                                  <?php
                                  //endforeach;
                                  if($i == 2 || $i == 3): ?>
                                </div>
                              <?php if($i == 2 && $podcastSection != ""):?>
                                  <div class="row pt-md-3 pb-3 pb-mb-0 mt-0 mt-md-3 mb-3 mb-md-0 border-md-top border-bottom border-md-bottom-0 mr-md-3">
                                    <?php print $podcastSection;?>
                                  </div>
                              <?php
                              endif;?>
                            </div>
                        <?php
                        endif;
                        endwhile;?>
                        </div>
                      <?php
                      endif;
                      endif;
                      ?>
                        <!--            </div>-->
                        <!--          </div>-->

                      <?php if(!$isBlogDigest) : ?>
                      <?php
                      if($isPodcast):
//                        get_template_part('templates/components/reference/podcast-sidebar');
                      else:
                      ?>
                    </div>
                </div>
            <?php
            endif;
            endif; ?>
            </div><!-- end container -->
</section>

<?php
$content = get_post_field( 'post_content', $post->ID );
$wordCount = str_word_count( strip_tags( $content ) );
?>

<script type="application/ld+json">
  { "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?php print addcslashes(get_the_title(), '"');?>",
    "alternativeHeadline": "<?php print addcslashes($subheader, '"');?>",
    "image": "<?php print get_the_post_thumbnail_url($post->ID, 'large');?>",
    "wordcount": "<?php print $wordCount;?>",
    "publisher": {
        "@type": "Organization",
        "name": "Kount, An Equifax Company",
        "url": "https://kount.com",
        "logo": {
            "@type": "ImageObject",
            "url": "https://kount.com/wp-content/themes/kount/templates/dist/images/logo.svg",
            "width":"396",
            "height":"129"
        }
    },
    "url": "<?php print get_permalink();?>",
    "datePublished": "<?php print the_time('Y-m-d');?>",
    "dateCreated": "<?php print the_time('Y-m-d');?>",
    "dateModified": "<?php print get_the_modified_date("Y-m-d")?>",
    "description": "Leading eCommerce Fraud Protection & Chargeback Prevention",
    "articleBody": "<?php print addcslashes(wp_strip_all_tags(do_shortcode($content)), '"'); ?>",
    "author": {
      "@type": "Person",
      "name": "<?php print get_the_author_meta('display_name')?>"
    }
  }
</script>
<?php if ($title || $button['text']): ?>
    <section class="promotional-cta no-img-row wow fadeIn<?php if($isBlogDigest) { print ' is-digest'; } ?>" data-wow-delay="0.5=2s">
      <?php if(isset($bg_image['url'])): ?>
          <div class="img-wrapper">
              <img src="<?php print $bg_image['url'];?>" width="100%" alt="blog notification signup background image" />
          </div>
      <?php endif;?>
        <div class="container">
            <div class="column-wrapper wow fadeInUp" data-wow-delay="0.5s">
                <div class="content-wrap d-flex align-items-center">
                    <div class="inner-wrap">
                      <?php
                      we_print_field($title, '<p class="text-white h2 pb-md-3 pb-lg-0">', '</p>');
                      we_print_field($blurb, '<p class="text-white">', '</p>'); ?>
                    </div>
                  <?php if($display_form): ?>
                      <div class="form-wrapper" id="blog-sidebar-form-wrapper">
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

                                      $('.form-wrapper #blog-sidebar-form-wrapper form').css("visibility", 'hidden');
                                      $('.form-wrapper #blogconfirmform').css("display", 'flex');
                                      return false;
                                  });

                              });

                          </script>
                          <div class="thank-you" id="blogconfirmform">
                              <p>Thank You.</p>
                          </div>
                      </div>
                  <?php else:
                    $openDemoSlider = $button['use_demo_request_slider_form'] ?? false;
                    ?>
                      <a class="cta-btn btn-white<?php if($openDemoSlider): print ' toggle-demo-form'; endif ?>" href="<?php print $button['url']; ?>"
                         data-text="<?php print $button['text']; ?>"<?php if($openDemoSlider): print ' data-event-action="Blog detail footer CTA"'; endif;?>><span><?php print $button['text']; ?></span></a>
                  <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif;

if(!$isBlogDigest && !$isPodcast): ?>
    <section class="py-5 bg-light-gray">
        <div class="container py-lg-4 wide">
            <p class="h2 text-center wow fadeIn pb-5" data-wow-delay="0.2s"><strong class="extra-bold">Related posts</strong></p>
            <div class="latest-posts-wrap d-flex wow fadeIn row" data-wow-delay="0.2s">
              <?php
              $podcastsCat = get_category_by_slug('podcasts');
              $podcastsCatId = '-' . $podcastsCat->term_id;
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'category__in' => wp_get_post_categories( $post->ID ),
                'cat' => $podcastsCatId,
                'post__not_in' => array($post->ID)
              );
              $latest_posts = get_posts($args);
              $i=0;
              //  $latest_posts_query = new WP_Query($args);
              //  if ($latest_posts_query->have_posts()) :
              //    while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
              foreach($latest_posts as $latest_post):
                $i++;
                $_link = get_permalink($latest_post->ID);
                $_isBlogDigest = get_field('is_blog_digest', $latest_post->ID);
                $_subheader = get_field('subheader', $latest_post->ID);
                ?>
                  <article class="related-post col-sm-6 px-3 col-lg-3">
                      <div class="row d-flex align-items-center pb-3">
                          <div class="img-wrapper col-4 pr-4">
                              <a rel="nofollow" href="<?php print $_link;?>"><?php print we_get_image(get_post_thumbnail_id($latest_post->ID), '', 'thumbnail' );?></a>
                          </div>
                          <div class="content-wrapper col-8">
                              <p><a href="<?php print $_link;?>" class="default-link"><strong><?php print get_the_title($latest_post->ID);?><?php if($_isBlogDigest): print ' &ndash; ' . $_subheader; endif; ?></strong></a></p>
                              <!--                            <p class="read-more"><strong>READ MORE ></strong></p>-->
                          </div>
                      </div>
                  </article>
              <?php
              endforeach;
              //    endwhile;
              //  endif;
              ?>
                <!--    </div>-->
            </div>
    </section>
<?php endif;

$entityType = $isPodcast ? 'Podcast' : 'Blog';
$entityId = 'blog-' . $post->post_name;
$ctaLabel = $isPodcast ? 'Listen now' : 'Read article';
?>
<section id="yext-crawler" class="d-none">
    <div class="entity-type"><?php print $entityType;?></div>
    <div class="entity-id"><?php print $entityId;?></div>
    <div class="published-date"><?php print $publishedDate;?></div>
    <div class="name"><?php print $post->post_title;?></div>
    <div class="description"><?php print wp_strip_all_tags($content); ?></div>
    <div class="website-url"><?php print get_the_permalink($post->ID);?></div>
    <div class="photo-gallery"><img alt="" height="0" width="0" src="<?php print get_the_post_thumbnail_url($post->ID, 'large');?>" /></div>
    <div class="primary-cta-label"><?php print $ctaLabel;?></div>
    <div class="primary-cta-link-type">URL</div>
    <div class="primary-cta-link"><?php print get_the_permalink($post->ID);?></div>
</section>

