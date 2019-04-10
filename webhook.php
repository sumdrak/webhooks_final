<?php

if(isset($_GET['hub_mode']) && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token'])){
    if($_GET['hub_verify_token'] == 'verificar_123'){
        $feedData['hub_verify_token'] =$_GET['hub_verify_token'];
        $feedData['hub_challenge'] =$_GET['hub_challenge'];
        echo $_GET['hub_challenge'];
        $handles = fopen('tester.txt','w');
    fwrite($handles,$feedDatas);
    fclose($handles);
    }
}else{
    $feedData = file_get_contents('php://input');
    if(empty($feedData)){
        $feedData = "no tiene informacion";
    }
    /* echo ($feedData);*/
    $handle = fopen('test.txt','w');
    fwrite($handle,$feedData);
    fclose($handle); 
    if(!empty($feedData)){
    $data = json_decode($feedData);
    //echo ($data);
    if($data->object ==  'page'){
        $commentID = $data->entry[0]->changes[0]->value->comment_id;
        $message = $data->entry[0]->changes[0]->value->message;
        $verb = $data->entry[0]->changes[0]->value->verb;
        $accessToken = "EAAdlqthTlZCkBANl52dydPeozRYzwj10AzVaZATiOt9R7ZB01Lcd61u1zkCJ2l5JNjZBgsPOKpHEjnL9fcWJoV76I4vYBnjTeNeNOfgZCIhTDTSxOQq2ZB4CgiDsAit95qc67pTIaPaE999LyHzOgY6ZB8OHYQaWynjEKqCdT4WqoYQa4npwy6iw7PwJHnkYOQZD";
        if($verb == "add"){
            if(strtolower($message) == "red"){
                $reply = "hey, noi se";
            }else if(strtolower($message) == "blue"){
                $reply = "hey, noi se 2";
            }else{
                $reply = "hey, noi se 3";
            }
            /* $ch = curl_init();
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,"message=$reply&access_token=$accessToken");
            curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36");
            $response = curl_exec($ch);
            curl_close($ch); */
        }
    }
    }else{
        var_dump("no tiene informacion");die;
    }
}
http_response_code(200);

?>
 
