<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
get_header(); ?>

	<header class="intro-header">
        <div class="container">
            <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php esc_html_e( '404 Not Found', 'the-swallow' ) ; ?></h1>
                        <hr style="width:<?php
                        echo the_swallow_blog_get_title_lenght( esc_html__( '404 Not Found', 'the-swallow' )  ); 
                        ?>px">
                    </div>
                </div>
            </div>
        </div>
    </header>
    
	<div class="container">
		<div class="row">
		    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
    
    			<div class="page-wrapper">
    				<div class="page-content">
    					<h2><?php esc_html_e( 'This is somewhat embarrassing, isn\'t it?', 'the-swallow' ); ?></h2>
    					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'the-swallow' ); ?></p>
        				<div class="col-md-4 col-md-offset-4">
        				    <div id="not_found"><?php get_search_form(); ?></div>
        				</div>
    				</div>
    			</div>
		    </div>
        </div>
    </div>
    
<?php get_footer(); ?>