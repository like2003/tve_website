<?php

/**
 * 
 * The archive template page
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
?>
 <?php get_header(); ?>

	    <!-- Page Header -->
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php
                        $archive_title;
						if ( is_day() ) :
                            _e('Daily Archives','the-swallow'); echo ": ". get_the_date();
                            $archive_title = esc_html( __('Daily Archives','the-swallow') );
                        elseif ( is_month() ) :
                            _e('Monthly Archives','the-swallow'); echo ": ". get_the_date('F Y');
                            $archive_title = esc_html( __('Monthly Archives','the-swallow') );
                        elseif ( is_year() ) :
                            _e('Yearly Archives','the-swallow'); echo ": ". get_the_date('Y');
                            $archive_title = esc_html( __('Yearly Archives','the-swallow') );
                        else :
                            _e( 'Archives', 'the-swallow' );
                            $archive_title = esc_html( __('Archives','the-swallow') );
                        endif;  
					?></h1>
					<hr style="width:<?php echo the_swallow_blog_get_title_lenght( $archive_title ); ?>px">
                    </div>
                </div>
            </div>
        </div>
    </header>
	

	<div class="container">
		<div class="row">
		        <?php 
		        $option = get_option( 'swallow_blog' );
                $position = isset( $option[ 'blog_layout' ] )? $option[ 'blog_layout' ] : 'blog_layout[full_width]';
                ?>
				<?php if( $position === 'blog_layout[left_sidebar]' ): ?>
	            <?php get_sidebar( 'blog' );  ?>
	            <?php endif; ?>
                <?php if( $position === 'blog_layout[full_width]' ): ?>
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            <?php else: ?>
	            <div class="col-md-8 ">
	            <?php endif; ?>
			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    
			    <?php get_template_part( 'content', get_post_format() ); ?>

			    <?php endwhile; ?>
				    <?php the_swallow_blog_pagination(); ?>
			    	<?php else: ?>
	                	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' , 'the-swallow'); ?></p>
                <?php endif; ?>
            </div>
            <?php if( $position === 'blog_layout[right_sidebar]' ): ?>
            <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>