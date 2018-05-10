<?php

/**
 * 
 * These file generate the css and js from the customizer
 * 
 * @subpackage Swallow
 * @since Swallow blog 1.0
 * 
 */


    

/**
 * Prints a logo on the frontend based on which functionality is active
 * @return void
 */
function the_swallow_blog_render_logo() {
	$logo = get_option( 'swallow_blog', array( 'logo' => array( 'url' => false ) ) );
    if( $logo){
	printf( 'url("%s")', esc_html( $logo['background_img'] ));
    }
}


function the_swallow_custom_stylesheet(){
  $option = get_option('swallow_blog');
  ?>
  <style type="text/css">
  .background-image{ 
    background-image: <?php echo esc_html( the_swallow_blog_render_logo());  ?>;
    -webkit-filter: blur(<?php echo esc_html( $option[ 'img-blur' ] ); ?>px); 
    -moz-filter: blur(<?php echo esc_html( $option[ 'img-blur' ] ); ?>px); 
    -o-filter: blur(<?php echo esc_html( $option[ 'img-blur' ] ); ?>px);
    -ms-filter: blur(<?php echo esc_html( $option[ 'img-blur' ] ); ?>px);
    filter: blur(<?php echo esc_html( $option[ 'img-blur' ] ); ?>px);}
  <?php
  $option = get_option('swallow_blog');
  echo esc_html( $option['code_css'] );
  ?>
  </style>
  <?php
  
}
add_action( 'wp_head', 'the_swallow_custom_stylesheet');

