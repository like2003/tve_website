<?php

/**
 * 
 * This is a grid layout template for front-page
 * @package Swallow Blog
 * @since  Swallow Blog 1.0
 * 
 */
 
$option = get_option( 'swallow_blog' );

switch( isset( $option['number_of_posts'] ) ? $option['number_of_posts'] : 'layout/2col' ){
    case "two":
        get_template_part( 'layout/2col' );
        break;
    case "three":
        get_template_part( 'layout/3col' );
        break;
    case "four":
        get_template_part( 'layout/4col' );
        break;
    default:
        get_template_part( 'layout/2col' );
        break;
}
?>