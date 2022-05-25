<?php include "common/variables.php" ?>
<section class="intro-with-box" id="relatedsolutions">
  <div class="container">
      <?php
      $intros = get_sub_field('intro_block');
      if ($intros){
      foreach ($intros as $intro){
          ?>
          <div class="intro-block">
              <?php if ($intro['title']){ ?><h2><?php print $intro['title']; ?></h2><?php } ?>
              <?php if ($intro['body']){ ?><?php print $intro['body']; ?><?php } ?>
          </div>
      <?php } ?>
      <?php } ?>
    <div class="column-wrapper">
        <?php
        $contents = get_sub_field('content');
        if ($contents){
        foreach ($contents as $content){ ?>
      <div class="col-three <?php print $content['title_color']; ?>">
        <div class="content">
          <div class="logo">
              <img src="<?php echo $content['image']['url']; ?>" alt="<?php echo $content['image']['alt']; ?>">
          </div>
            <?php if ($content['title']){ ?><h5><?php print $content['title']; ?></h5><?php } ?>
            <?php if ($content['subtitle']){ ?><p><?php print $content['subtitle']; ?></p><?php } ?>
          <div class="btn-wrap">
            <?php we_print_button($content['button']); ?>
          </div>
        </div>
      </div>
        <?php } ?>
        <?php } ?>
    </div>
  </div>
</section>