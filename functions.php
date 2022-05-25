<?php

/**
 * CRITICAL: DO NOT REMOVE
 * Disables WordPress redirect so all URLs can be www.kount.com but still be served from a different domain
 */
remove_filter('template_redirect','redirect_canonical');

/**
 * kount functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kount
 */
if (!function_exists('we_setup')) :

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function we_setup()
  {

    /*
    * CSS and js version to clear cache.
    */
    $version_string = current_time('ymd') . 'ks72';
    define('WE_ASSETS_VERSION', $version_string);
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => esc_html__('Primary', 'kount'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
     * Enable support for Post Formats.
     * See https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('we_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));
  }

endif;
add_action('after_setup_theme', 'we_setup');
add_theme_support('post-thumbnails');

/**
 * Enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
 // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
  if(is_front_page()):
    wp_enqueue_style( 'home', REFRESH_DIR . '/templates/dist/styles/home.css' );
  elseif(is_single() && get_post_type( get_the_ID() ) == 'post' ):
    wp_enqueue_style( 'blog-detail', REFRESH_DIR . '/templates/dist/styles/blog-detail-inc.css' );
  elseif(is_page('products') || is_child('products')):
    wp_enqueue_style( 'product-pages', REFRESH_DIR . '/templates/dist/styles/product-pages.css' );
  else:
    wp_enqueue_style( 'main', REFRESH_DIR . '/templates/dist/styles/main.css' );
  endif;

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
/*
* Clickjacking fix.
*/
function block_frames() {
  header( 'X-FRAME-OPTIONS: SAMEORIGIN' );
  header('Content-Security-Policy: frame-ancestors \'self\'');
}
add_action( 'send_headers', 'block_frames', 10 );

/*
 * Instruction text for featured image upload
 */
add_filter('admin_post_thumbnail_html', 'add_featured_image_instruction');

function add_featured_image_instruction($content)
{
  return $content .= '<p>Please upload the image with dimensions 390 x 298 or in the ratio 390 : 298. </p>';
}

define('THEME_DIR', __DIR__);
define('REFRESH_DIR', '/wp-content/themes/kount');

//Remove Gutenberg Block Library CSS from loading on the frontend
function custom_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'custom_remove_wp_block_library_css', 100 );

/*
 *   Child page conditional
 *   @ Accept's page ID, page slug or page title as parameters
 */
function is_child( $parent = '' ) {
  global $post;

  $parent_obj = get_page( $post->post_parent, ARRAY_A );
  $parent = (string) $parent;
  $parent_array = (array) $parent;

  if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
    return true;
  } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
    return true;
  } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
    return true;
  } else {
    return false;
  }
}


/*
 * Check if browser is WebP image enabled
 */
function isBrowserWebPEnabled() {
    return false;
//    if(isset($_SERVER['HTTP_ACCEPT'])) {
//        $accept = $_SERVER['HTTP_ACCEPT'];
//        $pos = stripos($accept, 'image/webp');
//        if($pos === false){
//            return false;
//        }
//        else {
//            return true;
//        }
//    }
//    return false;
}
//define('WEBP_SUPPORTED', true);
/*
 *  Global function to convert img src values to .webp
 */
function convert_img_src_to_webp($content, $overrideWebPCheck = false) {
  if((isBrowserWebPEnabled() || $overrideWebPCheck) && !is_object($content)) {
    //Handles img src and srcset
    preg_match_all("/[^\"\'=\s]+\.(jpe?g|png)(?!.webp)/", $content, $output_array);

    $items_to_replace = array_unique($output_array[0]);
    $items_to_replace = array_values($items_to_replace);

    for ($j = 0; $j < sizeof($items_to_replace); $j++) {
      $content = preg_replace('~' . $items_to_replace[$j] . '~', $items_to_replace[$j] . '.webp', $content);
//      error_log($content);
    }
    $content = preg_replace("/(<img\s*?)src/", "$1data-src" ,$content);
  }
  return $content;
}

/*
 * Load our custom post types and taxonomies
 */
require get_template_directory() . '/inc/weplant.php';


/*
 * Load our functions
 */
require get_template_directory() . '/inc/wefunctions.php';

add_filter( 'upload_mimes', 'wpse_mime_types_webp' );
function wpse_mime_types_webp( $mimes ) {
  $mimes['webp'] = 'image/webp';

  return $mimes;
}

