<?php
//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = new mysqli("127.0.0.1", "root", "", "todolist" );
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");