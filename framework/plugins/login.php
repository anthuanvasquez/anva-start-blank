<?php

// Add print styles in login head
if ( ! has_action( 'login_enqueue_scripts', 'wp_print_styles' ) )
	add_action( 'login_enqueue_scripts', 'wp_print_styles', 11 );

// Hooks
add_action( 'login_enqueue_scripts', 'anva_login_styles' );
add_filter( 'login_headerurl', 'anva_login_logo_url' );
add_action( 'login_footer', 'anva_login_footer' );

/**
 * Custom login stylesheet.
 */
function anva_login_styles() {
	wp_enqueue_style( 'anva-login-styles', get_template_directory_uri() . '/assets/css/styles-login.css', array(), '', 'all' );
}

/**
 * Change the logo url.
 */
function anva_login_logo_url() {
	return home_url( '/' );
}

/**
 * Change the logo url title.
 */
function anva_login_logo_url_title() {
	return get_bloginfo( 'name' );
}

/**
 * Add custom text in login footer page.
 */
function anva_login_footer() {
	$url = 'http://anthuanvasquez.net/';
	$author = 'Anthuan Vasquez';
	printf(
		'<div class="login-footer"><p class="login-copyrights">&copy %1$s %2$s %3$s.</p></div>',
		date('Y'),
		apply_filters( 'anva_login_author', '<a href="'. esc_url( $url ) .'">' . esc_html( $author ) . '</a>'  ),
		anva_get_local( 'footer_copyright' )
	);
}
