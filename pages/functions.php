<?php
	
$user = 'root';
$pass = '123456';
$host = 'localhost';
$dbname = 'tours';// название созданной базы данных


function connect(){

	global $user, $pass, $host, $dbname;
	//echo 'host='.$host;
	$link = mysql_connect($host, $user, $pass) or die ('error');//подключаемся к серверу

	mysql_select_db($dbname) or die ('error'); //после того как зашли на сервер входим в базу данных

	mysql_query('set names "utf8" ');

}







?>