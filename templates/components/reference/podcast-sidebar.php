<?php
$podcastSummary = get_field('podcast_summary', 'option');
$subscription_links = get_field('subscription_links', 'option')
?>
<div class="col-md-3 right blog-detail-sidebar">
  <div class="sticky-wrapper">
    <div class="img-wrap pb-4 text-center">
      <a href="/blog/category/podcasts">
        <span class="sr-only">Kount 5in5 Podcast</span>
        <img width="500" height="500" src="https://kount.com/wp-content/uploads/2021/02/5-in-5-Podcast-Logo_500x500.jpg" alt="5in5 Podcast Logo">
      </a>
    </div>
    <?php if($podcastSummary != ''):
      print $podcastSummary;  ?>
<!--    <div class="pb-4">-->
<!--      <p class="line-height-1_5">Welcome to the Kount 5 Trends, 5 Minutes: Cyber & Fraud podcast. Each week co-hosts Lacey Briggs and Emily Valla will bring you the top-five headlines with insights from industry experts on how to protect your business from eCommerce fraudsters. Join us. Five minutes can save your business.</p>-->
<!--    </div>-->
    <?php endif; ?>
    <div class="box-wrap mb-4 wow fadeIn" data-wow-delay="0.2s">
      <div class="social-icon">
        <p class="pb-3 text-center text-md-left"><strong>Share</strong></p>
        <div class="social-nav text-center text-md-left">

          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_inline_share_toolbox"></div>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <script type="text/javascript"
                  src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d2e0330065d252c"></script>

        </div>
      </div>
      <div class="subscribe text-btn">
        <p class="pb-3 text-center text-md-left"><strong>Never miss an episode. Subscribe to Podcast.</strong></p>
        <div class="form-wrapper" id="blog-sidebar-form-wrapper">
          <iframe width="100%" height="115" src="/wp-content/themes/kount/external/pages/podcast-subscribe-form.php" style="border: 0; overflow: hidden;"></iframe>
        </div>
      </div>
    </div>
    <div class="podcast-logo-wrap d-flex align-items-center flex-wrap justify-content-center">
      <?php
      if($subscription_links != ""):
        print $subscription_links;
      endif; ?>
    </div>
  </div>
</div>
