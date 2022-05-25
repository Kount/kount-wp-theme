<?php if(isset($_GET['type']) && $_GET['type'] == 'blog') :

else:  ?>
<?php include "common/variables.php" ?>
<?php
  // $background_image = get_sub_field('background_image');
  // $gradient = get_sub_field('gradient');
  $background_subtitle_color = get_sub_field('subtitle_background_color');
  $big_block_url = "";
  foreach ($links as $link) {
    $chosenPost = $link['link'];
    if ($chosenPost instanceof WP_Post && !$link['type']) {
      $chosenID = $chosenPost->ID;
      $big_block_url = get_permalink($chosenID);
    }
    else {
      $big_block_url = $link['url'];
    }
  }
?>
<section class="two-grid-block">
  <div class="container wide">
     <div class="content-wrapper d-md-flex flex-wrap flex-lg-nowrap wow fadeIn">
       <article class="big-block wow fadeInUp" data-wow-delay="0.4s">
<!--         <div class="bg-img">-->
<!--           --><?php //if($background_image['url'] != ''): ?>
<!--           <img src="--><?php //echo $background_image['url']; ?><!--" alt="--><?php //echo $background_image['alt']; ?><!--">-->
<!--          --><?php //endif; ?>
<!--         </div>-->
         <div class="title" style="background-color: <?php print $background_subtitle_color;?>">
<!--             <span class="image-box">-->
<!--              --><?php //if($icon['url'] != ''): ?>
<!--                <img src="--><?php //echo $icon['url']; ?><!--" alt="--><?php //echo $icon['alt']; ?><!--">-->
<!--              --><?php //endif; ?>
<!--             </span>-->
           <?php if ($subtitle): ?><span class="inner-title semi-bold"><?php print $subtitle; ?> </span><?php endif; ?>
         </div>
         <div class="content <?php echo $gradient;?>">
           <?php if ($title): ?><h2><a href="<?php print $big_block_url;?>"><strong><?php print $title; ?></strong></a></h2><?php endif;
                  if ($body): print $body; endif;
                  if ($blurb): ?><?php print $blurb; ?><?php endif; ?>
         </div>
         <?php we_get_links($links,'link-arrow'); ?>
       </article>
<!--       <div class="small-block">-->
     <?php
     $blocks = get_sub_field('blocks');
     if ($blocks){
       $i = 0;
       foreach ($blocks as $block) {
         $i++;
         if($i > 1) {
           break;
         }
         $url = "";
         foreach ($block['links'] as $link) {
           $chosenPost = $link['link'];
           if ($chosenPost instanceof WP_Post && !$link['type']) {
             $chosenID = $chosenPost->ID;
             $url = get_permalink($chosenID);
           }
           else {
             $url = $link['url'];
           }
         }

         ?>
           <article class="big-block wow fadeInUp" data-wow-delay="0.5s">
             <div class="title" style="background-color: <?php print $block['subtitle_background_color'];?>">
<!--               <span class="image-box">-->
<!--                 --><?php //if($block['icon']['url'] != ''): ?>
<!--                   <img src="--><?php //print $block['icon']['url']; ?><!--" alt="--><?php //print $block['icon']['alt']; ?><!--">-->
<!--                 --><?php //endif; ?>
<!--               </span>-->
               <?php if ($block['subtitle']){ ?><span class="inner-title semi-bold"><?php print $block['subtitle']; ?></span><?php } ?>
             </div>
             <div class="content">
               <?php if ($block['title']){ ?><h2><a href="<?php print $url;?>"><strong><?php print $block['title']; ?></strong></a></h2><?php } ?>
               <?php if ($block['body']){ ?><?php print $block['body']; ?><?php } ?>
             </div>
             <?php we_get_links($block['links'],'link-arrow'); ?>
           </article>
       <?php } ?>
     <?php } ?>
<!--       </div>-->
      </div>
   </div>
</section>

<?php endif; ?>