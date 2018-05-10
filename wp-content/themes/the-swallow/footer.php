<?php
/*
 *
 * Template for displaying the footer
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 *
*/
?>
<!-- Footer -->
<?php $option = get_option('swallow_blog'); ?>
    <footer>
        <?php if ( (isset( $option['footer_slider'] ) ? $option['footer_slider'] : "" ) !== "noslide" ): ?> 
        <div class="footer_category_slider">
            <div class="container inner">
                <?php if ( (isset( $option['footer_slider'] ) ? $option['footer_slider'] : "")  == "instafeed" ): ?>
                <div class="row">
                    <h3 class="traveler_title_h3"><?php esc_html_e( 'From', 'the-swallow' ); ?> <span class="bold"><?php echo esc_html( 'Instagram', 'the-swallow' ); ?></span></h3>
                    <div class="col-md-12">
                    <?php echo do_shortcode("[instagram-feed num=5 showheader=false showbutton=false showfollow=false cols=5]"); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( (isset( $option['footer_slider'] ) ?  $option['footer_slider'] : "") == "slider" ): ?>
                    <?php echo the_swallow_post_slider(); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <section id="footer-widget-area">
            <div class="container">
                 <div class="row">
                    <div class="col-md-6" id="logo">
                         <h3> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' )?></a></h3>
                    </div>
                      
                    
                    <div class="col-md-6" id="social_media_icons">
                        <ul class="list-inline text-right">
                            <?php if ( strlen( isset( $option['twitter'] ) ? $option['twitter'] : "" ) > 0 ): ?>
                            <li>
                                <a href="<?php echo esc_url_raw( isset( $option['twitter' ] ) ? $option['twitter' ] : "#") ?>" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-twitter fa-stack-2x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if ( strlen( isset( $option[ 'facebook' ] ) ? $option[ 'facebook' ] : "" ) > 0 ): ?>
                            <li>
                                <a href="<?php echo esc_url_raw( isset( $option[ 'facebook' ] ) ? $option[ 'facebook' ] : "#" ) ?>" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-facebook fa-stack-2x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if ( strlen( isset( $option[ 'tumblr' ] ) ? $option[ 'tumblr' ] : "" ) > 0 ): ?>
    						<li> 
                                <a href="<?php echo esc_url_raw( isset( $option[ 'tumblr'] ) ? $option[ 'tumblr'] : "#" ) ?>" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-tumblr fa-stack-2x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if ( strlen( isset( $option[ 'youtube' ] ) ? $option[ 'youtube' ] : "" ) > 0 ): ?>
    						<li>
                                <a href="<?php echo esc_url_raw( isset( $option['youtube'] ) ? $option['youtube'] : "#" ) ?>" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-youtube fa-stack-2x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if ( strlen( isset( $option['instagram'] ) ? $option['instagram'] : "" ) > 0 ): ?>
    						<li>
                                <a href="<?php echo esc_url_raw( isset( $option[ 'instagram' ] ) ? $option[ 'instagram' ] : "#") ?>" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-instagram fa-stack-2x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>  
                <?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) || is_active_sidebar( 'footer-four' ) ): ?>
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-one' ) ): ?>
                    <div class="col-md-3">
                        <?php dynamic_sidebar('footer-one'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-two' ) ): ?>
                    <div class="col-md-3 <?php if( !is_active_sidebar( 'footer-one' ) ): ?>col-md-offset-3<?php endif; ?>">
                        <?php dynamic_sidebar( 'footer-two' ); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-three' ) ): ?>
                    <div class="col-md-3 <?php if( !is_active_sidebar( 'footer-two' ) && !is_active_sidebar( 'footer-one' ) ):
                    ?>col-md-offset-6<?php elseif( !is_active_sidebar( 'footer-two' ) ): ?> col-md-offset-3<?php endif; ?>">
                        <?php dynamic_sidebar( 'footer-three' ); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-four' ) ): ?>
                    <div class="col-md-3 <?php if( !is_active_sidebar( 'footer-three' ) && !is_active_sidebar( 'footer-two' ) && !is_active_sidebar( 'footer-one' ) ):
                    ?>col-md-offset-8<?php elseif( !is_active_sidebar( 'footer-two' ) ): ?> col-md-offset-6 <?php elseif ( !is_active_sidebar( 'footer-three' ) ): ?> col-md-offset-3<?php endif; ?>">
                        <?php dynamic_sidebar( 'footer-four' ); ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php endif; ?>
            </div>
        </section>
    </footer>
    
      <section id="bottom-bar">
    		<div class="container">
    		    <hr class="botto-bar-hr">
    			<div class="col-md-12">
    				<p id="copyright" class="text-muted">&copy; <?php echo date("Y") . " " . esc_html( __("All rights reserved", "the-swallow") ); ?></p>
    			</div>
            </div>
    	</section>
    	<?php wp_footer(); ?>
    </body>
</html>
