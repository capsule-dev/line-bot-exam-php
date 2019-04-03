<?php // callback.php


     $accessToken = "kLYgimXu+xOMtleVXNAKsjeYwGoE58Rb2ophdLngeAt+6+pYsI5AMJJfEynjqfomgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePMISMmi4KLYd0gX7n7QTtk1EeQ6fIiktOroxFopsfBRgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];




#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "พี่เติ้ล"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "หน้าตาดีมากเลยจ้า";
        replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "พี่ปราย"){
             $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
             $arrayPostData['messages'][0]['type'] = "text";
             $arrayPostData['messages'][0]['text'] = "ม้าชัด ๆ มาได้ไง";
             replyMsg($arrayHeader,$arrayPostData);
         }


    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }

$thaiKey = array('ๅ', '+', '/', '๑', '-', '๒', 'ภ', '๓', 'ถ', '๔', 'ุ', 'ู', 'ึ', '฿', 'ค', '๕', 'ต', '๖', 'จ', '๗', 'ข', '๘', 'ช', '๙', 'ฃ', 'ฅ', 'ๆ', '๐', 'ไ', '"', 'ำ', 'ฎ', 'พ', 'ฑ', 'ะ', 'ธ', 'ั', 'ํ', 'ี', '๊', 'ร', 'ณ', 'น', 'ฯ', 'ย', 'ญ', 'บ', 'ฐ', 'ล', ',', 'ฟ', 'ฤ', 'ห', 'ฆ', 'ก', 'ฏ', 'ด', 'โ', 'เ', 'ฌ', '้', '็', '่', '๋', 'า', 'ษ', 'ส', 'ศ', 'ว', 'ซ', 'ง', '.', 'ผ', '(', 'ป', ')', 'แ', 'ฉ', 'อ', 'ฮ', 'ิ', 'ฺ', 'ื', '์', 'ท', '?', 'ม', 'ฒ', 'ใ', 'ฬ', 'ฝ', 'ฦ');
$engKey = array('1', '!', '2', '@', '3', '#', '4', '$', '5', '%', '6', '^', '7', '&', '8', '*', '9', '(', '0', ')', '-', '_', '=', '+', '\\', '|', 'q', 'Q', 'w', 'W', 'e', 'E', 'r', 'R', 't', 'T', 'y', 'Y', 'u', 'U', 'i', 'I', 'o', 'O', 'p', 'P', '[', '{', ']', '}', 'a', 'A', 's', 'S', 'd', 'D', 'f', 'F', 'g', 'G', 'h', 'H', 'j', 'J', 'k', 'K', 'l', 'L', ';', ':', '\'', '"', 'z', 'Z', 'x', 'X', 'c', 'C', 'v', 'V', 'b', 'B', 'n', 'N', 'm', 'M', ',', '<', '.', '>', '/', '?');

$result = "";
	if(preg_match('/^[a-z]+$/i',$message)){ 
		for ($i=0; $i < count($message) ; $i++) { 
			if (array_search($message[$i],$engKey) != -1) {
		        $result += $thaiKey[array_search($message[$i],$engKey)];
		      }else{
		        $result += $message[$i];
		      }
		}
		$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        	$arrayPostData['messages'][0]['type'] = "text";
        	$arrayPostData['messages'][0]['text'] = $result;
		
		replyMsg($arrayHeader,$arrayPostData);

	}



    

    function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }	


// require "vendor/autoload.php";
// require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
// $access_token = 'kLYgimXu+xOMtleVXNAKsjeYwGoE58Rb2ophdLngeAt+6+pYsI5AMJJfEynjqfomgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePMISMmi4KLYd0gX7n7QTtk1EeQ6fIiktOroxFopsfBRgdB04t89/1O/w1cDnyilFU=';
// // Get POST body content
// $content = file_get_contents('php://input');
// // Parse JSON
// $events = json_decode($content, true);
// // Validate parsed JSON data
// if (!is_null($events['events'])) {
// 	// Loop through each event
// 	foreach ($events['events'] as $event) {
// 		// Reply only when message sent is in 'text' format
// 		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
// 			// Get text sent
// 			$text = $event['source']['userId'];
// 			// Get replyToken
// 			$replyToken = $event['replyToken'];
// 			// Build message to reply back
// 			$messages = [
// 				'type' => 'text',
// 				'text' => $text
// 			];
// 			// Make a POST Request to Messaging API to reply to sender
// 			$url = 'https://api.line.me/v2/bot/message/reply';
// 			$data = [
// 				'replyToken' => $replyToken,
// 				'messages' => [$messages],
// 			];
// 			$post = json_encode($data);
// 			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
// 			$ch = curl_init($url);
// 			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// 			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// 			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// 			$result = curl_exec($ch);
// 			curl_close($ch);
// 			echo $result . "\r\n";
// 		}
// 	}
// }
echo "OK";

