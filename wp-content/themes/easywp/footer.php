<?php if ( is_active_sidebar( 'easywp-footer-1' ) || is_active_sidebar( 'easywp-footer-2' ) || is_active_sidebar( 'easywp-footer-3' ) || is_active_sidebar( 'easywp-footer-4' ) ) : ?>
<div id='easywp-footer-widgets-container' class='clearfix'>
<div id='easywp-footer-widgets' class='clearfix'>

<div class='easywp-footer-widget-box'>
<?php dynamic_sidebar( 'easywp-footer-1' ); ?>
</div>

<div class='easywp-footer-widget-box'>
<?php dynamic_sidebar( 'easywp-footer-2' ); ?>
</div>

<div class='easywp-footer-widget-box'>
<?php dynamic_sidebar( 'easywp-footer-3' ); ?>
</div>

<div class='easywp-footer-widget-box'>
<?php dynamic_sidebar( 'easywp-footer-4' ); ?>
</div>

</div>
</div>
<?php endif; ?>

<div id='easywp-site-info-container' class='clearfix'>
<div id='easywp-site-info'>
<div id='easywp-copyrights'>
<?php if ( easywp_get_option('footer_text') ) : ?>
  <?php echo esc_html(easywp_get_option('footer_text')); ?>
<?php else : ?>
  <?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'easywp' ), esc_html(date_i18n(__('Y','easywp'))) . ' ' . esc_html(get_bloginfo( 'name' )) ); ?>
<?php endif; ?>
</div>
<div id='easywp-credits'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'easywp' ), 'ThemesDNA.com' ); ?></a></div>
</div><!-- #easywp-site-info -->
</div>

</div><!-- #easywp-outer-wrapper -->
</div><!-- #easywp-body-wrapper -->

<?php wp_footer(); ?>
</body>
</html>