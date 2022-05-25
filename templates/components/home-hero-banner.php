<?php include "common/variables.php";
$i = 0;

$title_html = get_sub_field('title_html', get_the_ID());
$body_html = get_sub_field('body_html', get_the_ID());
$product_nav = get_sub_field('product_nav', get_the_ID());
$product_subnav = get_sub_field('product_subnav', get_the_ID());
$button_text = get_sub_field('button_text', get_the_ID());
$button_url = get_sub_field('button_url', get_the_ID());
?>
<section class="home-hero-banner p-0">
  <div class="bg-img d-none d-lg-block">
    <img class="wow fadeIn" width="1150" height="506" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
  </div>
  <div class="pattern wow fadeIn"></div>
  <div class="container home-hero-nav-container">
    <div class="home-hero-nav">
      <svg xmlns="http://www.w3.org/2000/svg" width="95.458" height="358" viewBox="0 0 95.458 358" class="d-none">
        <g id="Group_4477" data-name="Group 4477" transform="translate(-431.542 -1023)">
          <g id="Ellipse_161" data-name="Ellipse 161" transform="translate(494 1023)" fill="none" stroke="#024253" stroke-width="3">
            <circle cx="16.5" cy="16.5" r="16.5" stroke="none"/>
            <circle cx="16.5" cy="16.5" r="15" fill="none"/>
          </g>
          <g id="Ellipse_162" data-name="Ellipse 162" transform="translate(494 1348)" fill="none" stroke="#024253" stroke-width="3">
            <circle cx="16.5" cy="16.5" r="16.5" stroke="none"/>
            <circle cx="16.5" cy="16.5" r="15" fill="none"/>
          </g>
          <g id="Ellipse_163" data-name="Ellipse 163" transform="translate(432 1131)" fill="none" stroke="#024253" stroke-width="3">
            <ellipse cx="16.5" cy="16" rx="16.5" ry="16" stroke="none"/>
            <ellipse cx="16.5" cy="16" rx="15" ry="14.5" fill="none"/>
          </g>
          <g id="Ellipse_164" data-name="Ellipse 164" transform="translate(432 1240)" fill="none" stroke="#024253" stroke-width="3">
            <circle cx="16.5" cy="16.5" r="16.5" stroke="none"/>
            <circle cx="16.5" cy="16.5" r="15" fill="none"/>
          </g>
          <line id="Line_70" data-name="Line 70" x1="47" y2="80" transform="translate(456.5 1053.5)" fill="none" stroke="#024253" stroke-width="2"/>
          <line id="Line_71" data-name="Line 71" x1="47" y1="80" transform="translate(456.5 1270.5)" fill="none" stroke="#024253" stroke-width="2"/>
          <path id="Path_7840" data-name="Path 7840" d="M-15147.837-15521.663a90.282,90.282,0,0,0-8.61,39.528c.346,22.482,8.61,43.276,8.61,43.276" transform="translate(15589 16682)" fill="none" stroke="#024253" stroke-width="2"/>

          <line class="" x1="47" y2="80" transform="translate(456.5 1053.5)" fill="none" stroke="#024253" stroke-width="2"/>
          <line class=""  x1="47" y1="80" transform="translate(456.5 1270.5)" fill="none" stroke="#024253" stroke-width="2"/>
          <path class="" d="M-15147.837-15521.663a90.282,90.282,0,0,0-8.61,39.528c.346,22.482,8.61,43.276,8.61,43.276" transform="translate(15589 16682)" fill="none" stroke="#024253" stroke-width="2"/>

        </g>
      </svg>
<!--      <img src="/wp-content/themes/kount/templates/dist/images/svg/home-hero-nav.svg" width="95" />-->
      <div class="inner">
      <?php foreach ($product_nav as $nav_item): ?>
        <a href="<?php print $nav_item['link_url'];?>"><strong><?php print $nav_item['link_text'];?></strong></a>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="content-wrapper">
      <?php if($title_html != ''): print $title_html; endif; ?>
      <?php if($body_html != ''): print $body_html; endif; ?>
      <div class="nav-wrapper d-flex flex-md-row pt-5">
        <?php if($product_subnav): ?>
        <nav class="home-hero-subnav">
          <?php foreach ($product_subnav as $subnav_item): ?><a href="<?php print $subnav_item['link_url'];?>"><?php print $subnav_item['link_text'];?></a><?php endforeach; ?>
        </nav>
        <?php endif; ?>
        <?php if($button_text != '' && $button_url != ''): ?>
        <div class="btn-wrapper pl-md-5">
          <a href="<?php print $button_url;?>" class="btn-orange" data-text="<?php print $button_text;?>"><span><?php print $button_text;?></span></a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
