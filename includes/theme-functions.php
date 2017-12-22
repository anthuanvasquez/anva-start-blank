<?php

/*-----------------------------------------------------------------------------------*/
/* Theme Functions
/*-----------------------------------------------------------------------------------*/

/**
 * Post types to be used in the theme.
 * ex. portfolio, galleries, events, team, clients, slideshows
 *
 * @return array
 */
function anva_theme_post_types() {
	$post_types = array( 'anime' );
	return $post_types;
}
add_filter( 'anva_post_types_list', 'anva_theme_post_types', 1 );

/**
 * Add theme support features
 */
function anva_theme_setup() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'anva_theme_setup' );

/**
 * Change the start year in footer.
 */
function anva_theme_start_year() {
	return 2015;
}
add_filter( 'anva_footer_year', 'anva_theme_start_year' );

/**
 * Change footer credits.
 */
function anva_theme_footer_credits() {
	return __( 'Development by', 'anva-start' );
}
add_filter( 'anva_footer_credits', 'anva_theme_footer_credits' );

/**
 * Change footer author.
 */
function anva_theme_footer_author() {
	return  '<a href="'. esc_url( 'http://anthuanvasquez.net/') .'">'. __( 'Anthuan Vásquez', 'anva-start' ) .'</a>.';
}
add_filter( 'anva_footer_author', 'anva_theme_footer_author' );
add_filter( 'anva_login_author', 'anva_theme_footer_author' );
