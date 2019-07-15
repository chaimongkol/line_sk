<?php
$txt = file_get_contents("http://www.sirikitdam.egat.com/sk_line/images/sk_line.txt");
$strAccessToken = "GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=";
$luserid = array("Cad4ac4256b3f1f38aa76d566b1219f32","U5e103b05336235f61c6b2ecb9384726e");
	  
$message = array(
	'to' => $luserid[1],
'messages' => array(
	'type' => 'text',
	'text' => $txt
));

$header = array(
	"Content-Type: application/json; charser=UTF-8",
	'Authorization: Bearer ' . $access_token,
);
$context = stream_context_create(array(
	"http" => array(
		"method" => "POST",
		"header" => implode("\r\n", $header),
		"content" => json_encode($message),
					),
));

$response = file_get_contents('https://api.line.me/v2/bot/message/multicast', false, $luserid[1]);

echo "Request failed: " . $luserid[1];

?>