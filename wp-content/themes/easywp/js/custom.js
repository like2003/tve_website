jQuery(document).ready(function($) {

    $(".easywp-nav-primary .easywp-nav-menu").addClass("easywp-responsive-menu").before('<div class="easywp-responsive-menu-icon"></div>');

    $(".easywp-responsive-menu-icon").click(function() {
        $(this).next(".easywp-nav-primary .easywp-nav-menu").slideToggle();
    });

    $(window).resize(function() {
        if (window.innerWidth > 1167) {
            $(".easywp-nav-primary .easywp-nav-menu, .easywp-nav-primary ul ul").removeAttr("style");
            $(".easywp-responsive-menu > li").removeClass("menu-open");
        }
    });

    $("ul.easywp-responsive-menu > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("menu-open");
        });
    });

    $("div.easywp-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("menu-open");
        });
    });

    $(".post").fitVids();

    $('#easywp-main-wrapper, #easywp-left-sidebar, #easywp-right-sidebar').theiaStickySidebar({
        containerSelector: "#easywp-content-wrapper",
        additionalMarginTop: 10,
        additionalMarginBottom: 0,
        minWidth: 1000,
    });

});