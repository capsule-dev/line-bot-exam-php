<?php

    $accessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text" '''
    if($message == "Message"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ข้อความ";
        replyMsg($arrayHeader,$arrayPostData);

    } elseif($message == "up_1"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "flex";
        $arrayPostData['messages'][0]['altText'] = "This is a Flex Message";
        $arrayPostData['messages'][0]['contents']['type'] = "bubble";

        $arrayPostData['messages'][0]['contents']['header']['type'] = "box";
        $arrayPostData['messages'][0]['contents']['header']['layout'] = "vertical";
        $arrayPostData['messages'][0]['contents']['header']['contents'][0]['type'] = "text";
        $arrayPostData['messages'][0]['contents']['header']['contents'][0]['text'] = "header";

        $arrayPostData['messages'][0]['contents']['hero']['type'] = "image";
        $arrayPostData['messages'][0]['contents']['hero']['url'] = "https://www.linefriends.com/img/img_sec.jpg";
        $arrayPostData['messages'][0]['contents']['hero']['size']= "full";
        $arrayPostData['messages'][0]['contents']['hero']['aspectRatio']= "2:1";


        $arrayPostData['messages'][0]['contents']['body']['type'] = "box";
        $arrayPostData['messages'][0]['contents']['body']['layout'] = "vertical";
        $arrayPostData['messages'][0]['contents']['body']['contents'][0]['type'] = "text";
        $arrayPostData['messages'][0]['contents']['body']['contents'][0]['text'] = "ฺBody";
        $arrayPostData['messages'][0]['contents']['body']['contents'][1]['type'] = "text";
        $arrayPostData['messages'][0]['contents']['body']['contents'][1]['text'] = "Body";

        $arrayPostData['messages'][0]['contents']['footer']['type'] = "box";
        $arrayPostData['messages'][0]['contents']['footer']['layout'] = "vertical";
        $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['type'] = "text";
        $arrayPostData['messages'][0]['contents']['footer']['contents'][0]['text'] = "footer";



        replyMsg($arrayHeader,$arrayPostData);
    } elseif($message == "right_1"){
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

    } elseif($message == "go_to_1"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เดี่ยวจะทำเปลี่ยน Rich Menu เป็น Rich Menu 1";
        $user_id = $arrayJson['events'][0]['source']['userId'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/user/$user_id/richmenu/richmenu-aad7062214f3f64572ee5b6f32a897e1",
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
        $err = curl_error($curl);

        replyMsg($arrayHeader,$arrayPostData);

    }elseif($message == "go_to_2"){

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เดี่ยวจะทำเปลี่ยน Rich Menu เป็น Rich Menu 2";
        $user_id = $arrayJson['events'][0]['source']['userId'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/user/$user_id/richmenu/richmenu-9ac685a9080b866d7de7facdb075a62f",
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
        $err = curl_error($curl);

        curl_close($curl);
        replyMsg($arrayHeader,$arrayPostData);

    }elseif($message == "go_to_3"){

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เดี่ยวจะทำเปลี่ยน Rich Menu เป็น Rich Menu 3";
        $user_id = $arrayJson['events'][0]['source']['userId'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/user/$user_id/richmenu/richmenu-2fbda1d8d6fbc6b96a9f2caa4057f9a2",
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
        $err = curl_error($curl);

        curl_close($curl);
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
