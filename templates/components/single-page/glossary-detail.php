<?php
//$content = apply_filters('the_content', $post->post_content);
//$position = get_field('position', $post->ID);
?>

<section class="banner-multiview banner-third single-blog">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/08/Blue-ebook-banner.jpg" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
        <!--        <h1>--><?php //echo get_the_title(); ?><!--</h1>-->
        <h1><small class="light">TERM:</small><br/><strong><?php the_title();?></strong></h1>
      </div>
    </div>
  </div>
</section>

<section class="glossary-content">
  <div class="container">
    <div class="content-wrapper">
      <p><strong>Definition:</strong></p>
      <?php the_content();?>
    </div>
  </div>
</section>

<?php get_template_part('templates/components/view/glossary-index'); ?>

<section class="promotional-cta wow fadeIn blue-bg" data-wow-delay="0.5s">
  <div class="container">
    <div class="column-wrapper wow fadeInUp" data-wow-delay="0.5s">
      <div class="content-wrap d-flex align-items-center">
        <div class="inner-wrap">
          <p class="h2">Learn more about Kount</p>
        </div>
        <a href="" class="cta-btn btn-white toggle-demo-form" target="_self" data-event-action="Glossary Term Footer CTA" data-text="Get a demo"><span>Get a demo</span></a>
      </div>
    </div>
  </div>
</section>