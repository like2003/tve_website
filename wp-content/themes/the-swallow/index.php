<?php
/**
 * 
 * The template for displaying the index page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
 
get_header(); ?>

	<?php echo ( is_front_page() ) ? the_swallow_home_head() : the_swallow_page_head(); ?>

	<div class="container">
		<div id="post-<?php the_ID(); ?>" <?php post_class( "row" ); ?>>
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    
			    <div class="post-preview">
                    <a href="<?php the_permalink(); ?>" class="text-center">
						<?php the_title( '<h2 class="post-title">', '</h2>'); ?>
						
						<?php if( has_post_thumbnail()  && ! post_password_required() ): ?>
						<div class="img-containter">
							 <?php 
							 $attr =  array(
								'class' => "img-responsive",
								'alt'   => get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )
							);
							 the_post_thumbnail( array(800,640), $attr );
							 
							 ?> 
						</div>
						<?php endif; ?>
                    </a>
                    <hr>
					<p class="post-description"><?php the_content(); ?></p>
                    
                </div>
                <hr>

			    <?php endwhile; ?>
				    <!-- Pager -->
	                <ul class="pager">
		                <li class="previous">
	                        <?php previous_posts_link( esc_html( __('Newer posts', 'the-swallow') ) ); ?>
	                    </li>
	                    <li class="next">
	                        <?php next_posts_link( esc_html( __('Older posts', 'the-swallow') ) ); ?> 
	                    </li>  
	                </ul>
			    	<?php else: ?>
	                	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.','the-swallow' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>