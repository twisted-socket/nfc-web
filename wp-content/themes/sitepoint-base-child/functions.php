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
