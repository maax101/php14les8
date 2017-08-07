<?php
$ot = 0;
$not = 0;
if (!isset ($_GET['q1']) || !isset($_GET['q2']) || !isset($_GET['q3'])) {
	echo 'Не все варианты выбраны. Вернитесь назад.<br> '.PHP_EOL;
exit();} else {
	if ($_GET['q1']=='b') {
		$ot++;
	} else {
		$not++;
	}
	if ($_GET['q2']=='a') {
		$ot++;
	} else {
		$not++;
	}
	if ($_GET['q3']=='c') {
		$ot++;
	} else {
		$not++;
	}
}
$user = htmlspecialchars((string) $_GET['user_name']);
file_put_contents('allresult.php','<br>'. date('d.m.y').'. '.$user.': правильно - '.$ot.', не правильно - '.$not.'<br>', FILE_APPEND);

$sert = @imagecreatetruecolor(640, 320) or die ('Невозможно инициализировать GD поток');	
$text_col = imagecolorallocate($sert, 15, 90, 20);
$fill = imagecolorallocate($sert, 220, 220, 220);
imagefill($sert, 10, 10, $fill);
imagettftext($sert, 22, 0, 200, 50, $text_col, 'arial.ttf', 'Ваш результат, '.$user.':');
imagettftext($sert, 15,0, 50, 100,$text_col,'arial.ttf', 'правильно: '.$ot);
imagettftext($sert, 15,0, 50, 150,$text_col,'arial.ttf', 'неправильно: '.$not);
header('Content-Type: image/png; Location: list.php');
imagepng($sert);
imagedestroy($sert);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Результаты</title>
</head>
<body>
<div>
<p><h2> Ваш результат, <?=$user?>: </h2></p>
<p>правильно: <?=$ot?></p>
<p>не правильно: <?=$not?></p>
</div>
<a href="admin.php">Администрация</a>
</body>

</html>