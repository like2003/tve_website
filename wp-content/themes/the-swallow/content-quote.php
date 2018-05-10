<?php
/**
 * The default template for displaying quote content
 *
 *
 * @package Swallow 
 * @since Swallow Blog 1.0
 */
?>
<article class="row">
    <?php echo get_the_category_list();
    echo the_swallow_post_title(); 
    echo the_swallow_post_meta(); 
    ?>
    <div class="quote-content"><?php the_content(); ?> </div>
</article>    
<hr>