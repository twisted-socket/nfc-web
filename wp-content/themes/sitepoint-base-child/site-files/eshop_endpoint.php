<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	echo json_encode(array('status' => 'error', 'message' => 'wrong_method'));
}

if (empty($_POST)) {
	echo json_encode(array('status' => 'error', 'message' => 'empty_post'));
}

// Check captcha
if ( ! empty($_POST['g-recaptcha-response'])) {
	include_once './lib/ReCaptchaValidator.php';
	$validator = new ReCaptchaValidator($_POST['g-recaptcha-response']);
	if ( ! $response = $validator->validate()) {
		error_log("Recaptcha validation from referer {$_SERVER['HTTP_REFERER']} error: " . var_export($response, true));
		echo json_encode(array('status' => 'error', 'message' => 'false_recaptcha'));
	}
}

if (empty($_POST['order']) || ! is_array($_POST['order'])) {
	echo json_encode(array('status' => 'error', 'message' => 'empty_order'));
}
else {
	$order = [
		'items' => $_POST['order'],
		'comments' => $_POST['contact_message']
	];
	if ( ! send_order($order)) {
		echo json_encode(array('status' => 'error'));
	}

	$user_msg = 'Λάβαμε την παραγγελία σας:<br /><br /><ul style="padding-left:30px;">';
	foreach ($_POST['order'] as $prod) {
		$user_msg .= '<li>' . $prod . '</li>';
	}
	$user_msg .= '</ul><br />Θα είμαστε κοντά σας σε λίγα λεπτά!';
	echo json_encode(array('status' => 'success', 'message' => $user_msg));
}

function send_order($order)
{
	$orderItems = [];
	$comments = $order['comments'];
	$orderId = 0;
	$storeId = 1;

	foreach ($order['items'] as $index => $orderItemRaw) {
		$orderItem = [];
		$orderItem['name'] = $orderItemRaw;
		$orderItem['quantity'] = 1;
		$orderItem['price'] = "$index.00€";
		array_push($orderItems, $orderItem);
	}
	// send to printer
	$payload = new stdClass();
	$order = [
		'id' => $orderId,
		"storeId" => $storeId,
		'address' => 'Ηρώδου του Αττικού 19, Αθήνα',
		"firstName" => "Ελένη",
		"lastName" => "Παπαδοπούλου",
		"floor" => "1",
		"lat" => 37.9708935,
		"lon" => 23.722387,
		"comments" => $comments,
		'print' => true,
		'orderItems' => $orderItems
	];

	$payload->order = (object)$order;
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_PORT => "8000",
		CURLOPT_URL => "http://netfoodcafe.no-ip.info:8000/processOrder",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($payload),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		error_log("Unable to send order cURL Error #:" . $err);
		return false;
	}
	else {
		return json_decode($response);
	}
}