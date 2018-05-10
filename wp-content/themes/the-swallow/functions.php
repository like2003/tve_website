<?php
/**
 * Swallow Blog functions and definitions
 *
 * @package Swallow Blog
 * @since 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/ini/back-compat.php';
}
if( ! function_exists( 'the_swallow_blog_setup' ) ):
  
function the_swallow_blog_setup() {
	load_theme_textdomain( 'the-swallow', get_template_directory() . '/languages' );

    add_theme_support( "title-tag" );
	add_theme_support( 'custom-logo', array(
	   'height'      => 60,
	   'width'       => 300,
	   'flex-width' => true,
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
  		'comment-form',
  		'comment-list',
  		'gallery',
  		'caption',
  	) );
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio'
	) );
	
  	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'the-swallow' ),
		'secondary' => esc_html__( 'Secondary Menu', 'the-swallow' ),
	) );
	
	// Loads WP_nav_walker class
	include_once( get_template_directory() . '/ini/wp_bootstrap_nav_walker.php' );
	// Require TGM plugin activation
	include_once( get_template_directory() . '/ini/class-tgm-plugin-activation.php' );
	// Loads the customizer settings
	include_once( get_template_directory() . '/ini/swallow-customizer.php' );
	// Loads custom widgets
	include_once( get_template_directory() . '/ini/customize-widgets.php' );
	// Loads custom tags
	include_once( get_template_directory() . '/ini/template-tags.php' );

}
endif;
add_action( 'after_setup_theme', 'the_swallow_blog_setup' );

/**
 *  Enqueue scripts and styles
 */
 
function the_swallow_blog_scripts() {
	
	wp_enqueue_style( 'the-swallow-style', get_stylesheet_uri(), array( 'bootstrap', 'slick-theme' ) );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'the-swallow-script', get_template_directory_uri() . '/js/swallow-blog.js', array('jquery', 'bootstrap',  'hoverIntent'), '', true );

}

add_action( 'wp_enqueue_scripts', 'the_swallow_blog_scripts' );

/**
 *  Enqueue vendor scripts and styles
 */
function the_swallow_blog_enqueue_vendor_scripts(){
	
	wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/vendor/hoverIntent/jquery.hoverIntent.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/vendor/slick-1.5.7/slick/slick.js', array('jquery'), '', true );
	
	wp_enqueue_style( 'slick-style', get_template_directory_uri(). '/vendor/slick-1.5.7/slick/slick.css');
	
	wp_enqueue_style( 'slick-theme', get_template_directory_uri(). '/vendor/slick-1.5.7/slick/slick-theme.css', array('slick-style'));

	wp_enqueue_script( 'html5', get_template_directory_uri() . '/ini/js/html5shiv.js', array(), '', false );
	
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/ini/js/respond.js', array(), '', false );
	
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	
	$translation_array = array(
    'prevs' => esc_html__( 'Prev', 'the-swallow' ),
    'nexts' => esc_html__( 'Next', 'the-swallow' )
	);
	wp_localize_script( 'slick-script', 'the_swallow_loc', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'the_swallow_blog_enqueue_vendor_scripts' );

/**
 * Enqueue Google Fonts.
 */
function the_swallow_blog_enqueue_google_font() {

	$query_args = array(
	 'family' => 'Open+Sans:400,300,400italic,300italic,700'
	 );
	
	 wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	 wp_enqueue_style( 'google-fonts' );

}
add_action( 'wp_enqueue_scripts', 'the_swallow_blog_enqueue_google_font' );

/**
 * Register widget area.
 */
function the_swallow_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'the-swallow' ),
		'id'            =>  'page-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in page sidebar.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'the-swallow' ),
		'id'            =>  'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in blog sidebar.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area One', 'the-swallow' ),
		'id'            =>  'footer-one',
		'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Two', 'the-swallow' ),
		'id'            =>  'footer-two',
		'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Three', 'the-swallow' ),
		'id'            =>  'footer-three',
		'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Four', 'the-swallow' ),
		'id'            =>  'footer-four',
		'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'the-swallow' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
}

add_action( 'widgets_init', 'the_swallow_blog_widgets_init' );

// Adds commentr-reply js script to wp_head
function the_swallow_blog_queue_comment_reply_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('wp_head', 'the_swallow_blog_queue_comment_reply_js');

/**
 * Change the default excerpt 
 */
function the_swallow_blog_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'the_swallow_blog_new_excerpt_more');

/**
 * Change the default Recent Post widget
 */
add_action( 'widgets_init', function(){
     register_widget( 'The_Swallow_blog_Widget_Recent_Posts' );
});

/**
 * Generate the length of sub heading line
 */
function the_swallow_blog_get_title_lenght( $page_heading_text ){
	
	$lenght = strlen( $page_heading_text );
	if( $lenght > 24 ){
		return 24 * 26 + 60;
	}else{
		return $lenght * 26 + 60;
	}
	
}

/**
 * Enable pagination
 */
function the_swallow_blog_pagination()
{  
	?>
    	<div class='pagination'>
      		<?php echo paginate_links(); ?>
    	</div>
	<?php
}

/**
 * 
 * TGM plugin activation 
 * 
 */
 
add_action( 'tgmpa_register', 'the_swallow_register_required_plugins' );

function the_swallow_register_required_plugins(){
	
	$plugins = array(
		array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,			
			),
		array(
			'name'      => 'Instagram Feed',
			'slug'      => 'instagram-feed',
			'required'  => false,			
			),
		);
		
		$config = array(
		'domain'	=> 'the-swallow',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => esc_html__( 'Install Required Plugins', 'the-swallow' ),
	        'menu_title'                      => esc_html__( 'Install Plugins', 'the-swallow' ),
	        'installing'                      => esc_html__( 'Installing Plugin: %s', 'the-swallow' ),
	        'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'the-swallow' ),
	        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'the-swallow' ),
	        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'the-swallow' ),
	        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'the-swallow' ),
	        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'the-swallow' ),
	        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'the-swallow' ),
	        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'the-swallow' ),
	        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'the-swallow' ),
	        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'the-swallow' ),
	        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'the-swallow' ),
	        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'the-swallow' ),
	        'return'                          => esc_html__( 'Return to Required Plugins Installer', 'the-swallow' ),
	        'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'the-swallow' ),
	        'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'the-swallow' ),
	        'nag_type'                        => 'updated'
	    )                  
		);
		tgmpa( $plugins, $config );
}


?>