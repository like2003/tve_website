<?php
/**
 * 
 * Swallow blog template tags
 * 
 * @package Swallow
 * @since Swallow blog 1.0
 */

if ( ! function_exists( 'the_swallow_post_title' ) ):
function the_swallow_post_title(){
    ?>
    <h2 class="traveler_blog_title_h2">
        <a href="<?php the_permalink(); ?>" data-hover="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php
}
endif;

if ( ! function_exists( 'the_swallow_post_meta' ) ):
function the_swallow_post_meta(){
    ?>
    <p class="post-meta"><span class="fa-stack-categories"> <i class="fa fa-pencil"></i></span> <?php esc_html_e( 'On','the-swallow' ); ?> <?php the_time('F jS, Y'); ?> <span class="line">|</span>  <span class="fa-stack-categories"><i class="fa fa-user"></i></span><?php esc_html_e( 'By', 'the-swallow');?>  <?php the_author_posts_link(); ?>
    <span class="line">|</span><i class="fa fa-comments"></i> <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'the-swallow' ), number_format_i18n( get_comments_number() ) ); ?></p>
    <?php
}
endif;

if ( ! function_exists( 'the_swallow_post_thumbnail' ) ):
function the_swallow_post_thumbnail($post){
    
    if( has_post_thumbnail()  && ! post_password_required() ): ?>
    <div class="img-containter">
    <?php 
	    $attr =  array(
		    'class' => "img-responsive tb-post-image",
		    'alt'   => get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )
	    );
	    the_post_thumbnail( 'large', $attr );
    ?> 
    </div>
    <?php endif; 
}
endif;

if ( ! function_exists( 'the_swallow_post_read_more' ) ):
function the_swallow_post_read_more(){
    ?>
    <a class="traveler_btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'the-swallow'); ?></a>
    <?php
}
endif;

if ( ! function_exists( 'the_swallow_home_head' ) ):
function the_swallow_home_head(){
    ?>
    <header class="intro-header" id="traveler_blog_front_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <?php $option = get_option( 'swallow_blog' ); ?>
                        <h1><?php echo isset( $option[ 'hero_text' ] ) ? esc_html( $option[ 'hero_text' ] ) : '' ?></h1>
                        <hr style="width:<?php echo the_swallow_blog_get_title_lenght( isset( $option['hero_text'] ) ? esc_html( $option['hero_text'] ) : 'aaaaaaa' ); ?>px">
                        <span class="subheading"><?php echo isset( $option[ 'hero_subtext' ] ) ? esc_html( $option[ 'hero_subtext' ] ) : '' ;?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
}
endif;

if ( ! function_exists( 'swallow_page_head' ) ):
function the_swallow_page_head(){
    ?>
        <header class="intro-header">
        <div class="container">
            <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading page-heading">
                        <h1><?php the_title( '' ); ?></h1>
                        <hr style="width:<?php
                        $site_title = the_title( '', '', false );
                        echo the_swallow_blog_get_title_lenght( $site_title ); 
                        ?>px">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
}
endif;

if ( ! function_exists( 'the_swallow_page_navigation' ) ):
function the_swallow_page_navigation(){
    ?>
   	<ul class="pager">
        <li class="previous">
            <?php previous_post_link('%link','<i class="fa fa-chevron-left"></i> ' . esc_html( __( 'Previous post', 'the-swallow') ) ); ?>
        </li>
        <li class="next">
            <?php next_post_link('%link', esc_html( __( 'Next post', 'the-swallow' ) ) . ' <i class="fa fa-chevron-right"></i>'  ); ?> 
        </li>  
    </ul>
    <?php
}
add_filter('wp_link_pages', 'the_swallow_page_navigation' );
endif;


if ( ! function_exists( 'the_swallow_post_slider' ) ):
function the_swallow_post_slider(){
    wp_reset_query();
    echo '<div class="row post_slider">';
    $args = array(
        'posts_per_page'   => 20,
    	'orderby'          => 'date',
    	'order'            => 'DESC',
    	'post_status'      => 'publish'
    );
    $posts_array = get_posts( $args ); 
  
    foreach ( $posts_array as $post ) {
        if ( has_post_thumbnail( $post->ID ) ) {
            
            echo '<div>' . '<a href="' . get_the_permalink($post->ID) . '">' . get_the_post_thumbnail( $post->ID, array(350,350), array( 'class' => "img-responsive", 'alt' => get_the_title( $post->ID ) ) ) . '<h5 class="slide_caption">' . get_the_title( $post->ID ) . '</h5></a></div>';
        }
    } 
    echo '</div>';
}
endif;

