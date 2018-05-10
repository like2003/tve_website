<?php
/**
 * 
 * Swallow blog customizer settings
 * 
 * @package Swallow
 * @since Swallow blog 1.0
 * 
 */
 

function the_swallow_blog_customizer_setup( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'the_swallow_blog_customizer_setup' );


if ( class_exists( 'Kirki' ) ) {
    
    function the_swallow_blog_kirki_configuration( $config ) {
        $config['logo_image']   = get_stylesheet_directory_uri() . '/images/swallow.png';
        $config['color_accent'] = '#00bcd4';
        $config['color_back']   = '#666';
        $config['width']        = '20%';
        
        return $config;
    
    }
    add_filter( 'kirki/config', 'the_swallow_blog_kirki_configuration' );
    
    Kirki::add_config( 'swallow_blog', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'option',
        'option_name'   => 'swallow_blog',
    ) ); 
   
        
    Kirki::add_section('social_links', array(
        'title'       => esc_html__( 'Social Links', 'the-swallow' ),
        'panel'		  => 'general',
        'description' => esc_html__( 'Add social links in the footer', 'the-swallow' )        
    ) );
    
    Kirki::add_section('footer_section', array(
        'priority'    => 40,
        'title'       => esc_html__( 'Footer', 'the-swallow'),
        'description' => esc_html__( 'Controls the footer settings for the theme.', 'the-swallow' )        
    ) );
    
    kirki::add_section( 'header', array(
        'priority'    => 30,
        'title'       => esc_html__( 'Header', 'the-swallow'),
        'description' => esc_html__('Edit header design', 'the-swallow' )
    ) );
    
    kirki::add_section( 'main_section', array(
        'title'       => esc_html__( 'Main settings', 'the-swallow'),
        'panel'		  => 'general',
        'description' => esc_html__( 'Edit main page elements', 'the-swallow')
    ) );
    
    kirki::add_panel( 'general', array(
        'priority'    => 10,
        'title'       => esc_html__( 'General Settings', 'the-swallow' ),
        'description' => esc_html__( 'Controls general features of the theme.', 'the-swallow' )
    ) );
    
    kirki::add_section( 'favicon_background_img', array(
        'title'       => esc_html__( 'Header background image', 'the-swallow' ),
        'priority'    => 20
    ) );

    kirki::add_section( 'blog', array(
      'priority'    => 50,
      'title'       => esc_html__( 'Blog', 'the-swallow' ),
      'description' => esc_html__( 'Controls the blog settings for the theme.', 'the-swallow' ),
    ) ); 
    
    kirki::add_panel( 'widgets', array(
        'priority'    => 60,
        'title'       => esc_html__( 'Widgets', 'the-swallow' ),
        'description' => esc_html__( 'Controls widgets features of the theme.', 'the-swallow' )
    ) );
    
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'select',
        'settings'    => 'footer_slider',
        'label'       => esc_html__( 'Footer slider option', 'the-swallow' ),
        'description' => esc_html__( 'Select the footer post slider or instagram feed or no content at all. ** For the instagram feed you have to register your account in the instagram feed plugin located in your admin panel! **', 'the-swallow' ),
        'section'     => 'footer_section',
        'default'     => 'no',
        'priority'    => 10,
        'choices'     => array(
            'noslide' => esc_html( __( 'No slider/ No Instagram', 'the-swallow' ) ),
            'slider' => esc_html( __( 'Post slider', 'the-swallow' ) ),
            'instafeed' => esc_html( __( 'Instagram feed', 'the-swallow' ) )
        ),
    ));
        
  
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'slider',
        'section'     => 'header',
        'settings'    => 'hero_text_size',
        'label'       => esc_html__( 'Set the hero text size', 'the-swallow' ),
        'default'     => 60,
        'priority'    => 20,
        'choices'     => array(
                'min'  => 30,
                'max'  => 90,
                'step' => 2
            ),
        'output'      => array(
            array(
                'element'  => '.site-heading > h1',
                'property' => 'font-size',
                'units'    => 'px',
                ),
            )
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'settings'    => 'subhero_text_size',
        'type'        => 'slider',
        'section'     => 'header',
        'label'       => esc_html__( 'Set the subtitle text size', 'the-swallow' ),
        'default'     => 20,
        'priority'    => 60,
        'choices'     => array(
                'min'  => 12,
                'max'  => 60,
                'step' => 2
            ),
        'output' => array(
            array(
                'element'  => '.subheading',
                'property' => 'font-size',
                'units'    => 'px',
            )
        )
    ) );
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'color',
        'settings'    => 'hero_hr_color',
        'label'       => esc_html__( 'Change color', 'the-swallow' ),
        'description' => esc_html__( 'Change hero area and navbar line color ', 'the-swallow' ),
        'section'     => 'header',
        'default'     => '#fafbfd',
        'priority'    => 99,
        'output' => array(
            array(
                'element'  => '.site-heading hr',
                'property' => 'border-color',
            ),
            array(
                'element'  => '.navbar-custom.is-fixed',
                'property' => 'border-color',
            ),
            array(
                'element'  => '.navbar-default',
                'property' => 'border-color',
            ),
            array(
                'element'  => '.navbar-custom.is-fixed .nav li a::after',
                'property' => 'background-color',
            ),
            array(
                'element'  => '.navbar-custom .nav li a::after',
                'property' => 'background-color'
                ),
            array(
                'element'  => '.navbar-custom .navbar-brand::after',
                'property' => 'background-color'                
                )
        )
        ));

    kirki::add_field( 'swallow_blog', array(
        'type'        => 'color',
        'settings'    => 'hero_text_color',
        'label'       => esc_html__( 'Change color', 'the-swallow' ),
        'description' => esc_html__( 'Change hero area text color ', 'the-swallow' ),
        'section'     => 'header',
        'default'     => '#fff',
        'priority'    => 40,
        'output'      => array(
             array(
                'element'  => '.intro-header .site-heading h1, .intro-header',
                'property' => 'color',
            ),
            )
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'color',
        'settings'    => 'hero_subtext_color',
        'label'       => esc_html__( 'Change color', 'the-swallow' ),
        'description' => esc_html__( 'Change hero area subtext color ', 'the-swallow' ),
        'section'     => 'header',
        'default'     => '#fff',
        'priority'    => 80,
        'output'     => array(
            array(
                'element'  => '.subheading',
                'property' => 'color'
                )
            )
        ));
      
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'slider',
        'section'     => 'main_section',
        'settings'    => 'body_font_size',
        'label'       => esc_html__( 'Change font size for paragraphs', 'the-swallow' ),
        'help'        => esc_html__( 'Select the text font size', 'the-swallow' ),
        'default'     => 14,
        'priority'    => 20,
        'choices'     => array(
            'min'  => 10,
            'max'  => 20,
            'step' => 1,
        ),
        'output'     => array(
            array(
                'element'  => 'p',
                'property' => 'font-size',
                'units'    => 'px'
                )
            )
    ));

    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'twitter',
        'label'       => esc_html__( 'Twitter:', 'the-swallow' ),
        'description' => esc_html__( 'Enter your Twitter account', 'the-swallow' ),
        'section'     => 'social_links',
        'priority'    => 10,
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'facebook',
        'label'       => esc_html__( 'Facebook:', 'the-swallow' ),
        'description' => esc_html__( 'Enter your Facebook account', 'the-swallow' ),
        'section'     => 'social_links',
        'priority'    => 20,
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'tumblr',
        'label'       => esc_html__( 'Tumblr:', 'the-swallow' ),
        'description' => esc_html__( 'Enter your Tumblr account', 'the-swallow' ),
        'section'     => 'social_links',
        'priority'    => 30,
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'youtube',
        'label'       => esc_html__( 'Youtube:', 'the-swallow' ),
        'description' => esc_html__( 'Enter your Youtube account', 'the-swallow' ),
        'section'     => 'social_links',
        'priority'    => 40,
        ));

    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'instagram',
        'label'       => esc_html__( 'Instagram:', 'the-swallow' ),
        'description' => esc_html__( 'Enter your Instagram account', 'the-swallow' ),
        'section'     => 'social_links',
        'priority'    => 10,
        ));
    
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'image',
        'settings'    => 'background_img',
        'label'       => esc_html__( 'Add background image', 'the-swallow' ),
        'description' => esc_html__( 'Add a background image here.', 'the-swallow'),
        'section'     => 'favicon_background_img',
        'priority'    => 10,
        ));    
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'select',
        'section'     => 'blog',
        'settings'    => 'front_page_layout',
        'default'     => 'stand',
        'label'       => esc_html__( 'Change front page layout', 'the-swallow' ),
        'help'        => esc_html__( 'Change front page layout', 'the-swallow' ),
        'priority'    => 30,
        'choices'     => array(
            'grid'  => esc_html__( 'Grid layout', 'the-swallow' ),
            'stand' => esc_html__( 'Standard layout', 'the-swallow' ),
            'list'  => esc_html__( 'List layout', 'the-swallow' )
            )
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'select',
        'section'     => 'blog',
        'settings'    => 'number_of_posts',
        'label'       => esc_html__( 'Layout configuration', 'the-swallow' ),
        'description' => esc_html__( 'Set the number of columns that the layout will display *** set page layout to grid first ***', 'the-swallow' ),
        'help'        => esc_html__( 'Change front page layout', 'the-swallow' ),
        'priority'    => 40,
        'choices'     => array(
            'two'  => esc_html( __( 'Two columns', 'the-swallow' ) ),
            'three'  => esc_html( __( 'Three columns', 'the-swallow' ) ), 
            'four'  => esc_html( __( 'Four columns', 'the-swallow' ) ), 
            )
        ));
    
    
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'slider',
        'section'     => 'favicon_background_img',
        'settings'    => 'img-blur',
        'label'       => esc_html__( 'This is the range control of background image blur.', 'the-swallow' ),
        'help'        => esc_html__( 'Slide to change the background image blur', 'the-swallow' ),
        'default'     => 0,
        'priority'    => 30,
        'choices'     => array(
		    'min'   => 0,
            'max'   => 100,
            'step'  => 1,
            )
    ));
        
    
    kirki::add_field( 'swallow_blog', array(
        'type'       => 'select',
        'settings'   => 'font_family_p',
        'label'      => esc_html__( 'Change paragraphs font family', 'the-swallow' ),
        'help'       => esc_html__( 'This will change the post paragraps, sidebar paragraphs', 'the-swallow' ),
        'section'    => 'main_section',
        'default'    => 'OpenSans',
        'priority'   => 10,
        'choices'    => Kirki_Fonts::get_font_choices(),
        'output'     => array(
            array(
                'element'  => 'p',
                'property' => 'font-family',
            ), 
            array(
                'element'  => '.tagcloud',
                'property' => 'font-family',
                ),
            array(
                'element'  => '.input-group',
                'property' => 'font-family'
                ),
            array(
                'element'  => '.rec-post-a',
                'property' => 'font-family',
                ),
            array(
                'element'  => '.recentcomments',
                'property' => 'font-family',
                ),
            ),
        ));
    
    kirki::add_field( 'swallow_blog', array(
        'type'       => 'select',
        'settings'   => 'font_family_tl',
        'label'      => esc_html__( 'Change titles/links font family', 'the-swallow' ),
        'section'    => 'main_section',
        'default'    => 'OpenSans',
        'priority'   => 20,
        'choices'    => Kirki_Fonts::get_font_choices(),
        'output'     => array(
            array(
                'element'  => 'a',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.slide_caption',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.post-categories',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.traveler_blog_title_h2',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.traveler_btn',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.details-color',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '#wp-calendar',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.navbar',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '#comments-sum',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.url',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.comment-reply-link',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            array(
                'element'  => '.comment-reply-title',
                'property' => 'font-family',
                'units'    => '!important',
                ),
            ),
        ));

        Kirki::add_field( 'swallow_blog', array(
            'type'        => 'color',
            'settings'    => 'color_details',
            'label'       => esc_html( __( 'Set the details color', 'the-swallow' ) ),
            'section'     => 'main_section',
            'default'     => '#b86322',
            'priority'    => 90,
            'output' => array(
                array(
                    'element'  => 'a:hover, .widget ul li a:hover, a:focus, #reply-title, .comment-edit-link:hover, #comments-sum:hover, .comment-reply-link:hover, .post-categories li a:hover, .rec-post-a:hover, .slide_caption:hover, .traveler_blog_title_h4 a:hover',
                    'property' => 'color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.traveler_blog_title_h2 a:hover, .pagination .current, .pagination:hover',
                    'property' => 'color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.post-meta, .post-meta span, .post-meta a',
                    'property' => 'color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.traveler_btn',
                    'property' => 'color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '#wp-calendar td',
                    'property' => 'color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '#searchsubmit, .tagcloud a, #commentform .submit',
                    'property' => 'background-color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.tagcloud a',
                    'property' => 'border-color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.tagcloud a:hover',
                    'property' => 'background-color',
                    'units'    => '!important',
                    ),
                array(
                    'element'  => '.tagcloud a:hover',
                    'property' => 'border-color',
                    'units'    => '!important',
                    ),
                ),
        ) );


    kirki::add_field( 'swallow_blog', array(
        'type'       => 'select',
        'settings'   => 'font_family_h',
        'label'      => esc_html__( 'Change page title font family', 'the-swallow' ),
        'section'    => 'header',
        'default'    => 'OpenSans',
        'priority'   => 30,
        'choices'    => Kirki_Fonts::get_font_choices(),
        'output'     => array( 
            array(
                'element'  => '.site-heading>h1',
                'property' => 'font-family',
                ),
            )
        ));
    
    kirki::add_field( 'swallow_blog', array(
        'type'       => 'select',
        'settings'   => 'font_family_sub',
        'label'      => esc_html__( 'Change subtitle font family', 'the-swallow' ),
        'section'    => 'header',
        'default'    => 'Antic Slab',
        'priority'   => 70,
        'choices'    => Kirki_Fonts::get_font_choices(),
        'output'     => array( 
            array(
                'element'  => '.intro-header .site-heading .subheading, .intro-header .page-heading .subheading',
                'property' => 'font-family',
                ),
            )
        ));
    
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'select',
        'section'     => 'blog',
        'settings'    => 'blog_layout',
        'label'       => esc_html__( 'Set sidebar position', 'the-swallow' ),
        'help'        => esc_html__( 'Select one layout', 'the-swallow' ),
        'default'     => 'blog_layout[full_width]',
        'priority'    => 10,
        'choices'     => array(
            'blog_layout[full_width]' => esc_html( __( 'Full Width', 'the-swallow' ) ),
            'blog_layout[left_sidebar]' => esc_html( __( 'Left sidebar', 'the-swallow' ) ),
            'blog_layout[right_sidebar]' => esc_html( __( 'Right sidebar', 'the-swallow' ) )
            )
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'select',
        'section'     => 'blog',
        'settings'    => 'single_layout',
        'label'       => esc_html__( 'Change sidebar position for single post', 'the-swallow' ),
        'help'        => esc_html__( 'Select one layout', 'the-swallow' ),
        'default'     => 'single_layout[full_width]',
        'priority'    => 20,
        'choices'     => array(
            'single_layout[full_width]' =>  esc_html__( 'Full Width', 'the-swallow' ),
            'single_layout[left_sidebar]' => esc_html__( 'Left sidebar','the-swallow' ),
            'single_layout[right_sidebar]' => esc_html__( 'Right sidebar', 'the-swallow' ),
            )
        ));
        
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'hero_text',
        'label'       => esc_html__( 'Set Hero area text', 'the-swallow' ),
        'section'     => 'header',
        'priority'    => 10,
        ));
    
    kirki::add_field( 'swallow_blog', array(
        'type'        => 'text',
        'settings'    => 'hero_subtext',
        'label'       => esc_html__( 'Set Hero area subtext', 'the-swallow' ),
        'section'     => 'header',
        'priority'    => 50,
        ));
        
        Kirki::add_field( 'swallow_blog', array(
            'type'        => 'code',
            'settings'    => 'code_css',
            'label'       => __( 'Custom CSS', 'the-swallow' ),
            'section'     => 'main_section',
            'default'     => '',
            'priority'    => 999,
            'choices'     => array(
                'language' => 'css',
                'theme'    => 'monokai',
                'height'   => 250,
            ),
        ) );

}

include_once( get_template_directory() . '/ini/swallow-css-gen.php' );