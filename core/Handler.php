<?php
	session_start();

	/*
		**
		*
		** 	Chikka SMS Handler 
		*
		*	Author : R.Santillan 
		*

	 */
	
	error_reporting(0);

	include('api/ChikkaSMS.php');
	include('api/recaptcha.php');


	class Handler {

		/* Chikka SMS Credentials */

		
		protected $clientId = 'c4347485379ad1a27451d0251ab692a4743912e090c809959cce1afce56aa5be';
		protected $secretKey = 'cb0ac42fcc95fd949043777b68e5f0746a990c6a99024bdc4b8a6267825f6702';
		protected $shortCode = '2929080109';


		/*protected $clientId = 'b696a2a205157fbae7d85131649b205ee806e4f175e4332f81a78ec63ec3b3be';
		protected $secretKey = '46712f76fd760d16e9422a407f9eee2ab25539200767f9ace7a88e283c9cb59c';
		protected $shortCode = '2929006197';*/

		/* Recaptcha credentials */

		// secret key
		protected $secret = "6LfCZEAUAAAAAGviVYjVRsPKWun-0P7T3I7WjP3n";
		 
		
		//message response
		protected $response;

		protected $captcha;

		//chikka instance
		protected $chikkaAPI;

		function __construct(){

			$this->chikkaAPI = new ChikkaSMS($this->clientId,$this->secretKey,$this->shortCode);


		}
	 

		public function sendMessage($msg,$number){

			$message_id = $this->generate();
			$this->response = $this->chikkaAPI->sendText($message_id, $number, $msg);

			//get the response
			return $this->getChikkaResponse();

		}

		public function getChikkaResponse(){

			if($this->response->status == 200){

				header("HTTP/1.1 " . $response->status . " " . $response->message);
				$_SESSION['flash'] = "Message sent.";


			}else{

				$_SESSION['flash'] = "Message sending failed.";
				
			}

			return print $this->response->description;;


		}

	
		public function verifyCaptchaSecretKey($gkey){

			$reCaptcha = new ReCaptcha($gkey);

			 $captcha_response = $reCaptcha->verifyResponse(

		        $_SERVER["REMOTE_ADDR"],
		        $gkey

	   	 	);

			return true;

	

		}

		//generate random number for message id
		public function generate(){

			return rand(99,999999);
		}

		
	}

	

	


?>