jQuery(document).ready(function($) {
	
	//execute on load
	jQueryResponsive();
	$(window).resize(function() { jQueryResponsive(); } );
	
	//remove maptop for simplemap fix
	$('a#map_top').remove();

	$('.topbar_in li:last').addClass('last');
    /*if (navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/) ||
        navigator.userAgent.match(/Windows Phone/i) ||
        navigator.userAgent.match(/ZuneWP7/i)
    ) {
        $('.menu-item,.nav > li').touchstart(function(){
            $(this).children('ul').stop(true,true).animate({height:'show'});
        });
    }
    else {
        $('.nav > li').mouseenter(function () {
            $(this).children('ul').stop(true, true).animate({height: 'show'});
        });
        $('.nav > li').mouseleave(function () {
            $(this).children('ul').stop(true, true).animate({height: 'hide'});
        });
        $('.menu-item').mouseenter(function () {
            $(this).children('ul').stop(true, true).animate({height: 'show'});
        });
        $('.menu-item').mouseleave(function () {
            $(this).children('ul').stop(true, true).animate({height: 'hide'});
        });
    }*/
	$('.extend-offer').mouseenter(function(){
		$(this).animate({opacity:'0.7'})
	});
	$('.extend-offer').mouseleave(function(){
		$(this).animate({opacity:'1'})
	});


	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
	});

	$("#cycle").cycle({
		timeout: 0,
		fx:      'scrollHorz',
		prev:    '#prev',
        next:    '#next'
	});

	$("#cycle").cycle({
		timeout: 0,
		fx:      'scrollHorz',
		prev:    '#prev',
        next:    '#next'
	});

	$( "#cycle" ).click(function() {
	   $(this).cycle("pause");
	});
	
	$( "#testimonial-nav span" ).click(function() {
	   $("#cycle").cycle("resume");
	});
    $("[id^=before-after-cycle]").each(function(){
		var before_after_prev = $(this).next().children('a').children('span').first();
		var before_after_next = $(this).next().children('a').children('span').last();
		
		$(this).cycle({
			fx:      'scrollHorz',
			slideExpr: 'img',
			fit:           1,
			prev:    before_after_prev,
			next:    before_after_next,
			after: function (){
				$(this).parent().css("height", $(this).height());
			}
		});
	});

 	$("[id^=office-images-cycle]").each(function(){
		var office_images_prev = $(this).next().children('a').children('span').first();
		var office_images_next = $(this).next().children('a').children('span').last();
		
		$(this).cycle({
			fx:      'scrollHorz',
			slideExpr: 'img',
			fit:           1,
			prev:    office_images_prev,
			next:    office_images_next,
			after: function (){
				$(this).parent().css("height", $(this).height());
			}
		});
	});


	// responsive duties
	function jQueryResponsive() {
		var windowwidth = $(window).width();
		windowwidth += 17; // discrepancy fix
		/** MENU UPDATES **/
		if ( windowwidth <= 720) {
			$(".nav").hide();
			$("#nav_button").click(function () {
				if( $(this).hasClass('nav_bot_show') == true) {
					$(".nav").toggle();
				}
			});
		} else {
			$(".nav").show();
		}
	
		/** SIDEBAR UPDATES **/
		var sidebar = $("#web_side").html();
		if ( windowwidth  <= 950) {
			$("#mobile_side").html(sidebar);
            $("body.home .web_only").remove();
		}
		
	}



});