<?php include 'common/variables.php';
                    $feature_args = array(
                        'posts_per_page' => 4,
                        'offset' => 0,
                        'post_type' => array('resources'),
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'post_status' => array('publish', 'pending', 'draft', 'future'),

                    );
                    $featurepost = get_posts($feature_args);?>
<?php if ($featurepost):?>
    <section class="resources-slider events-resource-slider" id="resources-slider">
        <div class="pattern wow fadeInLeft pattern-left">
            <img src="<?php print REFRESH_DIR ?>/templates/dist/images/resources-pattern-left.png" alt="pattern">
        </div>
        <div class="container">
            <div class="intro-block">
                <h2>Resources</h2>
                <p>Want to learn more about Kount? Check out a few of these resources. </p>
            </div>
            <div class="slider-wrap">
                <div class="slider">

                <?php foreach ($featurepost as $post) : setup_postdata($post);
                    $title = get_the_title($post->ID);
                    $color =get_field('title_color',$post->ID);
                    $body = get_field('blurb',$post->ID);
                    $links = get_field('links',$post->ID);
                    $video = get_field('video',$post->ID);
                    $attachment_id = get_post_thumbnail_id($post->ID);
                    $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                    $image = wp_get_attachment_image_src($attachment_id, '');
                    $feature_image = $image[0];

                    ?>
                    <div class="item text-<?php echo $color;?> <?php if($video==null): echo '';else: echo 'play-video'; endif;?>" data-src="<?php we_get_video($video)?>">
                       <?php if($video==null):?>
                        <?php foreach ($links as $link):?>
                        <a href="<?php echo $link['url']?>"></a>
                           <?php endforeach;?><?php endif;?>
                        <div class="bg-img">
                            <img class="ie-responsive" src="<?php print $feature_image?>" alt="<?php print $image_alt?>">
                        </div>
                        <div class="content">
                            <div class="inner-content">
                                <?php we_print_field($title,'<h5>','</h5>');?>
                                <?php we_print_field($body,'<p>','</p>');?>
                            </div>
                            <?php foreach ($links as $link):?>
                            <a href="<?php echo $link['url']?>" class="link-arrow"><?php echo $link['text']?></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
            <div class="slide-nav">
                <div class="slide-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.901" height="16.789" viewBox="0 0 9.901 16.789">
                        <path id="Path_599" data-name="Path 599"
                              d="M9.437,6.858a1.5,1.5,0,0,0,0,2.12l5.834,5.834L9.437,20.645a1.5,1.5,0,0,0,2.12,2.12l6.9-6.9a1.5,1.5,0,0,0,0-2.12l-6.9-6.9A1.511,1.511,0,0,0,9.437,6.858Z"
                              transform="translate(18.898 23.205) rotate(180)" fill="#024253"/>
                    </svg>

                </div>
                <div class="slide-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.901" height="16.789" viewBox="0 0 9.901 16.789">
                        <path id="Path_600" data-name="Path 599"
                              d="M9.437,6.858a1.5,1.5,0,0,0,0,2.12l5.834,5.834L9.437,20.645a1.5,1.5,0,0,0,2.12,2.12l6.9-6.9a1.5,1.5,0,0,0,0-2.12l-6.9-6.9A1.511,1.511,0,0,0,9.437,6.858Z"
                              transform="translate(-8.998 -6.416)" fill="#024253"/>
                    </svg>

                </div>
            </div>
        </div>
    </div>
