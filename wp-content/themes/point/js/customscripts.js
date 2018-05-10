/*
 * Theme Name: Point
*/

/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
jQuery(document).ready(function($){
    $('.primary-navigation').append('<div id="mobile-menu-overlay" />');

    $('.toggle-mobile-menu').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('body').toggleClass('mobile-menu-active');

        if ( $('body').hasClass('mobile-menu-active') ) {
            if ( $(document).height() > $(window).height() ) {
                var scrollTop = ( $('html').scrollTop() ) ? $('html').scrollTop() : $('body').scrollTop();
                $('html').addClass('noscroll').css( 'top', -scrollTop );
            }
            $('#mobile-menu-overlay').fadeIn();
        } else {
            var scrollTop = parseInt( $('html').css('top') );
            $('html').removeClass('noscroll');
            $('html,body').scrollTop( -scrollTop );
            $('#mobile-menu-overlay').fadeOut();
        }
    });
}).on('click', function(event) {
    $target = jQuery(event.target);
    if ( ! $target.closest('.mobile-menu-wrapper') || $target.is('#mobile-menu-overlay') ) {
        jQuery('body').removeClass('mobile-menu-active');
        jQuery('html').removeClass('noscroll');
        jQuery('#mobile-menu-overlay').fadeOut();
    }
});

/*----------------------------------------------------
/*  Dropdown menu
/* ------------------------------------------------- */
jQuery(document).ready(function($) {
    
    function mtsDropdownMenu() {
        var wWidth = $(window).width();
        if(wWidth > 865) {
            $('#navigation ul.sub-menu, #navigation ul.children').hide();
            var timer;
            var delay = 100;
            $('#navigation li').hover( 
              function() {
                var $this = $(this);
                timer = setTimeout(function() {
                    $this.children('ul.sub-menu, ul.children').slideDown('fast');
                }, delay);
                
              },
              function() {
                $(this).children('ul.sub-menu, ul.children').hide();
                clearTimeout(timer);
              }
            );
        } else {
            $('#navigation li').unbind('hover');
            $('#navigation li.active > ul.sub-menu, #navigation li.active > ul.children').show();
        }
    }

    mtsDropdownMenu();

    $(window).resize(function() {
        mtsDropdownMenu();
    });
});

/*---------------------------------------------------
/*  Vertical menus toggles
/* -------------------------------------------------*/
jQuery(document).ready(function($) {

    $('.widget_nav_menu, #navigation .menu').addClass('toggle-menu');
    $('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
    $('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');

    $('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"><i class="point-icon icon-down-dir"></i></span>');

    $('.toggle-caret').click(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
    });
});

/*----------------------------------------------------
/* Back to top smooth scrolling
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
    jQuery('.toplink').click(function(){
        jQuery('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});