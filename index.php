<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Тестовое задание</title>

	<style type="text/css">
		body {
			font-family: 'Roboto', sans-serif;
		}

		.header {
			margin-top:40px;
			margin-bottom:40px;
			font-size: 25px;
		}
		
		.pagi {
			margin-bottom:40px;
		}
	</style>

</head>
<body>
				<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->
												
												
	<div class="container">
		<div class="row">

		    <div class="col-12 header">
		    	<div class="row">
				    <div class="col text-left"><a data-toggle="modal" data-target="#exampleModal" href="">ДОБАВИТЬ ЗАДАЧУ</a></div>
					<?php 
					if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1234777) {
						echo <<< END
	                  <div class="col text-right"><a href="off.php">Выйти</a></div>					
END;
					}
					else {
						echo <<< END
						<div class="col text-right"><a data-toggle="modal" data-target="#exampleModal2" href="">АВТОРИЗАЦИЯ</a></div>		
END;
					}
					?>
				    
				</div>
		    </div>

		    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="auth.php" method="GET">
			        	<input type="text" name="login" placeholder="Логин" required><br>
						<input type="text" name="pass" placeholder="Пароль" required><br>
						<p><input type="submit"></p>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>

		    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Задача</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="add_task.php" method="GET">
			        	<input type="text" name="name" placeholder="Имя" required><br>
						<input type="email" name="email" pattern="[^ @]*@[^ @]*" placeholder="Почта" required><br>
						<input type="text" name="text" placeholder="Текст" required><br>
						<input type="hidden" name="status" value="Выполнено" required><br>
						<p><input type="submit"></p>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>

		    <div class="col-12">
		    	<br class="d-none d-sm-inline" />

		    	<table class="table table-hover table-light">
				  <thead>
				    <tr>
				      <th scope="col">Имя</th>
				      <th scope="col">Почта</th>
				      <th scope="col">Текст</th>
				      <th scope="col">Статус</th>
				    </tr>
				  </thead>
				  <tbody>
	
					
					<?php
					$db = mysql_connect("mysql.zzz.com.ua","a1matov","Azamat741");
					mysql_select_db("a1matov",$db);	
					mysql_query("SET NAMES 'utf8'",$db);
					
					if (isset($_GET['page'])){
					$page = $_GET['page'];
				}else $page = 1;
				
				$kol = 3;
				$art = ($page * $kol) - $kol;
				$res = mysql_query("SELECT COUNT(*) FROM `zadachi`");
				$row = mysql_fetch_row($res);
				$total = $row[0];
				$str_pag = ceil($total / $kol);
				$result = mysql_query("SELECT * FROM `zadachi` ORDER BY id DESC LIMIT $art,$kol");
				
				echo $_COOKIE['order'];
				
				$myrow = mysql_fetch_array($result);
				if(!empty($myrow)) {
				do{
					echo "<tr>";
					echo "<td>".$myrow['name']."</td>";
					echo "<td>".$myrow['mail']."</td>";
					echo "<td>".$myrow['text']."</td>";
					echo "<td>".$myrow['status']."</td>";
					if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1234777) {
					echo "<td><a href='edit.php?id=".$myrow['id']."'>edit</a></td>";
					}
					echo "</tr>";
				} while ($myrow = mysql_fetch_array($result));
				}
				?>
	
				  </tbody>
				</table>

				<br class="d-none d-sm-inline" />
				<p class="text-center pagi"> Пагинация: 
				<?php

				for ($i = 1; $i <= $str_pag; $i++){
					if(isset($_GET["page"])) {
					if($i == $_GET["page"]) {
						echo "...";
					}
					else {
						echo " <a href=?page=".$i."> ".$i." </a> ";
					}
					}
					else {
						if($i==1){echo "...";}
						else echo " <a href=?page=".$i."> ".$i." </a> ";
					}
				}
				?>
				</p>
		    </div>
		      
	    </div>
	</div>
					<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->
									<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->
													<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->
																	<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->
																					<br class="d-none d-sm-inline" /><!-- отступ от рекламы хостинга -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>