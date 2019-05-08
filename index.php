<?php

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
        $arrayPostData['messages'][0]['text'] = "RrRRRR";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    // else if($message == "ฝันดี"){
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "sticker";
    //     $arrayPostData['messages'][0]['packageId'] = "2";
    //     $arrayPostData['messages'][0]['stickerId'] = "46";
    //     replyMsg($arrayHeader,$arrayPostData);
    // }else{
    //  replyMsg($arrayHeader,"----");
    //  }

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




?>
