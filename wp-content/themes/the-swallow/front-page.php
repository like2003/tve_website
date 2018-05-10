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
					<?php the_title( '<h2 class="post-title text-center">', '</h2>'); ?>
					
					<?php 
                    $the_swallow_fp_args = array(
                        'posts_per_page' => 4,
                        'meta_query' => array(array('key' => '_thumbnail_id')),
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'date',
                    	'order'   => 'DESC',
                        );
                    $the_swallow_fp_query = new WP_Query( $the_swallow_fp_args ); ?>
                    
                    <?php if ( $the_swallow_fp_query->have_posts() ) : ?>
                    <div class="row">
                    	<?php while ( $the_swallow_fp_query->have_posts() ) : $the_swallow_fp_query->the_post(); ?>
                    		<div class="col-md-3">
                    		    <h4><?php # the_title(); ?></h4>
                		        <?php if( has_post_thumbnail()  && ! post_password_required() ): ?>
                		        <a href="<?php the_permalink(); ?>">
                                    <div class="img-containter">
                                    <?php 
                                	    $attr =  array(
                                		    'class' => "img-responsive tb-post-image",
                                		    'alt'   => get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )
                                	    );
                                	    the_post_thumbnail( 'thumbnail', $attr );
                                    ?> 
                                    </div>
                                </a>
                                <?php endif; ?>
                    		</div>
                    	<?php endwhile; ?>
                    </div>
                    	<?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <hr>
					<p class="post-description"><?php the_content(); ?></p>
                    <hr>
                    <div class="text-center">
                        <h4><?php esc_html_e( 'Popular tags', 'the-swallow' ); ?></h4>
                        <?php 
                        $the_swallow_tags_args = array(
                            'smallest' => 15, 
	                        'largest'  => 15,
	                        'number'   => 4,
	                        'orderby'  => 'count',
	                        'order'    => 'DESC',
	                        'format'   => 'flat'
                            );
                        wp_tag_cloud( $the_swallow_tags_args ); ?>
                    </div>
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