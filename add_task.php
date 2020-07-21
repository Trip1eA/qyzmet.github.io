<?php
require_once 'connect.php';

if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['text']) && isset($_GET['status'])){
	$link = mysqli_connect($host, $user, $password, $database) or die("error" . mysqli_error($link)); 
	mysql_query ("SET NAMES UTF8");
		
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $mail = htmlentities(mysqli_real_escape_string($link, $_GET['email']));
	$text = htmlentities(mysqli_real_escape_string($link, $_GET['text']));
	$status = htmlentities(mysqli_real_escape_string($link, $_GET['status']));
	
	$query ="INSERT INTO zadachi VALUES(NULL, '$name','$mail','$text','$status')";
     
    $result = mysqli_query($link, $query) or die("ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<h1>Успешно, вернем Вас обратно через 2 секунды...</h1>";
		mysqli_close($link);
		header("refresh: 2;url=http://qazaq.zzz.com.ua/");
    }
}
?>