<?php


class ReCaptchaValidator
{
	private $_reCaptchaResponse;
	private $_config;

	/**
	 * ReCaptchaValidator constructor.
	 * @param $recaptchaResponse
	 * @throws Exception
	 */
	function __construct($recaptchaResponse){

		if (empty($recaptchaResponse)){
			throw new Exception('no recaptcha response supplied');
		}
		$this->_reCaptchaResponse = $recaptchaResponse;
		$this->_config = parse_ini_file("config.ini", true);

	}

	/**
	 * @return mixed
	 */
	public function validate()
	{
		$data = array(
			'secret' => $this->_config['recaptcha']['secret'],
			'response' => $this->_reCaptchaResponse,
			'remoteip' => $_SERVER['REMOTE_HOST'],
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, $this->_config['recaptcha']['reCaptchaValidationEndPoint']);
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

		$response = json_decode(curl_exec($verify));

		return $response->success;
	}

}