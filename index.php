<?php

$channelAccessToken = "kLYgimXu+xOMtleVXNAKsjeYwGoE58Rb2ophdLngeAt+6+pYsI5AMJJfEynjqfomgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePMISMmi4KLYd0gX7n7QTtk1EeQ6fIiktOroxFopsfBRgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
createNewRichmenu($channelAccessToken);

function createNewRichmenu($channelAccessToken) {
  $sh = <<< EOF
  curl -v -X POST https://api.line.me/v2/bot/richmenu \
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
  }'
EOF;

  // $result = json_decode(shell_exec(str_replace('\\', '', str_replace(PHP_EOL, '', $sh))), true);
  $result = shell_exec(str_replace('\\', '', str_replace(PHP_EOL, '', $sh)));

  echo $result;
  // if(isset($result['richMenuId'])) {
  //   return $result['richMenuId'];
  // }
  // else {
  //   return $result['message'];
  // }



}
?>
