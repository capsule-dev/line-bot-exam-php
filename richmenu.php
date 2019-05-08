<?php 
$channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
 
 echo createNewRichmenu($channelAccessToken);

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
    $sheee = <<< EOF
    curl -X POST \
    -H 'Authorization: Bearer $channelAccessToken' \
    -H 'Content-Type:image/jpeg' \
    -T 'image.jpg' https://api.line.me/v2/bot/richmenu/{$result['richMenuId']}/content;
    EOF;

    $resule_sheee = shell_exec(str_replace('\\', '', str_replace(PHP_EOL, '', $sheee)))

    return $resule_sheee;
  }
  else {
    return $result['message'];
  }
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