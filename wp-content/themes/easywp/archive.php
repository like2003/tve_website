<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EasyWP
 */

get_header(); ?>

<div id='easywp-content-wrapper' class='clearfix'>

<div id='easywp-main-wrapper'>
<div class='theiaStickySidebar'>

<header class="page-header">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>

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