<?php
/**
 * 
 * The template for displaying the page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
 
get_header(); ?>

	<?php echo ( is_front_page() ) ? the_swallow_home_head() : the_swallow_page_head(); ?>
	<div class="container swallow-page">
		<div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    
		    <div class="post-preview">
				<p class="post-description"><?php the_content(); ?></p>
            </div>
   

			<?php endwhile; endif;?>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		    <?php	
		    if ( comments_open() || get_comments_number() ){
				comments_template();
			}?>
        	</div>
        </div>
    </div>
    
<?php get_footer(); ?>