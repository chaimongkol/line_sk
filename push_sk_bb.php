<?php
$userId = array("Cad4ac4256b3f1f38aa76d566b1219f32","U5e103b05336235f61c6b2ecb9384726e");
for( $i= 0 ; $i <= 1 ; $i++ )
{
		$strAccessToken = "GYrjDyElNtqUVbUPSZRGjWwXJMxMjdoVhh5dBs4cH93Nfg4gD2WiBPQ2hQ3nNgZgVb71OORyJ2wKijonaWEvBPjAvDJRL0o3QbHjA5ep0DUHC7uq0t2ruazmPrfP4WpIbqmJellDEm7uLsSrBIXAcgdB04t89/1O/w1cDnyilFU=";
		$txt = file_get_contents("http://dam.egat.co.th/line_data/bb_line.txt");
		$strUrl = "https://api.line.me/v2/bot/message/push";
		$arrHeader = array();
		$arrHeader[] = "Content-Type: application/json";
		$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
		$arrPostData['to'] = $userId[$i];
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = $txt;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$strUrl);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close ($ch);
}
echo "Send Line SK OK---<br/>";
echo "<meta http-equiv=\"refresh\" content=\"5;url=https://sirikitdam1.herokuapp.com/close.htm\"/>"
?>