<?php
/**
 * 
 * Template Name: Left Sidebar Page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
 
get_header(); ?>

	<?php echo ( is_front_page() ) ? the_swallow_home_head() : the_swallow_page_head(); ?>
	<div class="container swallow-page">
		<div class="row">
		    <?php get_sidebar( 'page-sidebar' );  ?>
            <div class="col-md-8">
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    
		    <div class="post-preview">
				<p class="post-description"><?php the_content(); ?></p>
            </div>
   

		    <?php endwhile; endif;?>
		    <?php	
		    if ( comments_open() || get_comments_number() ){
				comments_template();
			}?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>