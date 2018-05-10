<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EasyWP
 */

get_header(); ?>

<div id='easywp-content-wrapper' class='clearfix'>

<div id='easywp-main-wrapper'>
<div class='theiaStickySidebar'>

<header class="page-header">
    <h1 class="page-title"><?php /* translators: %s: search query. */ printf( esc_html__( 'Search Results for: %s', 'easywp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header><!-- .page-header -->

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'search' ); ?>

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