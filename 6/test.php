<?php 
if (!isset($_GET['test_name']) || !file_exists('tests/'.$_GET['test_name'])) {
	header("HTTP/1.1 404 Not Found",$replace=true,http_response_code(404));
	exit();	
} else { 
	$path_file = 'tests/'.$_GET['test_name'];
	$temp = file_get_contents($path_file);
	file_put_contents('temp.php', json_decode($temp));
	$test = file_get_contents('temp.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
	<form action="result1.php" method="GET">
		<input type="text" name="user_name" value="" placeholder="введите свое имя..." required="введите имя">
		<?=$test?>
		<input type="submit" value="результат">
	</form>	
</body>
</html>
