<?php
//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = new mysqli("127.0.0.1", "root", "", "todolist" );
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");
$id = $_GET['id'];
$titlezam = $_GET['titlezam'];
$desczam = $_GET['desczam'];
$deadline = $_GET['deadline'];
$statuszam = $_GET['statuszam'];
$update_sql = $connect->query("UPDATE all_list SET titlezam='$titlezam', desczam='$desczam', deadline='$deadline', statuszam='$statuszam' WHERE id='$id'");
