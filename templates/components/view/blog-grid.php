<?php
$searchTerm = (isset($_GET['search'])) ? preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['search']) : '';
?>

<section class="blog-landing-header">
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="wow fadeIn" data-wow-delay="0.1s">
        <div class="text-wrapper">
          <h1 class="h2"><strong class="extra-bold">The Kount Blog</strong></h1>
        </div>
        <div class="blog-form-wrapper" id="blog-header-form-wrapper">
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
      </div>
    </div>
  </div>
</section>

<?php
if($searchTerm == ""):
  get_template_part('templates/components/reference/featured-blog');
else:
  ?>
<section class="search-info bg-light-gray wow fadeIn">
  <div class="container text-center">
    <h2>Search Term: <strong><?php print $searchTerm;?></strong></h2>
    <p id="no-results-found" class="pt-3" style="display: none;">No posts found. Please search again below.</p>
  </div>
</section>
<?php
endif;
get_template_part('templates/components/reference/blog-sub-nav');

$featured_post_id = 0;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'meta_key' => 'featured_post',
    'meta_value' => 1
);
$featured_post = get_posts($args);
foreach($featured_post as $post) :
  $featured_post_id = $post->ID;
endforeach;
?>

<section class="blog-grid">
  <div class="container wide">
    <div class="blog-card-wrapper" id="load-more-blogs-results">
      <div class="grid-sizer"></div>
    </div>
    <input type="hidden" id="current-page" value="1" />
    <input type="hidden" id="exclude" value="<?php print $featured_post_id;?>" />
    <input type="hidden" id="search-term" value="<?php print $searchTerm; ?>" />
    <input type="hidden" id="webp-enabled" value="<?php print isBrowserWebPEnabled();?>" />
    <div class="btn-wrap text-center pt-3 pb-5 wow fadeIn" data-wow-delay="0.4s"><strong><a id="load-more-blogs-btn" href="#" class="load-btn">Loading...</a></strong></div>
  </div>
</section>

<section class="promotional-cta wow fadeIn blue-bg" data-wow-delay="0.5s">
  <div class="container">
    <div class="column-wrapper wow fadeInUp" data-wow-delay="0.5s">
      <div class="content-wrap d-flex align-items-center">
        <div class="inner-wrap">
          <p class="h2">Learn more about Kount</p>
        </div>
        <a href="/demo" class="cta-btn btn-white toggle-demo-form" data-event-action="Blog Page Footer CTA" data-text="Get a demo"><span>Get a demo</span></a>
      </div>
    </div>
  </div>
</section>