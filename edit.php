<?php 
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1234777) {
	
	if(isset($_GET['id'])){
		
		$id = (int) $_GET['id'];
		
		$db = mysql_connect("mysql.zzz.com.ua","a1matov","Azamat741");
					mysql_select_db("a1matov",$db);	
					mysql_query("SET NAMES 'utf8'",$db);
					
					$qr_result = mysql_query("select * from zadachi WHERE id = $id") or die(mysql_error());
					$data = mysql_fetch_assoc($qr_result);
					
					if(empty($data['name'])) header("refresh: 0;url=http://qazaq.zzz.com.ua/error.php");
					
	} else header("refresh: 0;url=http://qazaq.zzz.com.ua/error.php");
} else header("refresh: 0;url=http://qazaq.zzz.com.ua/error.php");
?>

<form action="update.php" method="get">
Name: <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br>
Mail: <input type="text" name="mail" value="<?php echo $data['mail']; ?>"> <br>
Text: <input type="text" name="text" value="<?php echo $data['text']; ?>"> <br>
<input type="hidden" name="status" value="Отредактировано">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit">
</form>