add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
    return $result;
  }
  if ( ! is_user_logged_in() ) {
    return new WP_Error( '', '', array( 'status' => 401 ) );
  }
  return $result;
});

// display featured post thumbnails in RSS feeds
function kount_rss_thumbnails( $content ) {
  global $post;
  if( has_post_thumbnail( $post->ID ) ) {
    $content = '<thumbnail>' . get_the_post_thumbnail( $post->ID, 'large' ) . '</thumbnail>' . $content;
  }
  return $content;
}
add_filter( 'the_excerpt_rss', 'kount_rss_thumbnails' );
add_filter( 'the_content_feed', 'kount_rss_thumbnails' );

// Set robots.txt file
// Commented lines are being added via some other process
function kount_robots_txt( $output ) {
//  $output .= 'User-agent: *' . PHP_EOL;
//  $output .= 'Disallow: /wp-admin/' . PHP_EOL;
//  $output .= 'Allow: /wp-admin/admin-ajax.php' . PHP_EOL;
//  $output .= 'Disallow: /wp-content/plugins/' . PHP_EOL;
//  $output .= 'Disallow: /wp-content/uploads/' . PHP_EOL;
  $output .= 'Disallow: /thanks/' . PHP_EOL;
  $output .= 'Sitemap: https://kount.com/sitemap_index.xml' . PHP_EOL;

  return $output;
}
add_filter( 'robots_txt', 'kount_robots_txt', 10, 1 );

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> true
  ));

  acf_add_options_sub_page(array(
      'page_title' 	=> 'Featured Resources',
      'menu_title'	=> 'Featured Resources',
      'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
      'page_title' 	=> 'Google Analytics Embed Script',
      'menu_title'	=> 'Google Analytics',
      'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Interactive Assess Features Section',
    'menu_title'	=> 'Assess Features',
    'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
      'page_title' 	=> 'Interactive Industry Analysts Section',
      'menu_title'	=> 'Industry Analysts',
      'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Interactive Partner Ecosystem Section',
    'menu_title'	=> 'Partner Ecosystem',
    'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
      'page_title' 	=> 'Logo Slider',
      'menu_title'	=> 'Logo Slider',
      'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
      'page_title' 	=> 'Podcast Sidebar',
      'menu_title'	=> 'Podcast Sidebar',
      'parent_slug'	=> 'theme-general-settings',
  ));

}

//Set custom hex values for color picker
function kount_acf_input_admin_footer() {
  ?>

  <script type="text/javascript">
    (function($) {

      acf.add_filter('color_picker_args', function( args, $field ){

        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#037758', '#33629A', '#7D3D8D', '#6E9DA3', '#C11F24', '#2F4D7A', '#2F3640', '#f46036' ]

        // return colors
        return args;

      });

    })(jQuery);
  </script>

<?php }

add_action('acf/input/admin_footer', 'kount_acf_input_admin_footer');

if( !function_exists('add_wistia_embed_content_toggle' ) ) {
  add_shortcode('wistia_embed_content_toggle', 'add_wistia_embed_content_toggle');
  function add_wistia_embed_content_toggle($atts, $content) {
    $a = shortcode_atts(array(
        'wistia_video_id' => $atts['wistia_video_id'],
        'content_toggle'  => $atts['content_toggle']
    ), $atts, 'wistia');

    $output = '';
    if ($a['wistia_video_id']) {
      $output .= '<div class="wistia-video-and-desc row wow fadeIn" data-wow-delay="0.2s">' . "\n";
      $output .= '  <div class="col-sm-4">' . "\n";
      $output .= '    <script src="https://fast.wistia.com/embed/medias/' . $a['wistia_video_id'] . '.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><span class="wistia_embed wistia_async_' . $a['wistia_video_id'] . ' popover=true popoverAnimateThumbnail=true videoFoam=true" style="display:inline-block;height:100%;position:relative;width:100%">&nbsp;</span></div></div>' . "\n";
      $output .= '  </div>' . "\n";
      $output .= '  <div class="col-sm-1"></div>' . "\n";
      $output .= '  <div class="col-sm-7">' . "\n";
      $output .= $content;
      if ($a['content_toggle']) {
        $output .= '  <p class="py-2"><a href="#" class="wistia-toggle btn-default">Read Description</a></p>' . "\n";
        $output .= '  <div class="content-toggle" style="display: none;">' . "\n";
        $output .= $a['content_toggle'] . "\n";
        $output .= '  </div>' . "\n";
      }
      $output .= '  </div>' . "\n";
      $output .= '</div>' . "\n";
    }
    return $output;
  }
}

