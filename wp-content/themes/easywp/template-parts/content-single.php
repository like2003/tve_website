<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EasyWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div class="entry-meta">
                    <?php easywp_top_postmeta(); ?>
            </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content clearfix">
            <?php
            if ( has_post_thumbnail() ) {
                if ( 1 === easywp_get_option('hide_thumbnail') ) {
                } else {
                    if ( 1 === easywp_get_option('hide_thumbnail_single') ) {
                    } else {
                        if ( easywp_get_option('thumbnail_link') == 'no' ) {
                            the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block'));
                        } else { ?>
                            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('easywp-featured-image', array('class' => 'easywp-post-thumbnail entry-featured-image-block')); ?></a>
                <?php   }
                    }
                }
            }
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
        <?php easywp_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article>