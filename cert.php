<?php

$sert = @imagecreatetruecolor(640, 320) or die ('Невозможно инициализировать GD поток');
$text_col = imagecolorallocate($sert, 15, 90, 20);
$fill = imagecolorallocate($sert, 220, 220, 220);
$font = __DIR__ . '/arial.ttf';

imagefill($sert, 10, 10, $fill);
imagettftext($sert, 22, 0, 200, 50, $text_col, $font, 'Ваш результат, ' . $_GET['user'] . ':');
imagettftext($sert, 15, 0, 50, 100, $text_col, $font, 'правильно: ' . $_GET['ot']);
imagettftext($sert, 15, 0, 50, 150, $text_col, $font, 'неправильно: ' . $_GET['not']);
header('Content-Type: image/png; Location: cert.php');
imagepng($sert);
imagedestroy($sert);
?>