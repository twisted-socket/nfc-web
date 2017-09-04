<?php
if ('POST' != $_SERVER['REQUEST_METHOD'] || empty($_POST) ){
	Header("Location: /");
}

$contactName = empty($_POST['contact_name']) ? null : $_POST['contact_name'];
$contactEmail = empty($_POST['contact_email']) ? null : $_POST['contact_email'];
$contactSubject = empty($_POST['contact_subject']) ? null : $_POST['contact_subject'];
$body = empty($_POST['contact_message']) ? null : $_POST['contact_message'];
$origin = empty($_POST['id']) ? null :  $_POST['id'];
$recaptchaResponse = empty($_POST['g-recaptcha-response']) ? null :  $_POST['g-recaptcha-response'];


if (empty($contactName) || empty($body) || empty($contactSubject) || empty($recaptchaResponse) || ! filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
	exit();
}
include_once './lib/ReCaptchaValidator.php';

$validator = new ReCaptchaValidator($recaptchaResponse);

if (!$response = $validator->validate()){
	error_log("Recaptcha validation from referer {$_SERVER['HTTP_REFERER']} error: " . var_export($response,true));
	die();
}

include_once './lib/Mailer.php';

$mailer = new Mailer($_POST);

$result = $mailer->sendMail();

$referer = $_SERVER['HTTP_REFERER'];
Header("Location: /");