if( !function_exists('add_marketo_form_shortcode') ) {

  add_shortcode('marketo_form', 'add_marketo_form_shortcode');

  function add_marketo_form_shortcode($atts ) {
    $a = shortcode_atts(array(
        'form_id' => $atts['form_id'],
        'message' => $atts['message'],
        'class' => ''
    ), $atts, 'marketo_form');

    $message = "<p class='h6'>Thanks. We'll keep you posted.</p>";
    if($atts['message'] != "") {
      $message = '<p>' . $atts['message'] . '</p>';
    }
    $output = '';
    if($a['form_id']) {
      $output .= '<script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>' . "\n";
      $output .= '  <form class="' . $a['class'] . '" id="mktoForm_' . $a['form_id'] . '"></form>' . "\n";
      $output .= '  <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", ' . $a['form_id'] . ', function (form) {' . "\n";
      $output .= '    form.onSuccess(function (values, followUpUrl) { ' . "\n";
      $output .= '      var message = "' . $message . '";' . "\n";
      $output .= '        jQuery("#get-updates").html(message);' . "\n";
      $output .= '        return false;' . "\n";
      $output .= '          })' . "\n";
      $output .= '    });</script>' . "\n";
    }

    return $output;
    
  }
}

if( !function_exists('add_marketo_redirect_form_shortcode') ) {

  add_shortcode('marketo_redirect_form', 'add_marketo_redirect_form_shortcode');

  function add_marketo_redirect_form_shortcode($atts ) {
    $a = shortcode_atts(array(
        'form_id' => $atts['form_id'],
        'page_redirect' => $atts['page_redirect'],
        'class' => ''
    ), $atts, 'marketo_redirect_form');

    ob_start();

    if($a['form_id']) {
      ?>
      <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
      <form class="<?php print $a['class'];?>" id="mktoForm_<?php print $a['form_id']; ?>"></form>
      <script>MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", <?php print $a['form_id']; ?>, function (form) {
          MktoForms2.whenReady(function (form) {
            if(form.getId() == '<?php print $a['form_id']; ?>') {
              form.onValidate(function (builtInValid) {
                if (!builtInValid) return;
                form.submittable(true);
                var vals = form.vals();
                var invalidDomains = ["yahoo.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "earthlink.net", "mailinator.com", "aol.com", "gmail.com"],
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
              form.onSubmit(function (form) {
                // alert("Success!");
                window.location.href="<?php print $atts['page_redirect'];?>";
                return false;
              });
            }
          });
        });
      </script>
      <?php
    }

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;

  }
}

if( !function_exists('add_marketo_blog_demo_request_form') ) {

  add_shortcode('blog_demo_form', 'add_marketo_blog_demo_request_form');

  function add_marketo_blog_demo_request_form($atts ) {
    $a = shortcode_atts(array(
        'form_id'   => $atts['form_id'],
        'message'   => $atts['message'],
        'header'    => $atts['header'],
        'text'      => $atts['text'],
        'bg-color'  => $atts['bg-color'],
        'class'     => ''
    ), $atts, 'blog_demo_form');

    ob_start();

    if($a['form_id']) {
      $bg_color = ($a['bg-color'] == 'dark') ? 'bg-midnight-blue' : 'bg-light-gray';
      ?>
    <div class="my-3 blog-demo-form <?php print $bg_color;?> wow fadeIn">
      <div class="inner row d-flex align-items-center py-4">
        <div class="col-lg-6 pr-lg-3 pb-4 pb-lg-0 text-center text-lg-left">
          <?php if($a['header'] != ""): ?>
          <p class="h4 line-height-1_25 mb-0"><strong<?php if ($a['bg-color'] == 'dark'): print ' class="text-white"'; endif;?>><?php print $a['header'];?></strong></p>
          <?php endif;
                if($a['text'] != ""): ?>
          <p class="mb-0 pt-1<?php if ($a['bg-color'] == 'dark'): print ' text-white'; endif;?>"><?php print $a['text'];?></p>
          <?php endif; ?>
        </div>
        <div class="form-wrapper col-lg-6 pl-lg-4">
          <script>
            function q(a){return function(){ChiliPiper[a].q=(ChiliPiper[a].q||[]).concat([arguments])}}window.ChiliPiper=window.ChiliPiper||"submit scheduling showCalendar submit widget bookMeeting".split(" ").reduce(function(a,b){a[b]=q(b);return a},{});
            ChiliPiper.scheduling("kount", "blog_de_router", {title: "Thanks! What time works best for a quick call?"})
          </script>
          <script src="https://js.chilipiper.com/marketing.js" type="text/javascript" async=""></script>
<!--          <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>-->
          <span id="form-message" class="text-center text-white" style="display: none;"><strong><?php print $a['message']; ?></strong></span>

          <script src="//go.kount.com/js/forms2/js/forms2.min.js"></script>
          <form class="<?php print $a['class'];?> wow fadeIn" id="mktoForm_<?php print $a['form_id']; ?>"></form>
          <script>MktoForms2.loadForm("//go.kount.com", "106-ANF-483", <?php print $a['form_id']; ?>);</script>

          <!-- Begin ZoomInfo -->
          <script src="/wp-content/themes/kount/scripts/js/zoominfo-formcomplete.js"></script>
          <!-- End ZoomInfo -->

            <script type="text/javascript">
                MktoForms2.whenReady(function (form) {
                    //Hide loader icon
                    var formId = form.getId();
                    if (formId == 1429) {

                        const formEl = form.getFormElem()[0];
                        const inputRows = ["FirstName", "LastName", "Company", "Phone"];
                        inputRows.forEach(function (item, index) {
                            // console.log(item, index);
                            formEl.querySelector(".mktoFormRow[data-wrapper-for~='" + item + "']").setAttribute('data-zi-managed', true);
                        });

                        formEl.querySelector("#Email").addEventListener("focus", function() {
                            // console.log("focus on email");
                            inputRows.forEach(function (item, index) {
                                // console.log(item, index);
                                var wrapperRow = formEl.querySelector(".mktoFormRow[data-wrapper-for~='" + item + "']");
                                wrapperRow.setAttribute('data-zi-empty', true);
                                setTimeout(function () {
                                    wrapperRow.setAttribute('data-mkto-error-ready', true);
                                }, 200)
                            });
                        });
                        // ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })
                        form.onValidate(function (builtInValid) {
                            if (!builtInValid) return;
                            form.submittable(true);
                            var vals = form.vals();
                            var invalidDomains = ["yahoo.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "earthlink.net", "mailinator.com", "aol.com", "gmail.com"],
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

                        // form.onSubmit(function() {
                        //Only track GA, Bing, and LinkedIn if no one is logged in

                        // const htmlElement = document.querySelector('html');
                        // if(htmlElement.classList.contains('logged-out')) {
                        //   gtag_report_conversion(window.location.href);
                        //   //   // alert("calling bing");
                        //   bing_demo_request_conversion();
                        //   //   // alert("calling linked in");
                        //   linkedin_event_pixel('3268124');
                        // } // true

                        // if(jQuery('html').hasClass('logged-out')) {
                        //   //   // alert("calling gtag");
                        //   gtag_report_conversion(window.location.href);
                        //   //   // alert("calling bing");
                        //   bing_demo_request_conversion();
                        //   //   // alert("calling linked in");
                        //   linkedin_event_pixel('3268124');
                        // }
                        // });

                        //Show confirmation message
                        form.onSuccess(function (values, followUpUrl) {
                            console.log('onSuccess');
                            form.getFormElem().css("display", "none");
                            // $('#mktoForm_1097').css("visibility", 'hidden');
                            document.getElementById('form-message').style.display = "block";
                            return false;
                        });
                    }
                });
            </script>

            <!--Begin ZoomInfo SmartReveal -->
          <link id="teknkl-ZoomInfo-CSS-1.0.1" rel="stylesheet" href="/wp-content/themes/kount/external/style/css/teknkl-zoominfo-smartreveal-1.0.1.css">
          <script id="teknklFormsPlus-Tag-0.2.3" src="/wp-content/themes/kount/scripts/js/teknkl-formsplus-tag-0.2.3.js"></script>
<!--          <script id="teknklZoomInfo-JS-1.0.1" src="/wp-content/themes/kount/scripts/js/teknkl-zoominfo-smartreveal-1.0.1.js"></script>-->
          <!--End ZoomInfo SmartReveal -->
        </div>
      </div>
    </div>
    <?php
    }

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;

  }
}


if( !function_exists('display_button_shortcode') ) {

  add_shortcode('button', 'display_button_shortcode');

  function display_button_shortcode($atts, $content = null) {
    $a = shortcode_atts(array(
        'link'  => "",
        'color' => "",
        'sr-text' => "",
        'slider' => "false",
        'event-action' => ""
    ), $atts, 'button');

    $output = '';
    $buttonText = '';
    $showSliderCSS = '';
    $eventLabel = '';
    $eventAction = '';

    if($a['slider'] == 'true' || $a['slider'] == "1") {
      $a['link'] = '#';
      $showSliderCSS = ' toggle-demo-form';
      $eventAction = $a['event-action'];
    }

    if($content && $a['link']) {
      $buttonText = ($a['sr-text'] != "") ? $content . '<span class="sr-only"> ' . $a['sr-text'] . '</span>' : $content;
      $color = ($a['color'] != "") ? $a['color'] : 'orange';
      $output = sprintf( '<a href="%s" class="btn-%s%s" data-event-action="%s" data-text="%s"><span>%s</span></a>', $a['link'], $color, $showSliderCSS, $eventAction, $content, $buttonText );
    }

    return $output;
  }
}

//Adds a smooth scroll down arrow
if( !function_exists('read_more_arrow_shortcode') ) {

  add_shortcode('read_more_arrow', 'read_more_arrow_shortcode');

  function read_more_arrow_shortcode($atts, $content = null) {
    $a = shortcode_atts(array(
        'link'  => ""
    ), $atts, 'button');

    $output = '';

    if($a['link'] != "") {
      $output = sprintf( '<a href="%s" class="smooth-scroll-down-arrow d-block text-center wow fadeIn" data-wow-delay="0.5s"><span class="sr-only">page down</span><img src="/wp-content/themes/kount/templates/dist/images/svg/long-down-arrow-black.svg" alt="" width="50" height="50"></a>', $a['link'] );
    }

    return $output;
  }
}

//Helper function for listing out permalinks
if( !function_exists('display_post_permalinks') ) {

    add_shortcode('post_permalinks', 'display_post_permalinks');

    function display_post_permalinks($atts, $content = null) {
//        $a = shortcode_atts(array(
//            'link'  => "",
//            'color' => "",
//            'sr-text' => "",
//            'slider' => "false",
//            'event-action' => ""
//        ), $atts, 'button');

        $casestudies = get_posts( array(
            'numberposts' => -1,
            'post_type' => 'casestudy',
        ) );

        if ( !empty( $casestudies ) ) {

            print '<h2>Case Studies</h2>';

            foreach( $casestudies as $cs ) {
                print get_permalink($cs->ID) . '<br/>';
            }
        }

        $events = get_posts( array(
            'numberposts' => -1,
            'post_type' => 'events',
        ) );

        if ( !empty( $events ) ) {

            print '<h2>Events</h2>';

            foreach( $events as $e ) {
                print get_permalink($e->ID) . '<br/>';
            }
        }

        $posts = get_posts( array(
            'numberposts' => -1,
            'post_type' => 'post',
        ) );


        if ( !empty( $posts ) ) {

//        $posts_data = array();
        print '<h2>Posts & Podcasts</h2>';

            foreach( $posts as $post ) {
                $id = $post->ID;
                print get_permalink($post->ID) . '<br/>';
    //            $posts_data[] = (object) array(
    //                'id' => $id,
    //                'slug' => $post->post_name,
    //                //'title' => $post->post_title,
    //            );
            }
        }

        $videos = get_posts( array(
            'numberposts' => -1,
            'post_type' => 'video',
        ) );

        if ( !empty( $videos ) ) {

            print '<h2>Videos</h2>';

            foreach( $videos as $video ) {
                print get_permalink($video->ID) . '<br/>';
            }
        }

    }
}


//Adds a 'starts_with' to posts queries to filter by first letter of post_title
function kount_posts_where( $where, $query ) {
  global $wpdb;

  $starts_with = strtolower($query->get('starts_with'));

  if ( $starts_with ) {
    $where .= " AND LOWER($wpdb->posts.post_title) LIKE '$starts_with%'";
  }

  return $where;
}
add_filter( 'posts_where', 'kount_posts_where', 10, 2 );

// add async and defer attributes to enqueued scripts
function yext_answers_script_loader_tag($tag, $handle, $src) {

  if ($handle === 'yext-answers-plugin-sdk-js') {

    if (false === stripos($tag, 'async')) {

      $tag = str_replace(' src', ' async="async" src', $tag);

    }

    if (false === stripos($tag, 'defer')) {

      $tag = str_replace('<script ', '<script defer ', $tag);

    }

  }

  return $tag;

}
//add_filter('script_loader_tag', 'yext_answers_script_loader_tag', 10, 3);

//Shortcode to load Yext searchbar dynamically on click
//function searchbar_custom_shortcode() {
//  echo do_shortcode('[yext_searchbar]');
//  die;
//}
//
//add_action('wp_ajax_searchbar', 'searchbar_custom_shortcode()');
//add_action('wp_ajax_nopriv_searchbar', 'searchbar_custom_shortcode()');


//AJAX function for searching glossary posts
function glossary_search_function(){

  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'glossary_nonce')) {
    print '<p class="text-center">Unable to verify nonce</p>';
    wp_die();
  }
  else {
    try {
      $search = isset($_POST['search']) ? strtolower(sanitize_text_field($_POST['search'])) : 'a';
      $args = array(
          'post_type' => 'glossary',
          'posts_per_page' => -1,
          'order_by' => 'post_title',
          'order' => 'asc',
          's' => $search
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        print '<dl>' . "\n";
        while ($query->have_posts()): $query->the_post();
          printf('<dt><a href="%s">%s</a></dt><dd>%s</dd>', get_the_permalink(), get_the_title(), get_the_content());
        endwhile;
        wp_reset_postdata();
        print '</dl>' . "\n";
      else :
        print '<p class="text-center"><strong>No glossary terms found</strong></p>';
      endif;
    }
    catch (exception $e) {
      //code to handle the exception
      print '<p class="text-center">Error getting glossary results: ' . $e.getMessage() . '</p>';
    }
    die();
  }
}

add_action('wp_ajax_glossary_search', 'glossary_search_function');
add_action('wp_ajax_nopriv_glossary_search', 'glossary_search_function');


//AJAX function for getting glossary posts by first letter of term
function glossary_filter_function(){

  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'glossary_nonce')) {
    wp_die();
  }
  else {
    $letter = isset($_POST['index']) ? strtolower(sanitize_text_field( $_POST['index'] )) : 'a';
    $args = array(
        'post_type'       => 'glossary',
        'posts_per_page'  => -1,
        'order_by'        => 'post_title',
        'order'           => 'asc',
        'starts_with'     => $letter
    );

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
      print '<dl>' . "\n";
      while( $query->have_posts() ): $query->the_post();
        printf('<dt><a href="%s">%s</a></dt><dd>%s</dd>', get_the_permalink(), get_the_title(), get_the_content());
      endwhile;
      wp_reset_postdata();
      print '</dl>' . "\n";
    else :
      print '<p class="text-center"><strong>No glossary terms found</strong></p>';
    endif;

    die();
  }
}

add_action('wp_ajax_glossary_filter', 'glossary_filter_function');
add_action('wp_ajax_nopriv_glossary_filter', 'glossary_filter_function');

//Change title via Yoast plugin when filter URL param is present
add_filter('wpseo_title', 'filter_resources_page_wpseo_title');
function filter_resources_page_wpseo_title($title) {
  if(is_page('fraud-prevention-resources') && isset($_GET['type']) && ($_GET['type'] == 'blog' || get_post_type_object( $_GET['type']))) {
    $type = $_GET['type'] != 'blog' ? get_post_type_object( $_GET['type'])->label : 'Blog';
    $title .= ' | ' . $type . ' | Kount';
  }
  return $title;
}

function ajax_load_more_news_posts() {

  global $wp_query;

  // In most cases it is already included on the page and this line can be removed
//  wp_enqueue_script('jquery');

  // register our main script but do not enqueue it yet
//  wp_register_script( 'loadmore_news', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );

  // now the most interesting part
  // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
  wp_localize_script( 'loadmore_news', 'loadmore_news_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
      'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
      'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
      'max_page' => $wp_query->max_num_pages
  ) );

  wp_enqueue_script( 'loadmore_news' );
}
add_action( 'wp_enqueue_scripts', 'ajax_load_more_news_posts' );

