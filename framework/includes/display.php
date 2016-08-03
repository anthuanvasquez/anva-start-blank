<?php

/*
 * IE browser warning
 */
function anva_ie_browser_message() {
	?>
	<!--[if lt IE 9]>
		<p class="alert alert-warning browsehappy"><?php printf( anva_get_local( 'browsehappy' ), esc_url( 'http://browsehappy.com/' ) ); ?></p>
	<![endif]-->
	<?php
}

/*
 * Display default header logo 
 */
function anva_header_logo_default() {
	$logo 	= anva_get_option('logo');
	$image 	= get_template_directory_uri() . '/assets/images/logo.png';
	$name 	= get_bloginfo( 'name' );
	?>
	<a class="logo__link" href="<?php echo home_url(); ?>" title="<?php echo $name; ?>">
		<?php
			printf(
				'<img class="logo__image" src="%1$s" alt="%2$s" />',
				( empty( $logo ) ? esc_url( $image ) : esc_url( $logo ) ),
				get_bloginfo( 'name' )
			);
		?>
	</a>
	<?php
}

/*
 * Display default main navigation
 */
function anva_main_navigation_default() {
	
	if ( ! has_nav_menu( 'primary' ) ) :
		printf( '<div class="well well-sm">' . anva_get_local( 'menu_message' ) . '</div>' );
		return '';
	endif;

	?>
	<a href="#" id="navigation-trigger" class="navigation-trigger" title="<?php echo anva_get_local( 'menu' ); ?>">
		<i class="fa fa-bars"></i>
	</a>
	<nav id="navigation" class="navigation navigation--style-2 clearfix">
		<div class="container">
			<?php
				bem_menu( 'primary', 'navigation-menu', array( 'clearfix' ) );
			?>
		</div>
	</nav><!-- #navigation (end) -->
	<?php
}

/*
 * Display social media icons
 */
function anva_social_icons() {
	$class = 'normal';
	$size = 24;
	printf(
		'<ul class="social-media social-style-%2$s social-icon-%3$s">%1$s</ul>',
		anva_social_media(),
		apply_filters( 'anva_social_media_style', $class ),
		apply_filters( 'anva_social_media_size', $size )
	);
}

/*
 * Print favion and apple touch icons in head
 */
function anva_apple_touch_icon() {
	$image_path = get_template_directory_uri() . '/assets/images';
	?>
	<!-- ICONS (start) -->
	<link rel="shortcut icon" href="<?php echo $image_path . '/favicon.png'; ?>" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $image_path . '/apple-touch-icon-76x76.png'; ?>" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $image_path . '/apple-touch-icon-120x120.png'; ?>" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $image_path . '/apple-touch-icon-152x152.png'; ?>" />
	<!-- ICONS (end) -->
	<?php
}

/*
 * Print meta viewport
 */
function anva_viewport() {
	if ( 1 == anva_get_option( 'responsive' ) ) :
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
	endif;
}

/*
 * Print custom css styles in head
 */
function anva_custom_css() {
	$styles = '';
	$custom_css = anva_get_option( 'custom_css' );
	$custom_css = anva_compress( $custom_css );
	if ( ! empty( $custom_css ) ) {
		$styles = '<style type="text/css">' . $custom_css . '</style>';
	}
	echo $styles; 
}

/*
 * Display footer widgets
 */
function anva_footer_widget() {
	$footer_cols = anva_get_option( 'footer_cols', '4' );
	$cols = 3;
	
	switch ( $footer_cols ) {
		
		case '12':
			$cols = 1;
			break;
		
		case '6':
			$cols = 2;
			break;

		case '4':
			$cols = 3;
			break;

		case '3':
			$cols = 4;
			break;
	}
	?>
	<div class="footer-widgets clearfix">
		<?php for ( $i = 1; $i <= $cols; $i++ ) : ?>
			<div class="grid_<?php echo $footer_cols; ?>">
				<?php if ( ! dynamic_sidebar( 'footer_' . $i  ) ) : endif; ?>
			</div>
		<?php endfor; ?>
	</div>
	<?php
}

/*
 * Display default footer text copyright
 */
function anva_footer_text_default() {
	printf(
		'<p class="copyrights__text">&copy; %1$s <strong>%2$s</strong> %3$s %4$s %5$s.</p>',
		anva_get_current_year( apply_filters( 'anva_footer_year', date( 'Y' ) ) ),
		get_bloginfo( 'name' ),
		anva_get_local( 'footer_copyright' ),
		apply_filters( 'anva_footer_credits', anva_get_local( 'footer_text' ) ),
		apply_filters( 'anva_footer_author', '<a href="'. esc_url( 'http://anthuanvasquez.net/') .'">Anthuan Vasquez</a>' )
	);
}

