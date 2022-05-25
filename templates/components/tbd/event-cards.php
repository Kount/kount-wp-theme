<?php include 'common/variables.php';
    $feature_args = array(
        'posts_per_page' => 3,
        'offset' => 0,
        'post_type' => array('events'),
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => array('publish', 'pending', 'draft', 'future'),

    );
    $featureposts = get_posts($feature_args);
    ?>

     <section class="event-cards" id="events">
         <div class="container">
             <div class="intro-block">
                 <h2>Kount Events</h2>
             </div>
             <div class="column-wrapper">
<?php
if ($featureposts):

    foreach ($featureposts as $post) : setup_postdata($post);
        $title = get_the_title($post->ID);
        $color =get_field('title_color',$post->ID);
        $body = get_field('blurb',$post->ID);
        $location =get_field('location',$post->ID);
        $url= get_field('url',$post->ID);
        $sdate= get_field('start_date',$post->ID);
        $edate= get_field('end_date',$post->ID);
        $attachment_id = get_post_thumbnail_id($post->ID);
        $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        $image = wp_get_attachment_image_src($attachment_id, '');
        $feature_image = $image[0];
        ?>
                 <a class="col-three <?php echo $color;?>" href="<?php echo $url?>">
                     <div class="img-wrapper">
                         <img src="<?php print $feature_image?>" alt="<?php print $image_alt?>"></div>
                     <div class="content-wrapper">
                         <div class="head-content">
                             <h5><?php print $title; ?></h5>
                             <p><?php we_get_date($sdate,$edate);?></p>
                             <p><?php print $location;?></p>
                         </div>
                         <div class="bottom-content">
                             <p><?php print $body;?></p>
                         </div>
                     </div>
                 </a>
        <?php
        endforeach;
            wp_reset_postdata();
            ?>

             </div>
             <a href="/events" class="btn-default" data-text="View all Events"><span>View all Events</span></a>

         </div>
     </section>
<?php else:?>
     <section class="event-cards">
         <div class="container">
             <div class="intro-block" id="5">
                 <h2>Kount Events</h2>
             </div>
             <div class="column-wrapper">
                 <a class="col-three text-blue">
                     <div class="img-wrapper"><img src="/wp-content/themes/kount/templates/images/people.jpg" alt="img1"></div>
                     <div class="content-wrapper">
                         <div class="head-content">
                             <h5>Digital Protection Summit</h5>
                             <p>April 16 - 17, 2019</p>
                             <p>Austin, TX</p>
                         </div>
                         <div class="bottom-content">
                             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                         </div>
                     </div>
                 </a>
                 <a class="col-three text-cyan">
                     <div class="img-wrapper"><img src="/wp-content/themes/kount/templates/images/class.jpg" alt="img1"></div>
                     <div class="content-wrapper">
                         <div class="head-content">
                             <h5>Digital Protection Summit</h5>
                             <p>April 16 - 17, 2019</p>
                             <p>Austin, TX</p>
                         </div>
                         <div class="bottom-content">
                             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                         </div>
                     </div>
                 </a>
                 <a class="col-three">
                     <div class="img-wrapper"><img src="/wp-content/themes/kount/templates/dist/images/kount-event-digital-protection-summit-1.jpg" alt="img1"></div>
                     <div class="content-wrapper">
                         <div class="head-content">
                             <h5>Digital Protection Summit</h5>
                             <p>April 16 - 17, 2019</p>
                             <p>Austin, TX</p>
                         </div>
                         <div class="bottom-content">
                             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                         </div>
                     </div>
                 </a>

             </div>
             <a class="btn-default" data-text="View all Events"><span>View all Events</span></a>

         </div>
     </section>
<?php endif;?>