<?php
/**
 * Telegram Bot тупо бот access token и URL.
 */
$access_token = '978553508:AAEheY8odzWSH-6YDJHSAROf0jwBW3sRmTE';
$api = 'https://api.telegram.org/bot' . $access_token;
/**
 * Задаём основные переменные.
 */
$output = json_decode(file_get_contents('php://input'), TRUE);
@$chat_id = $output['message']['chat']['id'];
@$message = $output['message']['text'];
// команды тупо-бота
switch($message) {
    case '/start':
    sendMessage($chat_id, "\xF0\x9F\x93\xA1 тупобот на связи!");
    break;
}

function sendMessage($chat_id, $message) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&parse_mode=html');
}
