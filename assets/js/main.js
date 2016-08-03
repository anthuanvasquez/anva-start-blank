(function($) {

	'use strict';

	var bp = {
		smallest: 320,
    	handheld: 480,
    	tablet: 768,
    	laptop: 992,
    	desktop: 1199
	};

	var initialize = {

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
		
		Scroll: function(target) {
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$(target).fadeIn(200);
				} else {
					$(target).fadeOut(200);
				}
			});

			$(target).click(function(e) {
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
		// TOC
		// ---------------------------------------------------------
		
		TOC: function() {
			var menu = $(".fl-menu-toc");

			if ( menu.length > 0 ) {
				var target = $(".fl-menu ul > li > .fl-menu-section > h2"),
					html = '',
					list,
					el,
					id,
					title,
					link;

				html += "<div class='fl-menu-toc__wrap'>";
				html += "<h2 class='fl-menu-toc__heading'><i class='fl-menu-toc__icon fa fa-bars'></i> Menu</h2>";
				html += "<ul class='fl-menu-toc__list clearfix'>";
				
				target.each( function() {
					el    = $(this);
					id    = $(this).parent('.fl-menu-section');
					title = el.text();
					link  = "#" + id.attr("id");
					list  = "<li class='fl-menu-toc__item'>" + "<a class='fl-menu-toc__link' href='" + link + "'>" + title + "</a>" + "</li>";
					html += list;
				});

				html += "</ul>";
				html += "</div>";

				menu.prepend(html);

				$('.fl-menu a[href*=#]:not([href=#])').on( 'click', function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html, body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			}
			
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

			initialize.Popup('.gallery > .gallery-item, .single .entry__image');
			initialize.Menu('.navigation-menu, .off-canvas-menu');
			initialize.RemoveEmpty('div.fl-thumbnail');
			initialize.RemoveEmpty('p');
			initialize.Toggle();
			initialize.Scroll('#gotop');
			initialize.Responsive();

			if ( 1 == ANVAJS.plugin_foodlist ) {
				initialize.TOC();
			}

		}

	};

	initialize.Init();

})(jQuery);
