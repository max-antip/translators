<?php
# настройки

define ('DB_HOST', '192.168.137.100');
define ('DB_LOGIN', 'u1029887_maximus');
define ('DB_PASSWORD', '4Vj_S|2uH6');
define ('DB_NAME', 'db1029887_test_db');

define ('SERVISE_NAME', 'Сервис переводов');

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD);

//mysql_query("set names utf8") or die ("<br>Invalid query: " . mysql_error());

mysql_select_db(DB_NAME);

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
