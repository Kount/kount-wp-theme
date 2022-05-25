<?php

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{

  // update path
  $path = get_stylesheet_directory() . '/acf-json';
  // return
  return $path;
}

/*
 * Print page name as class on body
 */

function page_class()
{
  global $post;

  if(empty($post->post_name)){
    return;
  }else{
    $body_class = $post->post_name;
  }

  return $body_class;
}

/*
 *  Add class when user is login
 */

function check_login()
{
  if (is_user_logged_in()) {
    $body_class = 'logged-in';
  } else {
    $body_class = 'logged-out';
  }
  return $body_class;
}

/*
* Print block content
*/
function we_print_block_content($block_id)
{
  $block_post = get_post($block_id);
  print $block_post->post_content;
  return;
}

/**
 *  Image src
 */
function we_get_image_src($post_id, $size)
{
  $attachment_id = get_post_thumbnail_id($post_id);
  $image_attributes = wp_get_attachment_image_src($attachment_id, $size, $icon = false);

  return $image_attributes;
}

/*
 *  Get image or set default
 */
function we_image($post_id, $size = 'full', $link = '')
{
  $image_id = get_post_thumbnail_id($post_id);
  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
  $image_src = we_get_image_src($post_id, $size);
  $image_url = $image_src[0];
//  $img = '<img src="' . $image_url . '" alt="' . $image_alt . '">';
  $img = convert_img_src_to_webp('<img src="' . $image_url . '" alt="' . $image_alt . '">');
  if ($link) {
    print '<a href="' . $link . '">' . $img . '</a>';
  } else {
    print $img;
  }
}


/*
* Get the HTML for an image tag by ID or array
*/
function we_get_image($image, $class = '', $size = 'full')
{
  $imgUrl = "";
  // Support arrays by getting the ID
  if (is_array($image) && array_key_exists('id', $image)) {
    $image = $image['id'];
  }

  /*
* If there is an image ID
*/
  $image = intval($image);
  if ($image > 1) {
    $imgHtml = '';
    // Print class name if image tag has some classes
    if (empty($class)) {
      return wp_get_attachment_image($image, $size);
    }
    else {
      return wp_get_attachment_image($image, $size, '', ["class" => $class]);
    }
    //Check if browser can handle WebP images
//    if(isBrowserWebPEnabled()):
//      $imgUrl .= '.webp';
//    endif;

//    return $imgUrl;
  }
  return '';
}

/*
* Output the HTML for Button
*/
function we_print_button($buttons, $class = '', $attr = '')
{
  if ($buttons) {
    foreach ($buttons as $button):
        $btn_text = $button['title'];
      $btn_class = $button['button_style'];
      $css_class = $button['css_class'];
      $btn_target = $button['target'];

      if ($btn_target) {
        $target = '_blank';
      } else {
        $target = '_self';
      }
      $custom_link = $button['type'];

      if ($custom_link) {
        if ($button['url']) {
          $link_url = $button['url'];
        } else {
          $link_url = '#';
        }
      } else {
        $page_link_arr = $button['link'];
        if ($page_link_arr) {
          $link_url = $page_link_arr->guid;
        } else {
          $link_url = '#';
        }
      }

//      if($css_class != '') {
//        if($class == '') {
//          $class = $css_class;
//        }
//        else {
//          $class = ' ' . $css_class;
//        }
//      }

      if ((strpos($link_url, 'youtube') > 0) || (strpos($link_url, 'vimeo') > 0)) {
        $video_class = 'play-video';
      } else {
        $video_class = '';
      }
      if ($video_class == '') {
        print '<a href="' . $link_url . '" class="' . $css_class . ' ' . $class . ' ' . $btn_class . '" data-text="' . $btn_text . '"';
        if(strpos($css_class, 'toggle-demo-form') !== false) {
            print ' data-event-action="Footer CTA"';
        }
        print '><span>' . $btn_text . '</span></a>';
      } else {
        print '<a href="" data-video=" ' . $link_url . '" class="' . $class . ' ' . $video_class . ' ' . $btn_class . '" data-text="' . $btn_text . '"><span>' . $btn_text . '</span></a>';
      }
    endforeach;
  }
}

/*
 *  Print App button
 */

function we_print_app_button($buttons)
{
  if ($buttons) {
    foreach ($buttons as $button):
      $btn_class = $button['button_type'];
      $btn_url = $button['url'];
      print '<a href="' . $btn_url . '" class=" ' . $btn_class . '" "></a>';
    endforeach;
  }
}


/*
 * acf Field Output*/
function we_print_field($name, $wrap_start, $wrap_end) {
    if (!empty($name)) {
        print $wrap_start . $name . $wrap_end;
    } else {
        return '';
    }
}

/*
* Output the HTML for an image tag by ID or array
*/
function we_print_image($image, $class = '', $size = 'full')
{
  print we_get_image($image, $class, $size);
}

/*
* Get alt tag of image
*/
function we_get_img_alt($attachment_id)
{
  return trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
}

