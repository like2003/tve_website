<?php
/**
 * EasyWP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EasyWP
 */

define( 'EASYWP_PROURL', 'https://themesdna.com/easywp-pro-wordpress-theme/' );
define( 'EASYWP_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'EASYWP_THEMEOPTIONSDIR', get_template_directory() . '/admin' );
require_once( EASYWP_THEMEOPTIONSDIR . '/customizer.php' );

if ( ! isset( $content_width ) ) {
    $content_width = 640;
}

function easywp_get_option($option) {
    $easywp_options = get_option('easywp_options');
    if ((is_array($easywp_options)) && (array_key_exists($option, $easywp_options))) {
        return $easywp_options[$option];
    }
    else {
        return '';
    }
}

if ( ! function_exists( 'easywp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function easywp_setup() {
    
    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on EasyWP, use a find and replace
     * to change 'easywp' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'easywp', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'easywp-featured-image',  640, 300, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => __('Primary Menu', 'easywp')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'easywp_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => '333333',
    'width'                  => 1146,
    'height'                 => 250,
    'flex-height'            => true,
        'wp-head-callback'       => 'easywp_header_style',
        'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'eeeeee',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'easywp_custom_background_args', $background_args) );
    
    // Support for Custom Editor Style
    add_editor_style( 'css/editor-style.css' );

}
endif;
add_action( 'after_setup_theme', 'easywp_setup' );

/**
 * Enqueue scripts and styles.
 */
function easywp_scripts() {
    wp_enqueue_style('easywp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('easywp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700&amp;subset=latin-ext', array(), NULL);

    wp_enqueue_script('fitvids', get_template_directory_uri() .'/js/jquery.fitvids.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('resizesensor', get_template_directory_uri() .'/js/ResizeSensor.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/js/theia-sticky-sidebar.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('easywp-customjs', get_template_directory_uri() .'/js/custom.js', array( 'jquery' ), NULL, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'easywp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function easywp_ie_scripts() {
    wp_enqueue_script( 'easywp-html5shiv', get_template_directory_uri(). '/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'easywp-html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'easywp-respond', get_template_directory_uri(). '/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'easywp-respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'easywp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function easywp_enqueue_customizer_styles() {
    wp_enqueue_style( 'easywp-customizer-styles', get_template_directory_uri() . '/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome-customizer', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'easywp_enqueue_customizer_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function easywp_widgets_init() {

register_sidebar(array(
    'id' => 'easywp-header-banner',
    'name' => __( 'Header Banner', 'easywp' ),
    'description' => __( 'This sidebar is located on the header of the web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-left-sidebar',
    'name' => __( 'Left Sidebar', 'easywp' ),
    'description' => __( 'This sidebar is located on the left-hand side of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-right-sidebar',
    'name' => __( 'Right Sidebar', 'easywp' ),
    'description' => __( 'This sidebar is located on the right-hand side of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-1',
    'name' => __( 'Footer 1', 'easywp' ),
    'description' => __( 'This sidebar is located on the left bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-2',
    'name' => __( 'Footer 2', 'easywp' ),
    'description' => __( 'This sidebar is located on the middle bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-3',
    'name' => __( 'Footer 3', 'easywp' ),
    'description' => __( 'This sidebar is located on the middle bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'easywp-footer-4',
    'name' => __( 'Footer 4', 'easywp' ),
    'description' => __( 'This sidebar is located on the right bottom of web page.', 'easywp' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'));

}
add_action( 'widgets_init', 'easywp_widgets_init' );

// Get custom-logo URL
function easywp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $easywp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $easywp_logo = wp_get_attachment_image_src( $easywp_custom_logo_id , 'full' );
    return $easywp_logo[0];
}

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function easywp_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'easywp_page_menu_args' );

// Category ids in post class
function easywp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category)
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
            return $classes;
}
add_filter('post_class', 'easywp_category_id_class');

// Change excerpt length
function easywp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    return 45;
}
add_filter('excerpt_length', 'easywp_excerpt_length');

// Change excerpt more word
function easywp_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       global $post;
       $readmoretext = __( 'Continue Reading...', 'easywp' );
        if ( easywp_get_option('read_more_text') ) {
                $readmoretext = easywp_get_option('read_more_text');
        }
       return '...<div class="easywp-readmore"><a class="read-more-link" href="'. esc_url( get_permalink($post->ID) ) . '">'.esc_html($readmoretext).'<span class="screen-reader-text">  '.get_the_title().'</span></a></div>';
}
add_filter('excerpt_more', 'easywp_excerpt_more');

// Adds custom classes to the array of body classes.
function easywp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }     
    if ( is_page_template( 'template-full-width.php' ) || is_404() ) {
        $classes[] = 'easywp-body-full-width';
    }     
    return $classes;
}
add_filter( 'body_class', 'easywp_body_classes' );

/**
 * Other theme functions
 */
require get_template_directory() . '/admin/template-tags.php';
require_once get_template_directory() . '/admin/custom.php';
?>