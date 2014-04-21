<!DOCTYPE html>
<html>
<head>
    <title>Переводы</title>
    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>

    <meta charset="utf-8">


</head>


<body>

<?
include 'templ/admin_menu.php';
include '../config.php';
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$orders_done_query = mysql_query('select count(*) from orders where status=2');
$orders_in_work_query = mysql_query('select count(*) from orders where status=1');
$orders_qty_query = mysql_query('select count(*) from orders');
$translators_qty_query = mysql_query('select count(*) from translators');
/*$translators_in_work_qty_query = mysql_query('SELECT
distinct order_bags.translater_id
FROM order_bags
JOIN orders ON (orders.id = order_bags.order_id AND orders.status = 1)
GROUP BY (order_bags.translater_id)');*/


$orders = mysql_result($orders_qty_query, 0);
$orders_in_work = mysql_result($orders_in_work_query, 0);
$orders_done = mysql_result($orders_done_query, 0);
$translators_qty = mysql_result($translators_qty_query, 0);
//$translators_in_work_qty = mysql_fetch_array($translators_in_work_qty_query);

?>

<div class="container">
    <br>

    <p class="lead">
        Добро пожаловать в сервис переводов beta 0.1
    </p>

    <div class="row">
        <div class="col-md-4">
            <h4>Заказы</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?=$orders?></span>
                    Всего
                </li>
                <li class="list-group-item">
                    <span class="badge"><?=$orders_in_work?></span>
                    В переводе
                </li>
                <li class="list-group-item">
                    <span class="badge"><?=$orders_done?></span>
                    Выполнено
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h4>Переводчики</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?=$translators_qty?></span>
                    Всего
                </li>
            </ul>
        </div>
    </div>

</div>


</body>
</html>