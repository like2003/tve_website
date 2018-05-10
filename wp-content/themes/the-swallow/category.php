<?php

/**
 * 
 * The category template page
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
                        <h2><?php  esc_html_e( 'Category:','the-swallow') ; ?></h2>
                        <h1><?php  echo  single_cat_title(); ?></h1>
                        <hr style="width:<?php
                        $site_title = single_cat_title( '', false );
                        echo the_swallow_blog_get_title_lenght( $site_title ); 
                        ?>px">
                    </div>
                </div>
            </div>
        </div>
    </header>
	

	<div class="container">
		<div class="row">
				<?php if( get_theme_mod( 'page_layout') == 'page_layout[left_sidebar]' ): ?>
	            <?php get_sidebar( 'page-sidebar' );  ?>
	            <?php endif; ?>
                <?php if( get_theme_mod ('page_layout') == 'page_layout[full_width]' ): ?>
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            <?php else: ?>
	            <div class="col-md-8 ">
	            <?php endif; ?>
			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    
			    <div class="post-preview">
                    <a href="<?php the_permalink(); ?>" class="text-center">
						<?php the_title( '<h2 class="post-title">', '</h2>'); ?>
						
						<?php echo the_swallow_post_thumbnail($post); ?>
                    </a>
                    <hr>
					<p class="post-description"><?php the_content(); ?></p>
                    
                </div>
                <hr>

			    <?php endwhile; ?>
				    <?php echo the_swallow_page_navigation(); ?>
			    	<?php else: ?>
	                	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' , 'the-swallow'); ?></p>
                <?php endif; ?>
            </div>
            <?php if( get_theme_mod( 'page_layout') == 'page_layout[right_sidebar]' ): ?>
            <?php get_sidebar( 'page-sidebar' );  ?>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>