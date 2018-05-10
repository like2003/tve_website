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
$position = isset( $option[ 'blog_layout' ] )? $option[ 'blog_layout' ] : 'blog_layout[full_width]'; 
get_header(); ?>


    <?php echo ( is_front_page() ) ? the_swallow_home_head() : the_swallow_page_head(); ?>

    <div class="container" id="traveler_blog_page">
        <div class="row">
            <?php if ( $position == 'blog_layout[left_sidebar]' ): ?>
                <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
            <?php if ( $position == 'blog_layout[full_width]' ): ?>
            <div class="col-md-12">
            <?php else: ?>
            <div class="col-md-8 ">
            <?php endif; ?>
            <?php 
            switch ( isset( $option[ 'front_page_layout' ] ) ? $option[ 'front_page_layout' ] : 'stand' ){
                case 'grid':
                    get_template_part( 'layout/layout', 'grid' );
                    break;
                case 'stand':
                    get_template_part( 'layout/layout', 'standard' );
                    break;
                default:
                    get_template_part( 'layout/layout', 'standard' );
                    break;
            }
            ?>
            <?php if ( $position == 'blog_layout[right_sidebar]' ): ?>
                <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>