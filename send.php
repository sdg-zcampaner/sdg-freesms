<?php


	include('api/ChikkaSMS.php');
	include('api/recaptcha.php');
	
	$message = $_POST['msg'];
	$number = $_POST['number'];

	//var_dump($_POST);

	/* Chikka SMS Credentials */
	$clientId = 'c4347485379ad1a27451d0251ab692a4743912e090c809959cce1afce56aa5be';
	$secretKey = 'cb0ac42fcc95fd949043777b68e5f0746a990c6a99024bdc4b8a6267825f6702';
	$shortCode = '2929006197';

	/* Recaptcha credentials */
		//  secret key
	$secret = "6LfrO_sSAAAAAIvdh6nz7k5ZJO8a-7gcPaPIgaEs";
	 
	// empty response
	$response = null;
	 
	// check secret key
	$reCaptcha = new ReCaptcha($secret);


	$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
	//$response = $chikkaAPI->sendText('1234561', $number, $message);


	//if($response->status != 200){
		//header("HTTP/1.1 " . $response->status . " " . $response->message);
	//}

	/* get response from recaptcha */
	if (isset($_POST["g-recaptcha-response"])) {

	    $response = $reCaptcha->verifyResponse(
	        $_SERVER["REMOTE_ADDR"],
	        $_POST["g-recaptcha-response"]
	    );

	}

	// echo $response->description;


?>