<?php
$txt = file_get_contents('http://www.sirikitdam.egat.com/water/sk_data.php');
//require_once('./LINEBot.php');
$luserid='Cad4ac4256b3f1f38aa76d566b1219f32';
$access_token = 'GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=';
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
'text' => $txt
),
array(
'type' => 'image',
//'originalContentUrl' => 'http://ptcdn.info/images/unknown-avatar.png',
//'previewImageUrl' => 'http://ptcdn.info/images/unknown-avatar.png'
//'originalContentUrl' => 'https://www.google.co.th/logos/doodles/2016/king-bhumibol-adulyadej-1927-2016-5148101410029568-res.png',
'originalContentUrl' => 'https://maemooodd.herokuapp.com/fpic_org.php',
'previewImageUrl' => 'https://maemooodd.herokuapp.com/fpic_pre.php'
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