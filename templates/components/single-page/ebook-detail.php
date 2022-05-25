<?php
$override_page_title = get_field('override_page_title', $post->ID);
$override_button_text = (get_field('override_button_text', $post->ID) != '') ? get_field('override_button_text', $post->ID) : "Download ebook";
$file = get_field('file', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$items = get_field('items', $post->ID);
$gated_url = get_field('gated_url', $post->ID);
$content = apply_filters('the_content', $post->post_content);
$blurb = get_field('blurb', $post->ID);

$subtitle = get_field('intro_subtitle', $post->ID);
$intro_title = get_field('intro_title', $post->ID);
$intro_body = get_field('intro_body', $post->ID);
$button_style = get_field('button_style', $post->ID);
$target = get_field('target', $post->ID);
$intro_button_link = get_field('intro_button_link', $post->ID);
$intro_button_text = get_field('intro_button_text', $post->ID);

$show_demo_request_form = isset($_GET['demo']) ? $_GET['demo'] : false;
?>

<section class="banner-second p-0 ebook-detail">
  <div class="bg-img">
    <?php print we_image($post->ID); ?>
  </div>
  <div class="pattern"></div>

  <div class="v-middle-wrapper">
    <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="content-wrapper wow fadeIn" data-wow-delay="0.4s">
          <?php if($blurb == ""): ?>
          <h6>Thank you for your interest.</h6>
          <?php endif; ?>
          <h1><strong class="extra-bold"><?php if($override_page_title != "") { print $override_page_title; } else { print get_the_title(); } ?></strong></h1>
          <?php if ($blurb): ?>
            <p><?php print $blurb; ?></p>
          <?php endif; ?>
          <a href="<?php print $file['url']; ?>" class=" btn-white" data-text="<?php print $override_button_text;?>">
              <span><?php print $override_button_text;?></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if($show_demo_request_form) : ?>
<section class="demo-request-form-banner border-bottom" id="demo-request-form">
  <div class="container">
<!--    <div class="row">-->
      <div class="col-lg-8 mx-auto px-5">
        <p class="h2 text-center pb-4"><strong class="extra-bold">Schedule a Demo To Learn More</strong></p>
      </div>
      <div class="demo-form-wrap">
        <script src="https://js.chilipiper.com/marketing.js" type="text/javascript"></script>
        <script>// <![CDATA[
          ChiliPiper.scheduling("kount", "prd_router", { title: "Thanks! What time works best for a quick call?", titleStyle: "Roboto 22px #EA5938" })
          // ]]></script>

        <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_1366"></form>
        <script>
          function getCookie(input) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
              // console.log(cookies[i]);
              var name = cookies[i].split('=')[0].toLowerCase().trim();
              var value = cookies[i].split('=')[1];
              // console.log(input);
              // console.log(name);
              // console.log(value);
              if (name == input) {
                return value;
              } else if (value == input) {
                return name;
              }
            }
          }

          // var dt, expires, domain;
          // dt = new Date();
          // dt.setTime(dt.getTime()+(7*24*60*60*1000));
          // expires = "expires=" + dt.toGMTString() + ";";
          // domain = "kount.local";
          // document.cookie = "mkto_first_name=" + encodeURIComponent('John') + ";path=/;" + expires + "domain=" + domain;
          // document.cookie = "mkto_last_name=" + encodeURIComponent('Smith Waters') + ";path=/;" + expires + "domain=" + domain;
          // document.cookie = "mkto_email=" + encodeURIComponent('hello@mynameiseric.com') + ";path=/;" + expires + "domain=" + domain;
          // document.cookie = "mkto_company=" + encodeURIComponent('Kount') + ";path=/;" + expires + "domain=" + domain;

          // console.log(document.cookie);

          //Don't show form if first_name cookie not set
          if(getCookie('mkto_first_name') == undefined || getCookie('mkto_first_name') == "undefined" || getCookie('mkto_first_name') == "") {
            document.getElementById('demo-request-form').style.display = "none";
          }
          else {
            MktoForms2.loadForm("//app-sj27.marketo.com", "106-ANF-483", 1366, function (form) {
              form.vals({
                "FirstName": decodeURIComponent(getCookie('mkto_first_name')),
                "LastName": decodeURIComponent(getCookie('mkto_last_name')),
                "Email": decodeURIComponent(getCookie('mkto_email')),
                "Company": decodeURIComponent(getCookie('mkto_company'))
              });

              // alert(form.vals);
            });
          }
        </script>
      </div>
<!--    </div>-->
  </div>
</section>
<?php endif; ?>

<!--
intro block
-->

<section class="no-padding-bottom">
  <div class="intro-block">
      <?php if ($subtitle): ?><span class="title"><?php echo $subtitle; ?></span><?php endif; ?>
      <?php if ($intro_title): ?><h2><?php echo $intro_title; ?> </h2><?php endif; ?>
      <?php if ($intro_body): ?><p><?php echo $intro_body; ?> </p><?php endif; ?>
      <?php if ($intro_button_link): ?>
          <?php if ($target){ $target = '_blank'; } ?>
        <div class="btn-wrap">
          <a href="<?php echo $intro_button_link; ?>" class="<?php echo $button_style; ?>" target="<?php echo $target ?>" data-text="<?php echo $intro_button_text; ?>">
            <span><?php echo $intro_button_text; ?></span>
          </a>
        </div>
      <?php endif; ?>
  </div>
</section>



<!--
Video Col two Blade
-->
<?php if ($items):
    foreach ($items as $item)
        $title = get_the_title($item->ID);
    $video = get_field('video', $item->ID);
    $ref = get_field('reference', $item->ID);
    $file = get_field('file', $item->ID);
    $body = get_field('body', $item->ID);
    ?>

    <?php if ($video): ?>
  <section class="col-two-video video-col-video detail-page">
    <div class="container">
      <div class="content-wrapper">
        <div class="col-wrap">
          <div class="column wow fadeInUp">
            <div class="content">
              <h2><?php print $title; ?></h2>
              <?php print $ref['blurb']; ?>
            </div>
          </div>
          <div class="column wow fadeInLeft">
            <div class="video-wrap">
              <?php print $video; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

    <?php if ($file): ?>
  <section class="col-two-video ebook">
    <div class="container">
      <div class="content-wrapper">
        <div class="column wow fadeIn">
          <h2><?php print $title; ?></h2>
            <?php print $body; ?>
          <a href="<?php print $file['url']; ?>" class="btn-default" data-text="Get Case Study">
            <span>Get Case Study</span>
          </a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php endif; ?>

<?php
@include(THEME_DIR . "/templates/components/options/featured_resources.php");
?>

