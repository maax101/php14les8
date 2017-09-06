<?php
define('FILE_USER_DATA', __DIR__.'/../data/users.json');
// spisok avt userov - adminov
function getAdmins(){
	$admins = json_decode (file_get_contents (FILE_USER_DATA), true);
	return $admins;	
}
//proverka admina
function getAdmin ($login){
	$admins = getAdmins();
	foreach ($admins as $admin) {
		if ($admin['login'] == $login) {
			return $admin;
		} else {
			return null;
		}
	}
}
//proverka na avtorizaciyu
function isAdmin ($login, $pass){
	$admin = getAdmin($login);	
    if (!$admin || $admin['password'] != $pass) {
        return false;
    } else {
        unset($admin['password']);
        // Устанавливаем данные пользователя в сесиии
        // По этим данным мы будем определять что пользователь авторизован
        $_SESSION['admin'] = $admin;
        return true;
    }
}