//Load Copy Data button to Webinars and Events
add_action( 'admin_enqueue_scripts', function ($hook) {
  //only load this script for a certain URL page slug
  global $post;

  if($post && ('webinar' == strtolower($post->post_type) || 'events' == strtolower($post->post_type))) {
    wp_register_script( 'kount/custom-admin-js', '/wp-content/themes/kount/admin/scripts/custom.js', ['jquery']);
    $params = array(
      'post_id'   => $post->ID,
      'ajax_url'  => admin_url( 'admin-ajax.php' ),
      'nonce'     => wp_create_nonce('ajax-nonce')
    );
    wp_localize_script('kount/custom-admin-js', 'copy_data_params', $params);
    wp_enqueue_script( 'kount/custom-admin-js' );
  }
});

//Load demo request slideout form script
//add_action( 'wp_enqueue_scripts', function ($hook) {
//  //only load this script for a certain URL page slug
//  global $post;
//
////  if(!is_admin()) {
//    wp_register_script( 'kount/demo-slideout-form-js', '/wp-content/themes/kount/scripts/js/demo-slideout-form.js', ['jquery']);
//    $params = array(
//        'ajax_url'  => admin_url( 'admin-ajax.php' )
//    );
//    wp_localize_script('kount/demo-slideout-form-js', 'demo_slideout_form_params', $params);
//    wp_enqueue_script( 'kount/demo-slideout-form-js' );
////  }
//});