/*
* Get rendered links from a links or buttons repeater
*/
function we_get_links($links, $classes = '', $attr = '')
{
  /*
 * Exit early if there are no links to process
 */
  if (!is_array($links))
    return '';


  // For each link in the list
  $output = '';
  foreach ($links as $link) {
    // Skip links without text
    if (!($linkText = $link['text']))
      continue;
    $btn_target = $link['target'];
    if ($btn_target) {
      $target = '_blank';
    } else {
      $target = '_self';
    }
//    // Prepare link attributes
//    $attributes = $link_class = '';
//    if ($link['button_style'])
//      $link_class = $link['button_style'];
//
//    ($classes) ? $classes .= " " . $link['button_style'] : $classes = $link['button_style'];
//
//    if ($attr)
//      $attributes .= " " . $attr;
//    if ($link['target'])
//      $attributes .= ' target="_blank"';
//    if ($classes)
//      $attributes .= " class='$classes'";

    // If there is a post chosen and the link type is not custom
    $chosenPost = $link['link'];
    if ($chosenPost instanceof WP_Post && !$link['type']) {
      $chosenID = $chosenPost->ID;
      $url = get_permalink($chosenID);
    } else {
      $url = $link['url'];
    }

    print '<a href="' . $url . '" class="' . $classes . '">' . $linkText . '<span class="sr-only"> at ' . $url . '</span></a>';
  }
  return $output;
}

/*
* Function for links/buttons
*/
function we_print_links($links, $classes = '', $attr = '')
{
  print we_get_links($links, $classes, $attr);
}

/*
* Limit words
*/
function we_limit_words($string, $word_limit)
{
  $words = explode(" ", $string);
  return implode(" ", array_splice($words, 0, $word_limit));
}

/*
* Get video id from url
*/
function we_get_video_id($url)
{
  $reg_exp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
  $match = preg_match($reg_exp, $url, $matches);
  if ($matches && strlen($matches[2]) == 11) {
    return $matches[2];
  } else {
    return 'error';
  }
}

// Print id attribute & value if there is any
function we_print_id($section_id)
{
  if ($section_id) {
    echo 'id="' . $section_id . '"';
  } else {
    return '';
  }
}

/*
* Return substring with limited characters
*/
function we_truncate($string, $length = 100, $append = "&hellip;")
{
  $string = trim($string);
  if (strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }
  return $string;
}

add_image_size('350X157', 350, 157, true);
add_image_size('305X153', 305, 153, true);
add_image_size('1110X375', 1110, 375, true);
add_image_size('241X106', 214, 106, true);


//function for get the image in .svg extension
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');




/*
* Get rendered links from a links or buttons repeater
*/
function we_get_scroll($links, $classes = '', $attr = '')
{
    /*
   * Exit early if there are no links to process
   */
    if (!is_array($links))
        return '';

    // For each link in the list
    $output = '';
    foreach ($links as $link) {
        // Skip links without text
        if (!($linkText = $link['text']))
            continue;

            $url = $link['url'];
    print '<li><a class="' . $url . '" data-scroll href="#' . $url . '" class="' . $classes . '">' . $linkText . '</a></li>';
    }
    return $output;
}

function we_print_scroll($links, $classes = '', $attr = '')
{
    print we_get_scroll($links, $classes, $attr);
}

/* function for date*/
function we_get_date($date1, $date2, $toUpperCase = false) {
  error_log("date1 = " . $date1);
  error_log("date2 = " . $date2);
    if($date1==$date2){
        print $date1;
    }
    elseif (strtotime($date1) > strtotime($date2)){
        print $date1;
    }
    else{
        $date1 = str_replace('/', '-', $date1 );
        $date2 = str_replace('/', '-', $date2 );
        $day1 = date("j", strtotime($date1));
        $day2 = date("j", strtotime($date2));
        $month1 =date("F", strtotime($date1));
        $month2 =date("F", strtotime($date2));
        if($toUpperCase) {
          $month1 = strtoupper($month1);
          $month2 = strtoupper($month2);
        }

        $year1 =date("Y", strtotime($date1));
        $year2 =date("Y", strtotime($date2));
        if($year1 == $year2){
            if($month1 ==$month2){
                print $month1.' '.$day1.'–'.$day2.', '.$year1;
            }
            else{
                print $month1.' '.$day1.'–'.$month2.' '.$day2.', '.$year1;
            }
        }
        else{
            print $month1.' '.$day1.', '.$year1.'–'.$month2.' '.$day2.', '.$year2;
        }

    }

}
function we_get_video($iframe)
{
    if ($iframe):
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    echo $src;
    else: echo 'not found';
    endif;
}


// function Set up for custum pagination

function custom_pagination($numpages = '', $pagerange = '', $paged = '')
{
  if (empty($pagerange)) {
    $pagerange = 2;
  }
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if (!$numpages) {
      $numpages = 1;
    }
  }
  $pagination_args = array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => 'page/%#%/',
      'total' => $numpages,
      'current' => $paged,
      'show_all' => false,
      'end_size' => 1,
      'mid_size' => $pagerange,
      'prev_next' => True,
      'prev_text' => __('&lsaquo;'),
      'next_text' => __('&rsaquo;'),
      'type' => 'plain',
      'add_args' => false,
      'add_fragment' => ''
  );

  $paginate_links = paginate_links($pagination_args);
  if ($paginate_links) {
    echo "<div class='pagination text-center'>";
    echo '<div class="nav-links">';
    echo $paginate_links;
    echo "</div>";
    echo '</div>';
  }
}
