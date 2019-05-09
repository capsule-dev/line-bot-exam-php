<?php 
$channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
 createNewRichmenu($channelAccessToken);

function createNewRichmenu($channelAccessToken) {

  $data = '{
  
  "size": {
    "width": 2500,
    "height": 1686
  },
  "selected": false,
  "name": "Nice richmenu",
  "chatBarText": "Tap to open",
  "areas": [
    {
      "bounds": {
        "x": 0,
        "y": 0,
        "width": 2500,
        "height": 1686
      },
      "action": {  
       "type":"message",
       "label":"Yes",
       "text":"Yes"
    }
    }
  ]
}';


      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/richmenu",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
          // "Accept: */*",
          "Authorization: Bearer $channelAccessToken ",
          // "Cache-Control: no-cache",
          // "Connection: keep-alive",
          "Content-Type: application/json",
          "Host: api.line.me"
          // "Postman-Token: c2111d0b-b6fe-47eb-b1ca-e748b4b01c89,fdb9c125-c790-4e9a-a4fd-5d7707c7782b",
          // "User-Agent: PostmanRuntime/7.11.0",
          // "accept-encoding: gzip, deflate",
          // "cache-control: no-cache",
          // "content-length: 357"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
}



?>