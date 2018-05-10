<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EasyWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content clearfix">
            <?php
            the_content( /* translators: %s: post title. */ sprintf(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'easywp' ), the_title( '<span class="screen-reader-text">"', '"</span>', false )) );

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'easywp' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             ) );
             ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'easywp' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
        
</article>