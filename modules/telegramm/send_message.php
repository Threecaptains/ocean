<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';

function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];
     
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data ); 
 
    $result = curl_exec( $ch );
    curl_close( $ch );
}

// Если пришел новый вопрос
if(isset($_GET['mess'])) {
    message_to_telegram('Hello! You have new question!');
    header("Location: /request_info.php");
}

// Если пришел новый заказ
if(isset($_GET['order'])) {
    message_to_telegram('Hello! You have new order!');
    header("Location: /basket.php");
}
?>