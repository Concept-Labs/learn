<?php
    //подключаем автозагрузку классов
    include ( site_path .'classes/autoload.php' );
    //обьявляем клас для глобальных переменных
	$registry = new Registry;
	//устанавливаем соединение с базой данных
	require_once ( site_path .'config.php' );
	$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass );
	$registry->set ('db', $db);
?>