</section>
<?php else:?>

    <section class="resources-slider events-resource-slider">
        <div class="pattern wow fadeInLeft pattern-left">
            <img src="<?php print REFRESH_DIR ?>/templates/dist/images/resources-pattern-left.png" alt="pattern">
        </div>
        <div class="container">
            <div class="intro-block">
                <h2>Resources</h2>
                <p>Want to learn more about Kount? Check out a few of these resources. </p>
            </div>
            <div class="slider-wrap">
                <div class="slider">

                    <div class="item text-dark-blue">
                        <a href="http://kountsummit.com/"></a>
                        <div class="bg-img">
                            <img class="ie-responsive" src="<?php print REFRESH_DIR ?>/templates/dist/images/kount-event-digital-protection-summit-1.jpg" alt="kount event digital protection">
                        </div>
                        <div class="content">
                            <div class="inner-content">
                                <h5>Event: Digital Protection Summit</h5>
                                <p>Join Kount’s 2019 signature event in Austin, Texas to engage with industry leaders shaping the
                                    digital protection experience. April 16 – 17. </p>
                            </div>
                            <a href="http://kountsummit.com/" class="link-arrow">Register Today</a>
                        </div>
                    </div>

                    <div class="item text-green">
                        <a href="/blog-against-fraud/account-takeover-prevention"></a>
                        <div class="bg-img">
                            <img class="ie-responsive" src="<?php print REFRESH_DIR ?>/templates/dist/images/Blog-A-Case-to-Protect-Against-Account-Takeover.png" alt="blog to protect against account fraud">
                        </div>
                        <div class="content">
                            <div class="inner-content">
                                <h5>Blog: A Case for Account Takeover Protection</h5>
                                <p>Loyalty programs with account log ins are a powerful means for companies to engage customers. However,
                                    it only takes one fraudulent “incident” to ruin that hard-won trust.</p>

                            </div>
                            <a href="/blog-against-fraud/account-takeover-prevention" class="link-arrow">Read More</a>
                        </div>
                    </div>

                    <div class="item text-cyan play-video" data-src="https://www.youtube.com/embed/BBPgMM4rkvQ">
                        <div class="bg-img">
                            <img class="ie-responsive" src="<?php print REFRESH_DIR ?>/templates/dist/images/machine-learning-resources.png" alt="machine learning">
                        </div>
                        <div class="content">
                            <div class="inner-content">
                                <h5>Advanced Machine Learning</h5>
                                <p>Kount employs unsupervised and supervised machine learning models. These lead the market in
                                    predictive ability because they are infused with 12 years of deep domain expertise and are trained on
                                    data from Kount’s vast Universal Identity Network. </p>
                            </div>
                            <a href="/how-fraud-prevention-works/machine-learning" class="link-arrow">Watch Now</a>

                        </div>
                    </div>

                    <div class="item text-dark-blue">
                        <a href="/tools/fraud-calculator"></a>
                        <div class="bg-img">
                            <img class="ie-responsive" src="<?php print REFRESH_DIR ?>/templates/dist/images/fraud-calculator-from-kount.png" alt="fraud calculator">
                        </div>
                        <div class="content">
                            <div class="inner-content">
                                <h5>Try Our Fraud Calculator</h5>
                                <p>How much is fraud actually costing you? Find out with our interactive fraud cost calculator.
                                </p>
                            </div>
                            <a href="/tools/fraud-calculator" class="link-arrow">Calculate Now</a>

                        </div>
                    </div>


                </div>
                <div class="slide-nav">
                    <div class="slide-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.901" height="16.789" viewBox="0 0 9.901 16.789">
                            <path id="Path_599" data-name="Path 599"
                                  d="M9.437,6.858a1.5,1.5,0,0,0,0,2.12l5.834,5.834L9.437,20.645a1.5,1.5,0,0,0,2.12,2.12l6.9-6.9a1.5,1.5,0,0,0,0-2.12l-6.9-6.9A1.511,1.511,0,0,0,9.437,6.858Z"
                                  transform="translate(18.898 23.205) rotate(180)" fill="#024253"/>
                        </svg>

                    </div>
                    <div class="slide-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.901" height="16.789" viewBox="0 0 9.901 16.789">
                            <path id="Path_600" data-name="Path 599"
                                  d="M9.437,6.858a1.5,1.5,0,0,0,0,2.12l5.834,5.834L9.437,20.645a1.5,1.5,0,0,0,2.12,2.12l6.9-6.9a1.5,1.5,0,0,0,0-2.12l-6.9-6.9A1.511,1.511,0,0,0,9.437,6.858Z"
                                  transform="translate(-8.998 -6.416)" fill="#024253"/>
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
