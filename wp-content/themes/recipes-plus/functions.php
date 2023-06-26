<?php
if (!defined('ABSPATH')) {
    exit;
}
$current_user = wp_get_current_user();
define('TT_IS_ADMINISTRATOR', in_array('administrator', $current_user->roles));



define('TT_THEME_URI', get_stylesheet_directory_uri());

// URI to theme folder
define('TEST_THEME_URI', get_stylesheet_directory_uri() . '/');
// URI to css folder
define('TEST_CSS_URI', TEST_THEME_URI . 'css/');
define('TEST_CSS_PAGES_URI', TEST_THEME_URI . 'css/pages/');
// URI to assets folder
define('TEST_ASSETS_URI', TEST_THEME_URI . 'assets/');
// URI to js forlder
define('TEST_JS_URI', TEST_THEME_URI . 'js/');
define('TEST_JS_PAGES_URI', TEST_THEME_URI . 'js/pages/');
// URI to image forlder
define('TEST_IMG_URI', TEST_THEME_URI . 'src/img/');

// URI to templates
define('TEST_TEMPLATES_URI', TEST_THEME_URI . 'template-parts/');


define('TT_DIST_URI', TEST_THEME_URI . 'dist/');
define('TT_DIST_JS_URI', TT_DIST_URI . 'js/');
define('TT_DIST_CSS_URI', TT_DIST_URI . 'css/'); // URI to css folder
define('TT_DIST_IMG_URI', TT_DIST_URI . 'img/'); // URI to css folder
define('TT_ICONS_URI', TT_DIST_URI . 'img/icons/');

// Path to theme
define('TEST_THEME_PATH', get_stylesheet_directory() . '/');


// Path to image forlder
define('TT_DIST_PATH', TEST_THEME_PATH . 'dist/');
define('TEST_IMG_PATH', TEST_THEME_PATH . 'img/');
// Path to icons forlder
define('TEST_ICONS_PATH', TT_DIST_PATH . 'img/icons/');


// Path to inc forlder
define('TEST_INC_PATH', TEST_THEME_PATH . 'inc/');
// Path to templates
define('TEST_TEMPLATES_DIR', '/template-parts/');



add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('jquery', TT_DIST_JS_URI . 'jquery.min.js', null, 1);
    wp_enqueue_script('general', TT_DIST_JS_URI . 'general.min.js', 'jquery', null, 1);
    
    wp_enqueue_style('general', TT_DIST_CSS_URI .'general.min.css');
},200);