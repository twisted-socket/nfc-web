<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/18/2016
 * Time: 22:26
 */
class Mailer
{
	private $_to = 'mantzouranisc@gmail.com';
	private $_subject;
	private $_from = 'contact@netfoodface.com';
	private $_origin;
	private $_subjectPrefix;
	private $_postData;


	private $_IdToAddress = [
		"/contact/general.php" => 'contact@netfoodcafe.com',
		"/contact/store-fastfood-chalcis-farmakidou-1.php" => 'michalis@netfoodcafe.com',
		"/contact/store-fastfood-exo-panagitsa-papandreou-150.php" => 'michalis@netfoodcafe.com',
		"/contact/store-internet-cafe-exo-panagitsa-papandreou-150.php" => 'michalis@netfoodcafe.com',
		"/contact/general-manager.php" => 'michalis@netfoodcafe.com',
		"/contact/webmaster.php" => 'giorgoslaliotis@netfoodcafe.com',
		"/contact/technical.php" => 'giorgoslaliotis@netfoodcafe.com',
	];

	/**
	 * Mailer constructor.
	 * @param null $postData
	 */
	public function __construct($postData = null)
	{
		if (empty($postData)) {
			return false;
		}
		$this->_postData = $postData;
		$this->_origin = $this->_postData['origin'];
		$this->_to = $this->_IdToAddress[$this->_origin];
	}

	public function sendMail()
	{
		$result = mail($this->_to, $this->_makeSubject(), $this->_makeBody(), $this->_makeHeader());
		error_log("User with e-mail: {$this->_postData['contact_email']} ({$this->_postData['contact_name']} subject: {$this->_postData['contact_subject']} body: {$this->_postData['contact_message']} to address: {$this->_to}  ---result: " . var_export($result,
				true));
		return $result;
	}

	private function _makeSubject()
	{
		return $this->_subjectPrefix = '[Φόρμα Επικοινωνίας NetFoodCafe] - ' . $this->_postData['contact_subject'];
	}

	private function _makeHeader()
	{
		$header = "From:$this->_from \r\n";
		//$header .= "Bcc:resistance77@gmail.com \r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		return $header;
	}

	private function _makeBody()
	{
		$body = "<p><strong>O/H " . $this->_postData['contact_name'] . ", έγραψε:</strong><br>" . $this->_postData['contact_message'] . "</p>";
		$body .= "<br>";
		$body .= "<a href=\"mailto:" . $this->_postData['contact_email'] . "\">" . $this->_postData['contact_email'];
		return $body;
	}


}