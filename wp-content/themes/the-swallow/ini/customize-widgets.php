<?php

/**
 * 
 * Extends WP_Widget_Recent_Posts widget class
 *
 * @since Swallow blog 1.0
 * 
 */
class The_Swallow_blog_Widget_Recent_Posts extends WP_Widget_Recent_Posts {


	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html( __('Recent Posts', 'the-swallow') ) : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul>
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li class="tb-recent-post-widget"><?php if( has_post_thumbnail()  && ! post_password_required() ): ?>
    				<?php 
    				    $attr =  array(
        				    'class' => "img-responsive rec-post-img",
        					'alt'   => get_post_meta( get_post_thumbnail_id($r->ID), '_wp_attachment_image_alt', true )
        					);
    				    the_post_thumbnail( array( 25, 25), $attr );
    				?><?php endif; ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="rec-post-a"><?php the_title(); ?></a>
    				<p><em><?php the_time('F jS, Y'); ?></em></p>
    				</li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}

}