function copy_webinar_data_to_events()
{
  $nonce = (isset($_POST['nonce'])) ? $_POST['nonce'] : '';
  error_log('$nonce = ' . $nonce);

  if (!wp_verify_nonce($nonce, 'ajax-nonce')) {
    die('Nonce value cannot be verified.');
  }

  $webinarId = $_POST['webinar_id'];
  $webinarPost = get_post($webinarId);

  $virtualEventTermId = 16; //Virtual Event Category

  $newEventPost = array(
      'post_title'  => $webinarPost->post_title,
    //        'post_content'  => $_POST['post_content'],
      'post_status' => 'publish',
      'post_type'   => 'events',
      'post_excerpt' => $webinarPost->post_excerpt,
      'post_author' => get_current_user_id()
//      'post_category' => array($virtualEventTermId)
  );

  error_log(print_r($newEventPost, true));
  $eventId = wp_insert_post($newEventPost);
  error_log('$eventId = ' . $eventId);

  if($eventId > 0) {
    //Set 'Virtual Event' for Event Type
    $taxonomy = 'event_type';
    $termObj  = get_term_by( 'id', $virtualEventTermId, $taxonomy); //'16' is the term_id of Virtual Event
    wp_set_object_terms($eventId, $termObj->term_id, $taxonomy);

    //Set featured image from Webinar
    $thumbnailId = get_post_thumbnail_id($webinarPost->ID);
    set_post_thumbnail($eventId, $thumbnailId);

    //Set ACF meta data from Webinar
    $gatedURL = get_field('gated_url', $webinarPost->ID);
    if($gatedURL != '') {
      update_field('register', $gatedURL, $eventId);
      update_field('link_to_register_url_from_tile', true, $eventId);
    }
    $eventDate = get_field('event_date', $webinarPost->ID);
    if($eventDate != '') {
      update_field('start_date', $eventDate, $eventId);
      update_field('end_date', $eventDate, $eventId);
    }

    //Update featured_event flag
    update_field('featured_event', '', $eventId);

//    $altTileImage = get_post_meta($webinarPost->ID, 'alt_tile_image', true);
//    if($altTileImage) {
//      update_field('alt_tile_image', $altTileImage, $eventId);
//    }
  }
  $eventPost = get_post($eventId);
  error_log(print_r($eventPost, true));

  wp_send_json($eventPost);
  die();
}
add_action('wp_ajax_copy_webinar_data_to_events', 'copy_webinar_data_to_events');

