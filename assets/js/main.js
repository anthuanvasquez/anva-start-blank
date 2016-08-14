(function($) {

	'use strict';

	// Breakpoints
	var bp = {
		smallest: 320,
    	handheld: 480,
    	tablet: 768,
    	laptop: 992,
    	desktop: 1200
	};
	
	var ANVASTART = {
		
		lightbox: function() {
			var $lightbox = $('.gallery .gallery-item, .single .entry__thumbnail');
			$lightbox.magnificPopup({
				delegate: 'a',
				removalDelay: 300,
				type: 'image',
				mainClass: 'mfp-with-zoom',
				titleSrc: 'title',
				gallery: {
					enabled: true
				}
			});
		},

		gallery: function() {
			var gallery = $('.gallery');
			if ( gallery.length > 0 ) {
				var columns = $.grep(gallery.attr('class').split(' '), function(v, i) {
			    	return v.indexOf('gallery-columns') === 0;
				}).join();
			
				gallery.find('.gallery-item').width( 100 / parseInt( columns.replace('gallery-columns-', '' ) ) + '%' );
			}
		},

		goToTop: function() {
			var $goToTopEl = $('#gototop'),
				elementScrollSpeed = $goToTopEl.attr('data-speed');

			if ( ! elementScrollSpeed ) {
				elementScrollSpeed = 700;
			}

			$goToTopEl.on( 'click', function() {
				$('body, html').animate({
					'scrollTop': 0
				}, Number( elementScrollSpeed ) );
				return false;
			});
		},

		goToTopScroll: function() {

			var $goToTopEl = $('#gototop'),
				elementOffset = $goToTopEl.attr('data-offset');

			if ( ! elementOffset ) {
				elementOffset = 450;
			}

			if ( $(window).scrollTop() > Number( elementOffset ) ) {
				$goToTopEl.fadeIn();
			} else {
				$goToTopEl.fadeOut();
			}
		},
		
		menu: function() {
			var $menu = $('.navigation-menu, .off-canvas-menu');
			$menu.superfish({
				delay: 500,
				animation:   {
					opacity: 'show',
					height: 'show'
				},
				speed: 'fast',
				cssArrows: false
			});
		},
		
		toggle: function() {
			$('div.toggle-info').hide();
			$('h3.toggle-trigger').click(function(e) {
				e.preventDefault();
				$(this).toggleClass("is-active").next().slideToggle("normal");
			});
			$('#mobile-toggle').tooltip();

		},
		
    	responsiveClasses: function() {
    		var $body = $('body');

    		// Queries
    		var	desktopQuery = "(min-width: " + bp.desktop + "px) and (max-width: 10000px)",
    			laptopQuery  = "(min-width: " + bp.laptop + "px) and (max-width: " + ( bp.desktop - 1 ) + "px)",
    			tabletQuery  = "(min-width: " + bp.tablet + "px) and (max-width: " + ( bp.laptop - 1 ) + "px)",
    			handheldQuery  = "(min-width: " + bp.handheld + "px) and (max-width: " + ( bp.tablet - 1 ) + "px)",
    			smallestQuery  = "(min-width: " + 0 + "px) and (max-width: " + ( bp.handheld - 1 ) + "px)";

    		// Handlers
    		var desktopHandler = {
    			match : function() { $body.addClass('device-lg'); },
        		unmatch : function() { $body.removeClass('device-lg'); }
    		},
    		laptopHandler = {
    			match : function() { $body.addClass('device-md'); },
        		unmatch : function() { $body.removeClass('device-md'); }
    		},
    		tabletHandler = {
    			match : function() { $body.addClass('device-sm'); },
        		unmatch : function() { $body.removeClass('device-ms'); }
    		},
    		handheldHandler = {
    			match : function() { $body.addClass('device-xs'); },
        		unmatch : function() { $body.removeClass('device-xs'); }
    		},
    		smallestHandler = {
    			match : function() { $body.addClass('device-xxs'); },
        		unmatch : function() { $body.removeClass('device-xxs'); }
    		};

    		enquire.register(desktopQuery,  desktopHandler);
			enquire.register(laptopQuery,   laptopHandler);
			enquire.register(tabletQuery,   tabletHandler);
			enquire.register(handheldQuery, handheldHandler);
			enquire.register(smallestQuery, smallestHandler);

    	},

    	windowResize: function() {
    		ANVASTART.responsiveClasses();

    		$(window).on( function() {
    			// Stuff Here
    		});
    	},

    	windowScroll: function() {
    		$(window).on('scroll', function() {
    			ANVASTART.goToTopScroll();
    		});
    	},
		
		init: function() {

			ANVASTART.lightbox();
			ANVASTART.menu();
			ANVASTART.toggle();
			ANVASTART.goToTop();
			ANVASTART.gallery();
			ANVASTART.windowResize();
			ANVASTART.windowScroll();

		}

	};

	$(document).ready( ANVASTART.init );

})(jQuery);
