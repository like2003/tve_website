<?php
/**
 * The default template for displaying no content
 *
 *
 * @package Swallow 
 * @since Swallow Blog 1.0
 */
?>
<article class="row">
    <h2 class="traveler_blog_title_h2"><?php _e( 'Nothing Found', 'the-swallow' ); ?></h2>
    <div class="page-nocontent">
    	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
    
    	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'the-swallow' ), admin_url( 'post-new.php' ) ); ?></p>
    
    	<?php elseif ( is_search() ) : ?>
    
    	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'the-swallow' ); ?></p>
    	<?php get_search_form(); ?>
    
    	<?php else : ?>
    
    	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'the-swallow' ); ?></p>
    	<?php get_search_form(); ?>
    
    	<?php endif; ?>
    </div
    <hr>
</article>