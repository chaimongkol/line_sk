<?php
 require("line.php");
$access_token = 'itXcJm7M2Tt9pwhO4+yooh8C2zjvnuqwPbWhAFvD2nfBYlL5Iq/hByHS7+1pXWw+buN1FqqiSnh+Nx4mx4OITNr8bTXIjFGrbB9bUtnCYH+zBzX7XnijnBTSkZ+W6bDb9GUoM3gM/wdPpLBvhtXTcQdB04t89/1O/w1cDnyilFU=';
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
			$luserid = $event['source']['userId'];
			$lgroupid = $event['source']['groupId'];
			//$luserid= $event['userId'];

			// Build message to reply back
//			$messages = [
//				'type' => 'text',
//				'text' => $text
//			];

			$messages = [
				'type' => 'text',
				'text' => '<Join Group>='.$lgroupid
			];



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

?>
