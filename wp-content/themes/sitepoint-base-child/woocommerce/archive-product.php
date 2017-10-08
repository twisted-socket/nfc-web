<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

    </header>

		<?php
		// List posts by the terms for a custom taxonomy of any post type
		$post_type = 'product';
		$tax = 'product_cat';
		$tax_terms = get_terms( $tax, 'orderby=name&order=ASC');
		if ($tax_terms) {
			foreach ($tax_terms as $tax_term) {
				$args = array(
					'post_type'         => $post_type,
					"$tax"              => $tax_term->slug,
					'post_status'       => 'publish',
					'posts_per_page'    => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'id',
							'terms' => array(17, 37, 57, 60, 76),
							'operator' => 'NOT IN',
						),
					)
				);

				$my_query = null;
				$my_query = new WP_Query($args);

				if( $my_query->have_posts() ) { ?>

					<?php
						/**
						 * woocommerce_before_shop_loop hook.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<table class="products shop_table">
							<thead>
								<tr class="table_header">
									<th colspan="3"><?php echo $tax_term->name; // Group name (taxonomy) ?> <div style="float: right;" class="sign"></div></th>
								</tr>
							</thead>

						<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

							<?php
							/**
							 * woocommerce_shop_loop hook.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
							?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of loop ?>

				<?php } // if have_posts()
					wp_reset_query();
				} // end foreach #tax_terms
			} // end if tax_terms
			?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
		// TWISTED: below the tem mini-cart fix (explicit call)
	?>

	<div class="grid-30 tablet-grid-30 mobile-grid-100 twisted-sidebar">
		<div id="secondary" class="widget-area" role="complementary">
			<aside id="woocommerce_widget_cart-3" class="widget woocommerce widget_shopping_cart">
				<h3 class="widget-title">Καλάθι</h3>
				<div class="widget_shopping_cart_content">

					<?php
					do_action( 'woocommerce_before_mini_cart' ); ?>

					<?php if ( ! WC()->cart->is_empty() ) : ?>

						<ul class="woocommerce-mini-cart cart_list product_list_widget <?php //echo esc_attr( $args['list_class'] ); ?>">
							<?php
							do_action( 'woocommerce_before_mini_cart_contents' );

							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
									$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
									<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );

										echo $product_name . '&nbsp;';

										echo WC()->cart->get_item_data( $cart_item );

										echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									</li>
									<?php
								}
							}

							do_action( 'woocommerce_mini_cart_contents' );
							?>
						</ul>

						<p class="woocommerce-mini-cart__total total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

						<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

						<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

					<?php else : ?>

						<p class="woocommerce-mini-cart__empty-message"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_after_mini_cart' ); ?>

				</div>
			</aside>
		</div>
	</div>

<?php get_footer( 'shop' );