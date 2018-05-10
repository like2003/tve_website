<?php
/**
 * 
 * The template for displaying the search result page
 * 
 * @package the-swallow
 * @since the-swallow 1.0
 * 
 */
$option = get_option( 'swallow_blog' );
$position = isset( $option[ 'blog_layout' ] )? $option[ 'blog_layout' ] : 'blog_layout[full_width]'; 
get_header(); ?>
    
    <header class="intro-header">
        <div class="container">
            <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading page-heading">
                        <h1><?php esc_html_e( "You have search for:", "the-swallow"); ?> <?php echo esc_attr( get_search_query() ); ?></h1>
                        <hr style="width:<?php
                        $site_title = the_title( '', '', false );
                        echo the_swallow_blog_get_title_lenght( $site_title ); 
                        ?>px">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container swallow-search-page">
        <div class="row">
            <?php if( $position == 'blog_layout[left_sidebar]' ): ?>
                <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
            <?php if( $position == 'blog_layout[full_width]' ): ?>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php else: ?>
            <div class="col-md-8 ">
            <?php endif; ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php 
                    switch ( isset( $option[ 'front_page_layout' ] ) ? $option[ 'front_page_layout' ] : 'stand' ){
                        case 'grid':
                            get_template_part( 'layout/layout', 'grid' );
                            break;
                        case 'stand':
                            get_template_part( 'layout/layout', 'standard' );
                            break;
                        default:
                            get_template_part( 'layout/layout', 'standard' );
                            break;
                    }
                    ?>
                <?php endwhile; ?>
	            <?php else: ?>
	                	<p><?php esc_html_e( 'Sorry, no maches for criteria', 'the-swallow'); ?><strong><?php echo ': ' . esc_html( get_search_query( false ) );?></strong></p>
	                	<p><?php esc_html_e( 'Please try with another query', 'the-swallow' ); ?></p>
	                </div>
                <?php endif; ?>
        
            <?php if( $position == 'blog_layout[right_sidebar]' ): ?>
                <?php get_sidebar( 'blog' );  ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>