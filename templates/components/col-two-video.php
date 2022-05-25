<section class="col-two-video">
  <div class="container">
    <div class="content-wrapper">
        <?php
        $content = get_sub_field('content');
        if($content)
            $i=0;
        foreach ($content as $content):
        ?>
      <div class="col-wrap wow fadeInUp">
        <div class="column text-blue">
          <div class="content">
            <?php if($content['logo']['url'] != "") {?>
              <div class="img-box">
                <img src="<?php echo $content['logo']['url']; ?>" alt="<?php echo $content['logo']['alt']; ?>">
              </div>
            <?php }
            if($content['title']){ ?><p class="h3 text-center"><?php print $content['title'] ?></p><?php } ?>
            <p><?php if($content['body']) print $content['body']; ?></p>
          </div>
          <div class="link-wrap">
            <?php we_get_links($content['links'],'link-arrow'); ?>
          </div>
        </div>
        <div class="column">
          <div class="img-wrap <?php if($content['video_url']){ ?>play-video<?php } ?>" <?php if($content['video_url']){ ?>data-src="<?php print $content['video_url'] ?>"<?php } ?>>
            <?php if($content['image']['url'] != ""): ?>
              <img src="<?php echo $content['image']['url']; ?>" alt="<?php echo $content['image']['alt']; ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php $i++; endforeach;
//    if(!is_page('thanks-demo')) {
    ?>
<!--     <div class="btn-wrap">-->
<!--       <a href="#" class="btn-default" data-text="View All"><span>View All</span></a>-->
<!--     </div>-->
    <?php// } ?>
  </div>
</section>