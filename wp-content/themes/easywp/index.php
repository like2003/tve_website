<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyWP
 */

get_header(); ?>

<div id='easywp-content-wrapper' class='clearfix'>

<div id='easywp-main-wrapper'>
<div class='theiaStickySidebar'>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

<?php endwhile; ?>
<div class="clear"></div>

    <?php the_posts_navigation(array('prev_text' => __( '&larr; Older posts', 'easywp' ), 'next_text' => __( 'Newer posts &rarr;', 'easywp' ))); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

<?php get_sidebar(); ?>

</div><!-- #easywp-content-wrapper -->

<?php get_footer(); ?>