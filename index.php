<?php
echo "test.....";
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Asia/Bangkok");
$mytime = date("H:i");
	
		$userId = "ldAxAPwRhs4oZf6cPWEqKqEsqDL8tjg4lrTzWuS0fVR";
                //   C2048a27bf88cc4a85dcd1b7feb0406e5";
                $strAccessToken = "itXcJm7M2Tt9pwhO4+yooh8C2zjvnuqwPbWhAFvD2nfBYlL5Iq/hByHS7+1pXWw+buN1FqqiSnh+Nx4mx4OITNr8bTXIjFGrbB9bUtnCYH+zBzX7XnijnBTSkZ+W6bDb9GUoM3gM/wdPpLBvhtXTcQdB04t89/1O/w1cDnyilFU=";
                $txt = $txt = "ขอบคุณ ";
                $txt1 = $txt."\r\n Update ข้อมูล \r\n http://10.242.1.50/sk/sk_plan.php";
                $strUrl = "https://api.line.me/v2/bot/message/push";
                $arrHeader = array();
                $arrHeader[] = "Content-Type: application/json";
                $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
                $arrPostData['to'] = $userId;
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = $txt1;
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
                 
        echo "Send Line  OK---<br/>";

?>
