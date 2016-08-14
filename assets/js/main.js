(function($) {

	'use strict';

	// Breakpoints
	var bp = {
		smallest: 320,
    	handheld: 480,
    	tablet: 768,
    	laptop: 992,
    	desktop: 1199
	};
	
	var ANVASTART = {

		// ---------------------------------------------------------
		// Lightbox
		// ---------------------------------------------------------
		
		popup: function(target) {
			$(target).magnificPopup({
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

		// ---------------------------------------------------------
		// Scroll go top button
		// ---------------------------------------------------------
		
		scroll: function() {
			$(window).on( 'scroll', function() {
				if ($(this).scrollTop() > 200) {
					$('#gotop').fadeIn(200);
				} else {
					$('#gotop').fadeOut(200);
				}
			});

			$('#gotop').on( 'click', function(e) {
				e.preventDefault();
				$('html, body').animate({ scrollTop: 0 }, 'slow');
			});
		},

		// ---------------------------------------------------------
		// Superfish Menu
		// ---------------------------------------------------------
		
		menu: function(target, rows) {
			$(target).superfish({
				delay: 500,
				animation:   {
					opacity: 'show',
					height: 'show'
				},
				speed: 'fast',
				cssArrows: false
			});
		},

		// ---------------------------------------------------------
		// Remove empty elements
		// ---------------------------------------------------------
		
		removeEmptyElements: function(target) {
			$(target + ':empty').remove();
			$(target).filter( function() {
				return $.trim( $(this).html() ) == '';
			}).remove();
		},

		// ---------------------------------------------------------
		// Toogle for shortcodes
		// ---------------------------------------------------------
		
		toggle: function() {
			$('div.toggle-info').hide();
			$('h3.toggle-trigger').click(function(e) {
				e.preventDefault();
				$(this).toggleClass("is-active").next().slideToggle("normal");
			});
			$('#mobile-toggle').tooltip();

		},

		// ---------------------------------------------------------
		// Enquire JS
		// ---------------------------------------------------------
		
    	responsive: function() {
    		enquire.register("screen and (max-width: " + bp.laptop + "px)", {match : function() {
					
				},
				unmatch : function() {
					
				}
			});
    	},

		// ---------------------------------------------------------
		// Init Function
		// ---------------------------------------------------------
		
		init: function() {

			var $lightbox = '.gallery .gallery-item, .single .entry__thumbnail',
				$menu     = '.navigation-menu, .off-canvas-menu',
				$thumb    = '.fl-thumbnail';

			ANVASTART.popup($lightbox);
			ANVASTART.menu($menu);
			ANVASTART.removeEmptyElements($thumb);
			ANVASTART.removeEmptyElements('p');
			ANVASTART.toggle();
			ANVASTART.scroll();
			ANVASTART.gallery();
			ANVASTART.responsive();

		}

	};

	ANVASTART.init();

})(jQuery);
