<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1234777) {
if(isset($_GET['name']) && isset($_GET['mail']) && isset($_GET['text']) && isset($_GET['status']) && isset($_GET['id'])){
	
	require_once 'connect.php';
	$link = mysqli_connect($host, $user, $password, $database) or die("error" . mysqli_error($link)); 
	mysql_query ("SET NAMES UTF8");
		
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $mail = htmlentities(mysqli_real_escape_string($link, $_GET['mail']));
	$text = htmlentities(mysqli_real_escape_string($link, $_GET['text']));
	$status = htmlentities(mysqli_real_escape_string($link, $_GET['status']));
	
	$id = (int) $_GET['id'];
	
	  $query ="UPDATE zadachi SET name='$name', mail='$mail', text='$text', status='$status' WHERE id='$id'";
    $result = mysqli_query($link, $query); 
 
    if($result) {
        echo "<span style='color:blue;'>Успешно, вернем Вас обратно через 1 секунду...</span>";
	header("refresh: 1;url=http://qazaq.zzz.com.ua");
	}
	
} else header("refresh: 0;url=http://qazaq.zzz.com.ua/error.php");
} else header("refresh: 0;url=http://qazaq.zzz.com.ua/error.php");
?>