<?php
/**
 * River functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package River
 */

if (! function_exists('river_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function river_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on River, use a find and replace
         * to change 'river' to the name of your theme in all the template files.
         */
        load_theme_textdomain('river', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu' => esc_html__('Menu', 'river'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('river_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'river_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function river_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('river_content_width', 640);
}
add_action('after_setup_theme', 'river_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function river_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'river'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'river'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
                ));
    register_sidebar(array(
            'name' => esc_html__('Footer_widget_subscribe'),
            'id' => 'footer_widget_tags',
            'before_title'  => '<P class="footer__widet--header">',
            'after_title'   => '</P>',
        ));
    register_sidebar(array(
            'name' => esc_html__('Footer_widget_category'),
            'id' => 'footer_widget_category',
            'before_title'  => '<P class="footer__widet--header">',
            'after_title'   => '</P>',
                ));
}
add_action('widgets_init', 'river_widgets_init');




/**
 * Enqueue scripts and styles.
 */
function river_scripts()
{
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

    // wp_enqueue_script('river-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    // wp_enqueue_script('river-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    // if (is_singular() && comments_open() && get_option('thread_comments')) {
    //     wp_enqueue_script('comment-reply');
    // }
}
add_action('wp_enqueue_scripts', 'river_scripts');


/** Enable to check whether new post or not **/
function is_first()
{
    global $wp_query;
    return ($wp_query->current_post === 0);
}

/* pageNation
$paged: current page
$pages: all pages
$range: how many pages to left and right
*/
function the_pagination()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    echo '<div class="pagination">';
    echo paginate_links(array(
        'base'         => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        'format'       => '',
        'current'      => max(1, get_query_var('paged')),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => 'Prev',
        'next_text'    => 'Next',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
    ));
    echo '</div>';
}

/* custom post type */
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type('gallery', [
        'labels' => [
            'name'          => 'Gallery', // name of post type on dashboard
            'singular_name' => 'gallery',    // symbol name of post type
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'show_in_rest'  => true,  // abale to use Gutenberg
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt'
        ]
    ]);
}

/* get <h2> tag inside of content */
function get_h2()
{
    global $post;
    preg_match_all('/<h[1-6]>.+<\/h[1-6]>/u', $post->post_content, $matches);
    $matches_count = count($matches[0]);

    if (empty($matches)) {
        echo ' '; //doesn't have h2
    } else {
        for ($i = 0; $i < $matches_count; $i++) {
            echo  $matches[0][$i];
        }
    }
}

/* get <p> tag inside of content */
function get_p()
{
    global $post;
    preg_match_all('/<p>.+<\/p>/u', $post->post_content, $matches);
    $matches_count = count($matches[0]);

    if (empty($matches)) {
        echo ' '; //doesn't have p
    } else {
        for ($i = 0; $i < $matches_count; $i++) {
            echo  $matches[0][$i];
        }
    }
}
