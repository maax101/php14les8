<?php
require_once 'core/core.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>вход</title>
</head>
<body>
	<ul>
	<?php if (isset ($errors)){ foreach ($errors as $error): ?>
		<li><?=$error?></li>
	<?php endforeach;} ?>
	</ul>
	<form method="post">
		Username: <input type="text" name="user" value="" /><br />
		Password: <input type="password" name="password" value="" /><br />
		<input type="submit"  value="Войти" />
	</form>		
</body>
</html>
