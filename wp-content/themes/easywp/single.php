<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EasyWP
 */

get_header(); ?>

<div id='easywp-content-wrapper' class='clearfix'>

<div id='easywp-main-wrapper'>
<div class='theiaStickySidebar'>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'single' ); ?>

    <?php the_post_navigation(array('prev_text' => __( '&larr; %title', 'easywp' ), 'next_text' => __( '%title &rarr;', 'easywp' ))); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div>
</div>

<?php get_sidebar(); ?>

</div><!-- #easywp-content-wrapper -->

<?php get_footer(); ?>