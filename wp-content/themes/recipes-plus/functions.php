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





function create_recipe_cpt() {
    $labels = array(
        'name' => 'Рецепты',
        'singular_name' => 'Рецепт',
        'menu_name' => 'Рецепты',
        'add_new' => 'Добавить новый',
        'add_new_item' => 'Добавить новый рецепт',
        'edit' => 'Редактировать',
        'edit_item' => 'Редактировать рецепт',
        'new_item' => 'Новый рецепт',
        'view' => 'Просмотреть',
        'view_item' => 'Просмотреть рецепт',
        'search_items' => 'Искать рецепты',
        'not_found' => 'Рецепты не найдены',
        'not_found_in_trash' => 'Рецепты в корзине не найдены',
        'parent' => 'Родительский рецепт',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'recipes'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-carrot',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions'),
        'show_in_rest' => true, // Включение редактора Гутенберг
    );

    register_post_type('recipes', $args);
}

add_action('init', 'create_recipe_cpt');

// Включение миниатюр (thumbnails) для типа записи "Рецепты"
add_theme_support('post-thumbnails', array('recipes'));


function create_recipe_taxonomies() {
    // Регистрация таксономии для рубрик рецептов
    $category_labels = array(
        'name' => 'Рубрики рецептов',
        'singular_name' => 'Рубрика рецептов',
        'search_items' => 'Искать рубрики рецептов',
        'all_items' => 'Все рубрики рецептов',
        'parent_item' => 'Родительская рубрика рецептов',
        'parent_item_colon' => 'Родительская рубрика рецептов:',
        'edit_item' => 'Редактировать рубрику рецептов',
        'update_item' => 'Обновить рубрику рецептов',
        'add_new_item' => 'Добавить новую рубрику рецептов',
        'new_item_name' => 'Новое имя рубрики рецептов',
        'menu_name' => 'Рубрики рецептов',
    );

    $category_args = array(
        'labels' => $category_labels,
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'recipe-category'),
    );

    register_taxonomy('recipe_category', 'recipes', $category_args);

    // Регистрация таксономии для меток рецептов
    $tag_labels = array(
        'name' => 'Метки рецептов',
        'singular_name' => 'Метка рецептов',
        'search_items' => 'Искать метки рецептов',
        'all_items' => 'Все метки рецептов',
        'edit_item' => 'Редактировать метку рецептов',
        'update_item' => 'Обновить метку рецептов',
        'add_new_item' => 'Добавить новую метку рецептов',
        'new_item_name' => 'Новое имя метки рецептов',
        'menu_name' => 'Метки рецептов',
    );

    $tag_args = array(
        'labels' => $tag_labels,
        'hierarchical' => false,
        'public' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'recipe-tag'),
    );

    register_taxonomy('recipe_tag', 'recipes', $tag_args);
}

add_action('init', 'create_recipe_taxonomies');










// Функция для обработки AJAX запроса на поиск рецептов
function recipe_search_ajax_handler() {
    $search_query = sanitize_text_field($_POST['search_query']); // Получаем поисковой запрос из AJAX запроса
    
    $args = array(
        'post_type' => 'recipes',
        'post_status' => 'publish',
        's' => $search_query,
        'posts_per_page' => -1,
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) { 
        $count = $query->found_posts; ?> 

        <div class="search-result">
            <div class="container container_xl">
                <div class="search-result__header">
                    <h2 class="search-result__title">Поиск по запросу: <?php echo $search_query ?></h2>
                    <p class="search-result__find-count">Найдено рецептов: <?php echo $count ?></p>
                </div>
                <div class="search-result__list">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'large');
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        ?>
                            <a class="search-result-link" href="<?php echo get_permalink() ?>">
                                <?php if ($thumbnail) { ?>
                                    <div class="search-result-link__thumbnail"><?php echo $thumbnail ?></div>
                                <?php } ?>
                                <h3 class="search-result-link__title"><?php echo $title ?></h3>
                                <p class="search-result-link__excerpt"><?php echo $excerpt ?></p>
                            </a>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

    <?php } else {
        echo '<div class="search-result">Рецепты не найдены</div>';
    }
    
    die(); // Важно завершить выполнение после отправки результатов
}
add_action('wp_ajax_recipe_search', 'recipe_search_ajax_handler');
add_action('wp_ajax_nopriv_recipe_search', 'recipe_search_ajax_handler');

// Включение миниатюр (thumbnails) для типа записи "Рецепты"
add_theme_support('post-thumbnails', array('recipes'));

