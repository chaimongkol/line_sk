
<?php
$access_token = 'GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$luserid= $event['source']['groupId'];

			// Build message to reply back
//			$messages = [
//				'type' => 'text',
//				'text' => $text
//			];
			/*$messages = [
				'type' => 'text',
				'text' => '-replyToken->'.$replyToken.'<-userid-->>>'.$content
			];
*/
//$txt = file_get_contents('http://www.sirikitdam.egat.com/water/sk_data.php');
//require_once('./LINEBot.php');
//$luserid='Cad4ac4256b3f1f38aa76d566b1219f32';
$luserid='U5e103b05336235f61c6b2ecb9384726e';
//$access_token = 'GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=';
//
//$channel_secret = 'fea9b63c2d3c7edd3a177eb6953e9ede';
//
//$data = [
// 'channelSecret' => $access_token,
// 'endpointBase' => 'https://api.line.me'
// ];
//
//$client = new LINEBot($channelAccessToken, $channelSecret);

$message = array(
'to' => $luserid,
'messages' => array(
array(
'type' => 'text',
'text' => '-replyToken->'.$replyToken.'<-userid-->>>'.$content
)
)
);
$header = array(
"Content-Type: application/json; charser=UTF-8",
'Authorization: Bearer ' . $access_token,
//'X-LINE-ChannelToken: ' . $access_token,
);

$context = stream_context_create(array(
"http" => array(
"method" => "POST",
"header" => implode("\r\n", $header),
"content" => json_encode($message),
),
));

$response = file_get_contents('https://api.line.me/v2/bot/message/push', false, $context);

echo "Request failed: " . $response;


/*
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
*/
?>