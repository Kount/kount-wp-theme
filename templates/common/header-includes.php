<link rel="preload" href="<?php print REFRESH_DIR ?>/fonts/ProximaNovaLight.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php print REFRESH_DIR ?>/fonts/ProximaNovaRegular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php print REFRESH_DIR ?>/fonts/ProximaNovaSemibold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php print REFRESH_DIR ?>/fonts/ProximaNovaBold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php print REFRESH_DIR ?>/fonts/ProximaNovaExtraBold.woff2" as="font" type="font/woff2" crossorigin>

<!--<link rel="preconnect" href="https://munchkin.marketo.net">-->
<!--<link rel="preconnect" href="https://ws.zoominfo.com">-->
<!--<link rel="preconnect" href="https://cookie-script.com">-->

<!--<link rel="dns-prefetch" href="https://ca-eu.cookie-script.com">-->
<link rel="dns-prefetch" href="https://cookie-script.com">
<link rel="dns-prefetch" href="https://ws.zoominfo.com">
<link rel="dns-prefetch" href="https://munchkin.marketo.net">
<link rel="dns-prefetch" href="https://bat.bing.com">
<link rel="dns-prefetch" href="https://bid.g.doubleclick.net">
<link rel="dns-prefetch" href="https://www.google.com">
<link rel="dns-prefetch" href="https://www.googleadservices.com">
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="https://storage.googleapis.com">
<link rel="dns-prefetch" href="https://www.google-analytics.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="dns-prefetch" href="https://googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="dns-prefetch" href="https://pixel-geo.prfct.co">
<link rel="dns-prefetch" href="http://pixel-geo.prfct.co">
<link rel="dns-prefetch" href="http://ib.adnxs.com">
<link rel="dns-prefetch" href="https://tag.perfectaudience.com">
<link rel="dns-prefetch" href="https://tracking.g2crowd.com">
<link rel="dns-prefetch" href="https://cdn.bizible.com">

<?php
$activate_hotjar = get_field('activate_hotjar');
if($activate_hotjar): ?>
<link rel="dns-prefetch" href="https://static.hotjar.com">
<link rel="dns-prefetch" href="https://script.hotjar.com">
<!--<link rel="dns-prefetch" href="https://in.hotjar.com">-->
<?php endif; ?>
<!--<link rel="preload" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/global.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" as="style">-->
<?php if(is_front_page()):?>
<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/styles/home.css?v=<?php print WE_ASSETS_VERSION; ?>" as="style">
<?php elseif(is_single() && get_post_type( get_the_ID() ) == 'post' ): ?>
<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/styles/blog-detail-inc.css?v=<?php print WE_ASSETS_VERSION; ?>" as="style">
<?php elseif(is_page('products') || is_child('products')): ?>
<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/styles/product-pages.css?v=<?php print WE_ASSETS_VERSION; ?>" as="style">
<?php else: ?>
<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/styles/main.css?v=<?php print WE_ASSETS_VERSION; ?>" as="style">
<?php endif; ?>

<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/scripts/main.js?v=<?php print WE_ASSETS_VERSION; ?>" as="script">
<link rel="preload" href="<?php print REFRESH_DIR ?>/templates/dist/scripts/global.js?v=<?php print WE_ASSETS_VERSION; ?>" as="script">

<?php if(!is_front_page()): ?>
<!--<link rel="preload" href="--><?php //print REFRESH_DIR ?><!--/templates/assets/styles/bootstrap/dist/js/bootstrap.min.js" as="script">-->
<?php endif; ?>

<!--<link rel="stylesheet" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/global.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" />-->
<?php //if(is_front_page()):?>
<!--<link rel="stylesheet" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/home.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" />-->
<?php //elseif(is_single() && get_post_type( get_the_ID() ) == 'post' ): ?>
<!--<link rel="stylesheet" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/blog-detail-inc.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" />-->
<?php //elseif(is_page('products') || is_child('products')): ?>
<!--<link rel="stylesheet" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/product-pages.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" />-->
<?php //else: ?>
<!--<link rel="stylesheet" href="--><?php //print REFRESH_DIR ?><!--/templates/dist/styles/main.css?v=--><?php //print WE_ASSETS_VERSION; ?><!--" />-->
<?php //endif; ?>

<link rel="alternate" type="application/rss+xml" href="https://kount.com/rss/" />