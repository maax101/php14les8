<?php
// $test_list=['math.json'=>'математика',];
 // if (!isset($_FILES['load_test']['name'])) {
 // echo 'Нет загруженых тестов';

 var_dump($_FILES);	
 // } else {
  	if (isset ($_FILES['load_test']['name'])){
  		$test = $_FILES['load_test']['name'];
 	move_uploaded_file($_FILES['load_test']['tmp_name'], 'tests/'.$test);
 	header("Location: list.php");
}
 // 	echo 'загружен: '.$test_list[$test];
 // }
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
</body>
</html>