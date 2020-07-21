<?php
session_start();

if(isset($_GET['login']) && isset($_GET['pass'])){
	
	if($_GET['login'] == "admin" && $_GET['pass'] == "123") {
		$_SESSION['admin'] = 1234777;
		echo "<h1>Успешно, вернем Вас обратно через 2 секунды...</h1>";
		header("refresh: 2;url=http://qazaq.zzz.com.ua/");
	}
	else {
		echo "<h1>Ошибка, вернем Вас обратно через 2 секунды...</h1>";
		header("refresh: 2;url=http://qazaq.zzz.com.ua/");
	}
}
?>