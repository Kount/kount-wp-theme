<?php
  $headline = get_sub_field('headline');
  $content_blocks = get_sub_field('content_blocks');

?>
<section class="customer-journey-section bg-light-gray">
  <div class="container wide px-xl-5">
    <h2 class="text-center wow fadeIn col-xl-9 pt-3 line-height-1 mx-auto mb-3 mb-lg-0 pb-4 pb-lg-5"><strong class="extra-bold"><?php print $headline;?></strong></h2>
    <div class="row d-flex pt-xl-3" id="customer-journey-blocks">
      <?php
      foreach($content_blocks as $block):
      ?>
      <article class="content-block col-md-6 px-3 py-4 row" data-link-url="<?php print $block['link_url'];?>">
        <a href="<?php print $block['link_url'];?>"><span class="sr-only"><?php print $block['link_text']; ?></span></a>
        <div class="icon-wrap col-2 position-relative">
          <img src="" data-src="<?php print $block['icon'];?>" class="icon" alt="" width="92" height="92" />
          <img style="opacity: 0;" class="hover-icon" src="" data-src="<?php print $block['hover_icon']; ?>" alt="" width="92" height="92" />
        </div>
        <div class="col-10 pl-2">
          <p class="h3 pb-3 line-height-1_25"><strong><?php print $block['header_text'];?></strong></p>
          <p class="pb-4 body-text pr-md-4"><?php print $block['body_text'];?></p>
          <p class="cta-link">>> <span><?php print $block['link_text']; ?></span></p>
        </div>
      </article>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>

