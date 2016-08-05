<?php

// Get any current theme settings
$theme_settings = get_option( 'anva_settings' );

// Define constants
define( 'ANVA_DIR', get_template_directory() );
define( 'ANVA_URI', get_template_directory_uri() );
define( 'ANVA_FRAMEWORK_DIR', get_template_directory() . '/framework' );
define( 'ANVA_FRAMEWORK_URI', get_template_directory_uri() . '/framework' );
define( 'ANVA_SETTINGS', serialize( $theme_settings ) );

// Inlclude files
include_once( ANVA_FRAMEWORK_DIR . '/includes/actions.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/display.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/meta.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/helpers.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/elements.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/media.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/locals.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/parts.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/general.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/widgets.php' );
include_once( ANVA_FRAMEWORK_DIR . '/includes/shortcodes.php' );
include_once( ANVA_FRAMEWORK_DIR . '/plugins/contact-email.php' );
include_once( ANVA_FRAMEWORK_DIR . '/plugins/slideshows.php' );
include_once( ANVA_FRAMEWORK_DIR . '/plugins/bem-menu.php' );

// Validate if Woocommerce plugin is activated
if ( class_exists( 'Woocommerce' ) ) :
	include_once( ANVA_FRAMEWORK_DIR . '/plugins/woocommerce-config.php' );
endif;

// Admin
if ( is_admin() ) {
	include_once( ANVA_FRAMEWORK_DIR . '/admin/settings.php' );
}

// Initial actions
add_action( 'init', 'anva_register_menus' );
add_action( 'anva_texdomain', 'anva_theme_texdomain' );
add_action( 'wp', 'anva_setup_author' );
add_action( 'wp_enqueue_scripts', 'anva_load_scripts', 12 );
add_action( 'widgets_init', 'anva_register_sidebars' );
add_action( 'widgets_init', 'anva_register_widgets' );	
add_action( 'admin_bar_menu', 'anva_settings_menu_link', 1000 );
add_action( 'after_setup_theme', 'anva_add_image_sizes' );
add_action( 'image_size_names_choose', 'anva_image_size_names_choose' );
add_action( 'after_setup_theme', 'anva_add_theme_support' );
add_filter( 'next_posts_link_attributes', 'anva_posts_link_attr' );
add_filter( 'previous_posts_link_attributes', 'anva_posts_link_attr' );
add_filter( 'next_post_link', 'anva_post_link_attr' );
add_filter( 'previous_post_link', 'anva_post_link_attr' );
add_filter( 'the_generator', 'anva_kill_version' );
add_filter( 'wp_page_menu_args', 'anva_page_menu_args' );
add_filter( 'body_class', 'anva_body_classes' );
add_filter( 'body_class', 'anva_browser_class' );
add_filter( 'wp_title', 'anva_wp_title', 10, 2 );
add_filter( 'wp_mail_from', 'anva_wp_mail_from' );
add_filter( 'wp_mail_from_name', 'anva_wp_mail_from_name' );
add_filter( 'pre_get_posts', 'anva_search_filter' );
add_filter( 'comment_reply_link', 'replace_reply_link_class' );

// Hooks
add_action( 'add_meta_boxes', 'anva_add_page_options' );
add_action( 'save_post', 'anva_page_options_save_meta', 1, 2 );
add_action( 'wp_head', 'anva_apple_touch_icon' );
add_action( 'wp_head', 'anva_custom_css' );
add_action( 'wp_head', 'anva_navigation' );
add_action( 'wp_head', 'anva_viewport', 8 );
add_action( 'anva_header_addon', 'anva_site_search' );
add_action( 'anva_header_logo', 'anva_header_logo_default' );
add_action( 'anva_main_navigation', 'anva_main_navigation_default' );
add_action( 'anva_footer_content', 'anva_footer_widget' );
add_action( 'anva_footer_text', 'anva_footer_text_default' );
add_action( 'anva_layout_before', 'anva_ie_browser_message' );
add_action( 'anva_layout_after', 'anva_debug_queries' );
add_action( 'anva_content_before', 'anva_breadcrumbs' );
add_action( 'anva_content_before', 'anva_content_before_default' );
add_action( 'anva_content_after', 'anva_content_after_default' );
add_action( 'anva_sidebar_layout_before', 'anva_sidebar_layout_before_default' );
add_action( 'anva_sidebar_layout_after', 'anva_sidebar_layout_after_default' );

// Plugin Hooks
add_action( 'init', 'anva_contact_send_email' );
add_action( 'after_setup_theme', 'anva_slideshows_setup' );

// Hook textdomain
do_action( 'anva_texdomain' );

// Load theme functions
include_once( ANVA_DIR . '/functions/theme-functions.php' );
