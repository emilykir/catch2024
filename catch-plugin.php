<?php
/*
Plugin Name: Silver Catch plugin
Description: Grandchild theme for the Boutique build as a plugin.
Author: AK
Author URI: http://www.silver-catch.com
Version: 1.0
*/


// Adds our new file with styles
function grandchild_add_styles() {
	wp_register_style( 'catch-style', plugins_url( 'catch-styles.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'catch-style' );
	wp_enqueue_style( 'kolker', '//fonts.googleapis.com/css2?family=Kolker+Brush&display=swap', array( 'storefront-style' ) );
}
add_action( 'wp_print_styles', 'grandchild_add_styles' );


// Adds our new file with scripts
function grandchild_add_scripts() {
	wp_register_script( 'catch-script', plugins_url( 'script.js', __FILE__ ), array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'catch-script' );
}
add_action( 'wp_print_scripts', 'grandchild_add_scripts' );

// Search for templates in plugin 'templates' dir, and load if exists
function grandchild_template_include( $template ) {

	if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template ) ) )
		$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template );

	return $template;
}
add_filter( 'template_include', 'grandchild_template_include', 11 );

include("catch-shortcodes.php");

/**
 * Remove homepage sections from default location
 *
 * @return void
 */
function remove_homepage_templates() {
	remove_action( 'homepage', 'storefront_product_categories', 20 );
	remove_action( 'homepage', 'storefront_featured_products', 40 );
	//remove_action( 'homepage', 'storefront_homepage_content',  10 );
	remove_action( 'homepage', 'storefront_recent_products', 30 );//New In
	remove_action( 'homepage', 'storefront_featured_products', 40 );
	remove_action( 'homepage', 'storefront_popular_products', 50 );//Fan Favorites
	remove_action( 'homepage', 'storefront_on_sale_products', 60 );
	remove_action( 'homepage', 'storefront_best_selling_products', 70 );
}
add_action( 'homepage', 'remove_homepage_templates', 9 );