<?php

/**
 * 
 * Template for 4 column layout
 * 
 * @package Swallow
 * @since Swallow 1.0
 * 
 */

$counter = 0;
global $paged;
global $wp_query;

$row_divider = 0;
$the_query = new WP_Query( ); 
$the_query->query('showposts=12&ignore_sticky_posts=true'.'&paged='.$paged);
$temp = $wp_query;
$wp_query = $the_query;
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if( $counter % 4 == 0 ): ?>    
<div class="row">
<?php endif; ?>
    <div class="col-sm-6 col-md-3 grid">
        <div class="thumbnail grid-thumbnail">
            <div class="caption grid-caption">
                <?php if( has_post_thumbnail()  && ! post_password_required()  ): ?>
        		<?php 
        		    $attr =  array(
            		    'class' => "img-responsive",
            		    'alt'   => get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )
            		    );
        		    the_post_thumbnail( array( 375, 230 ), $attr );
            	?> 
        		<?php endif; ?>
                    
                     <h4 class="traveler_blog_title_h4"><a href="<?php the_permalink(); ?>"><?php the_title( '' ); ?></a></h4>
                   <p class="post-meta">&nbsp;<?php the_time('F jS, Y'); ?></p>
               
               
                <?php the_excerpt(); ?>
                <a class="traveler_btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'the-swallow'); ?></a>
            </div>
        </div>
    </div>
<?php
$counter += 1;
if ($counter % 4 == 0): ?>
</div>
<?php endif; ?>
<?php endwhile; ?>

        <div class="row">
            <div class="col-md-12">
                <?php the_swallow_blog_pagination(); ?>
        	</div>
        </div>
    <?php if ( $wp_query->max_num_pages == $paged ): ?>
    </div>
    <?php endif; ?>
</div>
<?php else:?>
	<p><?php esc_html_e( 'Sorry, no posts matched your search criteria.', 'the-swallow' ); ?></p>
<?php endif; ?>
<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>