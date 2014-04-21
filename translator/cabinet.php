<?php
include '../config.php';
require 'login.php';

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");


$query = mysql_query("SELECT   orders.id,
  orders.status,
  orders.file_name,
  orders.file_path
  FROM orders
  JOIN order_bags ON order_bags.order_id = orders.id
  AND order_bags.translater_id =" . $_SESSION['user_id'] . "");

$query_user = mysql_query("select * from translators where id =" . $_SESSION['user_id'] . "");

$result_user = mysql_fetch_array($query_user);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет <?= $result_user['login'] ?></title>
    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>

    <meta charset="utf-8">


</head>
<body>

<?
include  'templ/menu.php';
?>


<div class="container">


    <br>

    <div class="row">
        <div class="col-md-8">
            <h3>Личный кабинет переводчика <?= $result_user['login'] ?></h3>

            <p class="text-muted"> <?= $result_user['email'] ?></p>

            <p class="text-muted"><?= $result_user['address'] ?></p>

            <p class="text-muted"><?= $result_user['status'] ?></p>
        </div>
        <div class="col-md-4">
            <H4>Проекты в работе:</H4>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $idx = 1;
                while ($result_order = mysql_fetch_array($query)) {
                    print '<tr>';
                    print "<td>" . $idx++ . "</td>";
                    print "<td>" . $result_order['file_name'] . "</td>";
                    if (isset($result_order['status'])and $result_order['status'] == 2) {
                        print "<td>Перевод закончен</td>";
                        print "<td></td>";
                    } else {
                        print "<td><a href='" . $result_order['file_path'] . "' download=''>Скачать</a></td>";
                        print "<td><a href='upload_translated.php?order_id=" .
                            $result_order['id'] . "'>Загрузить перевод</a></td>";
                    }
                    print '</tr>';

                }

                ?>
                </tbody>
            </table>


        </div>
    </div>


    <br>
    <br>

    <p class="text-muted text-right">
        <a href="login.php?action=logout">Выход</a>
    </p>

    <p class="text-muted text-right">
        <a href="main.php"><?= $on_main ?></a>
    </p>

</div>
</body>
</html>