<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EasyWP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id='easywp-body-wrapper'>
<div id='easywp-outer-wrapper'>

<div id='easywp-header-wrapper' class='clearfix'>
<div id='easywp-header-inner' class='clearfix'>

<?php if ( get_header_image() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
        <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="easywp-header-image"/>
    </a>
    </div>
<?php endif; // End header image check. ?>

<div id='easywp-header-content' class='clearfix'>
<div id='easywp-header-left'>
    <?php if ( has_custom_logo() ) : ?>
        <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
            <img src="<?php echo esc_url( easywp_custom_logo() ); ?>" alt="" class="easywp-logo-image"/>
        </a>
        </div>
    <?php else: ?>
        <div class="site-branding">
          <h1 class="easywp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class="easywp-site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
    <?php endif; ?>
</div>

<div id='easywp-header-right'>
<?php dynamic_sidebar( 'easywp-header-banner' ); ?>
</div>
</div>

</div>
</div>

<div class='easywp-nav-primary-wrapper clearfix'>
<nav class="easywp-nav-primary" id="primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'easywp-nav-menu menu-primary', 'menu_id' => 'menu-primary-navigation' ) ); ?>
</nav>
</div>

<?php if ( !(easywp_get_option('hide_social_buttons')) ) { ?>
<div class="easywp-social-icons clearfix">
<div class="easywp-social-icons-inner clearfix">
    <?php if ( easywp_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('twitterlink') ); ?>" target="_blank" class="social-twitter" title="<?php esc_attr_e('Twitter','easywp'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('facebooklink') ); ?>" target="_blank" class="social-facebook" title="<?php esc_attr_e('Facebook','easywp'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('googlelink') ); ?>" target="_blank" class="social-googleplus" title="<?php esc_attr_e('Google Plus','easywp'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('pinterestlink') ); ?>" target="_blank" class="social-pinterest" title="<?php esc_attr_e('Pinterest','easywp'); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('linkedinlink') ); ?>" target="_blank" class="social-linkedin" title="<?php esc_attr_e('Linkedin','easywp'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('instagramlink') ); ?>" target="_blank" class="social-instagram" title="<?php esc_attr_e('Instagram','easywp'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('flickrlink') ); ?>" target="_blank" class="social-flickr" title="<?php esc_attr_e('Flickr','easywp'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('youtubelink') ); ?>" target="_blank" class="social-youtube" title="<?php esc_attr_e('Youtube','easywp'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('vimeolink') ); ?>" target="_blank" class="social-vimeo" title="<?php esc_attr_e('Vimeo','easywp'); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('soundcloudlink') ); ?>" target="_blank" class="social-soundcloud" title="<?php esc_attr_e('SoundCloud','easywp'); ?>"><i class="fa fa-soundcloud" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('lastfmlink') ); ?>" target="_blank" class="social-lastfm" title="<?php esc_attr_e('Lastfm','easywp'); ?>"><i class="fa fa-lastfm" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('githublink') ); ?>" target="_blank" class="social-github" title="<?php esc_attr_e('Github','easywp'); ?>"><i class="fa fa-github" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('bitbucketlink') ); ?>" target="_blank" class="social-bitbucket" title="<?php esc_attr_e('Bitbucket','easywp'); ?>"><i class="fa fa-bitbucket" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('tumblrlink') ); ?>" target="_blank" class="social-tumblr" title="<?php esc_attr_e('Tumblr','easywp'); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('digglink') ); ?>" target="_blank" class="social-digg" title="<?php esc_attr_e('Digg','easywp'); ?>"><i class="fa fa-digg" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('deliciouslink') ); ?>" target="_blank" class="social-delicious" title="<?php esc_attr_e('Delicious','easywp'); ?>"><i class="fa fa-delicious" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stumblelink') ); ?>" target="_blank" class="social-stumbleupon" title="<?php esc_attr_e('Stumbleupon','easywp'); ?>"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('redditlink') ); ?>" target="_blank" class="social-reddit" title="<?php esc_attr_e('Reddit','easywp'); ?>"><i class="fa fa-reddit" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('dribbblelink') ); ?>" target="_blank" class="social-dribbble" title="<?php esc_attr_e('Dribbble','easywp'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('behancelink') ); ?>" target="_blank" class="social-behance" title="<?php esc_attr_e('Behance','easywp'); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('codepenlink') ); ?>" target="_blank" class="social-codepen" title="<?php esc_attr_e('Codepen','easywp'); ?>"><i class="fa fa-codepen" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('jsfiddlelink') ); ?>" target="_blank" class="social-jsfiddle" title="<?php esc_attr_e('JSFiddle','easywp'); ?>"><i class="fa fa-jsfiddle" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stackoverflowlink') ); ?>" target="_blank" class="social-stackoverflow" title="<?php esc_attr_e('Stack Overflow','easywp'); ?>"><i class="fa fa-stack-overflow" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('stackexchangelink') ); ?>" target="_blank" class="social-stackexchange" title="<?php esc_attr_e('Stack Exchange','easywp'); ?>"><i class="fa fa-stack-exchange" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('bsalink') ); ?>" target="_blank" class="social-buysellads" title="<?php esc_attr_e('BuySellAds','easywp'); ?>"><i class="fa fa-buysellads" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('slidesharelink') ); ?>" target="_blank" class="social-slideshare" title="<?php esc_attr_e('SlideShare','easywp'); ?>"><i class="fa fa-slideshare" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( easywp_get_option('skypeusername') ); ?>?chat" class="social-skype" title="<?php esc_attr_e('Skype','easywp'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( easywp_get_option('emailaddress') ); ?>" class="social-email" title="<?php esc_attr_e('Email Us','easywp'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( easywp_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( easywp_get_option('rsslink') ); ?>" target="_blank" class="social-rss" title="<?php esc_attr_e('RSS','easywp'); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a><?php endif; ?>
</div>
</div>
<?php } ?>