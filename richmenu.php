<?php 
// $channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
 createNewRichmenu();

function createNewRichmenu() {

$request = new HttpRequest();
$request->setUrl('https://api.line.me/v2/bot/richmenu');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'cache-control' => 'no-cache',
  // 'Connection' => 'keep-alive',
  // 'content-length' => '357',
  // 'accept-encoding' => 'gzip, deflate',
  // 'Host' => 'api.line.me',
  // 'Postman-Token' => 'c2111d0b-b6fe-47eb-b1ca-e748b4b01c89,bc0df712-426e-44f1-b185-ec9514bcaa5e',
  // 'Cache-Control' => 'no-cache',
  // 'Accept' => '*/*',
  // 'User-Agent' => 'PostmanRuntime/7.11.0',
  'Authorization' => "Bearer 2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=",
  'Content-Type' => 'application/json'
));

$request->setBody('{
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
}');

  try {
    $response = $request->send();

    echo $response->getBody();
  } catch (HttpException $ex) {
    echo $ex;
  }
}





?>