<?php
add_action( 'woocommerce_checkout_order_processed', 'send_order_to_orders_server', 10, 3 );
add_action( 'woocommerce_webhook_should_deliver', 'woocommerce_webhook_should_deliver_handler', 10, 3 );
add_action( 'woocommerce_webhook_payload', 'woocommerce_webhook_payload_handler', 10, 4 );

function woocommerce_webhook_should_deliver_handler ($should_deliver, $webhook, $arg){
	error_log($webhook);
}

function woocommerce_webhook_payload_handler ( $payload, $resource, $resource_id, $webhookid){
	//error_log($payload);

	$url         = 'http://docman84.ddns.net:8000/process.php';
	$url         = 'https://requestb.in/1ckuv8k1';
	$errorPrompt = 'Λυπούμαστε,η παργγελία δεν μπορεί να εξυπηρετηθεί αυτή τη στιγμή';
	$response    = wp_remote_post( $url, array(
			'method'      => 'POST',
			'timeout'     => 40,
			'redirection' => 3,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => [
				'Content-Type' => 'application/json'
			],
			'body'        => json_encode($payload),
			'cookies'     => []
		)
	);

	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		error_log( "Failed to print order #$resource_id: " . $error_message );
		throw new Exception( $errorPrompt );
	} else if ( 200 !== $response['response']['code'] ) {
		error_log( "Failed to print order #$resource_id:" . var_export( json_decode( $response['body'] ), true ) );
		error_log( "Result: " . var_export( $response, true ) );
		throw new Exception( $errorPrompt );

	} else {
		error_log( "Order #$resource_id printed:" . var_export( $response, true ) );
	}
}

/**
 * @param $order_id
 */
function send_order_to_orders_server( $order_id ) {

	$webHook_id = 55;
	$webHook = new WC_Webhook( $webHook_id );
	$webHook->build_payload($order_id);
}


function getOrderItems ( WC_Order $order ) {

	$data = [];
	/** @var WC_Order_item $item */
	foreach ( $order->get_items() as $item ) {
		$data []= $item->get_formatted_meta_data();
		error_log("meta: " . var_export($item->get_formatted_meta_data(),true));
	}
	return $data;
}

function getOrderMeta( WC_Order $order ){
	$orderMeta = [
		$order->get_billing_address_1(),
		$order->get_billing_address_2(),
		$order->get_billing_city(),
		$order->get_billing_first_name(),
		$order->get_billing_last_name(),
		$order->get_billing_email(),
		$order->get_billing_phone(),
	];

	return $orderMeta;
}