<?php
require_once 'core/core.php';
if (!isset ($_SESSION['admin'])){
	http_response_code(403);
	header('Location: index.php');
}
if(isset($_GET['do'])){
	if ($_GET['do'] == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();	
	}
}

if (isset ($_FILES['load_test']['name'])){
  	$test = $_FILES['load_test']['name'];
 	move_uploaded_file($_FILES['load_test']['tmp_name'], 'tests/'.$test);
 	header("Location: list.php");
}

if (isset($_FILES['load_test']['name'])) {
	$extension = pathinfo($_FILES['load_test']['name'],PATHINFO_EXTENSION);
	if ($extension!='json') {
 	echo 'Выбрано неверное расширение файла';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Администрация</title>
</head>
<body>
	<menu type="toolbar">
		<li><a href="list.php">Список тестов</a></li><br>
		<li><a href="allresult.php">Результаты</a></li><br>
	</menu>
		<form enctype="multipart/form-data" action="" method="POST">
			<input type="file" name="load_test" extensions="json"><br>
			<br>
			<input type="submit" value="загрузить"><br>
		</form>	
	<br><a href="admin.php?do=logout">Выход</a>
</body>
</html>