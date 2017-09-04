<?php
function twisted_enqueue() {
	wp_enqueue_script(
		'home-video',
		get_stylesheet_directory_uri() . '/js/home-video.js',
		array('jquery'),
		'1.0.0',
		true
	);
}
//add_action( 'wp_enqueue_scripts', 'twisted_enqueue' );

/**
 * Get template file name
 */
add_filter( 'template_include', 'twisted_var_template_include', 1000 );
function twisted_var_template_include( $t ){
	$GLOBALS['current_theme_template'] = basename($t);
	return $t;
}

function twisted_get_current_template( $echo = false ) {
	if( !isset( $GLOBALS['current_theme_template'] ) ) {
		return false;
	}

	if( $echo ) {
		echo $GLOBALS['current_theme_template'];
	} else {
		return $GLOBALS['current_theme_template'];
	}
}

/**
 * Remove SKUs
 * https://docs.woocommerce.com/wc-apidocs/function-wc_product_sku_enabled.html
 */
add_filter( 'wc_product_sku_enabled', '__return_false' );

/**
 * Change ordering of Composite Products' components
 */
add_filter( 'woocommerce_composite_component_orderby', 'wc_cp_composite_component_orderby', 10, 3 );
function wc_cp_composite_component_orderby( $order_by_options, $component_id, $composite ) {
	return array_merge( array( 'menu_order' => __( 'Default sorting', 'woocommerce' ) ), $order_by_options );
}
add_filter( 'woocommerce_composite_component_default_orderby', 'wc_cp_composite_component_default_orderby', 10, 3 );
function wc_cp_composite_component_default_orderby( $default_order_by, $component_id, $composite ) {
	return 'menu_order';
}