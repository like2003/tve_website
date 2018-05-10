<?php
/**
 * 
 * The template for displaying the blog home page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */

if( is_active_sidebar( 'page-sidebar' ) ): ?>
    <div class="col-md-4">
        <?php dynamic_sidebar( 'page-sidebar' ); ?>
    </div>
<?php else: ?>
    <div class="col-md-4">
        <?php esc_html_e( 'Please add content to Page Widget Area!', 'the-swallow'); ?>
    </div>
<?php endif; ?>