<?php
	$accessToken = "tXcJm7M2Tt9pwhO4+yooh8C2zjvnuqwPbWhAFvD2nfBYlL5Iq/hByHS7+1pXWw+buN1FqqiSnh+Nx4mx4OITNr8bTXIjFGrbB9bUtnCYH+zBzX7XnijnBTSkZ+W6bDb9GUoM3gM/wdPpLBvhtXTcQdB04t89/1O/w1cDnyilFU=";
	$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {".$accessToken."}";
//รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
//รับ id ว่ามาจากไหน
   if(isset($arrayJson['events'][0]['source']['userId']){
      $id = $arrayJson['events'][0]['source']['userId'];
   }
   else if(isset($arrayJson['events'][0]['source']['groupId'])){
      $id = $arrayJson['events'][0]['source']['groupId'];
   }
   else (isset($arrayJson['events'][0]['source']['room'])){
      $id = $arrayJson['events'][0]['source']['room'];
   }
//ตัวอย่าง Message Type "Text + Sticker"
   if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
   }
function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
exit;
?>
