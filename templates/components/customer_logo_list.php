<section class="customer-logo-list pt-3 pb-0">
  <div class="container">
    <hr>
    <div class="inner pt-5 pb-5">
      <?php
      $intro = get_sub_field('intro');
      if($intro['title'] != '' || $intro['body'] != ''):
          ?>
          <div class="intro-block">
            <?php if ($intro['title']): ?><h2 class="extra-bold pt-3"><?php print $intro['title']; ?></h2><?php endif; ?>
            <?php if ($intro['body']): ?><?php print $intro['body']; ?><?php endif; ?>
          </div>
      <?php
      endif; ?>
      <div class="logos-wrap row d-flex flex-wrap py-3 py-lg-5">
          <?php
          $customer_logo = get_sub_field('customer_logo');
          if($customer_logo):
            foreach ($customer_logo as $logo):
              $links = $logo['content_links'];
              ?>
              <div class="logo-cell d-flex align-items-center justify-content-center<?php if($links):?> has-link<?php endif; ?>">
                <div class="logo">
                  <img width="<?php print $logo['image']['width']; ?>" height="<?php print $logo['image']['height']; ?>" src="<?php echo $logo['image']['url']; ?>" alt="<?php print $logo['image']['alt']; ?>">
                </div>
                <?php
  //              print_r($links);
                if(sizeof($links) > 0):?>
                  <div class="link-wrap" style="opacity: 0;">
                <?php
                  foreach($links as $link):
                    $cta_text = '';
                    switch($link['link_type']) {
                      case 'announcement':
                        $cta_text = 'Read announcement';
                        break;
                      case 'blog':
                        $cta_text = 'Read blog post';
                        break;
                      case 'case-study':
                        $cta_text = 'Read case study';
                        break;
                      case 'case-study':
                        $cta_text = 'Read vendor report';
                        break;
                      case 'ebook':
                        $cta_text = 'Read ebook';
                        break;
                      case 'news':
                        $cta_text = 'Read news';
                        break;
                      case 'webinar':
                        $cta_text = 'Watch webinar';
                        break;
                      case 'white-paper':
                        $cta_text = 'Read Kount report';
                        break;
                      case 'video':
                        $cta_text = 'Watch video';
                        break;
                      default:
                        break;
                    }
                    ?>
                    <img alt="Click to <?php print $cta_text;?>" class="arrow-right" src="/wp-content/themes/kount/templates/images/svg/arrow-right.svg" width="10" />
                    <a class="light" href="<?php print $link['link_url'];?>"><?php print $cta_text;?></a>
                  <?php
                  endforeach;?>
                  </div>
                <?php
                  endif;
                ?>
              </div>
            <?php endforeach;
          endif;?>
      </div>
    </div>
    <hr>
  </div>
</section>