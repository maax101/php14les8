<?php 
if (isset($_GET['test_name'])) {
	$path_file = 'tests/'.$_GET['test_name'];
	$temp = file_get_contents($path_file);
	file_put_contents('temp.php', json_decode($temp));
	$test = file_get_contents('temp.php');
} else { header('<h1>HTTP/1.0 404 Not Found</h1>',404); }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
	<form action="result1.php" method="GET">
		<input type="text" name="user_name" value="" placeholder="введите свое имя..." required="введите имя">
		<?php echo $test; ?>
		<input type="submit" value="результат">
	</form>	
</body>
</html>
