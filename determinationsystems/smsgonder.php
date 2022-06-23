<?php

$api_url     = "https://papitya.mobikob.com/sms/bulk/api/";

////////////////// Değişecek Alanlar ////////////////////////
$api_user     = "uguryucel1881@gmail.com"; // user@mail (Profilinizden öğrenebilirsiniz)
$api_pass     = "Reolax012.!"; // Mobikob Parolanız
$head         = "08503800058";  
$to           = "905332083010"; // 905000000000 format
$msg          = "Merhaba"; // Mesaj
///////////////////////////////////////////////////////////

$payload = array(
	'api_user' => $api_user,
	'api_pass' => $api_pass,
	'head' => $head ,
	'messages' =>array(
		array(
			'to'       => $to,
			'msg'      => $msg,
		)
	)
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_URL,$api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
$result = curl_exec($ch);
curl_close($ch);
echo($result);

?>