function copy_event_data_to_webinars()
{
  $nonce = (isset($_POST['nonce'])) ? $_POST['nonce'] : '';
  error_log('$nonce = ' . $nonce);

  if (!wp_verify_nonce($nonce, 'ajax-nonce')) {
    die('Nonce value cannot be verified.');
  }

  $eventId = $_POST['event_id'];
  $eventPost = get_post($eventId);

  $newWebinarPost = array(
      'post_title'  => $eventPost->post_title,
      'post_status' => 'publish',
      'post_type'   => 'webinar',
      'post_excerpt' => $eventPost->post_excerpt,
      'post_author' => get_current_user_id()
  );

  error_log(print_r($newWebinarPost, true));
  $webinarId = wp_insert_post($newWebinarPost);
  error_log('$webinarId = ' . $webinarId);

  if($webinarId > 0) {
    //Set featured image from Events
    $thumbnailId = get_post_thumbnail_id($eventPost->ID);
    set_post_thumbnail($webinarId, $thumbnailId);

    //Set ACF meta data from Events
    $registerURL = get_field('register', $eventPost->ID);
    if($registerURL != '') {
      update_field('gated_url', $registerURL, $webinarId);
    }
    $eventDate = get_field('start_date', $eventPost->ID);
    if($eventDate != '') {
      update_field('event_date', $eventDate, $webinarId);
    }
    //Update blurb
    update_field( 'blurb','Your webinar seat is reserved! You will receive a confirmation email shortly.', $webinarId);

//    $altTileImage = get_post_meta($eventPost->ID, 'alt_tile_image', true);
//    if($altTileImage) {
//      update_field('alt_tile_image', $altTileImage, $webinarId);
//    }
  }

  $webinarPost = get_post($webinarId);
  error_log(print_r($webinarPost, true));

  wp_send_json($webinarPost);
  die();
}
add_action('wp_ajax_copy_event_data_to_webinars', 'copy_event_data_to_webinars');

