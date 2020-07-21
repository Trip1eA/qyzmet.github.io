<?php
session_start();
session_unset();
session_destroy();

echo "<h1>Успешно, вернем Вас обратно через 2 секунды...</h1>";
header("refresh: 2;url=http://qazaq.zzz.com.ua/");
?>