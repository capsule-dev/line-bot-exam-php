<?php 
$channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
 uploadImageRichmenu($channelAccessToken);

function createNewRichmenu($channelAccessToken) {
  $sh = <<< EOF
  curl -X POST \
  -H 'Authorization: Bearer $channelAccessToken' \
  -H 'Content-Type:application/json' \
  -d '{
    "size":{
        "width":2500,
        "height":1686
    },
    "selected":false,
    "name":"Controller",
    "chatBarText":"Controller",
    "areas":[
        {
          "bounds":{
              "x":551,
              "y":325,
              "width":321,
              "height":321
          },
          "action":{
              "type":"message",
              "text":"up"
          }
        },
        {
          "bounds":{
              "x":876,
              "y":651,
              "width":321,
              "height":321
          },
          "action":{
              "type":"message",
              "text":"right"
          }
        },
        {
          "bounds":{
              "x":551,
              "y":972,
              "width":321,
              "height":321
          },
          "action":{
              "type":"message",
              "text":"down"
          }
        },
        {
          "bounds":{
              "x":225,
              "y":651,
              "width":321,
              "height":321
          },
          "action":{
              "type":"message",
              "text":"left"
          }
        },
        {
          "bounds":{
              "x":1433,
              "y":657,
              "width":367,
              "height":367
          },
          "action":{
              "type":"message",
              "text":"btn b"
          }
        },
        {
          "bounds":{
              "x":1907,
              "y":657,
              "width":367,
              "height":367
          },
          "action":{
              "type":"message",
              "text":"btn a"
          }
        }
    ]
  }' https://api.line.me/v2/bot/richmenu;
EOF;
  $result = json_decode(shell_exec(str_replace('\\', '', str_replace(PHP_EOL, '', $sh))), true);
  if(isset($result['richMenuId'])) {
    return $result['richMenuId'];
  }
  else {
    return $result['message'];
  }
}

function uploadImageRichmenu($channelAccessToken){

    $urlWithoutProtocol = "api.line.me/v2/bot/richmenu/{getListOfRichmenu($channelAccessToken)}/content";
    $request         = "";
    $isRequestHeader = false;
 
    $exHeaderInfoArr   = array();
    $exHeaderInfoArr[] = "Content-type: image/jpeg";
    $exHeaderInfoArr[] = "Authorization: Bearer $channelAccessToken";
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,array('file' => '@' . realpath('image.jpg') . ';filename=image.jpg'));
    curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if( is_array($exHeaderInfo) && !empty($exHeaderInfo) )
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $exHeaderInfo);
    }
    $response = curl_exec($ch);
    curl_close($ch);
 
    echo $response;
}

function getListOfRichmenu($channelAccessToken) {
  $sh = <<< EOF
  curl \
  -H 'Authorization: Bearer $channelAccessToken' \
  https://api.line.me/v2/bot/richmenu/list;
EOF;

  $result = json_decode(shell_exec(str_replace('\\', '', str_replace(PHP_EOL, '', $sh))), true);

  return $result;
}




?>