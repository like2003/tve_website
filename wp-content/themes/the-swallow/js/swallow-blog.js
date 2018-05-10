
// Navigation Scripts to Show Header on Scroll-Up
jQuery(document).ready(function($) {
    $('body').fadeIn("fast");
    var MQL = 950;
    var navClass = $('.navbar-custom');
    //primary navigation slide-in effect
    if ($(window).width() > MQL ) {
        var headerHeight = navClass.height();
        $(window).on('scroll', {
                previousTop: 0
            },
            function() {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop) {
                    //if scrolling up...
                    if (currentTop > 0 && navClass.hasClass('is-fixed')) {
                        navClass.addClass('is-visible');
                    } else {
                        navClass.addClass('is-visible is-fixed');
                    }
                } else {
                    //if scrolling down...
                    navClass.removeClass('is-visible');
					
                    if (currentTop > headerHeight && !navClass.hasClass('is-fixed')) navClass.addClass('is-fixed');
					
                }
                this.previousTop = currentTop;
            });
    }
	
	
	$('.img-containter').hover( function(){
	  $(this).children().addClass('image-shadow');
	}, function(){
	  $(this).children().removeClass('image-shadow');
	});
	
	
	$('.comment-author > img').addClass('img-circle');
	
	$('#comments-sum').click(function(){
	    $('.comment').toggle('slow');
	});
	
	$('#top-bar-search-button').hoverIntent(function(){
	    $('#top-bar-search input').animate({width: 'show'});
	    $(this).css('top', '-9px');
	    $(this).addClass('opened');
	});
	if( $('#top-bar-search-button').hasClass('opened') ){
	    $('#top-bar-search-button').click(function(){
	        $('#top-bar-search input').animate({width: 'hide'});
	        $('#top-bar-search-button').removeClass('opened');
	    });
	}
	
	
	// Tags line break
	$('.post-tags li').each(function(index, element) {
	    if( index % 5 === 0 && index !== 0 ){
	        $(element).append("<br>"); 
	    }
	});
	
	$('.post-categories').addClass('list-unstyled');
	
	// Footer post slider
	$('.post_slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
    });
    
});


