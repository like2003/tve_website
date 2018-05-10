<?php
/**
 * 
 * The template for displaying the blog home page
 * 
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 * 
 */
 
if( is_active_sidebar( 'blog-sidebar' ) ): ?>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4 blog-sidebar">
        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </div>
<?php else: ?>
    <div class="col-md-4">
        <?php  esc_html_e( 'Please add content to Sidebar Widget Area!', 'the-swallow'); ?>
    </div>
<?php endif; ?>