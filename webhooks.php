<?php

    $accessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "Message"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ข้อความ";
        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "Read"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อ่าน";
        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "Book"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "หนังสือ";
        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "Coffee"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "กาแฟ";
        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "Game"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เกมส์";
        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "Next"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เดี่ยวจะทำเปลี่ยน Rich Menu เป็น Rich Menu 2";
        // $arrayJson['events'][0]['source']['userId'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/user/$arrayJson['events'][0]['source']['userId']/richmenu/richmenu-e8ca8c5e1d834e96a4942a6de99ff2ae",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer 2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU="
        ),
      ));
        $response = curl_exec($curl);
        replyMsg($arrayHeader,$arrayPostData);
    }elseif($message == "Previous"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เดี่ยวจะทำเปลี่ยน Rich Menu เป็น Rich Menu 1";
        // $arrayJson['events'][0]['source']['userId'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/user/$arrayJson['events'][0]['source']['userId']/richmenu/richmenu-ec7d14b99b6cfecc976f21effe23a675",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer 2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU="
        ),
      ));
        $response = curl_exec($curl);
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    elseif($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
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
   exit;




?>