/*
 * Display breadcrumbs
 */
function anva_breadcrumbs() {
	$single_breadcrumb = anva_get_option( 'single_breadcrumb' );
	if ( 1 == $single_breadcrumb ) {
		if ( function_exists( 'yoast_breadcrumb' ) && ! is_front_page() && ! is_home() ) {
			?>
			<div id="breadcrumbs" class="breadcrumbs">
				<div class="breadcrumbs__wrap">
					<?php yoast_breadcrumb( '<p>', '</p>' ); ?>
				</div>
			</div><!-- #breadcrumbs (end) -->
			<?php
		}
	}
}

/*
 * Wrapper main content start
 */
function anva_content_before_default() {
	?>
	<div class="sidebar-layout">
	<?php
}

/*
 * Wrapper main content end
 */
function anva_content_after_default() {
	?>
	</div><!-- .sidebar-layout (end) -->
	<?php
}

/*
 * Display sidebars location before
 */
function anva_sidebar_layout_before_default() {
	if ( is_page() ) {
		
		$sidebar = anva_get_post_meta( '_sidebar_column' );
		
		// One sidebar
		if ( 'left' == $sidebar ) {
			anva_sidebars( 'left' );

		// Two sidebar
		} elseif( 'double' == $sidebar ) {
			anva_sidebars( 'left' );

		// Two sidebar left
		} elseif ( 'double_left' == $sidebar ) {
			anva_sidebars( 'left' );
			anva_sidebars( 'right' );
		}
	}
}

/*
 * Display sidebars location after
 */
function anva_sidebar_layout_after_default() {
	if ( is_page() ) {
		
		$sidebar = anva_get_post_meta( '_sidebar_column' );
		
		// One sidebar
		if ( 'right' == $sidebar ) {
			anva_sidebars( 'right' );

		// Two sidebar
		} elseif ( 'double' == $sidebar ) {
			anva_sidebars( 'right' );

		// Two sidebar right
		} elseif ( 'double_right' == $sidebar ) {
			anva_sidebars( 'left' );
			anva_sidebars( 'right' );
		}
	}
}

/*
 * Change navigation
 */
function anva_navigation() {
	$nav = anva_get_option( 'navigation' );
	switch( $nav ) :
	case 'off_canvas_navigation': ?>
	<script type="text/javascript">
	jQuery(document).ready( function($) {
		// Off Canvas Navigation
		var offCanvas = $('#off-canvas-trigger'),
			offCanvasNav = $('#off-canvas'),
			pageCanvas = $('#wrapper'),
			bodyCanvas = $('body');

		bodyCanvas.addClass('js-ready');

		offCanvas.click( function(e) {
			e.preventDefault();
			offCanvasNav.toggleClass('off-canvas--active');
			pageCanvas.toggleClass('wrapper--active');
		});

		// Hide Off Canvas Nav on Windows Resize
		$(window).resize( function() {
			var off_canvas_nav_display = $('#off-canvas').css('display');
			if( off_canvas_nav_display === 'block' ) {
				$('#off-canvas').removeClass('off-canvas--active');
				$('#wrapper').removeClass('wrapper--active');
			}
		});
	});
	</script>
	<?php break;
	case 'toggle_navigation': ?>
	<script type="text/javascript">
	jQuery(document).ready( function($) {
		// ---------------------------------------------------------
		// Show main navigation with slidetoggle effect
		// ---------------------------------------------------------
		$('#mobile-toggle').click( function(e) {
			e.preventDefault();
			$('#navigation').slideToggle();
		});

		// ---------------------------------------------------------
		// Show main navigation if is hide
		// ---------------------------------------------------------
		$(window).resize( function() {
			var nav_display = $('#navigation').css('display');
			if( nav_display === 'none' ) {
				$('#navigation').css('display', 'block');
			}
		});
	});
	</script>
	<?php break;
	endswitch;
}

/*
 * Display debug information if WP_DEBUG is enabled
 * and current user caen adminsitrator 
 */
function anva_debug_queries() {
	if ( true == WP_DEBUG && current_user_can( 'administrator' ) ) :
	?>
		<div class="alert alert-warning text-center">Page generated in <?php timer_stop(1); ?> seconds with <?php echo get_num_queries(); ?> database queries.</div>
	<?php
	endif;
}
