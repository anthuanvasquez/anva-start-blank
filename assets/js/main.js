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
		
		Popup: function(target) {
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

		// ---------------------------------------------------------
		// Scroll go top button
		// ---------------------------------------------------------
		
		Scroll: function() {
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
		
		Menu: function(target, rows) {
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
		
		RemoveEmpty: function(target) {
			$(target + ':empty').remove();
			$(target).filter( function() {
				return $.trim( $(this).html() ) == '';
			}).remove();
		},

		// ---------------------------------------------------------
		// Toogle for shortcodes
		// ---------------------------------------------------------
		
		Toggle: function() {
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
		
    	Responsive: function() {
    		enquire.register("screen and (max-width: " + bp.laptop + "px)", {match : function() {
					
				},
				unmatch : function() {
					
				}
			});
    	},

		// ---------------------------------------------------------
		// Init Function
		// ---------------------------------------------------------
		
		Init: function() {

			ANVASTART.Popup('.gallery > .gallery-item, .single .entry__image');
			ANVASTART.Menu('.navigation-menu, .off-canvas-menu');
			ANVASTART.RemoveEmpty('div.fl-thumbnail');
			ANVASTART.RemoveEmpty('p');
			ANVASTART.Toggle();
			ANVASTART.Scroll();
			ANVASTART.Responsive();

		}

	};

	ANVASTART.Init();

})(jQuery);
