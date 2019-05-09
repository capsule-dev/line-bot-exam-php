<?php 
/**
* Line_Richmenu_API Use Messaging API LINE
* Line Messaging API Doc : https://developers.line.biz/en/docs/messaging-api/overview/
* Line Messaging API  using-rich-menus Doc : https://developers.line.biz/en/docs/messaging-api/using-rich-menus/
*/

class Line_Richmenu_API {

  public $channelAccessToken;

  function __construct() {
    // Copy Channel access token  From Line Messaging API Doc : https://developers.line.biz/en/docs/messaging-api/overview/
    $this->channelAccessToken = "2tNAlMM4y3Rmj/BDGr7td82eUqUtj9dqQSobtPF/fDjGjm6G3ExSzbFX+GHbCoCYgb4l0Gg93j60hvPmi80bkXZJkypC9prbhEsJOBakNePZ6oaEj8rbbGeDfL+aW3SfgLOpnr8KVFhThk/pdY51XAdB04t89/1O/w1cDnyilFU=";

  }

  function createNewRichmenu($channelAccessToken,$richMenuObject) {  

    // Rich menu object  Line Messaging API Doc :  https://developers.line.biz/en/reference/messaging-api/#rich-menu-object
    // Sample Rich menu object 
    // $richmenu_object = '{"size": {"width": 2500, "height": 1686 }, "selected": false, "name": "Nice richmenu", "chatBarText": "Tap to open", "areas": [{"bounds": {"x": 0, "y": 0, "width": 2500, "height": 1686 }, "action": {"type":"message", "label":"Yes", "text":"Yes"} } ] }';
    //response with a rich menu ID.
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.line.me/v2/bot/richmenu",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $richMenuObject,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $channelAccessToken ",
            "Content-Type: application/json"
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


  function uploadTheRichMenuImage($channelAccessToken,$richMenuId,$richMenuImagePath){

  // uploadTheRichMenuImage  Doc : https://developers.line.biz/en/reference/messaging-api/#upload-rich-menu-image

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/richmenu/$richMenuId/content",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $richMenuImagePath,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $channelAccessToken",
        "Content-Type: image/jpeg"
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
  
  function SetTheDefaultRichMenu($channelAccessToken,$richMenuId){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/user/all/richmenu/$richMenuId",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $channelAccessToken"
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


  function GetRichMenuList($channelAccessToken){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/richmenu/list",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $channelAccessToken "
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $result = json_decode($response,true);
    }
  }


  function DeleteAllRichMenu($channelAccessToken){

    $richmenus = GetRichMenuList($channelAccessToken);

    for ($i=0; $i < count($richmenus['richmenus']); $i++) { 

      $rich_id = $richmenus['richmenus'][$i]['richMenuId'];

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/richmenu/$rich_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array("Authorization: Bearer $channelAccessToken")
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
  }

}  


  // $Line_Richmenu = new Line_Richmenu_API;

  /////////Create   Run First 
  // $richMenuObject = '{"size": {"width": 2500, "height": 1686 }, "selected": false, "name": "Nice richmenu", "chatBarText": "Tap to open", "areas": [{"bounds": {"x": 0, "y": 0, "width": 2500, "height": 1686 }, "action": {"type":"message", "label":"Yes", "text":"Yes"} } ] }';
  // $richMenuId = $Line_Richmenu->createNewRichmenu($Line_Richmenu->channelAccessToken,$richMenuObject);

  ///////////Run Second Upload Image 
  // $richMenuImagePath = "image_4.jpg";
  // $richMenuId = "richmenu-d172c6d056275281940e589f8fe41ca0";
  // $Line_Richmenu->uploadTheRichMenuImage($Line_Richmenu->channelAccessToken,$richMenuId,$richMenuImagePath);

  //Set Default Richmenu
  // $richMenuId = "richmenu-d172c6d056275281940e589f8fe41ca0";
  // $Line_Richmenu->SetTheDefaultRichMenu($Line_Richmenu->channelAccessToken,$richMenuId);








  ?>