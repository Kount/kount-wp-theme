<?php
global $post;
$override_subheader = get_field('override_subheader', $post->ID);
$top_content_section = get_field('top_content_section', $post->ID);
$start_date = get_field('start_date', $post->ID);
$end_date = get_field('end_date', $post->ID);
$time = get_field('time', $post->ID);
$duration = get_field('duration', $post->ID);
$event_host = get_field('event_host', $post->ID);
$event_location = get_field('event_location', $post->ID);
$kount_booth = get_field('kount_booth_number', $post->ID);
$event_callout = get_field('event_callout', $post->ID);
$address = get_field('address', $post->ID);
$map_url = get_field('map_url', $post->ID);
$event_url = get_field('event_url', $post->ID);
$register = get_field('register', $post->ID);
$form_id = get_field('form_id', $post->ID);
$items = get_field('items', $post->ID);
$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
$sponsor = get_field('sponsor', $post->ID);
$body = get_field('body', $post->ID);
$event_images = get_field('event_images', $post->ID);
$featured_img_url = get_the_post_thumbnail_url($post->ID);
$showCPCalendar = get_field('show_calendar', $post->ID);
$calendarContent = ($showCPCalendar) ? get_field('calendar_html_content', $post->ID) : "";
$calendarScript = ($showCPCalendar) ? get_field('chili_piper_calendar_script', $post->ID) : "";
$chiliPiperRouterUrl = ($showCPCalendar) ? get_field('chili_piper_router_url', $post->ID) : "";
$overrideEventInfo = ($showCPCalendar) ? get_field('override_event_info_content', $post->ID) : "";
?>

  <section class="banner-multiview event-detail">
      <?php if($showCPCalendar): ?>
          <div class="bg-img">
              <img src="/wp-content/themes/kount/templates/dist/images/default-events-hero.jpg" alt="banner third">
          </div>
          <div class="container wide">
              <div class="row d-flex py-3 py-md-5 align-items-center">
                  <div class="col-lg-6 pr-lg-5">
                      <div class="intro-block pb-4 pb-md-5">
                          <?php if($overrideEventInfo):
                          print $overrideEventInfo;
                          print $calendarContent;

                          else: ?>
                          <h1><strong><?php echo get_the_title(); ?></strong></h1>
                          <p><?php if($event_host != '') : print '<span class="event-text">' . strtoupper($event_host) . '<span class="sep"> | </span></span>'; endif; if($event_location != '') :?><span class="event-text"><?php print strtoupper($event_location); ?></span></p><p><span class="event-text"><strong><?php endif; if($override_subheader != ""): print $override_subheader; else: ?><?php we_get_date($start_date, $end_date, true); endif;?></strong></span></p>
                              <?php if($kount_booth != "") : ?>
                              <p class="mt-2"><strong><?php print $kount_booth;?></strong></p>
                              <?php endif; ?>
                          <?php endif; ?>
                      </div>
                      <?php if($calendarContent != '' && !$overrideEventInfo): ?>
                      <div class="pt-4 pt-md-5 border-top">
                          <?php print $calendarContent; ?>
                      </div>
                      <?php endif; ?>

                  </div>
                  <div class="pt-4 pt-lg-0 col-lg-6 pl-lg-5">
                      <?php // print $calendarContent; ?>
                      <?php
                      if($calendarScript != ''):
                        print $calendarScript;
                      endif;
                      if($chiliPiperRouterUrl != ''): ?>
                          <div class="mx-auto">
                              <iframe id="calendar" src="" height="600" width="100%" height="100%" marginwidth="0" marginheight="0" frameborder="0" style="margin: 0; padding: 0; border: 0;"></iframe>
                          </div>
                      <?php
                      endif; ?>
                      <!-- Hack for passing UTM params into SFDC on Calendar first pages -->
                      <script>
                          function getQueryVariable(variable) {
                              var query = window.location.search.substring(1);
                              var vars = query.split("&");
                              for (var i = 0; i < vars.length; i++) {
                                  var pair = vars[i].split("=");
                                  if (pair[0] == variable) {
                                      return pair[1];
                                  }
                              }
                          }
                          // console.log(${ChiliPiperURL});
                          // var params = "?utm_campaign__c=" + getQueryVariable("utm_campaign") + "&utm_content__c=" + getQueryVariable("utm_content") + "&utm_medium__c=" + getQueryVariable("utm_medium") + "&utm_source__c=" + getQueryVariable("utm_source");
                          var params = "";
                          if(typeof getQueryVariable("utm_campaign") != "undefined") {
                              params = "?utm_campaign__c=" + getQueryVariable("utm_campaign");
                          }
                          if(typeof getQueryVariable("utm_content") != "undefined") {
                              params += "&utm_content__c=" + getQueryVariable("utm_content");
                          }
                          if(typeof getQueryVariable("utm_medium") != "undefined") {
                              params += "&utm_medium__c=" + getQueryVariable("utm_medium");
                          }
                          if(typeof getQueryVariable("utm_source") != "undefined") {
                              params += "&utm_source__c=" + getQueryVariable("utm_source");
                          }

                          // var link = "https://kount.chilipiper.com/book/test" + params;
                          var link = "<?php print $chiliPiperRouterUrl;?>" + params;
                          console.log('link = ' + link);
                          document.getElementById('calendar').src = link;
                      </script>
                      <!-- End hack for passing UTM params into SFDC on Calendar first pages -->
                  </div>
