<?php include "common/variables.php";
$mirror = get_sub_field('mirror');
?>
<section class="intro-with-icons">
  <div class="container">
    <?php if ($mirror != true): ?>
    <div class="box_left left wow fadeInLeft">
      <?php else: ?>
      <div class="box_right left wow fadeInRight">
        <?php endif; ?>
        <?php if ($title): ?><h2><?php print $title; ?> </h2><?php endif; ?>
        <?php if ($body): ?><?php print $body; ?><?php endif; ?>
        <?php we_print_button($button) ?>
      </div>
      <div class="right">
        <?php $contents = get_sub_field('content');
        if ($contents)
          $i = 0;
        foreach ($contents as $content):
          ?>
          <div class="col-two wow fadeInUp <?php if ($i % 4 == 1) echo 'content-right' ?>">
            <div class="img-box">
              <div class="circle-content">
                <img src="<?php echo $content['image']['url']; ?>" alt="<?php echo $content['image']['alt']; ?>">
              </div>
            </div>
            <div class="content">
              <?php if ($content['title']): ?><h6><?php print $content['title'] ?></h6><?php endif; ?>
              <?php if ($content['blurb']): ?> <p><?php print $content['blurb'] ?></p><?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>