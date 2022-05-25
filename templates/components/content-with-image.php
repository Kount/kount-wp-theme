<section class="content-with-image" id="content-with-image">
  <div class="pattern wow fadeInRight">
    <img src="/wp-content/themes/kount/templates/assets/images/svg/pentagon_new.svg" alt="blue hexagon">
  </div>

  <?php
  $intro = get_sub_field('intro_block');
  if ($intro)
    foreach ($intro as $intro):
      ?>
      <div class="intro-block wow fadeInUp">
        <?php if ($intro['title']): ?><h2><?php print $intro['title']; ?></h2><?php endif; ?>
        <?php if ($intro['body']) print $intro['body']; ?>
      </div>
    <?php endforeach; ?>
  <div class="container">
    <div class="triangle-wrap">
      <div class="triangle">
        <img class="wow fadeIn" data-wow-delay=".7s" src="/wp-content/themes/kount/templates/dist/images/Triangle.png"
             alt="Triangle">
      </div>
    </div>
    <?php
    $content = get_sub_field('content');
    if ($content)
      $i;
    foreach ($content as $content):
      ?>
      <div class="content-wrapper <?php if ($i % 2 == 1) echo 'reverse' ?> <?php print $content['skew_alignment']; ?>">

        <div class="col-two image-wrap wow fadeInUp">
          <div class="image">
            <div class="img-box">
              <img src="<?php echo $content['image']['url']; ?>" alt="<?php echo $content['image']['alt']; ?>">
            </div>
          </div>
        </div>
        <div class="col-two content-outer wow fadeInUp">
          <div class="content">
            <?php if ($content['title']): ?><h3><?php print $content['title']; ?></h3><?php endif; ?>
            <div class="truncate-ellipses">
              <?php if ($intro['body']) print $content['body']; ?>
            </div>
            <!--            <span class="link see-more">Read More</span>-->
          </div>
        </div>
      </div>
      <?php $i++; endforeach; ?>
  </div>
</section>