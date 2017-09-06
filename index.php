<?php
require_once 'core/core.php';

if (isset($_SESSION['admin'])) {
	header('Location: admin.php');
} elseif (isset($_SESSION['user'])) {
	header('Location: list.php');
}

if (!empty($_POST)) {
	if (isset ($_POST['guest'])) {
		$_SESSION['user'] = $_POST['name'];
		header('Location: list.php');	 	
	} elseif (isset( $_POST['admin']) && isAdmin ($_POST['login'], $_POST['pass'])) {
		header('Location: admin.php');
	} echo '!!! WRONG login or password !!!';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Привет!</title>
</head>
<body>
	<p><h2>Войти как:</h2></p>
	<h3>Гость</h3>
	<form action="" method="post">
		<input type="text" name="name" value="" required placeholder="Введите свое имя">		
		<input type="submit" name="guest" value="Войти">		
	</form>
	<h3>Авторизованный пользователь</h3>
	<form action="" method="post"  >
		<input type="text" name="login" value="" required placeholder="Login">
		<input type="password" name="pass" value="" required placeholder="Password">
		<input type="submit" name="admin" value="Войти" >		
	</form>
</body>
</html>