<?php include "common/variables.php" ?>
<section class="resources-slider" id="resources-slider" >
    <div class="pattern wow fadeInLeft pattern-left">
        <img src="<?php print REFRESH_DIR ?>/templates/dist/images/resources-pattern-left.png" alt="pattern">
    </div>
    <div class="container">
        <div class="intro-block">
            <?php if ($title): ?><h2><?php print $title; ?> </h2><?php endif; ?>
            <?php if ($blurb): ?><p><?php print $blurb; ?></p><?php endif; ?>
        </div>
      <!--            <div class="slider">-->
      <div class="splide slider-wrap">
          <div class="splide__track">
            <ul class="splide__list">
                <?php
                $slides = get_sub_field('slides');
                if ($slides){
                    foreach ($slides as $slide){
                      ?>
<!--              <li class="splide__slide">-->
                <li class="item <?php echo $slide['title_color'];?> <?php if($slide['add_video']) { ?>play-video" data-src="<?php echo $slide['url'];?>"> <?php } else { ?>">
                    <a href="<?php echo $slide['url']; ?>"><span class="sr-only"><?php print $slide['title']; ?></span></a><?php }?>
                    <div class="bg-img">
                      <?php print wp_get_attachment_image($slide['image']['ID'],'medium'); ?>
<!--/*                              <img src="--><?php //print $slide['image']['url']; ?><!--" alt="--><?php //print $slide['image']['alt']; ?><!--">-->
                    </div>
                    <div class="content">
                        <!--            <a href="http://kountsummit.com/"></a>-->
                        <div class="inner-content">
                            <?php if ($slide['title']){ ?><h5><?php print $slide['title']; ?></h5><?php } ?>
                            <?php if ($slide['subtitle']){ ?><p><?php print $slide['subtitle']; ?></p><?php } ?>
                        </div>
                        <?php we_get_links($slide['links'],'link-arrow'); ?>
                    </div>
                </li>
<!--              </li>-->
                    <?php } ?>
                <?php } ?>
            </ul>
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