<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
header('Content-Type: text/html; charset=utf-8');
$chapter1_end = FALSE;
$token = "";
$chat_id="";
$offset = 0;
while (true) {
    $url = "https://api.telegram.org/bot" . $token . "/getupdates?offset=" . $offset;
    $newupdate = file_get_contents($url);
    $arrayResult = json_decode($newupdate, true);


    foreach ($arrayResult['result'] as $update) {
        $uId = $update['update_id'];
        $offset = $uId + 1;
        $chatId = $update['message']['from']['id'];
        $command = $update['message']['text'];
        if ($command == "/start") {
            $text = " چه سوالی داری؟ ";
            $sendtext = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatId . "&text=" . $text;
            file_get_contents($sendtext);
        }
        else{
            $data = [
                'chat_id' => $chat_id,
                'text' => $command."\n".$update['message']['from']['first_name']." ".$update['message']['from']['last_name']."\n".$update['message']['from']['username']
            ];
        }

        $response = file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?" . http_build_query($data) );
    }
}
?>
</body>
</html>
