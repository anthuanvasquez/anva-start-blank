<?php
/**
 * WARNING: This template file is a core part of the
 * Woocommerce plugin.
 * @link https://wordpress.org/plugins/woocommerce/
 * 
 * This file contain extra settings for WooCommerce plugin.
 */

/**
 * Load Woocoomerce Mod Stylesheet
 */
function anva_woo_styles() {
	
	wp_enqueue_style( 'anva-woocommerce-styles', get_template_directory_uri() . '/assets/css/styles-woocommerce.css' );

}
add_action( 'wp_enqueue_scripts', 'anva_woo_styles' ); 

/**
 * Add woocomemrce sidebar locations
 */
function anva_woo_add_sidebar_locations( $locations ) {

	// Add shop shidebar
	$locations['shop'] = array(
		'args' => array(
			'id' => 'shop',
			'name' => __( 'Shop', 'anva-start' ),
			'description' => __( 'Shop Sidebar.', 'anva-start' ),
		),
	);

	// Add product sidebar
	$locations['product'] = array(
		'args' => array(
			'id' => 'product',
			'name' => __( 'Product', 'anva-start' ),
			'description' => __( 'Product Sidebar.', 'anva-start' ),
		),
	);

	return $locations;

}
add_filter( 'anva_get_sidebar_locations', 'anva_woo_add_sidebar_locations' );
