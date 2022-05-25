<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kount
 */

get_header();
?>
<?php get_template_part('templates/page-content');
//Show JSON structured data if it exists
if(get_field("enter_json_data", get_the_ID()) != "") {
    //Remove opening and closing <p></p> tags that WordPress automatically injects
    print trim(preg_replace('#^<p>|</p>$#i', '', trim(get_field("enter_json_data", get_the_ID()))));
}
?>

<?php
get_footer();
?>