<!--                  <div class="col-xl-8 mx-auto pt-3">-->
<!--                      --><?php //print $calendarScript; ?>
<!--                  </div>-->
              </div>
          </div>
      <?php else: ?>
      <div class="bg-img">
          <img src="/wp-content/themes/kount/templates/dist/images/default-events-hero.jpg" alt="banner third">
      </div>
      <div class="v-middle-inner container">
      <div class="v-middle">
        <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
          <h1><strong><?php echo get_the_title(); ?></strong></h1>
            <p><?php if($event_host != '') : print '<span class="event-text">' . strtoupper($event_host) . '<span class="sep"> | </span></span>'; endif; if($event_location != '') :?><span class="event-text"><?php print strtoupper($event_location); ?></span></p><p><span class="event-text"><strong><?php endif; if($override_subheader != ""): print $override_subheader; else: ?><?php we_get_date($start_date, $end_date, true); endif;?></strong></span></p>
          <?php if($kount_booth != "") : ?>
          <p><strong><?php print $kount_booth;?></strong></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </section>
<?php //if($top_content_section != ""): ?>
<!--<section class="event_top_content pb-0">-->
<!--  <div class="container pt-3 pb-5 pb-md-0">-->
<!--    --><?php //print $top_content_section; ?>
<!--  </div>-->
<!--</section>-->
<?php
//endif;
if($event_callout && ($event_callout['column_1_header'] != '' || $event_callout['column_1_body'] != '' || $event_callout['column_2_header'] != '' || $event_callout['column_2_body'] != '')) { ?>
  <section class="event-callout">
    <div class="container">
      <div class="row d-flex align-items-center py-5 py-md-0">
      <?php if($event_callout['column_1_header'] != '' || $event_callout['column_1_body'] != '') : ?>
        <div class="column-1<?php if($event_callout['column_2_header'] == '' && $event_callout['column_2_body'] == '') : print ' col-md-8 mx-auto'; else: print ' col-md-3'; endif;?>">
          <div class="content-wrap wow fadeIn" data-wow-delay="0.5s">
            <?php if($event_callout['column_1_header'] != '') : ?>
            <p class="h3 line-height-1_25"><strong><?php print $event_callout['column_1_header'];?></strong></p>
            <?php endif;
              if($event_callout['column_1_body'] != '') :
            ?>
                <?php print $event_callout['column_1_body'];?>
              <?php endif; ?>
          </div>
        </div>
        <?php endif;
        if($event_callout['column_2_header'] != '' || $event_callout['column_2_body'] != '') :
        ?>
        <div class="column-2 col-md-9<?php if($event_callout['column_1_header'] == '' && $event_callout['column_1_body'] == '') : print ' mx-auto'; else : print ' pl-md-5'; endif;?>">
          <div class="content-wrap wow fadeIn" data-wow-delay="0.5s">
            <?php if($event_callout['column_2_header'] != '') : ?>
              <p class="h3 line-height-1_25"><strong><?php print $event_callout['column_2_header'];?></strong></p>
            <?php endif;
              if($event_callout['column_2_body'] != '') :
            ?>
            <?php print $event_callout['column_2_body'];?>
              <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php }

?>

  <!--
  Sponsor Detail Blade
  -->