function GetBrowserAgentName($user_agent) {
  if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
  elseif (strpos($user_agent, 'Edge')) return 'Edge';
  elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
  elseif (strpos($user_agent, 'Safari')) return 'Safari';
  elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
  elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
  return 'Other';
}


//Filter the_content for .webp support
function filter_the_content_convert_webp( $content ) {
  return convert_img_src_to_webp($content);
}
add_filter( 'the_content', 'filter_the_content_convert_webp' );


//Callback for array_walk_recursive on converting image paths to .webp
function custom_img_webp_callback( &$value, $key ) {
  $value = convert_img_src_to_webp($value);
}

//Filter ACF get_field values for .webp support
function filter_acf_value_convert_webp($value, $post_id, $field) {
//  error_log('$value before = ' . print_r($value, 1) . "\n\n");
  if(is_array($value)) {
    array_walk_recursive( $value, 'custom_img_webp_callback' );
  }
  else {
    $value = convert_img_src_to_webp($value);
  }
//  error_log('$value after = ' . print_r($value, 1) . "\n\n");

  return $value;
}
// Apply to all fields.
add_filter('acf/format_value', 'filter_acf_value_convert_webp', 10, 3);

//Add .webp to all jpg, jpeg, and png files via output buffer on shutdown
//if(!is_admin()):
//  ob_start();
//  add_action('shutdown', function () {
//
//    //    $html = ob_get_clean();
//    $html = ob_get_contents();
//    ob_clean();
//
//    //Add '.webp' to anything beginning with src= and ending with .jpg, .jpeg, or .png
//    if(isBrowserWebPEnabled()) {
//      //echo "this browser supports webp images";
//  //      $html = "this browser supports webp images";
////      preg_match_all("/src=[^\/\s]+\/\S+\.(jpg|jpeg|png)/", $html, $output_array);
//
//      //Handles img src and srcset
//      preg_match_all("/[^\"\'=\s]+\.(jpe?g|png|gif)/", $html, $output_array);
//
//      $items_to_replace = array_unique($output_array[0]);
//      $items_to_replace = array_values($items_to_replace);
//
//      for ($j = 0; $j < sizeof($items_to_replace); $j++) {
//        $html = preg_replace('~' . $items_to_replace[$j] . '~', $items_to_replace[$j] . '.webp', $html);
//      }
//    }
//    //Change <img src= to <img data-src=
//    $html = preg_replace("/(<img\s*?)src/", "$1data-src" ,$html);
//
//    echo $html;
//  }, 0);
//endif;
