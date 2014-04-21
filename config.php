<?php
# настройки

define ('DB_HOST', 'localhost');
define ('DB_LOGIN', 'root');
define ('DB_PASSWORD', 'perfecto');
define ('DB_NAME', 'test');

define ('SERVISE_NAME', 'Сервис переводов');

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD);



//mysql_query("set names utf8") or die ("<br>Invalid query: " . mysql_error());

/*
 *NEW METHOD  $mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD);

if ($mysqli->connect_errno) {
    echo "Неудалось подключиться к базе данных MySQL:
     (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
*/

mysql_select_db(DB_NAME) or die ("<br>Invalid query: " . mysql_error());

# массив ошибок
$error[0] = 'Пользователя не существует в системе';
$error[1] = 'Включите куки';
$error[2] = 'Доступ запрещен';


#Статусы заказов

$order_status[0] = 'Ожидает перевода';
$order_status[1] = 'В переводе';
$order_status[2] = 'Переведен';
$order_status[3] = 'Перевод прерван';
$order_status[4] = 'Просрочен';

#Типы заказов
$order_type[0] = 'Художественный';
$order_type[1] = 'Технический';
$order_type[2] = 'Медицинский';
$order_type[3] = 'Другой';

$on_main = 'На главную';