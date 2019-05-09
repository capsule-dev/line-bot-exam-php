<?php 
$channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

function Next_Richmenu(){
  $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.line.me/v2/bot/user/U379012a856dc85df1cc9d67b7efa18e3/richmenu/richmenu-e8ca8c5e1d834e96a4942a6de99ff2ae",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
      "Accept: */*",
      "Authorization: Bearer 2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=",
      "Cache-Control: no-cache",
      "Connection: keep-alive",
      "Host: api.line.me",
      "Postman-Token: 11e0a000-44f8-4b90-a19b-b3be6e615eb7,020afb88-c793-4814-830a-33a542720ab5",
      "User-Agent: PostmanRuntime/7.11.0",
      "accept-encoding: gzip, deflate",
      "cache-control: no-cache",
      "content-length: "
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