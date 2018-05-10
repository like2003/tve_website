<?php
/**
 * The default template for displaying aside content
 *
 *
 * @package Swallow 
 * @since Swallow Blog 1.0
 */
?>
<article class="row">
    <div class="aside-content"><?php the_content(); ?></div>
    <?php echo the_swallow_post_read_more();  ?>
</article>
<hr>