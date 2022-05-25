<?php
$items = get_sub_field('items');
$i = 0;
?>
<?php if ($items): ?>

  <section class="block-grid">
    <div class="container">
      <div class="content-wrapper wow fadeIn">
        <?php foreach ($items as $item):
          $title = get_the_title($item->ID);
          $post_object = get_post($item->ID);
          $date = (($item->post_date));
          $post_date = (date('F j, Y', strtotime($date)));
          $content = preg_replace("/\[[^)]+\]/", "", $post_object->post_content);
          $terms = get_the_terms($item->ID, 'news_type');
          $cat = array();
          foreach ($terms as $term) {
            array_push($cat, $term->name);
          }
          $cat = implode(" ", $cat);
          ?>
          <?php if ($i === 0): ?>
          <div class="big-block wow fadeInUp" data-wow="0.4s">
            <div class="bg-img">
              <?php
              if(get_field('alt_featured_tile_image', $item->ID)) {
                $image_id = get_field('alt_featured_tile_image', $item->ID);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $image_src = wp_get_attachment_image_src($image_id, 'full');
                $image_url = $image_src[0];
                $img = '<img src="' . $image_url . '" alt="' . $image_alt . '">';
                print $img;
              }
              else {
                print we_image($item->ID);
              }
              ?>
            </div>
            <div class="content blue-gradient">
              <div class="title">
                <span class="inner-title"><?php print $cat;?></span>
              </div>
              <h3><?php print $title; ?></h3>
              <span><?php echo $post_date; ?></span>
              <p><?php print wp_trim_words($content, 15, '...'); ?></p>
              <a href="<?php print the_permalink($item->ID); ?>" class="link-arrow arrow-white">Read More</a>
            </div>
          </div>
        <?php else: ?>
          <?php if ($i === 1): ?>
            <div class="small-block">
            <div class="block light-gray wow fadeInUp" data-wow-delay="0.5s">
              <div class="content">
                <div class="title">
                  <span class="inner-title"><?php print $cat;?></span>
                </div>
                <h3><?php print $title; ?></h3>
                <p class="text"><span><?php print $post_date; ?></span></p>
                <a href="<?php print the_permalink($item->ID); ?>" class="link-arrow">Read More</a>
              </div>
            </div>
          <?php elseif ($i === 2): ?>
            <div class="block blue-gradient wow fadeInUp" data-wow-delay="0.6s">
              <div class="content">
                <div class="title">
                  <span class="inner-title"><?php print $cat;?></span>
                </div>
                <h3><?php print $title; ?></h3>
                <p class="text"> <?php print $post_date; ?></p>
                <a href="<?php print the_permalink($item->ID); ?>" class="link-arrow arrow-white">Read More</a>
              </div>
            </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
          <?php $i++;
        endforeach;
        wp_reset_postdata();
        ?>

      </div>
    </div>
  </section>

<?php endif; ?>