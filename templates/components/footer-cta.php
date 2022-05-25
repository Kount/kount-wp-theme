<?php
$items = get_sub_field('items');
if($items)
foreach ($items as $item):
?>
<section class="footer-cta">
    <div class="img-wrap">
        <div class="img-box wow fadeInLeft">
          <img data-src="/wp-content/themes/kount/templates/dist/images/svg/pentagon-white.svg" width="584" height="610" src="" alt="white heaxagon">
        </div>
        <div class="inner-img wow fadeInRight">
            <img width="585" height="611" data-src="<?php echo $item['image']['url']; ?>" src="" alt="<?php echo $item['image']['alt']; ?>">
       </div>
    </div>
    <div class="container">
       <div class="right wow fadeInUp">
           <?php if($item['title']){ ?><h3 class="h2 text-white pb-3"><strong><?php print $item['title'] ?></strong></h3><?php } ?>
           <?php if($item['blurb']){ ?><p class="pb-4"><?php print $item['blurb'] ?></p><?php } ?>
        <div class="btn-wrap">
            <?php we_print_button($item['button']); ?>
        </div>
     </div>
  </div>
</section>
<?php endforeach; ?>