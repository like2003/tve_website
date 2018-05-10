<?php
/**
 * The default template for displaying content
 *
 *
 * @package Swallow 
 * @since Swallow Blog 1.0
 */
?>
<article class="row">
    <?php $option = get_option( 'swallow_blog' ); ?>
    <?php if ( $option[ 'front_page_layout' ] == 'list' ): ?>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="col-md-6"><?php echo the_swallow_post_thumbnail( $post ); ?></div>
    <div class="col-md-6">
    <?php else: ?>
    <div class="col-md-12">
    <?php endif; ?>
        <?php
        echo get_the_category_list(); 
        echo the_swallow_post_title(); 
        echo the_swallow_post_meta(); 
        the_excerpt(); 
    	echo the_swallow_post_read_more(); 
        ?>
    </div>     
    <?php else: 
    echo get_the_category_list(); 
    echo the_swallow_post_title(); 
    echo the_swallow_post_meta(); 
    echo the_swallow_post_thumbnail( $post ); 
	the_excerpt(); 
	echo the_swallow_post_read_more(); 
	endif; ?>
</article>
<hr>