<?php
include 'order-send-functions.php';
//function twisted_enqueue() {
//	wp_enqueue_script(
//		'home-video',
//		get_stylesheet_directory_uri() . '/js/home-video.js',
//		array('jquery'),
//		'1.0.0',
//		true
//	);
//}
////add_action( 'wp_enqueue_scripts', 'twisted_enqueue' );

/*
 * Get template file name
 */
add_filter( 'template_include', 'twisted_var_template_include', 1000 );
function twisted_var_template_include( $t ) {
	$GLOBALS['current_theme_template'] = basename( $t );

	return $t;
}

function twisted_get_current_template( $echo = false ) {
	if ( ! isset( $GLOBALS['current_theme_template'] ) ) {
		return false;
	}

	if ( $echo ) {
		echo $GLOBALS['current_theme_template'];
	} else {
		return $GLOBALS['current_theme_template'];
	}
}

/*
 * Remove SKUs
 * https://docs.woocommerce.com/wc-apidocs/function-wc_product_sku_enabled.html
 */
add_filter( 'wc_product_sku_enabled', '__return_false' );

/*
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

/*
 * Hide ingredients category
 */
/*function custom_pre_get_posts_query( $q ) {

	$tax_query = (array) $q->get( 'tax_query' );

	$tax_query[] = array(
		'taxonomy' => 'product_cat',
		'field' => 'slug',
		'terms' => array( 'ingredients' ), // Don't display products in the clothing category on the shop page.
		'operator' => 'NOT IN'
	);


	$q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );*/

/*
 * Remove links from products to disable links to product detail pages
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

/*
 * Add quantity input in "Add to cart"
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );

function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}

	return $html;
}

// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Add CSS class to main content opening div
function sitepoint_base_woocommerce_before_main_content() {
	if ( is_product() ) {
		echo '<div class="grid-100 twisted-main-content">';
	} else {
		echo '<div class="grid-70 twisted-main-content">';
	}
}

// Change "add to cart" button text
//add_filter( 'woocommerce_product_add_to_cart_text' , 'twisted_woocommerce_product_add_to_cart_text' );
/**
 * custom_woocommerce_template_loop_add_to_cart
 */
function twisted_woocommerce_product_add_to_cart_text() {
	global $product;

	if ($product->is_type( 'external' )) {
		return __( 'Buy product', 'woocommerce' );
	} elseif ($product->is_type( 'grouped' )) {
		return __( 'View products', 'woocommerce' );
	} elseif ($product->is_type( 'simple' )) {
		return '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
		//return __( 'Add to cart', 'woocommerce' );
	} elseif ($product->is_type( 'variable' )) {
		return __( 'Select options', 'woocommerce' );
	} else {
		return __( 'Read more', 'woocommerce' );
	}
}

// Checkout form fields
add_filter( 'woocommerce_checkout_fields', 'twisted_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function twisted_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_address_2']);

	return $fields;
}

// Remove pagination
function sitepoint_base_shop_product_count( $numprods ) {
	return 250;
}