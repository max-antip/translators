<?php
# настройки

define ('DB_HOST', 'localhost');
define ('DB_LOGIN', 'cp095773_max');
define ('DB_PASSWORD', 'popolius111');
define ('DB_NAME', 'cp095773_traslators');

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