<?php if ($sponsor): ?>
  <section class="channel-partner default-padding">
    <div class="pattern wow fadeInLeft pattern-left undefined animate-complete undefined"
         style="visibility: visible; animation-name: wefadeInLeft;">
      <img src="/wp-content/themes/kount/templates/dist/images/Pentagon_partner.png" alt="" role="presentation">
    </div>
    <div class="container">
      <div class="row m-0">
        <div class="intro-block">
          <h2>Sponsors</h2></div>
        <div class="col-12">
          <ul>
            <?php foreach ($sponsor as $item): ?>
              <li class="wow fadeInUp" data-wow-delay="0.2s"><?php we_print_image($item['image']); ?> </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if ($body): ?>
  <section class="event-description pt-5">
    <div class="container wide">
      <div class="row w-100">
        <div class="col-xl-12 content-wrap">
            <div class="content-event">
                <?php print $body; ?>
<!--                <p class="text-center text-md-left pt-4">-->
<!--                  <a href="/events" class=" btn-default" data-text="Back to events"><span>Back to events</span></a>-->
<!--                </p>-->
            </div>
        </div>
<!--          <div class="col-md-8 content-wrap--><?php //if(!$event_images) { print ' mx-auto'; }?><!--">-->
<!--              <div class="content-event wow fadeIn--><?php //if($event_images) { print ' pl-md-5'; }?><!--" data-wow-delay="0.5s">-->
<!--                  --><?php //print $body; ?>
<!--                  <p class="text-center text-md-left">-->
<!--                      <a href="/events" class=" btn-default" data-text="Back to Events"><span>Back to Events</span></a>-->
<!--                  </p>-->
<!--              </div>-->
<!--          </div>-->
<!--        --><?php //if($event_images) : ?>
<!--          <div class="col-md-4">-->
<!--            <ul class="event-images">-->
<!--              --><?php //foreach ($event_images as $item): ?>
<!--                <li class="wow fadeInUp" data-wow-delay="0.2s">--><?php //we_print_image($item['image']); ?><!-- </li>-->
<!--              --><?php //endforeach; ?>
<!--            </ul>-->
<!--          </div>-->
<!--        --><?php //endif; ?>
      </div>
    </div>
  </section>
    <?php
    if($post->post_title != 'Money 20/20 Sunday Summit'):
    ?>
    <section class="rich-text-editor homepage-logo-section bg-light-gray">

        <div class="container wide">
            <div class="row d-flex align-items-center">

                <p class="h3 col-md-4 px-md-5 pb-2 pb-md-0 h1 text-center text-md-left"><strong class="extra-bold">Protecting more than 9,000 businesses including:</strong></p>

                <div class="d-flex border-md-left-dark row logo-wrapper col-md-8 pl-md-5 justify-content-center">
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2020/06/barclays-logo.png" alt="" width="500" height="84" class="aligncenter size-full wp-image-6617" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2020/04/Staples-Logo.png" alt="" width="600" height="109" class="aligncenter size-full wp-image-5856" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2020/03/GNC-logo-e1589854166133.png" alt="" width="270" height="80" class="aligncenter size-full wp-image-4940" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2019/09/Moneris_logo_sized.png" alt="Moneris_logo_sized" width="220" height="74" class="aligncenter size-full wp-image-3496" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2020/03/petsmart-logo-e1589854355732.png" alt="" width="800" height="209" class="aligncenter size-full wp-image-4941" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2019/02/Pulse@2x.png" alt="Chase logo" width="272" height="96" class="aligncenter size-full wp-image-189" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2021/05/telstra-logo.png" alt="" width="400" height="156" class="aligncenter size-full wp-image-11881" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2020/03/purple-mattress-logo.png" alt="" width="270" height="85" class="aligncenter size-full wp-image-4938" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2021/05/conair-logo.png" alt="" width="400" height="87" class="aligncenter size-full wp-image-11879" />
                    </div>
                    <div class="logo-cell">
                        <img src="" data-src="https://kount.com/wp-content/uploads/2019/02/BlueSnap@2.png" alt="Blue Snap Logo" width="556" height="150" class="aligncenter size-full wp-image-457" />
                    </div>
                </div>
            </div>
        </div></section>
<?php
        endif;
    endif; ?>

