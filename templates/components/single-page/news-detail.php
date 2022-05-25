<?php
$news_url = get_field('news_url', $post->ID);
?>
<section class="banner-multiview banner-third">
  <div class="bg-img">
    <img src="/wp-content/uploads/2019/06/banner-bg.jpg" alt="banner third">
  </div>
  <div class="v-middle-inner container">
    <div class="v-middle">
      <div class="intro-block wow fadeIn" data-wow-delay="0.1s">
        <h1><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>


<section class="blog-detail news-detail">
  <div class="container">
    <div class="col-lg-12 text-content left wow fadeInUp">
<!--      <div class="feature-img">-->
<!--        --><?php //$image = we_image($post->ID); ?>
<!--      </div>-->
      <div class="content-wrapper">
<?php //print the_time('F j, Y'); ?>
        <?php
        $content = apply_filters('the_content', $post->post_content);
        ?>
        <?php print $content; ?>
      </div>
    </div>
    <?php if ($news_url):?>
      <div class="article-url">
        <a href="<?php print $news_url; ?>">Read the full article</a>
      </div>
    <?php endif; ?>

</section>


