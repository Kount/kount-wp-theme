<?php

function create_taxonomies()
{

  register_taxonomy(
    'type', array('resources',), array(
      'hierarchical' => true,
      'label' => 'Resource Type',
      'query_var' => true,
      'rewrite' => true
    )
  );

  register_taxonomy(
    'event_type', array('events',), array(
      'hierarchical' => true,
      'label' => 'Event Type',
      'query_var' => true,
      'rewrite' => true
    )
  );

  register_taxonomy(
    'job_type', array('career',), array(
      'hierarchical' => true,
      'label' => 'Job Type',
      'query_var' => true,
      'rewrite' => true
    )
  );

  register_taxonomy(
    'news_type', array('news',), array(
      'hierarchical' => true,
      'label' => 'News Category',
      'query_var' => true,
      'rewrite' => true
    )
  );

  register_taxonomy(
    'video_type', array('video',), array(
      'hierarchical' => true,
      'label' => 'Video Category',
      'query_var' => true,
      'rewrite' => true
    )
  );
}

add_action('init', 'create_taxonomies', 0);

/**
 * Glossary
 */
function we_custom_glossary()
{
  $labels = array(
    'name' => _x('Glossary', 'post type general name'),
    'singular_name' => _x('Glossary Term', 'post type singular name'),
    'add_new' => _x('Add New', 'Glossary'),
    'add_new_item' => __('Add New Glossary Term'),
    'edit_item' => __('Edit Glossary Term'),
    'new_item' => __('New Glossary Term'),
    'all_items' => __('All Glossary Terms'),
    'view_item' => __('View Glossary Terms'),
    'search_items' => __('Search Glossary Terms'),
    'not_found' => __('No glossary term found'),
    'not_found_in_trash' => __('No glossary terms found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Glossary'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Glossary',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'editor',),
    'rewrite' => array('slug' => '/glossary', 'with_front' => false),
    'has_archive' => false,
//      'taxonomies' => array('news_type'),
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-editor-textcolor',
    'can_export' => true,
  );
  register_post_type('glossary', $args);
}

add_action('init', 'we_custom_glossary');

/**
 * News
 */
function we_custom_news()
{
  $labels = array(
    'name' => _x('News', 'post type general name'),
    'singular_name' => _x('News', 'post type singular name'),
    'add_new' => _x('Add New', 'News'),
    'add_new_item' => __('Add New News'),
    'edit_item' => __('Edit News'),
    'new_item' => __('New News'),
    'all_items' => __('All News'),
    'view_item' => __('View News'),
    'search_items' => __('Search News'),
    'not_found' => __('No news found'),
    'not_found_in_trash' => __('No news found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'News'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'News',
    'public' => true,
    'menu_position' => 8,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt', 'editor',),
    'rewrite' => array('slug' => '/announcements', 'with_front' => false),
    'has_archive' => false,
    'taxonomies' => array('news_type'),
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-media-spreadsheet',
    'can_export' => true,
  );
  register_post_type('news', $args);
}

add_action('init', 'we_custom_news');


function we_custom_events()
{
  $labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Events', 'post type singular name'),
    'add_new' => _x('Add New', 'Events'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'all_items' => __('All Events'),
    'view_item' => __('View Events'),
    'search_items' => __('Search Events'),
    'not_found' => __('No Event found'),
    'not_found_in_trash' => __('No news found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Events'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Events',
    'public' => true,
    'menu_position' => 4,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt', ),
    'rewrite' => array('slug' => '/events', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'taxonomies' => array('event_type'),
    'can_export' => true,
    'menu_icon' => 'dashicons-admin-site',
  );
  register_post_type('Events', $args);
}

add_action('init', 'we_custom_events');

//function we_custom_third_party_events()
//{
//  $labels = array(
//      'name' => _x('Third Party Events', 'post type general name'),
//      'singular_name' => _x('ThirdPartyEvents', 'post type singular name'),
//      'add_new' => _x('Add New', 'Events'),
//      'add_new_item' => __('Add New Event'),
//      'edit_item' => __('Edit Event'),
//      'new_item' => __('New Event'),
//      'all_items' => __('All Events'),
//      'view_item' => __('View Events'),
//      'search_items' => __('Search Events'),
//      'not_found' => __('No Event found'),
//      'not_found_in_trash' => __('No news found in the Trash'),
//      'parent_item_colon' => '',
//      'menu_name' => 'Events – Direct Registration'
//  );
//  $args = array(
//      'labels' => $labels,
//      'description' => 'Third Party Events',
//      'public' => false,
//      'show_ui' => true,
//      'show_in_nav_menus' => false,
//      'menu_position' => 5,
//      'show_in_admin_bar' => true,
//      'supports' => array('title', 'thumbnail', 'excerpt', ),
//      'rewrite' => false,
//      'has_archive' => false,
//      'exclude_from_search' => true,
//      'taxonomies' => array('event_type'),
//      'can_export' => true,
//      'menu_icon' => 'dashicons-admin-site',
//  );
//  register_post_type('Third Party Events', $args);
//}
//
//add_action('init', 'we_custom_third_party_events');


/*
 * Register Custom Post Type Career
 */

function we_custom_career()
{
  $labels = array(
    'name' => _x('Career', 'post type general name'),
    'singular_name' => _x('Career', 'post type singular name'),
    'add_new' => _x('Add New', 'Career'),
    'add_new_item' => __('Add New Career'),
    'edit_item' => __('Edit Career'),
    'new_item' => __('New Career'),
    'all_items' => __('All Career'),
    'view_item' => __('View Career'),
    'search_items' => __('Search Career'),
    'not_found' => __('No career found'),
    'not_found_in_trash' => __('No career found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Career'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Career',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'editor', 'excerpt',),
    'rewrite' => array('slug' => '/about/careers', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-format-aside',
    'can_export' => true,
  );
  register_post_type('career', $args);
}

add_action('init', 'we_custom_career');

/*
 * Register Custom Post Type eBook
 */

function we_custom_ebook()
{
  $labels = array(
    'name' => _x('eBook', 'post type general name'),
    'singular_name' => _x('eBook', 'post type singular name'),
    'add_new' => _x('Add New', 'eBook'),
    'add_new_item' => __('Add New eBook'),
    'edit_item' => __('Edit eBook'),
    'new_item' => __('New eBook'),
    'all_items' => __('All eBook'),
    'view_item' => __('View eBook'),
    'search_items' => __('Search eBook'),
    'not_found' => __('No eBook found'),
    'not_found_in_trash' => __('No eBook found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'eBook'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'eBook',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/ebooks', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-paperclip',
    'can_export' => true,
  );
  register_post_type('eBook', $args);
}

add_action('init', 'we_custom_ebook');


/*
 * Register Custom Post Type Video
 */

function we_custom_video()
{
  $labels = array(
    'name' => _x('Video', 'post type general name'),
    'singular_name' => _x('Video', 'post type singular name'),
    'add_new' => _x('Add New', 'Video'),
    'add_new_item' => __('Add New Video'),
    'edit_item' => __('Edit Video'),
    'new_item' => __('New Video'),
    'all_items' => __('All Video'),
    'view_item' => __('View Video'),
    'search_items' => __('Search Video'),
    'not_found' => __('No Video found'),
    'not_found_in_trash' => __('No Video found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Video'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Video',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'editor', 'excerpt', 'comments', 'thumbnail'),
    'rewrite' => array('slug' => '/video', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'taxonomies' => array('video_type'),
    'menu_icon' => 'dashicons-format-video',
    'can_export' => true,
  );
  register_post_type('Video', $args);
}

add_action('init', 'we_custom_Video');


/*
 * Register Custom Post Type Case Study
 */

function we_custom_case_study()
{
  $labels = array(
    'name' => _x('Case Study', 'post type general name'),
    'singular_name' => _x('Case Study', 'post type singular name'),
    'add_new' => _x('Add New', 'Case Study'),
    'add_new_item' => __('Add New Case Study'),
    'edit_item' => __('Edit Case Study'),
    'new_item' => __('New Case Study'),
    'all_items' => __('All Case Study'),
    'view_item' => __('View Case Study'),
    'search_items' => __('Search Case Study'),
    'not_found' => __('No Case Study found'),
    'not_found_in_trash' => __('No Case Study found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Case Study'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Case Study',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/case-studies', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-media-document',
    'can_export' => true,
  );
  register_post_type('Case Study', $args);
}

add_action('init', 'we_custom_case_study');

/*
 * Register Custom Post Type Industry Report
 */

function we_custom_industry_report()
{
  $labels = array(
    'name' => _x('Industry Report', 'post type general name'),
    'singular_name' => _x('Industry Report', 'post type singular name'),
    'add_new' => _x('Add New', 'Industry Report'),
    'add_new_item' => __('Add New Industry Report'),
    'edit_item' => __('Edit Industry Report'),
    'new_item' => __('New Industry Report'),
    'all_items' => __('All Industry Reports'),
    'view_item' => __('View Industry Report'),
    'search_items' => __('Search Industry Reports'),
    'not_found' => __('No Industry Reports found'),
    'not_found_in_trash' => __('No Industry Reports found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Industry Report'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Industry Report',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/industry-reports', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-analytics',
    'can_export' => true,
  );
  register_post_type('Industry Report', $args);
}

add_action('init', 'we_custom_industry_report');

/*
 * Register Custom Post Type Kount Report
 */

function we_custom_kount_report()
{
  $labels = array(
    'name' => _x('Kount Report', 'post type general name'),
    'singular_name' => _x('Kount Report', 'post type singular name'),
    'add_new' => _x('Add New', 'Kount Report'),
    'add_new_item' => __('Add New Kount Report'),
    'edit_item' => __('Edit Kount Report'),
    'new_item' => __('New Kount Report'),
    'all_items' => __('All Kount Reports'),
    'view_item' => __('View Kount Report'),
    'search_items' => __('Search Kount Reports'),
    'not_found' => __('No Kount Reports found'),
    'not_found_in_trash' => __('No Kount Reports found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Kount Report'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Kount Report',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/kount-reports', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-analytics',
    'can_export' => true,
  );
  register_post_type('Kount Report', $args);
}

add_action('init', 'we_custom_kount_report');


/*
 * Register Custom Post Type Vendor Report
 */

function we_custom_vendor_report()
{
  $labels = array(
    'name' => _x('Vendor Report', 'post type general name'),
    'singular_name' => _x('Vendor Report', 'post type singular name'),
    'add_new' => _x('Add New', 'Vendor Report'),
    'add_new_item' => __('Add New Vendor Report'),
    'edit_item' => __('Edit Vendor Report'),
    'new_item' => __('New Vendor Report'),
    'all_items' => __('All Vendor Reports'),
    'view_item' => __('View Vendor Report'),
    'search_items' => __('Search Vendor Reports'),
    'not_found' => __('No Vendor Reports found'),
    'not_found_in_trash' => __('No Vendor Reports found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Vendor Report'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Vendor Report',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/vendor-reports', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-analytics',
    'can_export' => true,
  );
  register_post_type('Vendor Report', $args);
}

add_action('init', 'we_custom_vendor_report');


/*
 * Register Custom Post Type Webinar
 */

function we_custom_webinar()
{
  $labels = array(
    'name' => _x('Webinar', 'post type general name'),
    'singular_name' => _x('Webinar', 'post type singular name'),
    'add_new' => _x('Add New', 'Webinar'),
    'add_new_item' => __('Add New Webinar'),
    'edit_item' => __('Edit Webinar'),
    'new_item' => __('New Webinar'),
    'all_items' => __('All Webinar'),
    'view_item' => __('View Webinar'),
    'search_items' => __('Search Webinar'),
    'not_found' => __('No Webinar found'),
    'not_found_in_trash' => __('No Webinar found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Webinar'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Webinar',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/webinars', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-media-video',
    'can_export' => true,
  );
  register_post_type('Webinar', $args);
}

add_action('init', 'we_custom_webinar');

/*
 * Register Custom Post Type White Paper
 */

function we_custom_white_paper()
{
  $labels = array(
    'name' => _x('White Paper', 'post type general name'),
    'singular_name' => _x('White Paper', 'post type singular name'),
    'add_new' => _x('Add New', 'White Paper'),
    'add_new_item' => __('Add New White Paper'),
    'edit_item' => __('Edit White Paper'),
    'new_item' => __('New White Paper'),
    'all_items' => __('All White Papers'),
    'view_item' => __('View White Paper'),
    'search_items' => __('Search White Papers'),
    'not_found' => __('No White Papers found'),
    'not_found_in_trash' => __('No White Papers found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'White Paper'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'White Paper',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'excerpt',),
    'rewrite' => array('slug' => '/thanks/white-papers', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-nametag',
    'can_export' => true,
  );
  register_post_type('White Paper', $args);
}

add_action('init', 'we_custom_white_paper');

/*
 * Register Custom Post Type Management
 */

function we_custom_management()
{
  $labels = array(
    'name' => _x('Management', 'post type general name'),
    'singular_name' => _x('Management', 'post type singular name'),
    'add_new' => _x('Add New', 'Management'),
    'add_new_item' => __('Add New Management'),
    'edit_item' => __('Edit Management'),
    'new_item' => __('New Management'),
    'all_items' => __('All Management'),
    'view_item' => __('View Management'),
    'search_items' => __('Search Management'),
    'not_found' => __('No Management found'),
    'not_found_in_trash' => __('No Management found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Management'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Management',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'editor',),
    'rewrite' => array('slug' => '/about/management', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-businessman',
    'can_export' => true,
  );
  register_post_type('Management', $args);
}

add_action('init', 'we_custom_management');

/*
 * Register Custom Post Type Board
 */

function we_custom_board()
{
  $labels = array(
    'name' => _x('Board', 'post type general name'),
    'singular_name' => _x('Board', 'post type singular name'),
    'add_new' => _x('Add New', 'Board'),
    'add_new_item' => __('Add New Board'),
    'edit_item' => __('Edit Board'),
    'new_item' => __('New Board'),
    'all_items' => __('All Board'),
    'view_item' => __('View Board'),
    'search_items' => __('Search Board'),
    'not_found' => __('No Board found'),
    'not_found_in_trash' => __('No Board found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Board'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Board',
    'public' => true,
    'menu_position' => 6,
    'show_in_admin_bar' => true,
    'supports' => array('title', 'thumbnail', 'editor',),
    'rewrite' => array('slug' => '/about/board', 'with_front' => false),
    'has_archive' => false,
    'publicly_queryable' => true,
    'menu_icon' => 'dashicons-groups',
    'can_export' => true,
  );
  register_post_type('Board', $args);
}

add_action('init', 'we_custom_board');
