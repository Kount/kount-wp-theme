<?php include "common/variables.php";
foreach ($items as $item):
  $buttonLeft = $item['show_button_first'] ?? false;
//  $buttonLeft = false;
  ?>
<section class="promotional-cta wow fadeIn <?php echo $item['background_pattern']?>" data-wow-delay="0.5s">
    <div class="container">
        <div class="column-wrapper wow fadeInUp" data-wow-delay="0.5s">
          <?php if($item['image']) {?>
            <div class="img-box wow fadeInLeft">
                <?php we_print_image($item['image']);?>
            </div>
          <?php } ?>
            <div class="content-wrap d-flex align-items-center<?php if($buttonLeft):?> flex-row-reverse justify-content-between<?php endif;?>">
                <div class="inner-wrap">
                    <?php
                        we_print_field($item['title'],'<p class="h2 text-white">','</p>');
                        we_print_field($item['blurb'],'<p>','</p>');?>
                </div>
<!--                <div class="button-wrap">-->

                <?php
                $openDemoSlider = $button['use_demo_request_slider_form'] ?? false;
                $cssClass = 'cta-btn';
                if($openDemoSlider):
                    $cssClass += ' toggle-demo-form';
                endif;
//                print do_shortcode('[button event-action="Footer CTA" link="#" slider="true"]Learn more[/button]')
                we_print_button($item['button'], $cssClass,'data-text="Learn more"')?>
<!--                </div>-->
            </div>
        </div>
    </div>
</section>
<?php endforeach;?>