<?php
//@include(THEME_DIR . "/templates/components/options/logo_slider.php");
?>
<?php if($event_images && isset($event_images[0]['image']['url'])): ?>
<section>
  <div class="container pt-3 pb-5">
  <div class="row">
    <div class="pb-5 pb-md-0 w-100">
        <?php foreach ($event_images as $item):?>
        <div class="text-center">
          <?php if($event_url != ""): ?>
          <a class="default-link" href="<?php print $event_url;?>">
          <?php endif;?>
            <img alt="" width="240" src="<?php print $item['image']['url'];?>" />
          <?php if($event_url != ""): ?>
          </a>
          <?php endif;?>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<script type="text/javascript">
    (function (){

        MktoForms2.whenReady(function (form){

            form.submittable(false);
            form.onValidate(function(native) {
                if (!native) return;

                var invalidDomains = ["yahoo.com", "gmail.com", "mailinater.com", "live.com", "hotmail.com", "outlook.com", "qq.com", "att.com", "icloud.com", "comcast.net", "mailinator.com", "earthlink.net", "aol.com"],
                    emailExtendedValidationError =
                        'Please enter your business email address.',
                    emailField = 'Email',
                    emailFieldSelector = '#' + emailField;
                var invalidDomainRE = new RegExp('@(' + invalidDomains.join(
                    '|') + ')$', 'i');
                if (invalidDomainRE.test(form.vals()[emailField])) {
                    console.log("Email is invalid!");
                    form.submittable(false);
                    form.showErrorMessage(emailExtendedValidationError,
                        form.getFormElem().find(emailFieldSelector)
                    );
                    return false;
                }
                else {
                    form.submittable(true);
                }
            });

            form.onSuccess(function (values, followUpUrl) {
                form.getFormElem().css("display", "none");
                document.getElementById('reg-confirm').style.display = "flex";
                return false;
            });
        });
    })();

</script>

<?php

$terms = get_the_term_list( $post->ID, 'event_type', '', ', ' );
$eventDescription = trim(preg_replace('#^<p>|</p>$#i', '', trim(apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID)))));
$eventLocation = 'In-person';
//echo get_the_term_list( $post->ID, 'event_type', '', ', ' );
//if($register != "" && (has_category('virtual-event', $post->ID) || has_category('virtual-roundtable', $post->ID))):
    ?>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "<?php print get_the_title();?>",
        "startDate": "<?php print $start_date;?>",
        "endDate": "<?php print $end_date;?>",
        "eventStatus": "https://schema.org/EventScheduled",
        <?php
            if(strpos($terms, 'Virtual Event') !== false || strpos($terms, 'Virtual Roundtable') !== false):
                $eventLocation = 'Virtual';
         ?>
        "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
        "location": {
            "@type": "VirtualLocation",
            <?php if(strpos($terms, 'Kount-Hosted Event') !== false):?>
            "url": "<?php print $register;?>"
            <?php else: ?>
            "url": "<?php print get_the_permalink($post->ID);?>"
            <?php endif; ?>
        },
        <?php else: ?>
        "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
        "location": {
            "@type": "Place",
            "name": "<?php print $event_host;?>",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "<?php print $address['street_address'];?>",
              "addressLocality": "<?php print $address['address_locality'];?>",
              "postalCode": "<?php print $address['postal_code'];?>",
              "addressRegion": "<?php print $address['address_region_state'];?>",
              "addressCountry": "<?php print $address['address_country'];?>"
            }
        },
        <?php endif; ?>
        "image": [
            "<?php print $featured_img_url;?>"
        ],
        "description": "<?php print $eventDescription; ?>",
        "organizer": {
            "@type": "Organization",
        <?php if(strpos($terms, 'Kount-Hosted Event') !== false):?>
            "name": "Kount",
            "url": "https://kount.com"
        <?php else: ?>
            "name": "<?php print get_the_title();?>",
            "url": "<?php print get_the_permalink();?>"
        <?php endif; ?>
        }
    }
</script>
<?php
//endif;
$entityId = 'event-' . $post->post_name;
?>
<section id="yext-crawler" class="d-none">
    <div class="entity-type">Event</div>
    <div class="entity-id"><?php print $entityId;?></div>
    <div class="name"><?php print $post->post_title;?></div>
    <div class="description"><?php print $eventDescription; ?></div>
    <div class="website-url"><?php print get_the_permalink($post->ID);?></div>
    <div class="photo-gallery"><img alt="" height="0" width="0" src="<?php print get_the_post_thumbnail_url($post->ID, 'large');?>" /></div>
    <div class="startDate"><?php print $start_date;?></div>
    <div class="endDate"><?php print $end_date;?></div>
    <div class="virtualOrInPerson"><?php print $eventLocation;?></div>
    <div class="primary-cta-label">View event details</div>
</section>

