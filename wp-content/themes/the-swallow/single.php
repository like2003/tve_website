<?php
/**
 * 
 * The template for displaying the blog home page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
$option = get_option( 'swallow_blog' ); 
$position = $option[ 'single_layout' ] ? $option[ 'single_layout' ] : 'single_layout[full_width]'; 
get_header(); ?>
<?php echo the_swallow_page_head(); ?>
    <div class="container post-preview-container">
        <div id="post-<?php the_ID(); ?>" <?php post_class( "row" ); ?>>
        	<?php if( $position == 'single_layout[left_sidebar]' ): ?>
        	    <?php get_sidebar( 'blog' );  ?>
        	<?php endif; ?>
            <?php if( $position == 'single_layout[full_width]' ): ?>
        	    <div class="col-lg-8 col-lg-offset-2">
        	<?php else: ?>
        	    <div class="col-md-8">
        	<?php endif; ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="category_list_meta <?php echo ($position === 'single_layout[full_width]' ) ? 'text-center' : ''; ?>"><?php echo get_the_category_list(); ?></div>
				<div class="<?php echo ($position === 'single_layout[full_width]' ) ? 'text-center' : ''; ?>">
				    <?php echo the_swallow_post_meta(); ?>
                </div>
                <span class="subheading"></span>
                <div class="row">
                <div class="post-description"><?php the_content(); ?></div>  
                </div>
                <div class="row">
                <div class="col-md-6 col-md-offset-6 post-tags text-center"><?php the_tags( '<ul class="tags-list"><li>', '</li><li>', '</li></ul>' ); ?></div> 
                </div>
                <div class="col-md-12 post-hr"><hr></div>
              
                <div class="col-md-12" id="tb-comments-area">
					<?php wp_link_pages(); ?>
    	            <?php	if ( comments_open() || get_comments_number() ) :
    						comments_template();
    				endif;?>
	            </div>
			</div>
			<?php if( $position == 'single_layout[right_sidebar]' ): ?>
            <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
           
		</div>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>