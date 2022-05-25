<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php print check_login(); ?> <?php print page_class(); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="google-site-verification" content="ir_gKc2A0B2L3dgoBQR7JT51ISu3wJdefJO3piNcpwo"/>
  <meta name="format-detection" content="telephone=no">
  <?php include(THEME_DIR . "/templates/common/header-includes.php"); ?>
  <?php include(THEME_DIR . "/templates/common/header-tracking.php"); ?>
  <?php wp_head(); ?>
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-touch-icon.png">
  <link rel="shortcut icon" href="/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/favicon/browserconfig.xml">
<!--  <link href="/wp-content/themes/kount/templates/assets/styles/selectBoxIt.css" rel="stylesheet" type="text/css">-->
  <meta name="theme-color" content="#ffffff">
  <?php
  $page_id = get_queried_object_id();
  ?>
  <?php
  if ($page_id == '3410') :?>
  <?php echo get_the_content(); ?>
  <?php endif;?>
</head>
<body <?php body_class(''); ?>>
<!-- CHEQ INVOCATION TAG (noscript)-->
<noscript>
    <iframe src='https://sir.thesmilingelbows.com/ns/05e2ecd544a3d50fea405bd22a027e4c.html?ch=cheq4ppc'
            width='0' height='0' style='display:none'></iframe>
</noscript>
<!-- END CHEQ INVOCATION TAG (noscript) -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGPZWJM"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--<div class="refresh19" ng-app="KountApp">-->
<div class="refresh19">
  <?php
  if(!is_page_template('template-podcast.php')) :
    if (is_page_template('digital-summit.php')) {
      include(THEME_DIR . "/templates/common/header-digital-summit.php");
    }
    else if(!is_page_template('template-search-overlay.php')) {
      include(THEME_DIR . "/templates/common/header-menu.php");
    }
  endif;
  ?>


