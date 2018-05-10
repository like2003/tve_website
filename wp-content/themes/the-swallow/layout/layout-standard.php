<?php

/**
 * 
 * This is layout template for the standard layout
 * @package Swallow Blog
 * @since 1.0
 * 
 */

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
    <?php the_swallow_blog_pagination(); ?>
<?php else: ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-swallow' ); ?></p>
<?php endif; ?>
</div>