<?php
//require_once('./LINEBot.php');
//muood bot
//$luserid='';

//maeklong bot
$luserid='';

//muood bot
//$access_token = 'LyilFU='; 

//maeklong bot
$access_token = 'GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=';


$message = array(
'to' => $luserid,
'messages' => array(
array(
'type' => 'text',
'text' => ' วันนี้วันที่ '.date('l jS \of F Y h:i:s A')
),
array(
'type' => 'image',
'originalContentUrl' ='https://thumb9.shutterstock.com/display_pic_with_logo/2024126/461142145/stock-photo-uttaradit-thailand-june-lap-lae-city-gate-of-uttradit-lap-lae-is-a-district-in-the-461142145.jpg',
'previewImageUrl' ='https://thumb9.shutterstock.com/display_pic_with_logo/2024126/461142145/stock-photo-uttaradit-thailand-june-lap-lae-city-gate-of-uttradit-lap-lae-is-a-district-in-the-461142145.jpg'
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













//
//$luserid='U2eb5571102277c31038e5639a9ba064c';
//// Get POST body content
////$content = file_get_contents('php://input');
//// Parse JSON
////$events = json_decode($content, true);
//// Validate parsed JSON data
//
//
//$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
//$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channel_secret]);
//
//$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello push');
////$response = $bot->pushMessage('<to>', $textMessageBuilder);
//$response = $bot->pushMessage($luserid, $textMessageBuilder);

//echo $response->getHTTPStatus() . ' ' . $response->getBody();


echo "OKkkkkkkkkkkkkk";

?>