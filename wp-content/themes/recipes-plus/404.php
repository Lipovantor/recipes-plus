<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
/**
* The template for displaying 404 pages (Not Found)
*
* @package WordPress
* @subpackage Custom Theme by NAME DEV
* @since V0.1
*
*/

function template_page_scripts()
{
  wp_enqueue_style('page-404', TT_DIST_CSS_URI . 'page-404.min.css');
}
add_action('wp_enqueue_scripts', 'template_page_scripts', 200);

get_header();
?>

TEST PAGE 404

<?php
get_footer();