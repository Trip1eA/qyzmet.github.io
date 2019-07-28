<?php
$url="https://api.telegram.org/bot978553508:AAEheY8odzWSH-6YDJHSAROf0jwBW3sRmTE/";
//читаем результат из стандартного потока, в который PHP записывает полученные данные
$a=file_get_contents('php://input');
$content = json_decode($a);
//получаем значение chat_id – идентификатор чата с пользователем, отправившим сообщение
$chatID=$update['result'][0]['message']['chat']['id'];
//Инициализируем новый запрос
$ch = curl_init();
//Формируем строку запроса – отправка пользователю сообщения «hello»
$msg=$url."sendMessage?chat_id=".$chatID."&text=Hello";
//Настраиваем запрос
curl_setopt($con, CURLOPT_URL, $msg);
curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($con, CURLOPT_HEADER, 0);
//Выполняем запрос
$output = curl_exec($con);
//Закрываем запрос
curl_close($con);
?>
